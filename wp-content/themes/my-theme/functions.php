<?php

add_action('wp_enqueue_scripts', function () {
	$theme   = wp_get_theme();
	$version = $theme->get('Version');

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
