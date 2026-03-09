<?php

// ─────────────────────────────────────────────────────────────────────────────
// Initialisation du thème
// Déclenché après le chargement du thème. Déclare les fonctionnalités supportées,
// enregistre les styles de l'éditeur et configure les menus/patterns.
// ─────────────────────────────────────────────────────────────────────────────
add_action('after_setup_theme', function () {
	// Laisse WordPress gérer la balise <title> automatiquement
	add_theme_support('title-tag');
	// Active le support des feuilles de style personnalisées dans l'éditeur Gutenberg
	add_theme_support('editor-styles');
	// Active le logo personnalisé dans le Customizer (hauteur et largeur flexibles)
	add_theme_support('custom-logo', [
		'flex-height' => true,
		'flex-width' => true,
	]);

	// Construit la liste des CSS à charger dans l'éditeur :
	// on part de editor.css global, puis on ajoute style.css et editor.css
	// de chaque dossier de pattern s'ils existent.
	$editor_styles = ['assets/css/editor.css'];
	$theme_dir     = wp_normalize_path(get_theme_file_path());
	$pattern_dirs  = glob($theme_dir . '/patterns/*', GLOB_ONLYDIR) ?: [];
	sort($pattern_dirs);
	foreach ($pattern_dirs as $dir) {
		$dir = wp_normalize_path($dir);
		foreach (['style.css', 'editor.css'] as $file) {
			$full = $dir . '/' . $file;
			if (file_exists($full)) {
				// Convertit le chemin absolu en chemin relatif au thème
				$editor_styles[] = ltrim(str_replace($theme_dir . '/', '', $full), '/');
			}
		}
	}
	add_editor_style($editor_styles);

	// Permet aux blocs d'utiliser les alignements "wide" et "full"
	add_theme_support('align-wide');
	// Active les champs "Image mise en avant" et "Extrait" dans la sidebar Gutenberg
	add_theme_support('post-thumbnails');
	add_post_type_support('post', 'excerpt');
	// Applique les styles CSS natifs des blocs WordPress (bordures, espacements…)
	add_theme_support('wp-block-styles');
	// Rend les iframes embarquées (YouTube, etc.) responsives
	add_theme_support('responsive-embeds');

	// Enregistre l'emplacement du menu de navigation principal
	register_nav_menus([
		'primary' => 'Menu principal',
	]);

	// Crée une catégorie de patterns dédiée au thème dans l'éditeur
	register_block_pattern_category('aimer-guerir', [
		'label' => 'Aimer Guérir',
	]);

	// Désactive les patterns fournis par défaut par WordPress core
	remove_theme_support('core-block-patterns');
});

// Empêche le chargement des patterns distants depuis wordpress.org
add_filter('should_load_remote_block_patterns', '__return_false');

// ─────────────────────────────────────────────────────────────────────────────
// Titre de l'onglet du navigateur
// Sur la page d'accueil, supprime la tagline (ex. "– Mon site") pour n'afficher
// que le nom du site dans l'onglet du navigateur.
// ─────────────────────────────────────────────────────────────────────────────
add_filter('document_title_parts', function ($parts) {
	if (is_front_page()) {
		unset($parts['tagline']);
	}
	return $parts;
});

// ─────────────────────────────────────────────────────────────────────────────
// Balise meta description
// Injecte une balise <meta name="description"> dans le <head> de chaque page.
// Sur la page d'accueil : utilise la description du site (Réglages > Général).
// Sur les autres pages : utilise l'extrait de la page courante.
// ─────────────────────────────────────────────────────────────────────────────
add_action('wp_head', function () {
	if (is_front_page()) {
		$description = get_bloginfo('description');
	} else {
		$description = get_the_excerpt();
	}

	// Nettoie les balises HTML et les espaces superflus
	$description = trim(wp_strip_all_tags($description));
	if ('' === $description) {
		return;
	}

	echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
}, 1);

