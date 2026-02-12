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

    $wp_customize->add_section('my_theme_home_cta', [
        'title'    => "Appel à l'action",
        'panel'    => 'my_theme_home',
        'priority' => 50,
    ]);

    $wp_customize->add_setting('my_theme_cta_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_cta_title', [
        'label'   => 'Titre',
        'section' => 'my_theme_home_cta',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_cta_subtitle', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_cta_subtitle', [
        'label'       => 'Sous-titre',
        'section'     => 'my_theme_home_cta',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_cta_primary_label', ['default' => '']);
    $wp_customize->add_control('my_theme_cta_primary_label', [
        'label'   => 'Bouton - libellé',
        'section' => 'my_theme_home_cta',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_cta_primary_url', ['default' => '']);
    $wp_customize->add_control('my_theme_cta_primary_url', [
        'label'   => 'Bouton - URL',
        'section' => 'my_theme_home_cta',
        'type'    => 'url',
    ]);
});
