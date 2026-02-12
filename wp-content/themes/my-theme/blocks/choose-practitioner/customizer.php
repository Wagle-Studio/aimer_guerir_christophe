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

    $wp_customize->add_section('my_theme_home_choose_practitioner', [
        'title'    => 'Choisir son praticien',
        'panel'    => 'my_theme_home',
        'priority' => 80,
    ]);

    $wp_customize->add_setting('my_theme_choose_practitioner_main_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_choose_practitioner_main_title', [
        'label'   => 'Titre principal',
        'section' => 'my_theme_home_choose_practitioner',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_choose_practitioner_main_content', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('my_theme_choose_practitioner_main_content', [
        'label'       => 'Contenu principal',
        'section'     => 'my_theme_home_choose_practitioner',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('my_theme_choose_practitioner_second_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_choose_practitioner_second_title', [
        'label'   => 'Deuxième titre',
        'section' => 'my_theme_home_choose_practitioner',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_choose_practitioner_second_list', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);

    $wp_customize->add_control('my_theme_choose_practitioner_second_list', [
        'label'       => 'Deuxième partie - Texte',
        'description' => 'Texte (sauts de ligne autorisés).',
        'section'     => 'my_theme_home_choose_practitioner',
        'type'        => 'textarea',
    ]);
});
