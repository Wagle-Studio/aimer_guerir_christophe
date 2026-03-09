<?php get_header(); ?>

<main id="main-content">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
	?>
			<div class="single__back-wrapper">
				<a href="/articles-et-temoignages" class="single__back">← Articles et témoignages</a>
			</div>
			<p class="single__pill">Article</p>
			<h1 class="single__title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
	<?php
		endwhile;
	endif;
	?>
</main>

<?php get_footer(); ?>