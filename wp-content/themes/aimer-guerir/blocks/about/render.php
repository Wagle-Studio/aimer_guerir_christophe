<?php

$title_raw                = get_theme_mod('aimer_guerir_about_title', '');
$subtitle_raw             = get_theme_mod('aimer_guerir_about_subtitle', '');
$presentation_raw         = get_theme_mod('aimer_guerir_about_presentation', '');
$primary_label            = get_theme_mod('aimer_guerir_about_primary_label', '');
$primary_url              = get_theme_mod('aimer_guerir_about_primary_url', '');
$sub_part_title_raw       = get_theme_mod('aimer_guerir_about_sub_part_title', '');
$sub_part_description_raw = get_theme_mod('aimer_guerir_about_sub_part_description', '');
$secondary_label          = get_theme_mod('aimer_guerir_about_secondary_label', '');
$secondary_url            = get_theme_mod('aimer_guerir_about_secondary_url', '');
$image_id                 = (int) get_theme_mod('aimer_guerir_about_image_id', 0);

$title                = trim(wp_strip_all_tags($title_raw));
$subtitle             = trim(wp_strip_all_tags($subtitle_raw));
$presentation         = trim(wp_strip_all_tags($presentation_raw));
$primary_label        = trim($primary_label);
$primary_url          = esc_url(trim($primary_url));
$sub_part_title       = trim(wp_strip_all_tags($sub_part_title_raw));
$sub_part_description = trim(wp_strip_all_tags($sub_part_description_raw));
$secondary_label      = trim($secondary_label);
$secondary_url        = esc_url(trim($secondary_url));

if (
    $title === '' ||
    $subtitle === '' ||
    $presentation === '' ||
    $sub_part_title === '' ||
    $sub_part_description === '' ||
    ! $image_id ||
    '' === $primary_label ||
    '' === $primary_url
) {
    return '';
}

$image_meta = wp_get_attachment_metadata($image_id);
$ratio_style = '';
if (! empty($image_meta['width']) && ! empty($image_meta['height'])) {
    $ratio_style = sprintf(
        ' style="--about-image-ratio: %d / %d;"',
        (int) $image_meta['width'],
        (int) $image_meta['height']
    );
}

$image_html = wp_get_attachment_image(
    $image_id,
    'full',
    false,
    array(
        'class' => 'about__image',
        'sizes' => '(max-width: 767px) calc(100vw - 48px), (max-width: 1200px) 50vw, 520px',
    )
);

if (! $image_html) {
    return '';
}

ob_start();
?>
<section class="about">
    <div class="about__wrapper">
        <div class="about__content">
            <div class="about_content_media" <?php echo $ratio_style; ?>>
                <?php echo $image_html; ?>
            </div>
            <div class="about_content_wrapper">
                <div class="about_content_header">
                    <h2 class="about_header_title"><?php echo esc_html($title); ?></h2>
                    <p class="about_header_subtitle"><?php echo esc_html($subtitle); ?></p>
                </div>
                <p class="about__presentation"><?php echo nl2br(esc_html($presentation)); ?></p>
                <a class="btn btn--secondary" href="<?php echo $primary_url; ?>">
                    <?php echo esc_html($primary_label); ?>
                </a>
                <div class="about__subpart">
                    <h3 class="about__subpart_title"><?php echo esc_html($sub_part_title); ?></h3>
                    <p class="about__subpart_description"><?php echo nl2br(esc_html($sub_part_description)); ?></p>
                    <a class="btn btn--secondary" href="<?php echo $secondary_url; ?>">
                        <?php echo esc_html($secondary_label); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
return ob_get_clean();
