<?php

$main_title_raw   = get_theme_mod('my_theme_choose_practitioner_main_title', '');
$main_content_raw = get_theme_mod('my_theme_choose_practitioner_main_content', '');
$second_title_raw = get_theme_mod('my_theme_choose_practitioner_second_title', '');
$second_content_raw = get_theme_mod('my_theme_choose_practitioner_second_list', '');

$main_title   = trim(wp_strip_all_tags($main_title_raw));
$main_content = trim(wp_strip_all_tags($main_content_raw));
$second_title = trim(wp_strip_all_tags($second_title_raw));
$second_content = trim(wp_strip_all_tags($second_content_raw));

if (
    $main_title === '' ||
    $main_content === '' ||
    $second_title === '' ||
    $second_content === ''
) {
    return '';
}

ob_start();
?>
<section class="choose-practitioner">
    <div class="choose-practitioner__wrapper">
        <p class="choose-practitioner__pill">Le cadre du magnétisme</p>
        <div class="choose-practitioner__main">
            <h2 class="choose-practitioner__title"><?php echo esc_html($main_title); ?></h2>
            <p class="choose-practitioner__content"><?php echo nl2br(esc_html($main_content)); ?></p>
            <h2 class="choose-practitioner__second-title"><?php echo esc_html($second_title); ?></h2>
            <p class="choose-practitioner__second-content"><?php echo nl2br(esc_html($second_content)); ?></p>
        </div>
    </div>
</section>
<?php
return ob_get_clean();
