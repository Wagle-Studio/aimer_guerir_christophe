<?php

/**
 * Title: Prendre rendez-vous
 * Slug: aimer-guerir/appointment-cta
 * Categories: aimer-guerir
 * Keywords: rendez-vous, contact, cta
 */
?>
<!-- wp:group {"align":"wide","className":"pattern-appointment-cta","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide pattern-appointment-cta">
  <!-- wp:group {"className":"appointment-cta__header","layout":{"type":"default"}} -->
  <div class="wp-block-group appointment-cta__header">
    <!-- wp:heading {"level":2} -->
    <h1>Horaires d'ouverture du cabinet</h1>
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
      <p>En cas d’urgence, n’hésitez pas à me contacter au 06 95 64 54 76. Je mettrais alors tout en œuvre pour vous recevoir le plus rapidement possible.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"appointment-cta__card","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__card">
      <!-- wp:heading {"level":3} -->
      <h3 class="appointment-cta__card__title"><span><?php include get_theme_file_path('assets/icons/cancel.php'); ?></span>Annulation</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p>Je vous remercie par avance de l’égard que vous porterez sur mon organisation logistique en annulant votre séance au plus tard 48 heures avant votre rendez-vous.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"align":"full","className":"appointment-cta__session-band--secondary appointment-cta__session-band--clinic","layout":{"type":"default"}} -->
  <div class="wp-block-group alignfull appointment-cta__session-band--secondary appointment-cta__session-band--clinic">
    <!-- wp:group {"className":"appointment-cta__session","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__session">
      <!-- wp:columns {"verticalAlignment":"top","className":"appointment-cta__session-columns"} -->
      <div class="wp-block-columns are-vertically-aligned-top appointment-cta__session-columns">
        <!-- wp:column {"verticalAlignment":"top","className":"appointment-cta__session-content"} -->
        <div class="wp-block-column is-vertically-aligned-top appointment-cta__session-content">
          <!-- wp:heading {"level":2,"className":"appointment-cta__session-content__title"} -->
          <h2 class="appointment-cta__session-content__title"><span><?php include get_theme_file_path('assets/icons/hearth.php'); ?></span>Séance au cabinet</h2>
          <!-- /wp:heading -->

          <!-- wp:paragraph -->
          <p>Prix d'une séance : 50 €</p>
          <!-- /wp:paragraph -->

          <!-- wp:paragraph -->
          <p>Accueil au cabinet sur rendez-vous uniquement. Merci d’arriver 5 minutes avant l’horaire prévu pour un échange serein.</p>
          <!-- /wp:paragraph -->

          <!-- wp:paragraph -->
          <p>Les séances durent environ 30 minutes. Un temps d’échange en début de séance permet d’adapter l’accompagnement.</p>
          <!-- /wp:paragraph -->

          <!-- wp:paragraph -->
          <p>Règlement en espèces, par carte bancaire ou chèque à l’ordre de « Aimer Guérir »</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","className":"appointment-cta__session-media"} -->
        <div class="wp-block-column is-vertically-aligned-top appointment-cta__session-media">
          <!-- wp:html -->
          <div class="appointment-cta__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2612.811945255373!2d1.473684077475943!3d49.09021378436306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6cbc2d9e0c1bb%3A0x66a52c1a90689d22!2s24%20Rue%20de%20l&#39;Horloge%2C%2027200%20Vernon!5e0!3m2!1sfr!2sfr!4v1770993525666!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <!-- /wp:html -->
        </div>
        <!-- /wp:column -->
      </div>
      <!-- /wp:columns -->

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

  <!-- wp:group {"align":"full","className":"appointment-cta__session-band--primary","layout":{"type":"default"}} -->
  <div class="wp-block-group alignfull appointment-cta__session-band--primary">
    <!-- wp:group {"className":"appointment-cta__session","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__session">
      <!-- wp:columns {"verticalAlignment":"top","className":"appointment-cta__session-columns"} -->
      <div class="wp-block-columns are-vertically-aligned-top appointment-cta__session-columns">
        <!-- wp:column {"verticalAlignment":"top","className":"appointment-cta__session-content"} -->
        <div class="wp-block-column is-vertically-aligned-top appointment-cta__session-content">
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
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","className":"appointment-cta__session-media"} -->
        <div class="wp-block-column is-vertically-aligned-top appointment-cta__session-media">
          <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"appointment-cta__image"} -->
          <figure class="wp-block-image size-full appointment-cta__image">
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

  <!-- wp:group {"align":"full","className":"appointment-cta__session-band--secondary","layout":{"type":"default"}} -->
  <div class="wp-block-group alignfull appointment-cta__session-band--secondary">
    <!-- wp:group {"className":"appointment-cta__session","layout":{"type":"default"}} -->
    <div class="wp-block-group appointment-cta__session">
      <!-- wp:columns {"verticalAlignment":"top","className":"appointment-cta__session-columns"} -->
      <div class="wp-block-columns are-vertically-aligned-top appointment-cta__session-columns">
        <!-- wp:column {"verticalAlignment":"top","className":"appointment-cta__session-content"} -->
        <div class="wp-block-column is-vertically-aligned-top appointment-cta__session-content">
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
        <p>Je me présenterai à l'heure convenue au domicile du patient. Durée d’une séance : environ 30 minutes</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>Merci de réserver pour le bon déroulement de la séance un espace calme et propre.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","className":"appointment-cta__session-media"} -->
        <div class="wp-block-column is-vertically-aligned-top appointment-cta__session-media">
          <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"appointment-cta__image"} -->
          <figure class="wp-block-image size-full appointment-cta__image">
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