// ─────────────────────────────────────────────────────────────────────────────
// Invalidation du cache des patterns (admin uniquement)
// WordPress met en cache la liste des patterns pour éviter de relire les fichiers
// à chaque requête. Cette fonction détecte si un fichier .php de pattern a été
// modifié (en comparant les dates de modification) et vide le cache si nécessaire,
// forçant WordPress à redécouvrir les patterns au prochain chargement.
// ─────────────────────────────────────────────────────────────────────────────
add_action('init', function () {
	// On n'exécute ce mécanisme que dans l'interface d'administration
	if (!is_admin()) {
		return;
	}

	$theme = wp_get_theme();

	// En mode développement (WP_DEBUG), on vide systématiquement le cache à chaque
	// chargement admin — garantit que tout nouveau pattern est immédiatement visible
	// sans avoir à attendre la rotation du cache.
	if (defined('WP_DEBUG') && WP_DEBUG) {
		$theme->delete_pattern_cache();
		return;
	}

	$pattern_dir = wp_normalize_path($theme->get_stylesheet_directory() . '/patterns');
	if (!is_dir($pattern_dir)) {
		return;
	}

	// Collecte tous les fichiers PHP de patterns (à la racine et dans les sous-dossiers)
	$pattern_files = array_merge(
		glob($pattern_dir . '/*.php') ?: [],
		glob($pattern_dir . '/*/*.php') ?: []
	);

	if (empty($pattern_files)) {
		return;
	}

	// Construit une "signature" basée sur le nom et la date de modification de chaque fichier
	$signature_parts = [];
	foreach ($pattern_files as $file) {
		$mtime = filemtime($file);
		$signature_parts[] = $file . '|' . ($mtime ? $mtime : 0);
	}
	sort($signature_parts);
	$signature = md5(implode(';', $signature_parts));

	// Compare avec la signature stockée en base : si différente, vide le cache
	$option_key = 'aimer_guerir_patterns_signature';
	$stored_signature = (string) get_option($option_key, '');
	if ($signature !== $stored_signature) {
		$theme->delete_pattern_cache();
		// Sauvegarde la nouvelle signature pour la prochaine comparaison
		update_option($option_key, $signature, false);
	}
}, 1);

// ─────────────────────────────────────────────────────────────────────────────
// Restriction des blocs autorisés dans l'éditeur
// Limite la palette de blocs disponibles pour les pages (post_type = 'page').
// Seuls les blocs listés ci-dessous apparaissent dans l'éditeur Gutenberg,
// évitant l'usage de blocs non stylisés ou inadaptés au thème.
// ─────────────────────────────────────────────────────────────────────────────
add_filter('allowed_block_types_all', function ($allowed_blocks, $editor_context) {
	// On ne restreint que pour les pages, pas pour les articles ou autres types
	if (! isset($editor_context->post) || $editor_context->post->post_type !== 'page') {
		return $allowed_blocks;
	}

	return [
		'core/heading',
		'core/paragraph',
		'core/list',
		'core/list-item',
		'core/quote',
		'core/details',
		'core/image',
		'core/gallery',
		'core/columns',
		'core/column',
		'core/group',
		'core/buttons',
		'core/button',
		'core/spacer',
		'core/separator',
		'core/html',
		'core/shortcode',
		'core/embed',
		'core/query',
		'core/post-template',
		'core/post-featured-image',
		'core/post-title',
		'core/post-excerpt',
		'core/read-more',
		'core/query-no-results',
	];
}, 10, 2);

// ─────────────────────────────────────────────────────────────────────────────
// Version de cache CSS (cache-busting)
// Retourne le timestamp de modification le plus récent parmi tous les fichiers CSS
// du thème. Utilisé comme numéro de version lors de l'enregistrement des styles,
// ce qui force les navigateurs à recharger le CSS quand un fichier change.
// ─────────────────────────────────────────────────────────────────────────────
function aimer_guerir_css_version(): string
{
	$theme_dir = wp_normalize_path(get_theme_file_path());

	// Liste tous les fichiers CSS surveillés : global, partials, blocs et patterns
	$files = array_merge(
		[
			$theme_dir . '/assets/css/main.css',
			$theme_dir . '/partials/site-header.css',
			$theme_dir . '/partials/site-footer.css',
		],
		glob($theme_dir . '/blocks/*/style.css') ?: [],
		glob($theme_dir . '/patterns/*/style.css') ?: []
	);

	// Trouve la date de modification la plus récente parmi tous ces fichiers
	$max = 0;
	foreach ($files as $file) {
		$mtime = @filemtime($file); // @ supprime l'erreur si le fichier n'existe pas
		if ($mtime && $mtime > $max) {
			$max = $mtime;
		}
	}

	// Retourne le timestamp, ou la version du thème en dernier recours
	return $max ? (string) $max : wp_get_theme()->get('Version');
}

