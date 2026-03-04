<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    if (!$wp_customize->get_panel('my_theme_home')) {
        $wp_customize->add_panel('my_theme_home', [
            'title'       => 'Accueil',
            'description' => 'Configuration des sections de la page d’accueil',
            'priority'    => 30,
        ]);
    }

    $wp_customize->add_section('my_theme_home_hero', [
        'title'    => 'Bannière',
        'panel'    => 'my_theme_home',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('my_theme_hero_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_hero_title', [
        'label'   => 'Titre',
        'section' => 'my_theme_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_hero_sub_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_hero_sub_title', [
        'label'   => 'Sous-titre',
        'section' => 'my_theme_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_hero_introduction', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_hero_introduction', [
        'label'       => 'Introduction',
        'description' => 'Texte (sauts de ligne autorisés).',
        'section'     => 'my_theme_home_hero',
        'type'        => 'textarea',
    ]);

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

    $wp_customize->add_setting('my_theme_hero_primary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_hero_primary_label', [
        'label'   => 'Bouton principal - libellé',
        'section' => 'my_theme_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_hero_primary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('my_theme_hero_primary_url', [
        'label'   => 'Bouton principal - URL',
        'section' => 'my_theme_home_hero',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('my_theme_hero_secondary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_hero_secondary_label', [
        'label'   => 'Bouton secondaire - libellé (optionnel)',
        'section' => 'my_theme_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_hero_secondary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('my_theme_hero_secondary_url', [
        'label'   => 'Bouton secondaire - URL (optionnel)',
        'section' => 'my_theme_home_hero',
        'type'    => 'url',
    ]);
});
