<?php
$term     = get_queried_object();
$image_id = (int) get_term_meta($term->term_id, '_temoignage_cat_image_id', true);

get_header();
?>

<main id="main-content">

	<section class="temoignages-tax-archive">

		<div class="temoignages-tax-archive__back-wrapper">
			<a href="/articles-et-temoignages#temoignages" class="temoignages-tax-archive__back">
				← Toutes les catégories
			</a>
		</div>

		<header class="temoignages-tax-archive__header">
			<?php if ($image_id) : ?>
				<div class="temoignages-tax-archive__header-image">
					<img
						src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'large')); ?>"
						alt="<?php echo esc_attr($term->name); ?>"
					>
				</div>
			<?php endif; ?>
			<div class="temoignages-tax-archive__header-content">
				<h1 class="temoignages-tax-archive__title"><?php echo esc_html($term->name); ?></h1>
				<?php if ($term->description) : ?>
					<p class="temoignages-tax-archive__description"><?php echo esc_html($term->description); ?></p>
				<?php endif; ?>
			</div>
		</header>

		<div class="temoignages-tax-archive__wrapper">
			<?php if (have_posts()) : ?>
				<div class="temoignages-tax-list">
					<?php while (have_posts()) : the_post(); ?>
						<div class="temoignages-tax-card">
							<div class="temoignages-tax-card__image<?php echo has_post_thumbnail() ? '' : ' temoignages-tax-card__image--placeholder'; ?>">
								<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('medium'); ?>
								<?php endif; ?>
							</div>
							<div class="temoignages-tax-card__body">
								<p class="temoignages-tax-card__texte"><?php echo esc_html(get_post_meta(get_the_ID(), '_temoignage_texte', true)); ?></p>
								<p class="temoignages-tax-card__nom">— <?php the_title(); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p class="temoignages-tax-archive__empty">Aucun témoignage dans cette catégorie pour le moment.</p>
			<?php endif; ?>
		</div>

	</section>

</main>

<?php get_footer(); ?>
