<?php
$term     = get_queried_object();
$image_id = (int) get_term_meta($term->term_id, '_article_cat_image_id', true);

get_header();
?>

<main id="main-content">

	<section class="articles-cat-archive">

		<div class="articles-cat-archive__back-wrapper">
			<a href="/articles-et-temoignages#articles" class="articles-cat-archive__back">
				← Toutes les catégories
			</a>
		</div>

		<header class="articles-cat-archive__header">
			<?php if ($image_id) : ?>
				<div class="articles-cat-archive__header-image">
					<img
						src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'large')); ?>"
						alt="<?php echo esc_attr($term->name); ?>"
					>
				</div>
			<?php endif; ?>
			<div class="articles-cat-archive__header-content">
				<h1 class="articles-cat-archive__title"><?php echo esc_html($term->name); ?></h1>
				<?php if ($term->description) : ?>
					<p class="articles-cat-archive__description"><?php echo esc_html($term->description); ?></p>
				<?php endif; ?>
			</div>
		</header>

		<div class="articles-cat-archive__wrapper">
			<?php if (have_posts()) : ?>
				<div class="articles-cat-list">
					<?php while (have_posts()) : the_post(); ?>
						<article class="articles-cat-card">
							<div class="articles-cat-card__image<?php echo has_post_thumbnail() ? '' : ' articles-cat-card__image--placeholder'; ?>">
								<?php if (has_post_thumbnail()) : ?>
									<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
										<?php the_post_thumbnail('medium_large'); ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="articles-cat-card__body">
								<h2 class="articles-cat-card__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<time class="articles-cat-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
									<?php echo esc_html(get_the_date('j F Y')); ?>
								</time>
								<p class="articles-cat-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20, '…'); ?></p>
								<a href="<?php the_permalink(); ?>" class="articles-cat-card__btn btn btn--primary">
									Lire l'article
								</a>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
				<?php the_posts_pagination(['mid_size' => 2]); ?>
			<?php else : ?>
				<p class="articles-cat-archive__empty">Aucun article dans cette catégorie pour le moment.</p>
			<?php endif; ?>
		</div>

	</section>

</main>

<?php get_footer(); ?>
