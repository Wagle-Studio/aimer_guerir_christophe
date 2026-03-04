<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    if (!$wp_customize->get_panel('my_theme_home')) {
        $wp_customize->add_panel('my_theme_home', [
            'title'       => 'Accueil',
            'description' => 'Configuration des sections de la page d\'accueil',
            'priority'    => 30,
        ]);
    }

    $wp_customize->add_section('my_theme_home_about', [
        'title'    => 'À propos',
        'panel'    => 'my_theme_home',
        'priority' => 60,
    ]);

    $wp_customize->add_setting('my_theme_about_image_id', ['default' => 0,]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'my_theme_about_image_id',
        [
            'label'     => 'Photo de profil',
            'section'   => 'my_theme_home_about',
            'mime_type' => 'image',
        ]
    ));

    $wp_customize->add_setting('my_theme_about_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_about_title', [
        'label'   => 'Titre',
        'section' => 'my_theme_home_about',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_about_subtitle', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_about_subtitle', [
        'label'   => 'Sous-titre',
        'section' => 'my_theme_home_about',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_about_presentation', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            $value = trim($value);
            return $value;
        },
    ]);
    $wp_customize->add_control('my_theme_about_presentation', [
        'label'       => 'Présentation',
        'description' => 'Texte (sauts de ligne autorisés).',
        'section'     => 'my_theme_home_about',
        'type'        => 'textarea',
    ]);

    $wp_customize->add_setting('my_theme_about_primary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_about_primary_label', [
        'label'   => 'Bouton principal - libellé',
        'section' => 'my_theme_home_about',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_about_primary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('my_theme_about_primary_url', [
        'label'   => 'Bouton principal - URL',
        'section' => 'my_theme_home_about',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('my_theme_about_sub_part_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_about_sub_part_title', [
        'label'   => 'Sous-partie - Titre',
        'section' => 'my_theme_home_about',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_about_sub_part_description', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            $value = trim($value);
            return $value;
        },
    ]);

    $wp_customize->add_control('my_theme_about_sub_part_description', [
        'label'       => 'Sous-partie - Description',
        'description' => 'Texte (sauts de ligne autorisés).',
        'section'     => 'my_theme_home_about',
        'type'        => 'textarea',
    ]);

    $wp_customize->add_setting('my_theme_about_secondary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_about_secondary_label', [
        'label'   => 'Bouton secondaire - libellé',
        'section' => 'my_theme_home_about',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_about_secondary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('my_theme_about_secondary_url', [
        'label'   => 'Bouton secondaire - URL',
        'section' => 'my_theme_home_about',
        'type'    => 'url',
    ]);
});
