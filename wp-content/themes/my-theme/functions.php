<?php

add_action('after_setup_theme', function () {
	add_theme_support('editor-styles');
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

	register_block_pattern_category('my-theme', [
		'label' => 'My Theme',
	]);

	remove_theme_support('core-block-patterns');
});

add_filter('should_load_remote_block_patterns', '__return_false');

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

	$option_key = 'my_theme_patterns_signature';
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

add_action('wp_enqueue_scripts', function () {
	$theme   = wp_get_theme();
	$version = $theme->get('Version');
	$theme_dir = wp_normalize_path(get_theme_file_path());

	wp_enqueue_style(
		'my-theme-main',
		get_theme_file_uri('/assets/css/main.css'),
		[],
		$version
	);

	wp_enqueue_style(
		'my-theme-header',
		get_theme_file_uri('/partials/site-header.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-footer',
		get_theme_file_uri('/partials/site-footer.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-hero',
		get_theme_file_uri('/blocks/hero/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-pains',
		get_theme_file_uri('/blocks/pains/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-therapeutic-support',
		get_theme_file_uri('/blocks/therapeutic-support/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-choose-cta',
		get_theme_file_uri('/blocks/cta/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-newsletter',
		get_theme_file_uri('/blocks/newsletter/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-testimonials',
		get_theme_file_uri('/blocks/testimonials/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-about',
		get_theme_file_uri('/blocks/about/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-choose-testimonials',
		get_theme_file_uri('/blocks/testimonials/style.css'),
		['my-theme-main'],
		$version
	);

	$pattern_css = glob($theme_dir . '/patterns/*/style.css');
	if (is_array($pattern_css)) {
		sort($pattern_css);
		foreach ($pattern_css as $path) {
			$path = wp_normalize_path($path);
			$relative = ltrim(str_replace($theme_dir . '/', '', $path), '/');
			$handle = 'my-theme-pattern-' . sanitize_title(basename(dirname($path)));
			wp_enqueue_style(
				$handle,
				get_theme_file_uri($relative),
				['my-theme-main'],
				$version
			);
		}
	}

	wp_enqueue_style(
		'my-theme-choose-practitioner',
		get_theme_file_uri('/blocks/choose-practitioner/style.css'),
		['my-theme-main'],
		$version
	);

	wp_enqueue_style(
		'my-theme-services',
		get_theme_file_uri('/blocks/services/style.css'),
		['my-theme-main'],
		$version
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
