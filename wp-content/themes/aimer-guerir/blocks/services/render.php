<?php
if (!defined('ABSPATH')) {
    exit;
}

$title_raw = get_theme_mod('aimer_guerir_services_title', '');
$intro_raw = get_theme_mod('aimer_guerir_services_introduction', '');

$main_title_raw = get_theme_mod('aimer_guerir_services_main_card_title', '');
$main_desc_raw  = get_theme_mod('aimer_guerir_services_main_card_description', '');

$second_main_title_raw = get_theme_mod('aimer_guerir_services_second_main_card_title', '');
$second_main_desc_raw  = get_theme_mod('aimer_guerir_services_second_main_card_description', '');

$third_main_title_raw = get_theme_mod('aimer_guerir_services_third_main_card_title', '');
$third_main_desc_raw  = get_theme_mod('aimer_guerir_services_third_main_card_description', '');
$fourth_main_title_raw = get_theme_mod('aimer_guerir_services_fourth_main_card_title', '');
$fourth_main_desc_raw  = get_theme_mod('aimer_guerir_services_fourth_main_card_description', '');

$other_title_raw = get_theme_mod('aimer_guerir_services_other_card_title', '');
$other_items_raw = get_theme_mod('aimer_guerir_services_other_card_items', '');

$title = trim(wp_strip_all_tags((string) $title_raw));
$intro = trim(wp_strip_all_tags((string) $intro_raw));

$main_title = trim(wp_strip_all_tags((string) $main_title_raw));
$main_desc  = trim(wp_strip_all_tags((string) $main_desc_raw));

$second_main_title = trim(wp_strip_all_tags((string) $second_main_title_raw));
$second_main_desc  = trim(wp_strip_all_tags((string) $second_main_desc_raw));

$third_main_title = trim(wp_strip_all_tags((string) $third_main_title_raw));
$third_main_desc  = trim(wp_strip_all_tags((string) $third_main_desc_raw));
$fourth_main_title = trim(wp_strip_all_tags((string) $fourth_main_title_raw));
$fourth_main_desc  = trim(wp_strip_all_tags((string) $fourth_main_desc_raw));

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
    $third_main_title === '' ||
    $third_main_desc === '' ||
    $fourth_main_title === '' ||
    $fourth_main_desc === '' ||
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
                <div class="services__card-body">
                    <p class="services__card-description"><?php echo nl2br(esc_html($main_desc)); ?></p>
                </div>
                <button class="services__card-toggle" aria-expanded="false">
                    <span class="services__card-toggle-more">Lire la suite</span>
                    <span class="services__card-toggle-less">Réduire</span>
                </button>
            </article>
            <article class="services__card services__card--main">
                <div class="services__card-title">
                    <?php include get_theme_file_path('assets/icons/troubles.php'); ?>
                    <h3><?php echo esc_html($second_main_title); ?></h3>
                </div>
                <div class="services__card-body">
                    <p class="services__card-description"><?php echo nl2br(esc_html($second_main_desc)); ?></p>
                </div>
                <button class="services__card-toggle" aria-expanded="false">
                    <span class="services__card-toggle-more">Lire la suite</span>
                    <span class="services__card-toggle-less">Réduire</span>
                </button>
            </article>
            <article class="services__card services__card--main">
                <div class="services__card-title">
                    <?php include get_theme_file_path('assets/icons/clinic.php'); ?>
                    <h3><?php echo esc_html($third_main_title); ?></h3>
                </div>
                <div class="services__card-body">
                    <p class="services__card-description"><?php echo nl2br(esc_html($third_main_desc)); ?></p>
                </div>
                <button class="services__card-toggle" aria-expanded="false">
                    <span class="services__card-toggle-more">Lire la suite</span>
                    <span class="services__card-toggle-less">Réduire</span>
                </button>
            </article>
            <article class="services__card services__card--main">
                <div class="services__card-title">
                    <?php include get_theme_file_path('assets/icons/skin.php'); ?>
                    <h3><?php echo esc_html($fourth_main_title); ?></h3>
                </div>
                <div class="services__card-body">
                    <p class="services__card-description"><?php echo nl2br(esc_html($fourth_main_desc)); ?></p>
                </div>
                <button class="services__card-toggle" aria-expanded="false">
                    <span class="services__card-toggle-more">Lire la suite</span>
                    <span class="services__card-toggle-less">Réduire</span>
                </button>
            </article>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.services__card--main').forEach(function (card) {
                var body = card.querySelector('.services__card-body');
                var btn  = card.querySelector('.services__card-toggle');
                if (!body || !btn) return;
                if (body.scrollHeight <= body.offsetHeight + 2) {
                    btn.hidden = true;
                    body.classList.add('services__card-body--full');
                    return;
                }
                btn.addEventListener('click', function () {
                    var expanded = card.classList.toggle('is-expanded');
                    btn.setAttribute('aria-expanded', String(expanded));
                });
            });
        });
        </script>
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
