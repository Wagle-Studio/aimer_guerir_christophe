<?php

$title_raw        = get_theme_mod('aimer_guerir_testimonials_title', '');
$subtitle_raw     = get_theme_mod('aimer_guerir_testimonials_subtitle', '');
$introduction_raw = get_theme_mod('aimer_guerir_testimonials_introduction', '');

$title        = trim(wp_strip_all_tags($title_raw));
$subtitle     = trim(wp_strip_all_tags($subtitle_raw));
$introduction = trim(wp_strip_all_tags($introduction_raw));

$primary_label = trim(get_theme_mod('aimer_guerir_testimonials_primary_label', ''));
$primary_url   = esc_url(trim(get_theme_mod('aimer_guerir_testimonials_primary_url', '')));

$google_label = trim(get_theme_mod('aimer_guerir_testimonials_google_label', ''));
$google_url   = esc_url(trim(get_theme_mod('aimer_guerir_testimonials_google_url', '')));

$reviews = aimer_guerir_get_reviews();

if (
    $title === '' ||
    $subtitle === '' ||
    $introduction === '' ||
    empty($reviews) ||
    '' === $primary_label ||
    '' === $primary_url
) {
    return '';
}

$display_reviews = array_merge($reviews, $reviews);

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
        <?php if ($google_label !== '' && $google_url !== '') : ?>
        <a class="btn btn--secondary btn--icon" href="<?php echo $google_url; ?>" target="_blank" rel="noopener noreferrer">
            <?php include get_theme_file_path('assets/icons/icon-google.php'); ?>
            <?php echo esc_html($google_label); ?>
        </a>
        <?php endif; ?>
    </div>
    <div class="testimonials__list" role="region" aria-label="Avis clients">
        <div class="testimonials__track" aria-live="off">
            <?php foreach ($display_reviews as $review) : ?>
                <figure class="testimonials__item">
                    <blockquote class="testimonials__quote">
                        <?php echo nl2br(esc_html($review['body'])); ?>
                    </blockquote>
                    <figcaption class="testimonials__name">
                        <?php echo esc_html($review['name']); ?>
                        <span class="testimonials__stars" aria-label="<?php echo esc_attr($review['rating']); ?> étoiles sur 5"><?php echo str_repeat('⭐', (int) $review['rating']); ?></span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
return ob_get_clean();
