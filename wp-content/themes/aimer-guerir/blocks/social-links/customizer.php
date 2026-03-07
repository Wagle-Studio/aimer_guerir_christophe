<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_section('aimer_guerir_social', [
        'title'    => 'Réseaux sociaux',
        'priority' => 25,
    ]);

    $wp_customize->add_setting('aimer_guerir_social_instagram', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('aimer_guerir_social_instagram', [
        'label'       => 'URL Instagram',
        'section'     => 'aimer_guerir_social',
        'type'        => 'url',
    ]);

    $wp_customize->add_setting('aimer_guerir_social_facebook', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('aimer_guerir_social_facebook', [
        'label'       => 'URL Facebook',
        'section'     => 'aimer_guerir_social',
        'type'        => 'url',
    ]);

    $wp_customize->add_setting('aimer_guerir_social_linkedin', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('aimer_guerir_social_linkedin', [
        'label'       => 'URL LinkedIn',
        'section'     => 'aimer_guerir_social',
        'type'        => 'url',
    ]);
});
