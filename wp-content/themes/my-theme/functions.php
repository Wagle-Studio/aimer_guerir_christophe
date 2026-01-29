<?php

function my_theme_setup() {}

add_action('after_setup_theme', 'my_theme_setup');

add_action('customize_register', function ($wp_customize) {
	$wp_customize->add_panel('my_theme_home', [
		'title'       => 'Accueil',
		'description' => 'Configuration des sections de la page d’accueil',
		'priority'    => 30,
	]);

	$wp_customize->add_section('my_theme_home_hero', [
		'title'    => 'Hero',
		'panel'    => 'my_theme_home',
		'priority' => 10,
	]);

	// Title
	$wp_customize->add_setting('my_theme_hero_title', ['default' => '']);
	$wp_customize->add_control('my_theme_hero_title', [
		'label'   => 'Titre',
		'section' => 'my_theme_home_hero',
		'type'    => 'text',
	]);

	// Text
	$wp_customize->add_setting('my_theme_hero_text', ['default' => '']);
	$wp_customize->add_control('my_theme_hero_text', [
		'label'   => 'Texte court',
		'section' => 'my_theme_home_hero',
		'type'    => 'textarea',
	]);

	// Image (attachment ID)
	$wp_customize->add_setting('my_theme_hero_image_id', ['default' => 0]);
	$wp_customize->add_control(new WP_Customize_Media_Control(
		$wp_customize,
		'my_theme_hero_image_id',
		[
			'label'     => 'Image',
			'section'   => 'my_theme_home_hero',
			'mime_type' => 'image',
		]
	));

	// Primary button
	$wp_customize->add_setting('my_theme_hero_primary_label', ['default' => '']);
	$wp_customize->add_control('my_theme_hero_primary_label', [
		'label'   => 'Bouton principal - libellé',
		'section' => 'my_theme_home_hero',
		'type'    => 'text',
	]);

	$wp_customize->add_setting('my_theme_hero_primary_url', ['default' => '']);
	$wp_customize->add_control('my_theme_hero_primary_url', [
		'label'   => 'Bouton principal - URL',
		'section' => 'my_theme_home_hero',
		'type'    => 'url',
	]);

	// Secondary button (optional)
	$wp_customize->add_setting('my_theme_hero_secondary_label', ['default' => '']);
	$wp_customize->add_control('my_theme_hero_secondary_label', [
		'label'   => 'Bouton secondaire - libellé (optionnel)',
		'section' => 'my_theme_home_hero',
		'type'    => 'text',
	]);

	$wp_customize->add_setting('my_theme_hero_secondary_url', ['default' => '']);
	$wp_customize->add_control('my_theme_hero_secondary_url', [
		'label'   => 'Bouton secondaire - URL (optionnel)',
		'section' => 'my_theme_home_hero',
		'type'    => 'url',
	]);
});

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
		'my-theme-hero',
		get_theme_file_uri('/blocks/hero/style.css'),
		['my-theme-main'],
		$version
	);
});
