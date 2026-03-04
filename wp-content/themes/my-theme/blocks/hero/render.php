<?php

$title_raw        = get_theme_mod('my_theme_hero_title', '');
$sub_title_raw    = get_theme_mod('my_theme_hero_sub_title', '');
$introduction_raw = get_theme_mod('my_theme_hero_introduction', '');
$image_id         = (int) get_theme_mod('my_theme_hero_image_id', 0);
$primary_label    = get_theme_mod('my_theme_hero_primary_label', '');
$primary_url      = get_theme_mod('my_theme_hero_primary_url', '');
$secondary_label  = get_theme_mod('my_theme_hero_secondary_label', '');
$secondary_url    = get_theme_mod('my_theme_hero_secondary_url', '');

$title_has_content         = '' !== trim(wp_strip_all_tags($title_raw));
$sub_title_has_content     = '' !== trim(wp_strip_all_tags($sub_title_raw));
$introduction_has_content  = '' !== trim(wp_strip_all_tags($introduction_raw));
$primary_label             = trim($primary_label);
$primary_url               = trim($primary_url);
$secondary_label           = trim($secondary_label);
$secondary_url             = trim($secondary_url);

if (
	! $title_has_content ||
	! $sub_title_has_content ||
	! $introduction_has_content ||
	! $image_id ||
	'' === $primary_label ||
	'' === $primary_url
) {
	return '';
}

$introduction_html = wpautop(wp_kses_post($introduction_raw));

$primary_url = esc_url($primary_url);
if ('' === $primary_url) {
	return '';
}

$secondary_url = esc_url($secondary_url);
$has_secondary = '' !== $secondary_label && '' !== $secondary_url;

$image_meta = wp_get_attachment_metadata($image_id);
$ratio_style = '';
if (! empty($image_meta['width']) && ! empty($image_meta['height'])) {
	$ratio_style = sprintf(
		' style="--hero-image-ratio: %d / %d;"',
		(int) $image_meta['width'],
		(int) $image_meta['height']
	);
}

$image_html = wp_get_attachment_image(
	$image_id,
	'full',
	false,
	array(
		'class' => 'hero_identity_image',
		'sizes' => '(max-width: 767px) 360px, 300px',
	)
);

if (! $image_html) {
	return '';
}

ob_start();
?>
<section class="hero">
	<div class="hero__wrapper">
		<div class="hero__content">
			<div class="hero__header">
				<h1 class="header__title"><?php echo wp_kses_post($title_raw); ?></h1>
				<h2 class="hero_header_subtitle"><?php echo wp_kses_post($sub_title_raw); ?></h2>
			</div>
			<div class="hero__intro"><?php echo $introduction_html; ?></div>
			<div class="hero__actions">
				<a class="btn btn--primary" href="<?php echo $primary_url; ?>">
					<?php echo esc_html($primary_label); ?>
				</a>
				<?php if ($has_secondary) : ?>
					<a class="btn btn--secondary" href="<?php echo $secondary_url; ?>">
						<?php echo esc_html($secondary_label); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="hero__identity">
			<div class="hero_identity_media" <?php echo $ratio_style; ?>>
				<?php echo $image_html; ?>
			</div>
		</div>
	</div>
</section>
<?php
return ob_get_clean();