// ─────────────────────────────────────────────────────────────────────────────
// Chargement des assets (CSS et JS) sur le front-end
// ─────────────────────────────────────────────────────────────────────────────
add_action('wp_enqueue_scripts', function () {
	$theme   = wp_get_theme();
	$version = $theme->get('Version');

	if (defined('WP_DEBUG') && WP_DEBUG) {
		// Développement : chaque fichier CSS est chargé individuellement.
		// Les modifications sont visibles immédiatement sans rebuild.
		$sources = [
			'aimer-guerir-tokens'                        => 'assets/css/tokens.css',
			'aimer-guerir-main'                          => 'assets/css/main.css',
			'aimer-guerir-single'                        => 'assets/css/single.css',
			'aimer-guerir-header'                        => 'partials/site-header.css',
			'aimer-guerir-footer'                        => 'partials/site-footer.css',
			'aimer-guerir-hero'                          => 'blocks/hero/style.css',
			'aimer-guerir-pains'                         => 'blocks/pains/style.css',
			'aimer-guerir-therapeutic-support'           => 'blocks/therapeutic-support/style.css',
			'aimer-guerir-cta'                           => 'blocks/cta/style.css',
			'aimer-guerir-about'                         => 'blocks/about/style.css',
			'aimer-guerir-testimonials'                  => 'blocks/testimonials/style.css',
			'aimer-guerir-choose-practitioner'           => 'blocks/choose-practitioner/style.css',
			'aimer-guerir-services'                      => 'blocks/services/style.css',
			'aimer-guerir-newsletter'                    => 'blocks/newsletter/style.css',
			'aimer-guerir-pattern-about-me'              => 'patterns/about-me/style.css',
			'aimer-guerir-pattern-about-cabinet'         => 'patterns/about-cabinet/style.css',
			'aimer-guerir-pattern-appointment-header'    => 'patterns/appointment-header/style.css',
			'aimer-guerir-pattern-appointment-clinic'    => 'patterns/appointment-session-clinic/style.css',
			'aimer-guerir-pattern-appointment-distance'  => 'patterns/appointment-session-distance/style.css',
			'aimer-guerir-pattern-appointment-home'      => 'patterns/appointment-session-home/style.css',
			'aimer-guerir-pattern-appointment-cta'       => 'patterns/appointment-cta/style.css',
			'aimer-guerir-pattern-newsletter-cta'        => 'patterns/newsletter-cta/style.css',
			'aimer-guerir-pattern-appointment-about'     => 'patterns/appointment-about/style.css',
			'aimer-guerir-pattern-pains-list'            => 'patterns/pains-list/style.css',
			'aimer-guerir-pattern-contenu-editorial'     => 'patterns/contenu-editorial/style.css',
			'aimer-guerir-pattern-blog-posts-grid'       => 'patterns/blog-posts-grid/style.css',
			'aimer-guerir-pattern-temoignages-categories' => 'patterns/temoignages-categories/style.css',
			'aimer-guerir-pattern-social-links'           => 'patterns/social-links/style.css',
		];

		$prev = [];
		foreach ($sources as $handle => $path) {
			if (file_exists(get_theme_file_path($path))) {
				wp_enqueue_style($handle, get_theme_file_uri($path), $prev, filemtime(get_theme_file_path($path)));
				$prev = [$handle];
			}
		}
	} else {
		// Production : bundle compilé par build.sh, un seul fichier chargé.
		wp_enqueue_style(
			'aimer-guerir',
			get_theme_file_uri('/assets/css/bundle.css'),
			[],
			aimer_guerir_css_version()
		);
	}

	// Charge le JS du header (menu burger, navigation responsive…)
	// true = placé avant </body> plutôt que dans <head>
	wp_enqueue_script(
		'aimer-guerir-header',
		get_theme_file_uri('/assets/js/site-header.js'),
		[],
		$version,
		true
	);
});

