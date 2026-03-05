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

    $wp_customize->add_section('aimer_guerir_home_therapeutic_support', [
        'title'    => 'Accompagnement thérapeutique',
        'panel'    => 'aimer_guerir_home',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_title', [
        'label'   => 'Titre principal',
        'section' => 'aimer_guerir_home_therapeutic_support',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_introduction', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_introduction', [
        'label'       => 'Introduction principale',
        'section'     => 'aimer_guerir_home_therapeutic_support',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_second_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_second_title', [
        'label'   => 'Titre secondaire',
        'section' => 'aimer_guerir_home_therapeutic_support',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_second_content', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_second_content', [
        'label'       => 'Contenu secondaire',
        'section'     => 'aimer_guerir_home_therapeutic_support',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_third_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_third_title', [
        'label'   => 'Titre tertiaire',
        'section' => 'aimer_guerir_home_therapeutic_support',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_third_content', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_third_content', [
        'label'       => 'Contenu tertiaire',
        'section'     => 'aimer_guerir_home_therapeutic_support',
        'type'        => 'textarea',
        'description' => 'Texte (sauts de ligne autorisés).',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_third_hook', [
        'default'           => '',
        'sanitize_callback' => function ($value) {
            $value = (string) $value;
            $value = wp_strip_all_tags($value);
            return trim($value);
        },
    ]);
    $wp_customize->add_control('aimer_guerir_therapeutic_support_third_hook', [
        'label'   => "Phrase d'accroche tertiaire",
        'section' => 'aimer_guerir_home_therapeutic_support',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_image_id_main', ['default' => 0,]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'aimer_guerir_therapeutic_support_image_id_main',
        [
            'label'     => 'Illustration n°1',
            'section'   => 'aimer_guerir_home_therapeutic_support',
            'mime_type' => 'image',
        ]
    ));

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_image_id_second', ['default' => 0,]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'aimer_guerir_therapeutic_support_image_id_second',
        [
            'label'     => 'Illustration n°2',
            'section'   => 'aimer_guerir_home_therapeutic_support',
            'mime_type' => 'image',
        ]
    ));

    $wp_customize->add_setting('aimer_guerir_therapeutic_support_image_id_third', ['default' => 0,]);
    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'aimer_guerir_therapeutic_support_image_id_third',
        [
            'label'     => 'Illustration n°3',
            'section'   => 'aimer_guerir_home_therapeutic_support',
            'mime_type' => 'image',
        ]
    ));
});
