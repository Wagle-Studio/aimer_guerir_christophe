<?php

$title_raw          = get_theme_mod('aimer_guerir_therapeutic_support_title', '');
$intro_raw          = get_theme_mod('aimer_guerir_therapeutic_support_introduction', '');
$second_title_raw   = get_theme_mod('aimer_guerir_therapeutic_support_second_title', '');
$second_content_raw = get_theme_mod('aimer_guerir_therapeutic_support_second_content', '');

$third_title_raw    = get_theme_mod('aimer_guerir_therapeutic_support_third_title', '');
$third_content_raw  = get_theme_mod('aimer_guerir_therapeutic_support_third_content', '');

$image_id_main      = (int) get_theme_mod('aimer_guerir_therapeutic_support_image_id_main', 0);
$image_id_third     = (int) get_theme_mod('aimer_guerir_therapeutic_support_image_id_third', 0);

$title          = trim(wp_strip_all_tags($title_raw));
$intro          = trim(wp_strip_all_tags($intro_raw));
$second_title   = trim(wp_strip_all_tags($second_title_raw));
$second_content = trim(wp_strip_all_tags($second_content_raw));

$third_title    = trim(wp_strip_all_tags($third_title_raw));
$third_content  = trim(wp_strip_all_tags($third_content_raw));

if (
    $title === '' ||
    $intro === '' ||
    $second_title === '' ||
    $second_content === '' ||
    $third_title === '' ||
    $third_content === ''
) {
    return '';
}

if (! $image_id_main || ! $image_id_third) {
    return '';
}

$image_meta_main = wp_get_attachment_metadata($image_id_main);
$ratio_style_main = '';
if (! empty($image_meta_main['width']) && ! empty($image_meta_main['height'])) {
    $ratio_style_main = sprintf(
        '--ts-image-ratio: %d / %d;',
        (int) $image_meta_main['width'],
        (int) $image_meta_main['height']
    );
}

$image_html_main = wp_get_attachment_image(
    $image_id_main,
    'full',
    false,
    array(
        'class' => 'therapeutic-support__card-image',
        'sizes' => '(max-width: 767px) 460px, (max-width: 1023px) 468px, 504px',
    )
);

$image_meta_third = wp_get_attachment_metadata($image_id_third);
$ratio_style_third = '';
if (! empty($image_meta_third['width']) && ! empty($image_meta_third['height'])) {
    $ratio_style_third = sprintf(
        '--ts-image-ratio: %d / %d;',
        (int) $image_meta_third['width'],
        (int) $image_meta_third['height']
    );
}

$image_html_third = wp_get_attachment_image(
    $image_id_third,
    'full',
    false,
    array(
        'class' => 'therapeutic-support__card-image',
        'sizes' => '(max-width: 767px) 460px, (max-width: 1023px) 468px, 504px',
    )
);

if (! $image_html_main || ! $image_html_third) {
    return '';
}

ob_start();
?>
<section class="therapeutic-support">
    <div class="therapeutic-support-main__wrapper">
        <p class="therapeutic-support-main__pill">Accompagnement thérapeutique</p>
        <h2 class="therapeutic-support-main__title"><?php echo esc_html($title); ?></h2>
        <p class="therapeutic-support-main__intro"><?php echo nl2br(esc_html($intro)); ?></p>
    </div>
    <div class="therapeutic-support__cards">
        <article class="therapeutic-support__card">
            <div class="therapeutic-support__card-media" style="<?php echo esc_attr($ratio_style_main); ?>">
                <?php echo $image_html_main; ?>
            </div>
            <div class="therapeutic-support__card-content">
                <h3 class="therapeutic-support__card-title"><?php echo esc_html($second_title); ?></h3>
                <p class="therapeutic-support__card-intro"><?php echo nl2br(esc_html($second_content)); ?></p>
            </div>
        </article>
        <article class="therapeutic-support__card">
            <div class="therapeutic-support__card-media" style="<?php echo esc_attr($ratio_style_third); ?>">
                <?php echo $image_html_third; ?>
            </div>
            <div class="therapeutic-support__card-content">
                <h3 class="therapeutic-support__card-title"><?php echo esc_html($third_title); ?></h3>
                <p class="therapeutic-support__card-intro"><?php echo nl2br(esc_html($third_content)); ?></p>
            </div>
        </article>
    </div>
</section>
<?php
return ob_get_clean();
