<?php get_header(); ?>

<main id="main-content">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			?>
			<h1 class="screen-reader-text"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php
		endwhile;
	endif;
	?>
</main>

<?php get_footer(); ?>
