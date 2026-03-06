<?php
/**
 * Title: Rendez-vous — Séance à distance
 * Slug: aimer-guerir/appointment-session-distance
 * Categories: aimer-guerir
 * Keywords: rendez-vous, distance, séance
 */
?>
<!-- wp:group {"tagName":"section","anchor":"seance-distance","align":"full","className":"appointment-cta__session-band--primary appointment-cta__session-band--distance","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull appointment-cta__session-band--primary appointment-cta__session-band--distance" id="seance-distance">
  <!-- wp:group {"className":"appointment-cta__session","layout":{"type":"default"}} -->
  <div class="wp-block-group appointment-cta__session">
    <!-- wp:group {"className":"appointment-cta__bento","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__bento">

      <!-- wp:group {"className":"appointment-cta__session-content","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__session-content">
        <!-- wp:heading {"level":2,"className":"appointment-cta__session-content__title"} -->
        <h2 class="appointment-cta__session-content__title"><span><?php include get_theme_file_path('assets/icons/remote.php'); ?></span>Séance à distance</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>Prix d'une séance : 50 €</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Je vous remercie de m'adresser à l'adresse email contact@aimerguerir.com une photo de votre visage (sans lunettes de soleil) afin que je puisse me connecter à votre champ énergétique.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>A l'heure convenue, je vous contacterai par téléphone afin que vous m'exposiez votre problématique. Puis, je réaliserai le travail énergétique nécessaire. Préparer un kit main libre si vous utilisez un portable.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Le paiement s'effectue par carte bancaire AVANT la séance. Une séance non réglée ne peut être honorée.</p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"appointment-cta__session-actions","layout":{"type":"default"}} -->
        <div class="wp-block-group appointment-cta__session-actions">
          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"className":"btn--secondary"} -->
            <div class="wp-block-button btn--secondary">
              <a class="wp-block-button__link btn" href="#">
                Prendre rendez-vous à distance
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
