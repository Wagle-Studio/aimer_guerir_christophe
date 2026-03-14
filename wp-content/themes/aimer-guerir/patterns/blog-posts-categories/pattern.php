<?php
/**
 * Title: Articles — Catégories
 * Slug: aimer-guerir/blog-posts-categories
 * Categories: aimer-guerir
 * Post Types: page
 * Keywords: articles, catégories, grille
 */
?>
<!-- wp:group {"tagName":"section", "anchor":"articles", "align":"full","className":"pattern_blog_posts_categories","layout":{"type":"default"}} -->
<section id="articles" class="wp-block-group alignfull pattern_blog_posts_categories">

  <!-- wp:group {"className":"pattern_blog_posts_categories__header","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern_blog_posts_categories__header">

    <!-- wp:heading {"level":2,"className":"pattern_blog_posts_categories__title","textAlign":"center"} -->
    <h2 class="pattern_blog_posts_categories__title has-text-align-center">Articles</h2>
    <!-- /wp:heading -->

  </div>
  <!-- /wp:group -->

  <!-- wp:shortcode -->
  [articles_categories]
  <!-- /wp:shortcode -->

</section>
<!-- /wp:group -->