// ─────────────────────────────────────────────────────────────────────────────
// Chargement des fichiers de configuration du Customizer
// Chaque bloc de la page d'accueil et le partial (header/footer) possèdent
// leur propre fichier customizer.php qui enregistre les options éditables
// dans Apparence > Personnaliser.
// ─────────────────────────────────────────────────────────────────────────────
require_once get_theme_file_path('/blocks/hero/customizer.php');
require_once get_theme_file_path('/blocks/pains/customizer.php');
require_once get_theme_file_path('/blocks/therapeutic-support/customizer.php');
require_once get_theme_file_path('/blocks/cta/customizer.php');
require_once get_theme_file_path('/blocks/about/customizer.php');
require_once get_theme_file_path('/blocks/testimonials/customizer.php');
require_once get_theme_file_path('/blocks/choose-practitioner/customizer.php');
require_once get_theme_file_path('/blocks/services/customizer.php');
require_once get_theme_file_path('/partials/customizer.php');
require_once get_theme_file_path('/blocks/social-links/customizer.php');

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Enregistrement
// ─────────────────────────────────────────────────────────────────────────────
add_action('init', function () {
	register_post_type('temoignage', [
		'labels' => [
			'name'               => 'Témoignages',
			'singular_name'      => 'Témoignage',
			'add_new'            => 'Ajouter',
			'add_new_item'       => 'Ajouter un témoignage',
			'edit_item'          => 'Modifier le témoignage',
			'new_item'           => 'Nouveau témoignage',
			'view_item'          => 'Voir le témoignage',
			'search_items'       => 'Rechercher des témoignages',
			'not_found'          => 'Aucun témoignage trouvé',
			'not_found_in_trash' => 'Aucun témoignage dans la corbeille',
			'all_items'          => 'Tous les témoignages',
			'menu_name'          => 'Témoignages',
		],
		'public'       => true,
		'has_archive'  => 'temoignages',
		'rewrite'      => ['slug' => 'temoignage'],
		'supports'     => ['title', 'thumbnail'],
		'show_in_rest' => false,
		'menu_icon'    => 'dashicons-format-quote',
		'menu_position' => 25,
	]);

	register_taxonomy('categorie_temoignage', 'temoignage', [
		'labels' => [
			'name'              => 'Catégories',
			'singular_name'     => 'Catégorie',
			'search_items'      => 'Rechercher une catégorie',
			'all_items'         => 'Toutes les catégories',
			'edit_item'         => 'Modifier la catégorie',
			'update_item'       => 'Mettre à jour la catégorie',
			'add_new_item'      => 'Ajouter une catégorie',
			'new_item_name'     => 'Nouvelle catégorie',
			'menu_name'         => 'Catégories',
		],
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'rewrite'           => ['slug' => 'temoignages/categorie'],
		'show_in_rest'      => false,
	]);
});

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Metabox texte
// ─────────────────────────────────────────────────────────────────────────────
function temoignage_add_metabox(): void
{
	add_meta_box(
		'temoignage_texte',
		'Texte du témoignage',
		'temoignage_render_metabox',
		'temoignage',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'temoignage_add_metabox');

function temoignage_render_metabox(WP_Post $post): void
{
	wp_nonce_field('temoignage_save_texte', 'temoignage_nonce');
	$value = get_post_meta($post->ID, '_temoignage_texte', true);
	echo '<textarea name="temoignage_texte" rows="6" style="width:100%;">'
		. esc_textarea($value)
		. '</textarea>';
}

function temoignage_save_metabox(int $post_id): void
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (
		! isset($_POST['temoignage_nonce']) ||
		! wp_verify_nonce($_POST['temoignage_nonce'], 'temoignage_save_texte')
	) {
		return;
	}
	if (! current_user_can('edit_post', $post_id)) {
		return;
	}
	if (isset($_POST['temoignage_texte'])) {
		update_post_meta(
			$post_id,
			'_temoignage_texte',
			sanitize_textarea_field($_POST['temoignage_texte'])
		);
	}
}
add_action('save_post_temoignage', 'temoignage_save_metabox');

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Nettoyage de l'écran d'édition
// ─────────────────────────────────────────────────────────────────────────────
function temoignage_remove_meta_boxes(): void
{
	foreach (['postexcerpt', 'commentsdiv', 'revisionsdiv', 'authordiv', 'pageparentdiv'] as $id) {
		remove_meta_box($id, 'temoignage', 'normal');
		remove_meta_box($id, 'temoignage', 'side');
		remove_meta_box($id, 'temoignage', 'advanced');
	}
}
add_action('add_meta_boxes', 'temoignage_remove_meta_boxes');

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Colonne image dans la liste admin
// ─────────────────────────────────────────────────────────────────────────────
add_action('admin_head', function () {
	$screen = get_current_screen();
	if (!$screen) {
		return;
	}
	if ($screen->post_type === 'temoignage') {
		echo '<style>.column-temoignage_photo { width: 80px; }</style>';
	}
	if ($screen->taxonomy === 'categorie_temoignage') {
		echo '<style>.column-cat_temoignage_image { width: 80px; }</style>';
	}
});

