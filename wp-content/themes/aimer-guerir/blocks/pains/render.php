<?php

$title_raw       = get_theme_mod('aimer_guerir_pains_title', '');
$raw_items       = get_theme_mod('aimer_guerir_pains_items', '');
$image_id        = (int) get_theme_mod('aimer_guerir_pains_image_id', 0);
$tag_line_raw    = get_theme_mod('aimer_guerir_pains_tag_line', '');
$primary_label   = get_theme_mod('aimer_guerir_pains_primary_label', '');
$primary_url     = get_theme_mod('aimer_guerir_pains_primary_url', '');
$secondary_label = get_theme_mod('aimer_guerir_pains_secondary_label', '');
$secondary_url   = get_theme_mod('aimer_guerir_pains_secondary_url', '');

$title_has_content    = '' !== trim(wp_strip_all_tags($title_raw));
$tag_line_has_content = '' !== trim(wp_strip_all_tags($tag_line_raw));
$primary_label        = trim($primary_label);
$primary_url          = esc_url(trim($primary_url));
$secondary_label      = trim($secondary_label);
$secondary_url        = esc_url(trim($secondary_url));

$items = preg_split("/\r\n|\n|\r/", (string) $raw_items);
$items = array_map('trim', $items);
$items = array_values(array_filter($items, fn($v) => $v !== ''));

if (
	! $title_has_content ||
	! $title_has_content ||
	count($items) === 0 ||
	! $image_id ||
	'' === $primary_label ||
	'' === $primary_url ||
	'' === $secondary_label ||
	'' === $secondary_url
) {
	return '';
}

$image_meta = wp_get_attachment_metadata($image_id);
$ratio_style = '';
if (! empty($image_meta['width']) && ! empty($image_meta['height'])) {
	$ratio_style = sprintf(
		' style="--pains-image-ratio: %d / %d;"',
		(int) $image_meta['width'],
		(int) $image_meta['height']
	);
}

$image_html = wp_get_attachment_image(
	$image_id,
	'full',
	false,
	array(
		'class' => 'pains__image',
		'sizes' => '(max-width: 767px) 360px, 300px',
	)
);

if (! $image_html) {
	return '';
}

ob_start();
?>
<section class="pains">
	<div class="pains__wrapper">
		<div class="pains__content">
			<h2 class="pains_content_title"><?php echo wp_kses_post($title_raw); ?></h2>
			<ul class="pains_content_list">
				<?php foreach ($items as $item) : ?>
					<li class="pains__item">
						<?php include get_theme_file_path('assets/icons/check.php'); ?>
						<?php echo esc_html($item); ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="pains_content_actions">
				<p class="pains__actions-tagline"><?php echo wp_kses_post($tag_line_raw); ?></p>
				<div class="pains_actions_btns">
					<a class="btn btn--primary" href="<?php echo $primary_url; ?>">
						<?php echo esc_html($primary_label); ?>
					</a>
					<?php if ($secondary_label && $secondary_url) : ?>
						<a class="btn btn--secondary" href="<?php echo $secondary_url; ?>">
							<?php echo esc_html($secondary_label); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="pains__media" <?php echo $ratio_style; ?>>
			<?php echo $image_html; ?>
		</div>
	</div>
</section>
<?php
return ob_get_clean();
