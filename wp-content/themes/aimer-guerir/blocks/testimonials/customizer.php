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

    $wp_customize->add_section('aimer_guerir_home_testimonials', [
        'title'    => 'Avis clients',
        'panel'    => 'aimer_guerir_home',
        'priority' => 70,
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_title', [
        'label'   => 'Titre',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_subtitle', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_subtitle', [
        'label'   => 'Sous-titre',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_introduction', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            $value = trim($value);
            return $value;
        },
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_introduction', [
        'label'       => 'Introduction',
        'section'     => 'aimer_guerir_home_testimonials',
        'type'        => 'textarea',
        'description' => 'Texte d’introduction (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_primary_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_primary_label', [
        'label'   => 'Bouton principal - libellé',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_primary_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_primary_url', [
        'label'   => 'Bouton principal - URL',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_google_label', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_google_label', [
        'label'       => 'Bouton Google - libellé',
        'description' => 'Ex : « Voir nos avis Google ». Laisser vide pour masquer le bouton.',
        'section'     => 'aimer_guerir_home_testimonials',
        'type'        => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_google_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_url',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_google_url', [
        'label'       => 'Bouton Google - URL',
        'description' => 'Lien vers la fiche Google Business (avis Google).',
        'section'     => 'aimer_guerir_home_testimonials',
        'type'        => 'url',
    ]);
});