add_filter('manage_temoignage_posts_columns', function (array $columns): array {
	$new = [];
	foreach ($columns as $key => $label) {
		if ($key === 'title') {
			$new['temoignage_photo'] = 'Photo';
		}
		$new[$key] = $label;
	}
	return $new;
});

add_action('manage_temoignage_posts_custom_column', function (string $column, int $post_id): void {
	if ($column !== 'temoignage_photo') {
		return;
	}
	if (has_post_thumbnail($post_id)) {
		echo '<img src="' . esc_url(get_the_post_thumbnail_url($post_id, 'thumbnail')) . '" style="width:60px;height:60px;object-fit:cover;border-radius:4px;">';
	} else {
		echo '<span style="color:#aaa;font-size:11px;">—</span>';
	}
}, 10, 2);

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Colonne image dans la liste des catégories admin
// ─────────────────────────────────────────────────────────────────────────────
add_filter('manage_categorie_temoignage_columns', function (array $columns): array {
	$new = [];
	foreach ($columns as $key => $label) {
		if ($key === 'name') {
			$new['cat_temoignage_image'] = 'Image';
		}
		$new[$key] = $label;
	}
	return $new;
});

add_filter('manage_categorie_temoignage_custom_column', function (string $content, string $column, int $term_id): string {
	if ($column !== 'cat_temoignage_image') {
		return $content;
	}
	$image_id = (int) get_term_meta($term_id, '_temoignage_cat_image_id', true);
	if ($image_id) {
		return '<img src="' . esc_url(wp_get_attachment_image_url($image_id, 'thumbnail')) . '" style="width:60px;height:60px;object-fit:cover;border-radius:4px;">';
	}
	return '<span style="color:#aaa;font-size:11px;">—</span>';
}, 10, 3);

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Image des catégories
// ─────────────────────────────────────────────────────────────────────────────

