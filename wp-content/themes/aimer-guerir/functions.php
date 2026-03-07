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
		$cache_hash = md5($theme->get_theme_root() . '/' . $theme->get_stylesheet());
		delete_site_transient('wp_theme_files_patterns-' . $cache_hash);
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
function aimer_guerir_css_version(): string {
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
			'aimer-guerir-pattern-blog-home'             => 'patterns/blog-home/style.css',
			'aimer-guerir-pattern-appointment-cta'       => 'patterns/appointment-cta/style.css',
			'aimer-guerir-pattern-newsletter-cta'        => 'patterns/newsletter-cta/style.css',
			'aimer-guerir-pattern-appointment-about'     => 'patterns/appointment-about/style.css',
			'aimer-guerir-pattern-pains-list'            => 'patterns/pains-list/style.css',
			'aimer-guerir-pattern-blog-posts-grid'       => 'patterns/blog-posts-grid/style.css',
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
