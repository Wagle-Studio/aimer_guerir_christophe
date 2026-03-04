<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_section('my_theme_contact', [
        'title'    => 'Informations de contact',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('my_theme_contact_tagline', [
        'default'           => 'Magnétiseur – Coupeur de Feu',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_contact_tagline', [
        'label'   => 'Accroche',
        'section' => 'my_theme_contact',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_contact_phone', [
        'default'           => '06 95 64 54 76',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_contact_phone', [
        'label'   => 'Téléphone',
        'section' => 'my_theme_contact',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_contact_email', [
        'default'           => 'contact@aimerguerir.com',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('my_theme_contact_email', [
        'label'   => 'E-mail',
        'section' => 'my_theme_contact',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_contact_address_street', [
        'default'           => "24 rue de l'Horloge",
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_contact_address_street', [
        'label'   => 'Rue',
        'section' => 'my_theme_contact',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('my_theme_contact_address_city', [
        'default'           => 'Vernon 27200',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('my_theme_contact_address_city', [
        'label'   => 'Ville',
        'section' => 'my_theme_contact',
        'type'    => 'text',
    ]);
});