// Charge la médiathèque WordPress sur les pages de la taxonomie
add_action('admin_enqueue_scripts', function (string $hook) {
	if (!in_array($hook, ['edit-tags.php', 'term.php'], true)) {
		return;
	}
	if (!isset($_GET['taxonomy']) || $_GET['taxonomy'] !== 'categorie_temoignage') {
		return;
	}
	wp_enqueue_media();
	wp_add_inline_script('media-editor', '
		(function() {
			var frame;
			document.addEventListener("click", function(e) {
				var btn = e.target.closest(".temoignage-cat-image-btn");
				if (!btn) return;
				e.preventDefault();
				var wrap = btn.closest(".temoignage-cat-image-wrap");
				if (frame) { frame.open(); return; }
				frame = wp.media({ title: "Choisir une image", button: { text: "Sélectionner" }, multiple: false });
				frame.on("select", function() {
					var att = frame.state().get("selection").first().toJSON();
					wrap.querySelector(".temoignage-cat-image-id").value = att.id;
					wrap.querySelector(".temoignage-cat-image-preview").innerHTML = "<img src=\"" + att.url + "\" style=\"max-width:80px;max-height:80px;object-fit:cover;border-radius:4px;margin-top:8px;\">";
					wrap.querySelector(".temoignage-cat-image-remove").style.display = "inline";
				});
				frame.open();
			});
			document.addEventListener("click", function(e) {
				var btn = e.target.closest(".temoignage-cat-image-remove");
				if (!btn) return;
				e.preventDefault();
				var wrap = btn.closest(".temoignage-cat-image-wrap");
				wrap.querySelector(".temoignage-cat-image-id").value = "";
				wrap.querySelector(".temoignage-cat-image-preview").innerHTML = "";
				btn.style.display = "none";
			});
		})();
	');
});

// Affichage du champ sur le formulaire "Ajouter une catégorie"
add_action('categorie_temoignage_add_form_fields', function () {
	echo '<div class="form-field temoignage-cat-image-wrap">
		<label>Image de la catégorie</label>
		<input type="hidden" name="temoignage_cat_image_id" class="temoignage-cat-image-id" value="">
		<div class="temoignage-cat-image-preview"></div>
		<button type="button" class="button temoignage-cat-image-btn">Choisir une image</button>
		<button type="button" class="button temoignage-cat-image-remove" style="display:none;margin-left:4px;">Supprimer</button>
	</div>';
});

// Affichage du champ sur le formulaire "Modifier la catégorie"
add_action('categorie_temoignage_edit_form_fields', function (WP_Term $term) {
	$image_id = (int) get_term_meta($term->term_id, '_temoignage_cat_image_id', true);
	$preview  = $image_id ? '<img src="' . esc_url(wp_get_attachment_image_url($image_id, 'thumbnail')) . '" style="max-width:80px;max-height:80px;object-fit:cover;border-radius:4px;margin-top:8px;">' : '';
	echo '<tr class="form-field temoignage-cat-image-wrap">
		<th><label>Image de la catégorie</label></th>
		<td>
			<input type="hidden" name="temoignage_cat_image_id" class="temoignage-cat-image-id" value="' . esc_attr($image_id ?: '') . '">
			<div class="temoignage-cat-image-preview">' . $preview . '</div>
			<button type="button" class="button temoignage-cat-image-btn" style="margin-top:8px;">Choisir une image</button>
			<button type="button" class="button temoignage-cat-image-remove" style="margin-left:4px;margin-top:8px;' . ($image_id ? '' : 'display:none;') . '">Supprimer</button>
		</td>
	</tr>';
});

// Sauvegarde à la création
add_action('create_categorie_temoignage', function (int $term_id) {
	if (isset($_POST['temoignage_cat_image_id'])) {
		update_term_meta($term_id, '_temoignage_cat_image_id', (int) $_POST['temoignage_cat_image_id']);
	}
});

// Sauvegarde à la modification
add_action('edited_categorie_temoignage', function (int $term_id) {
	if (isset($_POST['temoignage_cat_image_id'])) {
		update_term_meta($term_id, '_temoignage_cat_image_id', (int) $_POST['temoignage_cat_image_id']);
	}
});

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Shortcode [temoignages]
// ─────────────────────────────────────────────────────────────────────────────
$temoignage_css_needed = false;

function temoignage_shortcode(array $atts): string
{
	global $temoignage_css_needed;
	$temoignage_css_needed = true;

	$atts = shortcode_atts([
		'nombre' => 6,
		'ordre'  => 'DESC',
	], $atts, 'temoignages');

	$nombre = (int) $atts['nombre'];
	$ordre  = in_array(strtoupper($atts['ordre']), ['ASC', 'DESC'], true) ? strtoupper($atts['ordre']) : 'DESC';

	$args = [
		'post_type'      => 'temoignage',
		'order'          => $ordre,
		'orderby'        => 'date',
		'posts_per_page' => $nombre === -1 ? -1 : $nombre,
	];
	if ($nombre === -1) {
		$args['nopaging'] = true;
	}

	$query = new WP_Query($args);

	if (! $query->have_posts()) {
		return '';
	}

	ob_start();
	echo '<div class="temoignages-grille">';
	while ($query->have_posts()) {
		$query->the_post();
		$texte = get_post_meta(get_the_ID(), '_temoignage_texte', true);
		echo '<div class="temoignage-item">';
		echo '<div class="temoignage-image">';
		if (has_post_thumbnail()) {
			echo get_the_post_thumbnail(null, 'thumbnail');
		} else {
			echo '<div class="temoignage-image__placeholder"></div>';
		}
		echo '</div>';
		echo '<div class="temoignage-contenu">';
		echo '<p class="temoignage-texte">' . esc_html($texte) . '</p>';
		echo '<p class="temoignage-nom">— ' . esc_html(get_the_title()) . '</p>';
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
	wp_reset_postdata();

	return ob_get_clean();
}
add_shortcode('temoignages', 'temoignage_shortcode');

// ─────────────────────────────────────────────────────────────────────────────
// CPT Témoignage — Shortcode [temoignages_categories]
// ─────────────────────────────────────────────────────────────────────────────
function temoignages_categories_shortcode(): string
{
	$terms = get_terms(['taxonomy' => 'categorie_temoignage', 'hide_empty' => false]);

	if (empty($terms) || is_wp_error($terms)) {
		return '';
	}

	$placeholder = get_theme_file_uri('assets/images/pattern-placeholder-400.svg');

	ob_start();
	echo '<div class="pattern_temoignages_categories__grid">';
	foreach ($terms as $term) {
		$image_id  = (int) get_term_meta($term->term_id, '_temoignage_cat_image_id', true);
		$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : $placeholder;
		$term_url  = get_term_link($term);
		echo '<a href="' . esc_url($term_url) . '" class="pattern_temoignages_categories__card">';
		echo '<div class="pattern_temoignages_categories__card_image">';
		echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($term->name) . '">';
		echo '</div>';
		echo '<p class="pattern_temoignages_categories__card_name">' . esc_html($term->name) . '</p>';
		echo '</a>';
	}
	echo '</div>';
	return ob_get_clean();
}
add_shortcode('temoignages_categories', 'temoignages_categories_shortcode');

// ─────────────────────────────────────────────────────────────────────────────
// Shortcode [social_links]
// ─────────────────────────────────────────────────────────────────────────────
function social_links_shortcode(): string
{
	$networks = [
		'instagram' => [
			'url'   => get_theme_mod('aimer_guerir_social_instagram', ''),
			'label' => 'Instagram',
			'icon'  => get_theme_file_path('assets/icons/icon-instagram.php'),
		],
		'facebook' => [
			'url'   => get_theme_mod('aimer_guerir_social_facebook', ''),
			'label' => 'Facebook',
			'icon'  => get_theme_file_path('assets/icons/icon-facebook.php'),
		],
		'linkedin' => [
			'url'   => get_theme_mod('aimer_guerir_social_linkedin', ''),
			'label' => 'LinkedIn',
			'icon'  => get_theme_file_path('assets/icons/icon-linkedin.php'),
		],
	];

	$links = array_filter($networks, fn($n) => ! empty($n['url']));
	if (empty($links)) {
		return '';
	}

	ob_start();
	echo '<div class="pattern_social_links__list">';
	foreach ($links as $network) {
		echo '<a href="' . esc_url($network['url']) . '" class="pattern_social_links__link" target="_blank" rel="noopener noreferrer">';
		include $network['icon'];
		echo '<span>' . esc_html($network['label']) . '</span>';
		echo '</a>';
	}
	echo '</div>';
	return ob_get_clean();
}
add_shortcode('social_links', 'social_links_shortcode');

// Injection du CSS dans wp_footer (shortcodes s'exécutent après wp_head)
add_action('wp_footer', function () {
	global $temoignage_css_needed;
	if (! $temoignage_css_needed && ! is_post_type_archive('temoignage') && ! is_tax('categorie_temoignage')) {
		return;
	}
	echo '<style>
.temoignages-grille {
	display: flex;
	flex-wrap: wrap;
	gap: 2rem;
	justify-content: center;
	padding: 2rem 0;
}
.temoignage-item {
	display: flex;
	flex-direction: column;
	align-items: center;
	gap: 1rem;
	flex: 1 1 280px;
	max-width: 360px;
	text-align: center;
}
.temoignage-image img {
	width: 80px;
	height: 80px;
	border-radius: 50%;
	object-fit: cover;
}
.temoignage-image__placeholder {
	width: 80px;
	height: 80px;
	border-radius: 50%;
	background-color: var(--beige, #e8e0d5);
	margin: 0 auto;
}
.temoignage-texte {
	font-style: italic;
	margin: 0;
}
.temoignage-nom {
	font-weight: 600;
	margin: 0;
}
.temoignages-tax-list {
	display: flex;
	flex-direction: column;
	gap: 16px;
}
.temoignages-tax-card {
	display: flex;
	flex-direction: column;
	background-color: var(--white);
	border: 1px solid var(--primary-15);
	border-radius: 3px;
	overflow: hidden;
	box-shadow: var(--card-shadow);
}
.temoignages-tax-card__image {
	width: 100%;
	max-height: 200px;
}
.temoignages-tax-card__image img {
	display: block;
	width: 100%;
	height: 100%;
	max-height: 200px;
	object-fit: cover;
}
.temoignages-tax-card__image--placeholder {
	background-color: var(--beige, #e8e0d5);
}
.temoignages-tax-card__body {
	display: flex;
	flex-direction: column;
	justify-content: center;
	gap: 8px;
	padding: 20px 24px;
}
.temoignages-tax-card__texte {
	font-style: italic;
	margin: 0;
	line-height: 1.6;
}
.temoignages-tax-card__nom {
	font-weight: 600;
	margin: 0;
}
@media screen and (min-width: 768px) {
	.temoignages-tax-card {
		flex-direction: row;
		align-items: stretch;
	}
	.temoignages-tax-card__image {
		flex: 0 0 180px;
		width: 180px;
		max-height: none;
	}
	.temoignages-tax-card__image img {
		max-height: none;
	}
}
.temoignages-tax-archive {
	width: 100%;
	max-width: 1280px;
	margin: 0 auto;
	padding: 48px 24px;
}
.temoignages-tax-archive__header {
	display: flex;
	flex-direction: column;
	gap: 24px;
	margin: 48px;
}
.temoignages-tax-archive__header-image img {
	width: 100%;
	max-height: 220px;
	object-fit: cover;
	border-radius: 3px;
}
.temoignages-tax-archive__title {
	font-size: 2rem;
	margin: 0 0 8px;
}
.temoignages-tax-archive__description {
	margin: 0 0 12px;
	opacity: 0.75;
}
.temoignages-tax-archive__back-wrapper {
	position: sticky;
	top: 193px;
	z-index: 10000;
	width: 100%;
	margin: 0 auto;
	padding: 16px 24px 12px;
	background-color: #faf9f6;
}
@media screen and (max-width: 767px) {
	.temoignages-tax-archive__back-wrapper {
		top: 126px;
	}
}
.temoignages-tax-archive__back {
	display: inline-block;
	padding: 4px 20px;
	border-radius: 3px;
	font-size: 0.875rem;
	font-weight: 600;
	background: var(--white);
	color: var(--black);
	border: 2px solid var(--primary);
	text-decoration: none;
	transition: color 0.1s ease, transform 0.15s ease, box-shadow 0.15s ease;
}
.temoignages-tax-archive__back:hover {
	color: var(--primary);
}
.temoignages-tax-archive__empty {
	text-align: center;
	opacity: 0.6;
}
@media screen and (min-width: 768px) {
	.temoignages-tax-archive {
		padding: 48px 24px 72px 24px;
	}
	.temoignages-tax-archive__header {
		flex-direction: row;
		align-items: center;
	}
	.temoignages-tax-archive__header-image {
		flex: 0 0 280px;
	}
	.temoignages-tax-archive__header-image img {
		max-height: 180px;
	}
}
</style>' . "\n";
});
