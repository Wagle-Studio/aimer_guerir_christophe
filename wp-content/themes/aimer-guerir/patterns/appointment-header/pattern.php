<?php
/**
 * Title: Rendez-vous — En-tête
 * Slug: aimer-guerir/appointment-header
 * Categories: aimer-guerir
 * Post Types: page
 * Keywords: rendez-vous, horaires, contact
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"pattern-appointment-header","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern-appointment-header">
  <!-- wp:group {"className":"pattern-appointment-header__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern-appointment-header__wrapper">
    <!-- wp:group {"className":"appointment-cta__header","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__header">
      <!-- wp:heading {"level":2} -->
      <h2>Horaires d'ouverture du cabinet</h2>
      <!-- /wp:heading -->

      <!-- wp:group {"className":"appointment-cta__schedules","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__schedules">
        <!-- wp:paragraph -->
        <p>Du lundi au vendredi de 08:30 à 13:00 et de 14:00 à 19:00</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Le samedi de 09:00 à 12:00</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button -->
        <div class="wp-block-button">
          <a class="wp-block-button__link btn btn--primary btn--icon" href="#">
            Réserver une séance
          </a>
        </div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"appointment-cta__info","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__info">
      <!-- wp:group {"className":"appointment-cta__card","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__card">
        <!-- wp:heading {"level":3} -->
        <h3 class="appointment-cta__card__title"><span><?php include get_theme_file_path('assets/icons/urgent.php'); ?></span>Urgences</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>En cas d'urgence, n'hésitez pas à me contacter au 06 95 64 54 76. Je mettrais alors tout en œuvre pour vous recevoir le plus rapidement possible.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"appointment-cta__card","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__card">
        <!-- wp:heading {"level":3} -->
        <h3 class="appointment-cta__card__title"><span><?php include get_theme_file_path('assets/icons/cancel.php'); ?></span>Annulation</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>Je vous remercie par avance de l'égard que vous porterez sur mon organisation logistique en annulant votre séance au plus tard 48 heures avant votre rendez-vous.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
