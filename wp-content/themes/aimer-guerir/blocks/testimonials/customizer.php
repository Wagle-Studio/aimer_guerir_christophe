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

    $wp_customize->add_setting('aimer_guerir_testimonials_customer_1_name', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_customer_1_name', [
        'label'   => 'Client 1 - Nom',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_customer_1_feedback', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            $value = trim($value);
            return $value;
        },
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_customer_1_feedback', [
        'label'       => 'Client 1 - Retour',
        'description' => 'Témoignage (sauts de ligne autorisés).',
        'section'     => 'aimer_guerir_home_testimonials',
        'type'        => 'textarea',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_customer_2_name', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_customer_2_name', [
        'label'   => 'Client 2 - Nom',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_customer_2_feedback', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            $value = trim($value);
            return $value;
        },
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_customer_2_feedback', [
        'label'       => 'Client 2 - Retour',
        'description' => 'Témoignage (sauts de ligne autorisés).',
        'section'     => 'aimer_guerir_home_testimonials',
        'type'        => 'textarea',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_customer_3_name', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_customer_3_name', [
        'label'   => 'Client 3 - Nom',
        'section' => 'aimer_guerir_home_testimonials',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_testimonials_customer_3_feedback', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            $value = trim($value);
            return $value;
        },
    ]);
    $wp_customize->add_control('aimer_guerir_testimonials_customer_3_feedback', [
        'label'       => 'Client 3 - Retour',
        'description' => 'Témoignage (sauts de ligne autorisés).',
        'section'     => 'aimer_guerir_home_testimonials',
        'type'        => 'textarea',
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
});
