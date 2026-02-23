<?php

/**
 * Title: Bandeau douleurs
 * Slug: my-theme/pains-band
 * Categories: my-theme
 * Keywords: douleurs, bandeau, liste, rendez-vous
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"pattern-pains-intro","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern-pains-intro">
  <!-- wp:group {"className":"pattern-pains-intro__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern-pains-intro__wrapper">
    <!-- wp:heading {"level":1} -->
    <h1>À propos des séances</h1>
    <!-- /wp:heading -->

    <!-- wp:group {"className":"pattern-pains-intro__content","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern-pains-intro__content">
      <!-- wp:paragraph {"className":"pattern-pains-intro__text"} -->
      <p class="pattern-pains-intro__text">Lors de la première séance, nous échangeons sur le problème rencontré, vos ressentis, votre état général, vos antécédents médicaux et les traitements en cours. Les séances durent en moyenne 30 minutes.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"className":"pattern-pains-intro__text"} -->
      <p class="pattern-pains-intro__text">Le traitement peut s’étaler sur plusieurs séances et varie en fonction de l’âge de la personne et de l’ancienneté du problème.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"className":"pattern-pains-intro__text"} -->
      <p class="pattern-pains-intro__text">Les soins se déroulent toujours habillé, sans manipulation et en présence d'un adulte pour les personnes mineures.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"pattern-pains-intro__sessions-intro","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern-pains-intro__sessions-intro">
      <!-- wp:heading {"level":2,"className":"pattern-pains-intro__sessions-title"} -->
      <h2 class="pattern-pains-intro__sessions-title">La séance qui vous convient</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"className":"pattern-pains-intro__sessions-text"} -->
      <p class="pattern-pains-intro__sessions-text">Chaque accompagnement est personnalisé. Choisissez une séance au cabinet, à distance ou à domicile selon votre situation, votre disponibilité et vos besoins. Nous échangeons ensemble pour retenir la formule la plus adaptée.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"pattern-pains-intro__sessions","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern-pains-intro__sessions">
      <!-- wp:group {"className":"pattern-pains-intro__session-card","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains-intro__session-card">
        <!-- wp:heading {"level":3,"className":"pattern-pains-intro__session-title"} -->
        <h3 class="pattern-pains-intro__session-title"><span><?php include get_theme_file_path('assets/icons/hearth.php'); ?></span>Séance au cabinet</h3>
        <!-- /wp:heading -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"pattern-pains-intro__session-card","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains-intro__session-card">
        <!-- wp:heading {"level":3,"className":"pattern-pains-intro__session-title"} -->
        <h3 class="pattern-pains-intro__session-title"><span><?php include get_theme_file_path('assets/icons/remote.php'); ?></span>Séance à distance</h3>
        <!-- /wp:heading -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"pattern-pains-intro__session-card","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains-intro__session-card">
        <!-- wp:heading {"level":3,"className":"pattern-pains-intro__session-title"} -->
        <h3 class="pattern-pains-intro__session-title"><span><?php include get_theme_file_path('assets/icons/home-visit.php'); ?></span>Séance à domicile</h3>
        <!-- /wp:heading -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","align":"full","className":"pattern-pains","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern-pains">
  <!-- wp:group {"className":"pattern-pains__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern-pains__wrapper">
    <!-- wp:heading {"level":2,"className":"pattern-pains__title"} -->
    <h2 class="pattern-pains__title">Les douleurs que je peux soulager</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"className":"pattern-pains__top","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern-pains__top">
      <!-- wp:group {"className":"pattern-pains__content","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains__content">
        <!-- wp:list {"className":"pattern-pains__list"} -->
        <ul class="pattern-pains__list">
          <li class="pattern-pains__item">Douleurs articulaires et musculaires</li>
          <li class="pattern-pains__item">Problèmes de sommeil, de fatigue ou de stress</li>
          <li class="pattern-pains__item">Maladies de peau (eczéma, psoriasis, verrues...)</li>
          <li class="pattern-pains__item">Brûlures</li>
          <li class="pattern-pains__item">Troubles digestifs</li>
          <li class="pattern-pains__item">Migraines et vertiges</li>
          <li class="pattern-pains__item">Problèmes respiratoires et allergiques</li>
          <li class="pattern-pains__item">Effets secondaires des radiothérapies et chimiothérapies</li>
        </ul>
        <!-- /wp:list -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"pattern-pains__media","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains__media" style="--pains-image-ratio: 1 / 1;">
        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"pattern-pains__image"} -->
        <figure class="wp-block-image size-full pattern-pains__image">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="Illustration apaisante" />
        </figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"pattern-pains__actions","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern-pains__actions">
      <!-- wp:group {"className":"pattern-pains__disclaimer","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains__disclaimer">
        <!-- wp:paragraph {"className":"pattern-pains__disclaimer-text"} -->
        <p class="pattern-pains__disclaimer-text">Aucune des prestations proposées ici ne dispense d’une visite chez votre médecin.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"pattern-pains__disclaimer-text"} -->
        <p class="pattern-pains__disclaimer-text">Si vous suivez un traitement médical, il doit impérativement être poursuivi. Vous ne devez jamais modifier ou arrêter un traitement en cours sans l’avis de votre médecin.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"pattern-pains__disclaimer-text"} -->
        <p class="pattern-pains__disclaimer-text">Les séances de magnétisme viennent en complément et peuvent faciliter l’action de vos traitements médicaux ou de votre accompagnement psychologique. Elles ne peuvent en aucun cas les remplacer.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
