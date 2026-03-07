<?php
/**
 * Title: À propos de moi
 * Slug: aimer-guerir/about-me
 * Categories: aimer-guerir
 * Post Types: page
 * Keywords: propos, presentation, praticien
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"pattern_about","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern_about">
  <!-- wp:group {"className":"pattern_about__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern_about__wrapper">
    <!-- wp:group {"className":"pattern_about__content","layout":{"type":"default"}} -->
    <div class="wp-block-group pattern_about__content">
      <!-- wp:group {"className":"pattern_about__media","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern_about__media" style="--about-image-ratio: 1 / 1;">
        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"pattern_about__image"} -->
        <figure class="wp-block-image size-full pattern_about__image">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="Portrait du praticien" />
        </figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"pattern_about__text","layout":{"type":"default"}} -->
      <div class="wp-block-group pattern_about__text">
        <!-- wp:group {"className":"pattern_about__header","layout":{"type":"default"}} -->
        <div class="wp-block-group pattern_about__header">
          <!-- wp:heading {"level":2,"className":"pattern_about__header_title"} -->
          <h2 class="pattern_about__header_title">Je suis Christophe Rebours</h2>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"className":"pattern_about__header_subtitle"} -->
          <p class="pattern_about__header_subtitle">Magnétiseur – Coupeur de feu</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:paragraph {"className":"pattern_about__presentation"} -->
        <p class="pattern_about__presentation">Énergies, guérisseurs et rebouteux sont des mots qui ont baigné mon enfance. Aujourd'hui, j'ai décidé de faire bénéficier de mes facultés de transmettre les énergies de guérison au plus grand nombre, enfants et adultes. J'ai choisi d'aider mes patients à se libérer d'un mal qui les encombre. Pour ce faire, J'ai ouvert un cabinet de magnétiseur à Vernon, dans l'Eure, aux portes de la Normandie, à moins d'une heure de Paris, d'Evreux et de Rouen.</p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"pattern_about__subpart","layout":{"type":"default"}} -->
        <div class="wp-block-group pattern_about__subpart">
          <!-- wp:heading {"level":3,"className":"pattern_about__subpart_title"} -->
          <h3 class="pattern_about__subpart_title">Comment je définis le magnétisme</h3>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"className":"pattern_about__subpart_description"} -->
          <p class="pattern_about__subpart_description">Le magnétisme est un travail de transmission d'énergies. Celles-ci se trouvent à l'intérieur de chaque être humain mais également dans notre environnement (nature, eau, lieux, air, animaux, …).<br><br>Les magnétiseurs sont souvent des personnes hyper-sensibles qui ressentent ces énergies, qui sont aptes à déterminer où elles sont en harmonie et où elles sont en disharmonies. En canalisant les flux et en réintroduisant des ondes positives, ils peuvent ainsi apporter un mieux-être à votre corps en rééquilibrant les énergies entre les différentes parties.</p>
          <!-- /wp:paragraph -->

        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
