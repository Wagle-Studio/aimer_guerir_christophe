<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    if (!$wp_customize->get_panel('aimer_guerir_home')) {
        $wp_customize->add_panel('aimer_guerir_home', [
            'title'       => 'Accueil',
            'description' => 'Configuration des sections de la page d’accueil',
            'priority'    => 30,
        ]);
    }

    $wp_customize->add_section('aimer_guerir_home_hero', [
        'title'    => 'Bannière',
        'panel'    => 'aimer_guerir_home',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_hero_title', [
        'label'   => 'Titre',
        'section' => 'aimer_guerir_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_sub_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_hero_sub_title', [
        'label'   => 'Sous-titre',
        'section' => 'aimer_guerir_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_introduction', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('aimer_guerir_hero_introduction', [
        'label'       => 'Introduction',
        'description' => 'Texte (sauts de ligne autorisés).',
        'section'     => 'aimer_guerir_home_hero',
        'type'        => 'textarea',
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_image_id', ['default' => 0]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'aimer_guerir_hero_image_id',
        [
            'label'     => 'Image',
            'section'   => 'aimer_guerir_home_hero',
            'mime_type' => 'image',
        ]
    ));

    $wp_customize->add_setting('aimer_guerir_hero_primary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_hero_primary_label', [
        'label'   => 'Bouton principal - libellé',
        'section' => 'aimer_guerir_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_primary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('aimer_guerir_hero_primary_url', [
        'label'   => 'Bouton principal - URL',
        'section' => 'aimer_guerir_home_hero',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_secondary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_hero_secondary_label', [
        'label'   => 'Bouton secondaire - libellé (optionnel)',
        'section' => 'aimer_guerir_home_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_hero_secondary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('aimer_guerir_hero_secondary_url', [
        'label'   => 'Bouton secondaire - URL (optionnel)',
        'section' => 'aimer_guerir_home_hero',
        'type'    => 'url',
    ]);
});
