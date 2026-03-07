<?php

/**
 * Title: Newsletter CTA
 * Slug: aimer-guerir/newsletter-cta
 * Categories: aimer-guerir
 * Keywords: newsletter, inscription, formulaire
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"pattern-newsletter","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern-newsletter">
  <!-- wp:group {"className":"newsletter__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group newsletter__wrapper">
    <!-- wp:heading {"level":2,"className":"newsletter__title"} -->
    <h2 class="newsletter__title">Inscription à la newsletter Aimer Guérir</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"className":"newsletter__header","layout":{"type":"default"}} -->
    <div class="wp-block-group newsletter__header">
      <!-- wp:paragraph {"className":"newsletter__subtitle"} -->
      <p class="newsletter__subtitle">Recevez nos conseils et actualités directement dans votre boîte mail.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"className":"newsletter__subtitle"} -->
      <p class="newsletter__subtitle">Un seul email par mois, sans publicité ni communication promotionnelle.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:html -->
    <form class="newsletter__form" action="#" method="post">
      <div class="newsletter__field">
        <label class="newsletter__label" for="newsletter-firstname">Prénom</label>
        <input class="newsletter__input" type="text" id="newsletter-firstname" name="firstname" placeholder="ex : Marie" autocomplete="given-name" required>
      </div>
      <div class="newsletter__field">
        <label class="newsletter__label" for="newsletter-name">Nom</label>
        <input class="newsletter__input" type="text" id="newsletter-name" name="name" placeholder="ex : Dupont" autocomplete="family-name" required>
      </div>
      <div class="newsletter__field">
        <label class="newsletter__label" for="newsletter-email">Email</label>
        <input class="newsletter__input" type="email" id="newsletter-email" name="email" placeholder="ex : marie@exemple.fr" autocomplete="email" required>
      </div>
      <button class="newsletter__btn btn btn--thirdary" type="submit">
        S'inscrire
      </button>
    </form>
    <!-- /wp:html -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
