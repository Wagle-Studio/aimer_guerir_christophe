( function( wp ) {
	if ( ! wp || ! wp.blocks ) {
		return;
	}

	var registerBlockType = wp.blocks.registerBlockType;

	registerBlockType( 'my-theme/hero', {
		edit: window.MyThemeHeroEdit,
		save: function() {
			return null;
		}
	} );
} )( window.wp );
