<?php

function my_theme_register_blocks() {
	$blocks_dir = get_theme_file_path( '/blocks' );
	if ( ! is_dir( $blocks_dir ) ) {
		return;
	}

	$block_json_files = glob( $blocks_dir . '/*/block.json' );
	if ( empty( $block_json_files ) ) {
		return;
	}

	sort( $block_json_files );

	foreach ( $block_json_files as $block_json ) {
		$block_dir   = dirname( $block_json );
		$render_file = $block_dir . '/render.php';

		$args = [];

		// If a render.php exists next to block.json, we make it a dynamic block for sure.
		if ( file_exists( $render_file ) ) {
			$args['render_callback'] = function( $attributes = [], $content = '', $block = null ) use ( $render_file ) {
				// render.php returns a string (your current implementation already does).
				$attributes = is_array( $attributes ) ? $attributes : [];
				return (string) require $render_file;
			};
		}

		register_block_type( $block_dir, $args );
	}
}
add_action( 'init', 'my_theme_register_blocks' );

function my_theme_enqueue_assets() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	wp_enqueue_style(
		'my-theme-main',
		get_theme_file_uri( '/assets/css/main.css' ),
		[],
		$version
	);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_assets' );
