<?php

$title_raw        = get_theme_mod('my_theme_testimonials_title', '');
$subtitle_raw     = get_theme_mod('my_theme_testimonials_subtitle', '');
$introduction_raw = get_theme_mod('my_theme_testimonials_introduction', '');
$c1_name_raw      = get_theme_mod('my_theme_testimonials_customer_1_name', '');
$c1_feedback_raw  = get_theme_mod('my_theme_testimonials_customer_1_feedback', '');
$c2_name_raw      = get_theme_mod('my_theme_testimonials_customer_2_name', '');
$c2_feedback_raw  = get_theme_mod('my_theme_testimonials_customer_2_feedback', '');
$c3_name_raw      = get_theme_mod('my_theme_testimonials_customer_3_name', '');
$c3_feedback_raw  = get_theme_mod('my_theme_testimonials_customer_3_feedback', '');

$title        = trim(wp_strip_all_tags($title_raw));
$subtitle     = trim(wp_strip_all_tags($subtitle_raw));
$introduction = trim(wp_strip_all_tags($introduction_raw));

$stars = ' ⭐⭐⭐⭐⭐';

$testimonials = [
    [
        'name' => trim(wp_strip_all_tags($c1_name_raw)) . $stars,
        'feedback' => trim(wp_strip_all_tags($c1_feedback_raw)),
    ],
    [
        'name' => trim(wp_strip_all_tags($c2_name_raw)) . $stars,
        'feedback' => trim(wp_strip_all_tags($c2_feedback_raw)),
    ],
    [
        'name' => trim(wp_strip_all_tags($c3_name_raw)) . $stars,
        'feedback' => trim(wp_strip_all_tags($c3_feedback_raw)),
    ],
];

$testimonials = array_values(array_filter($testimonials, function ($t) {
    return $t['name'] !== '' && $t['feedback'] !== '';
}));

$primary_label = get_theme_mod('my_theme_testimonials_primary_label', '');
$primary_url   = get_theme_mod('my_theme_testimonials_primary_url', '');
$primary_label = trim($primary_label);
$primary_url   = trim($primary_url);

if (
    $title === '' ||
    $subtitle === '' ||
    $introduction === '' ||
    count($testimonials) !== 3 ||
    '' === $primary_label ||
    '' === $primary_url
) {
    return '';
}

ob_start();
?>
<section class="testimonials">
    <header class="testimonials__header">
        <div class="testimonials_header_wrapper">
            <p class="testimonials__title">
                <?php echo esc_html($title); ?>
            </p>
            <h2 class="testimonials__subtitle"><?php echo esc_html($subtitle); ?></h2>
        </div>
        <p class="testimonials__intro"><?php echo nl2br(esc_html($introduction)); ?></p>
    </header>
    <div class="testimonials__actions">
        <a class="btn btn--primary" href="<?php echo $primary_url; ?>">
            <?php echo esc_html($primary_label); ?>
        </a>
    </div>
    <div class="testimonials__list" aria-live="polite">
        <?php foreach ($testimonials as $testimonial) : ?>
            <figure class="testimonials__item">
                <blockquote class="testimonials__quote">
                    <?php echo nl2br(esc_html($testimonial['feedback'])); ?>
                </blockquote>
                <figcaption class="testimonials__name"><?php echo esc_html($testimonial['name']); ?></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>
<?php
return ob_get_clean();
