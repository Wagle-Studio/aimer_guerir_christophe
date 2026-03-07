<?php
/**
 * Title: Rendez-vous — Séance à domicile
 * Slug: aimer-guerir/appointment-session-home
 * Categories: aimer-guerir
 * Post Types: page
 * Keywords: rendez-vous, domicile, séance
 */
?>
<!-- wp:group {"tagName":"section","anchor":"seance-domicile","align":"full","className":"appointment-cta__session-band--secondary appointment-cta__session-band--home","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull appointment-cta__session-band--secondary appointment-cta__session-band--home" id="seance-domicile">
  <!-- wp:group {"className":"appointment-cta__session","layout":{"type":"default"}} -->
  <div class="wp-block-group appointment-cta__session">
    <!-- wp:group {"className":"appointment-cta__bento","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__bento">

      <!-- wp:group {"className":"appointment-cta__session-content","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__session-content">
        <!-- wp:heading {"level":2,"className":"appointment-cta__session-content__title"} -->
        <h2 class="appointment-cta__session-content__title"><span><?php include get_theme_file_path('assets/icons/home-visit.php'); ?></span>Séance à domicile</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>Prix d'une séance : 70 €</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Je me déplace uniquement sur la Commune de Vernon pour les personnes ne pouvant pas venir au cabinet. Réservations par téléphone au 06 95 64 54 76.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Le paiement peut se faire en espèces ou par chèque à l'ordre de "AIMER GUÉRIR"</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Je me présenterai à l'heure convenue au domicile du patient. Durée d'une séance : environ 30 minutes</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Merci de réserver pour le bon déroulement de la séance un espace calme et propre.</p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"appointment-cta__session-actions","layout":{"type":"default"}} -->
        <div class="wp-block-group appointment-cta__session-actions">
          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"className":"btn--secondary"} -->
            <div class="wp-block-button btn--secondary">
              <a class="wp-block-button__link btn" href="#">
                Réserver une séance à domicile
              </a>
            </div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"appointment-cta__session-media","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__session-media">
        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"appointment-cta__session-image"} -->
        <figure class="wp-block-image size-full appointment-cta__session-image">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="" />
        </figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
