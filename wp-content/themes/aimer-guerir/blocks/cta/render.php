<?php
if (!defined('ABSPATH')) {
    exit;
}

$title_raw   = get_theme_mod('aimer_guerir_cta_title', '');
$subtitle_raw = get_theme_mod('aimer_guerir_cta_subtitle', '');
$label_raw   = get_theme_mod('aimer_guerir_cta_primary_label', '');
$url_raw     = get_theme_mod('aimer_guerir_cta_primary_url', '');

$title    = trim(wp_strip_all_tags((string) $title_raw));
$subtitle = trim(wp_strip_all_tags((string) $subtitle_raw));
$label    = trim(wp_strip_all_tags((string) $label_raw));
$url      = trim(esc_url_raw((string) $url_raw));

if (
    $title === '' ||
    $subtitle === '' ||
    $label === '' ||
    $url === ''
) {
    return '';
}

?>
<section class="cta">
    <div class="cta__wrapper">
        <h2 class="cta__title"><?php echo esc_html($title); ?></h2>
        <p class="cta__subtitle"><?php echo nl2br(esc_html($subtitle)); ?></p>
        <a class="cta__btn btn btn--secondary" href="<?php echo $url; ?>">
            <?php echo esc_html($label); ?>
        </a>
    </div>
</section>