<?php
if (!defined('ABSPATH')) {
    exit;
}

$title_raw = get_theme_mod('my_theme_services_title', '');
$intro_raw = get_theme_mod('my_theme_services_introduction', '');

$main_title_raw = get_theme_mod('my_theme_services_main_card_title', '');
$main_desc_raw  = get_theme_mod('my_theme_services_main_card_description', '');

$second_main_title_raw = get_theme_mod('my_theme_services_second_main_card_title', '');
$second_main_desc_raw  = get_theme_mod('my_theme_services_second_main_card_description', '');

$other_title_raw = get_theme_mod('my_theme_services_other_card_title', '');
$other_items_raw = get_theme_mod('my_theme_services_other_card_items', '');

$title = trim(wp_strip_all_tags((string) $title_raw));
$intro = trim(wp_strip_all_tags((string) $intro_raw));

$main_title = trim(wp_strip_all_tags((string) $main_title_raw));
$main_desc  = trim(wp_strip_all_tags((string) $main_desc_raw));

$second_main_title = trim(wp_strip_all_tags((string) $second_main_title_raw));
$second_main_desc  = trim(wp_strip_all_tags((string) $second_main_desc_raw));

$other_title = trim(wp_strip_all_tags((string) $other_title_raw));

$other_items = preg_split("/\r\n|\n|\r/", (string) $other_items_raw);
$other_items = array_map('trim', $other_items);
$other_items = array_values(array_filter($other_items, fn($v) => $v !== ''));

if (
    $title === '' ||
    $intro === '' ||
    $main_title === '' ||
    $main_desc === '' ||
    $second_main_title === '' ||
    $second_main_desc === '' ||
    $other_title === '' ||
    count($other_items) === 0
) {
    return '';
}
?>
<section class="services">
    <div class="services__wrapper">
        <p class="services__pill">Mes services</p>
        <header class="services__header">
            <h2 class="services__title"><?php echo esc_html($title); ?></h2>
            <p class="services__introduction"><?php echo nl2br(esc_html($intro)); ?></p>
        </header>
        <div class="services__main-cards">
            <article class="services__card services__card--main">
                <div class="services__card-title">
                    <?php include get_theme_file_path('assets/icons/bones.php'); ?>
                    <h3><?php echo esc_html($main_title); ?></h3>
                </div>
                <p class="services__card-description"><?php echo nl2br(esc_html($main_desc)); ?></p>
            </article>
            <article class="services__card services__card--main">
                <div class="services__card-title">
                    <?php include get_theme_file_path('assets/icons/troubles.php'); ?>
                    <h3><?php echo esc_html($second_main_title); ?></h3>
                </div>
                <p class="services__card-description"><?php echo nl2br(esc_html($second_main_desc)); ?></p>
            </article>
        </div>
        <div class="services__other">
            <article class="services__card services__card--other">
                <div class="services__card-title">
                    <?php include get_theme_file_path('assets/icons/hearth.php'); ?>
                    <h3><?php echo esc_html($other_title); ?></h3>
                </div>
                <ul class="services__card-list">
                    <?php foreach ($other_items as $item) : ?>
                        <li class="services__card-item">
                            <?php include get_theme_file_path('assets/icons/check.php'); ?>
                            <?php echo esc_html($item); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </div>
    </div>
</section>
