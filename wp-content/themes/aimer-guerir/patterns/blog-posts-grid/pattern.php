<?php
/**
 * Title: Articles — Grille
 * Slug: aimer-guerir/blog-posts-grid
 * Categories: aimer-guerir
 * Keywords: articles, blog, grille, liste
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"pattern_blog_posts_grid","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern_blog_posts_grid">
  <!-- wp:group {"className":"pattern_blog_posts_grid__header","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern_blog_posts_grid__header">

    <!-- wp:heading {"level":2,"className":"pattern_blog_posts_grid__title","textAlign":"center"} -->
    <h2 class="pattern_blog_posts_grid__title has-text-align-center">Tous les articles</h2>
    <!-- /wp:heading -->

  </div>
  <!-- /wp:group -->

  <!-- wp:group {"className":"pattern_blog_posts_grid__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern_blog_posts_grid__wrapper">

    <!-- wp:query {"queryId":0,"query":{"perPage":100,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query">

      <!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:post-featured-image {"isLink":true,"className":"pattern_blog_posts_grid__card_image"} /-->
        <!-- wp:group {"className":"pattern_blog_posts_grid__card_body","layout":{"type":"default"}} -->
        <div class="wp-block-group pattern_blog_posts_grid__card_body">
          <!-- wp:post-title {"isLink":true,"level":3,"className":"pattern_blog_posts_grid__card_title"} /-->
          <!-- wp:post-excerpt {"moreText":"","excerptLength":25,"className":"pattern_blog_posts_grid__card_excerpt"} /-->
          <!-- wp:read-more {"content":"Lire l\u2019article \u2192","className":"pattern_blog_posts_grid__card_link"} /-->
        </div>
        <!-- /wp:group -->
      <!-- /wp:post-template -->

      <!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p>Aucun article publié pour le moment.</p>
        <!-- /wp:paragraph -->
      <!-- /wp:query-no-results -->

    </div>
    <!-- /wp:query -->

  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
