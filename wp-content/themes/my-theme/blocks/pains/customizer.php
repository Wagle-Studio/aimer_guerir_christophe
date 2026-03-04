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

    $wp_customize->add_section('my_theme_home_pains', [
        'title'    => 'Douleurs',
        'panel'    => 'my_theme_home',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('my_theme_pains_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_pains_title', [
        'label'   => 'Titre de section',
        'section' => 'my_theme_home_pains',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_pains_items', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $lines = preg_split("/\r\n|\n|\r/", (string) $value);
            $lines = array_map('trim', $lines);
            $lines = array_filter($lines, fn($l) => $l !== '');
            $lines = array_map(fn($l) => wp_strip_all_tags($l), $lines);
            return implode("\n", $lines);
        },
    ]);

    $wp_customize->add_control('my_theme_pains_items', [
        'label'       => 'Liste de douleurs',
        'description' => '1 ligne = 1 douleur',
        'section'     => 'my_theme_home_pains',
        'type'        => 'textarea',
    ]);

    $wp_customize->add_setting('my_theme_pains_image_id', ['default' => 0,]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'my_theme_pains_image_id',
        [
            'label'     => 'Illustration',
            'section'   => 'my_theme_home_pains',
            'mime_type' => 'image',
        ]
    ));

    $wp_customize->add_setting('my_theme_pains_tag_line', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_pains_tag_line', [
        'label'       => 'Accroche',
        'description' => 'Phrase d\'accroche affichée au-dessus des boutons.',
        'section'     => 'my_theme_home_pains',
        'type'        => 'text',
    ]);

    $wp_customize->add_setting('my_theme_pains_primary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_pains_primary_label', [
        'label'   => 'Bouton principal - libellé',
        'section' => 'my_theme_home_pains',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_pains_primary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('my_theme_pains_primary_url', [
        'label'   => 'Bouton principal - URL',
        'section' => 'my_theme_home_pains',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('my_theme_pains_secondary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_pains_secondary_label', [
        'label'   => 'Bouton secondaire - libellé (optionnel)',
        'section' => 'my_theme_home_pains',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_pains_secondary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('my_theme_pains_secondary_url', [
        'label'   => 'Bouton secondaire - URL (optionnel)',
        'section' => 'my_theme_home_pains',
        'type'    => 'url',
    ]);
});
