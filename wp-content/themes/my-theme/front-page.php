<?php get_header(); ?>

<main id="main-content">
	<?php
	$render = function (string $path): void {
		$out = require get_theme_file_path($path);
		echo "\n<!-- $path => " . gettype($out) . " : " . (is_scalar($out) ? $out : '') . " -->\n";
		if (is_string($out) && $out !== '') {
			echo $out;
		}
	};

	$render('/blocks/hero/render.php');
	$render('/blocks/pains/render.php');
	$render('/blocks/therapeutic-support/render.php');
	$render('/blocks/services/render.php');
	$render('/blocks/cta/render.php');
	$render('/blocks/about/render.php');
	$render('/blocks/testimonials/render.php');
	$render('/blocks/choose-practitioner/render.php');
	$render('/blocks/newsletter/render.php');
	?>
</main>

<?php get_footer(); ?>
