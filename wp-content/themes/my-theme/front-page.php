<?php get_header(); ?>

<main>
	<?php
	$title = get_theme_mod('my_theme_hero_title', '');
	$text  = get_theme_mod('my_theme_hero_text', '');
	$image_id = (int) get_theme_mod('my_theme_hero_image_id', 0);

	$primary_label = get_theme_mod('my_theme_hero_primary_label', '');
	$primary_url   = get_theme_mod('my_theme_hero_primary_url', '');

	$secondary_label = get_theme_mod('my_theme_hero_secondary_label', '');
	$secondary_url   = get_theme_mod('my_theme_hero_secondary_url', '');

	// Reuse your existing hero markup rules
	$attributes = [
		'title' => $title,
		'text' => $text,
		'imageId' => $image_id,
		'primaryButtonLabel' => $primary_label,
		'primaryButtonUrl' => $primary_url,
		'secondaryButtonLabel' => $secondary_label,
		'secondaryButtonUrl' => $secondary_url,
	];

	echo (string) require get_theme_file_path('/blocks/hero/render.php');
	?>
</main>

<?php get_footer(); ?>