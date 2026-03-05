<?php

add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('editor-styles');
	add_theme_support('custom-logo', [
		'flex-height' => true,
		'flex-width' => true,
	]);
	$editor_styles = ['assets/css/editor.css'];
	$theme_dir     = wp_normalize_path(get_theme_file_path());
	$pattern_css   = glob($theme_dir . '/patterns/*/editor.css');
	if (is_array($pattern_css)) {
		sort($pattern_css);
		foreach ($pattern_css as $path) {
			$path = wp_normalize_path($path);
			$relative = ltrim(str_replace($theme_dir . '/', '', $path), '/');
			$editor_styles[] = $relative;
		}
	}
	add_editor_style($editor_styles);
	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');
	add_theme_support('responsive-embeds');

	register_nav_menus([
		'primary' => 'Menu principal',
	]);

	register_block_pattern_category('aimer-guerir', [
		'label' => 'Aimer Guérir',
	]);

	remove_theme_support('core-block-patterns');
});

add_filter('should_load_remote_block_patterns', '__return_false');

add_filter('document_title_parts', function ($parts) {
	if (is_front_page()) {
		unset($parts['tagline']);
	}
	return $parts;
});

add_action('wp_head', function () {
	if (is_front_page()) {
		$description = get_bloginfo('description');
	} else {
		$description = get_the_excerpt();
	}

	$description = trim(wp_strip_all_tags($description));
	if ('' === $description) {
		return;
	}

	echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
}, 1);

add_action('init', function () {
	if (!is_admin()) {
		return;
	}

	$theme = wp_get_theme();
	$pattern_dir = wp_normalize_path($theme->get_stylesheet_directory() . '/patterns');
	if (!is_dir($pattern_dir)) {
		return;
	}

	$pattern_files = array_merge(
		glob($pattern_dir . '/*.php') ?: [],
		glob($pattern_dir . '/*/*.php') ?: []
	);

	if (empty($pattern_files)) {
		return;
	}

	$signature_parts = [];
	foreach ($pattern_files as $file) {
		$mtime = filemtime($file);
		$signature_parts[] = $file . '|' . ($mtime ? $mtime : 0);
	}
	sort($signature_parts);
	$signature = md5(implode(';', $signature_parts));

	$option_key = 'aimer_guerir_patterns_signature';
	$stored_signature = (string) get_option($option_key, '');
	if ($signature !== $stored_signature) {
		$cache_hash = md5($theme->get_theme_root() . '/' . $theme->get_stylesheet());
		delete_site_transient('wp_theme_files_patterns-' . $cache_hash);
		update_option($option_key, $signature, false);
	}
}, 1);

add_filter('allowed_block_types_all', function ($allowed_blocks, $editor_context) {
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
	];
}, 10, 2);

function aimer_guerir_css_version(): string {
	$theme_dir = wp_normalize_path(get_theme_file_path());

	$files = array_merge(
		[
			$theme_dir . '/assets/css/main.css',
			$theme_dir . '/partials/site-header.css',
			$theme_dir . '/partials/site-footer.css',
		],
		glob($theme_dir . '/blocks/*/style.css') ?: [],
		glob($theme_dir . '/patterns/*/style.css') ?: []
	);

	$max = 0;
	foreach ($files as $file) {
		$mtime = @filemtime($file);
		if ($mtime && $mtime > $max) {
			$max = $mtime;
		}
	}

	return $max ? (string) $max : wp_get_theme()->get('Version');
}

add_action('wp_enqueue_scripts', function () {
	$theme   = wp_get_theme();
	$version = $theme->get('Version');

	wp_enqueue_style(
		'aimer-guerir',
		get_theme_file_uri('/assets/css/bundle.css'),
		[],
		aimer_guerir_css_version()
	);

	wp_enqueue_script(
		'aimer-guerir-header',
		get_theme_file_uri('/assets/js/site-header.js'),
		[],
		$version,
		true
	);
});

require_once get_theme_file_path('/blocks/hero/customizer.php');
require_once get_theme_file_path('/blocks/pains/customizer.php');
require_once get_theme_file_path('/blocks/therapeutic-support/customizer.php');
require_once get_theme_file_path('/blocks/cta/customizer.php');
require_once get_theme_file_path('/blocks/about/customizer.php');
require_once get_theme_file_path('/blocks/testimonials/customizer.php');
require_once get_theme_file_path('/blocks/choose-practitioner/customizer.php');
require_once get_theme_file_path('/blocks/services/customizer.php');
require_once get_theme_file_path('/partials/customizer.php');
