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

    $wp_customize->add_section('my_theme_home_services', [
        'title'    => 'Services',
        'panel'    => 'my_theme_home',
        'priority' => 40,
    ]);

    $wp_customize->add_setting('my_theme_services_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_services_title', [
        'label'   => 'Titre',
        'section' => 'my_theme_home_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_services_introduction', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_services_introduction', [
        'label'       => 'Introduction',
        'section'     => 'my_theme_home_services',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_services_main_card_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_services_main_card_title', [
        'label'   => 'Carte 1 – Titre',
        'section' => 'my_theme_home_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_services_main_card_description', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_services_main_card_description', [
        'label'       => 'Carte 1 – Description',
        'section'     => 'my_theme_home_services',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_services_second_main_card_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_services_second_main_card_title', [
        'label'   => 'Carte 2 – Titre',
        'section' => 'my_theme_home_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_services_second_main_card_description', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_services_second_main_card_description', [
        'label'       => 'Carte 2 – Description',
        'section'     => 'my_theme_home_services',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_services_third_main_card_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_services_third_main_card_title', [
        'label'   => 'Carte 3 – Titre',
        'section' => 'my_theme_home_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_services_third_main_card_description', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_services_third_main_card_description', [
        'label'       => 'Carte 3 – Description',
        'section'     => 'my_theme_home_services',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_services_fourth_main_card_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_services_fourth_main_card_title', [
        'label'   => 'Carte 4 – Titre',
        'section' => 'my_theme_home_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_services_fourth_main_card_description', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_services_fourth_main_card_description', [
        'label'       => 'Carte 4 – Description',
        'section'     => 'my_theme_home_services',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_services_other_card_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_services_other_card_title', [
        'label'   => 'Autre carte - titre',
        'section' => 'my_theme_home_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_services_other_card_items', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $lines = preg_split("/\r\n|\n|\r/", (string) $value);
            $lines = array_map('trim', $lines);
            $lines = array_filter($lines, fn($l) => $l !== '');
            $lines = array_map(fn($l) => wp_strip_all_tags($l), $lines);
            return implode("\n", $lines);
        },
    ]);
    $wp_customize->add_control('my_theme_services_other_card_items', [
        'label'       => 'Autre carte - liste',
        'description' => '1 ligne = 1 élément',
        'section'     => 'my_theme_home_services',
        'type'        => 'textarea',
    ]);
});
