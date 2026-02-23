<?php
/**
 * Title: À propos
 * Slug: my-theme/about
 * Categories: my-theme
 * Keywords: propos, presentation, praticienne
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"about pattern-about","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull about pattern-about">
  <!-- wp:group {"className":"about__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group about__wrapper">
    <!-- wp:group {"className":"about__content","layout":{"type":"default"}} -->
    <div class="wp-block-group about__content">
      <!-- wp:group {"className":"content__media","layout":{"type":"default"}} -->
      <div class="wp-block-group content__media" style="--about-image-ratio: 1 / 1;">
        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"about__image"} -->
        <figure class="wp-block-image size-full about__image">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="Portrait de la praticienne" />
        </figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"content__wrapper","layout":{"type":"default"}} -->
      <div class="wp-block-group content__wrapper">
        <!-- wp:group {"className":"content__header","layout":{"type":"default"}} -->
        <div class="wp-block-group content__header">
          <!-- wp:heading {"level":2,"className":"header__title"} -->
          <h1 class="header__title">Je suis Christophe Rebours</h1>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"className":"header__subtitle"} -->
          <p class="header__subtitle">Magnétiseur - énergéticien à Vernon</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:paragraph {"className":"about__presentation"} -->
        <p class="about__presentation">Énergies, guérisseurs et rebouteux sont des mots qui ont baigné mon enfance. Aujourd’hui, j’ai décidé de faire bénéficier de mes facultés de transmettre les énergies de guérison au plus grand nombre, enfants et adultes. J’ai choisi d’aider mes patients à se libérer d’un mal qui les encombre. Pour ce faire, J’ai ouvert un cabinet de magnétiseur à Vernon, dans l’Eure, aux portes de la Normandie, à moins d’une heure de Paris, d’Evreux et de Rouen.</p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"about__subpart","layout":{"type":"default"}} -->
        <div class="wp-block-group about__subpart">
          <!-- wp:heading {"level":3,"className":"about__subpart_title"} -->
          <h3 class="about__subpart_title">Comment je définis le magnétisme</h3>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"className":"about__subpart_description"} -->
          <p class="about__subpart_description">Le magnétisme est un travail de transmission d’énergies. Celles-ci se trouvent à l’intérieur de chaque être humain mais également dans notre environnement (nature, eau, lieux, air, animaux, …).<br><br>Les magnétiseurs sont souvent des personnes hyper-sensibles qui ressentent ces énergies, qui sont aptes à déterminer où elles sont en harmonie et où elles sont en disharmonies. En canalisant les flux et en réintroduisant des ondes positives, ils peuvent ainsi apporter un mieux-être à votre corps en rééquilibrant les énergies entre les différentes parties.</p>
          <!-- /wp:paragraph -->

          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button -->
            <div class="wp-block-button">
              <a class="wp-block-button__link btn btn--primary btn--icon" href="#">
                Prendre rendez-vous
                <?php include get_theme_file_path('assets/icons/arrow-right.php'); ?>
              </a>
            </div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
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
