<?php

/**
 * Title: Séances — À propos
 * Slug: aimer-guerir/appointment-about
 * Categories: aimer-guerir
 * Post Types: page
 * Keywords: séances, cabinet, distance, domicile
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"appointment-about","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull appointment-about">
  <!-- wp:group {"className":"appointment-about__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group appointment-about__wrapper">
    <!-- wp:heading {"level":2} -->
    <h2>À propos des séances</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"className":"appointment-about__content","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-about__content">
      <!-- wp:paragraph {"className":"appointment-about__text"} -->
      <p class="appointment-about__text">Lors de la première séance, nous échangeons sur le problème rencontré, vos ressentis, votre état général, vos antécédents médicaux et les traitements en cours. Les séances durent en moyenne 30 minutes.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"className":"appointment-about__text"} -->
      <p class="appointment-about__text">Le traitement peut s'étaler sur plusieurs séances et varie en fonction de l'âge de la personne et de l'ancienneté du problème.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"className":"appointment-about__text"} -->
      <p class="appointment-about__text">Les soins se déroulent toujours habillé, sans manipulation et en présence d'un adulte pour les personnes mineures.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"appointment-about__sessions-intro","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-about__sessions-intro">
      <!-- wp:heading {"level":3,"className":"appointment-about__sessions-title"} -->
      <h3 class="appointment-about__sessions-title">La séance qui vous convient</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"className":"appointment-about__sessions-text"} -->
      <p class="appointment-about__sessions-text">Chaque accompagnement est personnalisé. Choisissez une séance au cabinet, à distance ou à domicile selon votre situation, votre disponibilité et vos besoins. Nous échangeons ensemble pour retenir la formule la plus adaptée.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"appointment-about__sessions","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-about__sessions">
      <!-- wp:group {"className":"appointment-about__session-card","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-about__session-card">
        <!-- wp:paragraph {"className":"appointment-about__session-title"} -->
        <p class="appointment-about__session-title"><span><?php include get_theme_file_path('assets/icons/hearth.php'); ?></span>Séance au cabinet</p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"url":"#","className":"appointment-about__session-link"} -->
          <div class="wp-block-button appointment-about__session-link"><a class="wp-block-button__link wp-element-button" href="#seance-cabinet">Séance au cabinet</a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"appointment-about__session-card","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-about__session-card">
        <!-- wp:paragraph {"className":"appointment-about__session-title"} -->
        <p class="appointment-about__session-title"><span><?php include get_theme_file_path('assets/icons/remote.php'); ?></span>Séance à distance</p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"url":"#","className":"appointment-about__session-link"} -->
          <div class="wp-block-button appointment-about__session-link"><a class="wp-block-button__link wp-element-button" href="#seance-distance">Séance à distance</a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"appointment-about__session-card","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-about__session-card">
        <!-- wp:paragraph {"className":"appointment-about__session-title"} -->
        <p class="appointment-about__session-title"><span><?php include get_theme_file_path('assets/icons/home-visit.php'); ?></span>Séance à domicile</p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"url":"#","className":"appointment-about__session-link"} -->
          <div class="wp-block-button appointment-about__session-link"><a class="wp-block-button__link wp-element-button" href="#seance-domicile">Séance à domicile</a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->