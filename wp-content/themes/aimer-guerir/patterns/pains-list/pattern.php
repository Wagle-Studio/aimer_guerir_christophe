<?php

/**
 * Title: Douleurs — Liste
 * Slug: aimer-guerir/pains-list
 * Categories: aimer-guerir
 * Post Types: page
 * Keywords: douleurs, liste, disclaimer
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"pattern-pains","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern-pains">
  <!-- wp:group {"className":"pattern-pains__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern-pains__wrapper">
    <!-- wp:heading {"level":2,"className":"pattern-pains__title"} -->
    <h2 class="pattern-pains__title">Les douleurs que je peux soulager</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"className":"pattern-pains__bento","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern-pains__bento">

      <!-- wp:group {"className":"pattern-pains__media","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains__media">
        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"pattern-pains__image"} -->
        <figure class="wp-block-image size-full pattern-pains__image">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="Illustration apaisante" />
        </figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"pattern-pains__list-card","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains__list-card">
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

      <!-- wp:group {"className":"pattern-pains__disclaimer","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern-pains__disclaimer">
        <!-- wp:paragraph {"className":"pattern-pains__disclaimer-text"} -->
        <p class="pattern-pains__disclaimer-text">Aucune des prestations proposées ici ne dispense d'une visite chez votre médecin.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"pattern-pains__disclaimer-text"} -->
        <p class="pattern-pains__disclaimer-text">Si vous suivez un traitement médical, il doit impérativement être poursuivi. Vous ne devez jamais modifier ou arrêter un traitement en cours sans l'avis de votre médecin.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"pattern-pains__disclaimer-text"} -->
        <p class="pattern-pains__disclaimer-text">Les séances de magnétisme viennent en complément et peuvent faciliter l'action de vos traitements médicaux ou de votre accompagnement psychologique. Elles ne peuvent en aucun cas les remplacer.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons" style="justify-content:center;">
      <!-- wp:button -->
      <div class="wp-block-button">
        <a class="wp-block-button__link btn btn--primary btn--icon" href="#">Voir la foire aux questions</a>
      </div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->

  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
