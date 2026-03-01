<?php

/**
 * Title: Newsletter
 * Slug: my-theme/newsletter
 * Categories: my-theme
 * Keywords: newsletter, inscription, formulaire
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"newsletter pattern-newsletter","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull newsletter pattern-newsletter">
  <!-- wp:group {"className":"newsletter__wrapper","layout":{"type":"constrained"}} -->
  <div class="wp-block-group newsletter__wrapper">
    <!-- wp:heading {"level":2,"className":"newsletter__title"} -->
    <h2 class="newsletter__title">Inscription a la newsletter Aimer Guérir</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"className":"newsletter__header","layout":{"type":"default"}} -->
    <div class="wp-block-group newsletter__header">
      <!-- wp:paragraph {"className":"newsletter__subtitle"} -->
      <p class="newsletter__subtitle">Recevez nos conseils et actualites directement dans votre boite mail.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"className":"newsletter__subtitle"} -->
      <p class="newsletter__subtitle">Un seul email par mois, sans publicite ni communication promotionnelle.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:html -->
    <form class="newsletter__form" action="#" method="post">
      <div class="newsletter__field">
        <label class="newsletter__label" for="newsletter-name">Nom</label>
        <input class="newsletter__input" type="text" id="newsletter-name" name="name" placeholder="Nom" autocomplete="name">
      </div>
      <div class="newsletter__field">
        <label class="newsletter__label" for="newsletter-email">Email</label>
        <input class="newsletter__input" type="email" id="newsletter-email" name="email" placeholder="Email" autocomplete="email">
      </div>
      <div class="newsletter__field">
        <label class="newsletter__label" for="newsletter-phone">Telephone</label>
        <input class="newsletter__input" type="tel" id="newsletter-phone" name="phone" placeholder="Telephone" autocomplete="tel">
      </div>
      <button class="newsletter__btn btn btn--secondary" type="submit">
        S'inscrire
      </button>
    </form>
    <!-- /wp:html -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
