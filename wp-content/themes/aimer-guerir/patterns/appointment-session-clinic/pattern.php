<?php
/**
 * Title: Rendez-vous — Séance au cabinet
 * Slug: aimer-guerir/appointment-session-clinic
 * Categories: aimer-guerir
 * Keywords: rendez-vous, cabinet, séance, maps
 */
?>
<!-- wp:group {"tagName":"section","anchor":"seance-cabinet","align":"full","className":"appointment-cta__session-band--secondary appointment-cta__session-band--clinic","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull appointment-cta__session-band--secondary appointment-cta__session-band--clinic" id="seance-cabinet">
  <!-- wp:group {"className":"appointment-cta__session","layout":{"type":"default"}} -->
  <div class="wp-block-group appointment-cta__session">
    <!-- wp:group {"className":"appointment-cta__bento","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__bento">

      <!-- wp:group {"className":"appointment-cta__session-content","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__session-content">
        <!-- wp:heading {"level":2,"className":"appointment-cta__session-content__title"} -->
        <h2 class="appointment-cta__session-content__title"><span><?php include get_theme_file_path('assets/icons/hearth.php'); ?></span>Séance au cabinet</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>Prix d'une séance : 50 €</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Accueil au cabinet sur rendez-vous uniquement. Merci d'arriver 5 minutes avant l'horaire prévu pour un échange serein.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Les séances durent environ 30 minutes. Un temps d'échange en début de séance permet d'adapter l'accompagnement.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Règlement en espèces, par carte bancaire ou chèque à l'ordre de « Aimer Guérir »</p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"appointment-cta__session-actions","layout":{"type":"default"}} -->
        <div class="wp-block-group appointment-cta__session-actions">
          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"className":"btn--secondary"} -->
            <div class="wp-block-button btn--secondary">
              <a class="wp-block-button__link btn" href="#">
                Prendre rendez-vous au cabinet
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
        <!-- wp:html -->
        <div class="appointment-cta__map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2612.811945255373!2d1.473684077475943!3d49.09021378436306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6cbc2d9e0c1bb%3A0x66a52c1a90689d22!2s24%20Rue%20de%20l&#39;Horloge%2C%2027200%20Vernon!5e0!3m2!1sfr!2sfr!4v1770993525666!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- /wp:html -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"appointment-cta__session-gallery-row","layout":{"type":"default"}} -->
      <div class="wp-block-group appointment-cta__session-gallery-row">
        <!-- wp:columns {"className":"appointment-cta__session-gallery"} -->
        <div class="wp-block-columns appointment-cta__session-gallery">
          <!-- wp:column {"width":"33.33%","className":"appointment-cta__session-gallery-item"} -->
          <div class="wp-block-column appointment-cta__session-gallery-item" style="flex-basis:33.33%">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"appointment-cta__session-image"} -->
            <figure class="wp-block-image size-large appointment-cta__session-image">
              <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="" />
            </figure>
            <!-- /wp:image -->
          </div>
          <!-- /wp:column -->

          <!-- wp:column {"width":"33.33%","className":"appointment-cta__session-gallery-item"} -->
          <div class="wp-block-column appointment-cta__session-gallery-item" style="flex-basis:33.33%">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"appointment-cta__session-image"} -->
            <figure class="wp-block-image size-large appointment-cta__session-image">
              <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="" />
            </figure>
            <!-- /wp:image -->
          </div>
          <!-- /wp:column -->

          <!-- wp:column {"width":"33.33%","className":"appointment-cta__session-gallery-item"} -->
          <div class="wp-block-column appointment-cta__session-gallery-item" style="flex-basis:33.33%">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"appointment-cta__session-image"} -->
            <figure class="wp-block-image size-large appointment-cta__session-image">
              <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="" />
            </figure>
            <!-- /wp:image -->
          </div>
          <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
