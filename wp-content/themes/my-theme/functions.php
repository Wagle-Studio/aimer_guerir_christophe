<?php

require_once get_theme_file_path( '/inc/blocks/blocks.php' );

function my_theme_setup() {
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'assets/css/main.css' ) );
}
add_action( 'after_setup_theme', 'my_theme_setup' );
