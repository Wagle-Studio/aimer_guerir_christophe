<?php get_header(); ?>

<main id="main-content">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
	?>
			<div class="single__back-wrapper">
				<?php
				$categories = get_the_category();
				if ($categories) {
					$cat        = $categories[0];
					$back_url   = get_category_link($cat->term_id);
					$back_label = $cat->name;
				} else {
					$back_url   = '/articles-et-temoignages#articles';
					$back_label = 'Articles';
				}
				?>
				<a href="<?php echo esc_url($back_url); ?>" class="single__back">← <?php echo esc_html($back_label); ?></a>
			</div>
				<p class="single__pill">Article</p>
			</div>
			<h1 class="single__title"><?php the_title(); ?></h1>
			<div class="single__meta">
				<span class="single__meta-author">Par <a href="<?php echo esc_url(home_url('/qui-je-suis/')); ?>">Christophe Rebours</a></span>
				<span class="single__meta-separator" aria-hidden="true">·</span>
				<time class="single__meta-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('j F Y')); ?></time>
			</div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
	<?php
		endwhile;
	endif;
	?>
</main>

<?php get_footer(); ?>