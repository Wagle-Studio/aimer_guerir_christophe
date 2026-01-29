<?php

// $attributes is provided by the block render callback.
$title_raw       = isset($attributes['title']) ? $attributes['title'] : '';
$text_raw        = isset($attributes['text']) ? $attributes['text'] : '';
$image_id        = isset($attributes['imageId']) ? (int) $attributes['imageId'] : 0;
$primary_label   = isset($attributes['primaryButtonLabel']) ? $attributes['primaryButtonLabel'] : '';
$primary_url     = isset($attributes['primaryButtonUrl']) ? $attributes['primaryButtonUrl'] : '';
$secondary_label = isset($attributes['secondaryButtonLabel']) ? $attributes['secondaryButtonLabel'] : '';
$secondary_url   = isset($attributes['secondaryButtonUrl']) ? $attributes['secondaryButtonUrl'] : '';

$title_has_content = '' !== trim(wp_strip_all_tags($title_raw));
$text_has_content  = '' !== trim(wp_strip_all_tags($text_raw));
$primary_label     = trim($primary_label);
$primary_url       = trim($primary_url);
$secondary_label   = trim($secondary_label);
$secondary_url     = trim($secondary_url);

if (! $title_has_content || ! $text_has_content || ! $image_id || '' === $primary_label || '' === $primary_url) {
	return '';
}

// Force a real URL for front output (avoids relative-only values like "/").
$primary_url = esc_url($primary_url);
if ('' === $primary_url) {
	return '';
}

$secondary_url = esc_url($secondary_url);
$has_secondary = '' !== $secondary_label && '' !== $secondary_url;

$image_html = wp_get_attachment_image(
	$image_id,
	'full',
	false,
	array('class' => 'hero__image')
);

if (! $image_html) {
	return '';
}

ob_start();
?>
<section class="hero">
	<div class="hero__content">
		<h1 class="hero__title"><?php echo wp_kses_post($title_raw); ?></h1>
		<p class="hero__text"><?php echo wp_kses_post($text_raw); ?></p>
		<div class="hero__actions">
			<a class="hero__button hero__button--primary" href="<?php echo $primary_url; ?>">
				<?php echo esc_html($primary_label); ?>
			</a>
			<?php if ($has_secondary) : ?>
				<a class="hero__button hero__button--secondary" href="<?php echo $secondary_url; ?>">
					<?php echo esc_html($secondary_label); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="hero__media">
		<?php echo $image_html; ?>
	</div>
</section>
<?php
return ob_get_clean();
