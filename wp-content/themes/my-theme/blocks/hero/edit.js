( function( wp ) {
	if ( ! wp || ! wp.blockEditor || ! wp.components || ! wp.element ) {
		return;
	}

	var useBlockProps = wp.blockEditor.useBlockProps;
	var RichText = wp.blockEditor.RichText;
	var MediaUpload = wp.blockEditor.MediaUpload;
	var MediaUploadCheck = wp.blockEditor.MediaUploadCheck;
	var InspectorControls = wp.blockEditor.InspectorControls;

	var PanelBody = wp.components.PanelBody;
	var TextControl = wp.components.TextControl;
	var Button = wp.components.Button;
	var Notice = wp.components.Notice;

	var Fragment = wp.element.Fragment;
	var el = wp.element.createElement;

	function HeroEdit( props ) {
		var attributes = props.attributes;
		var setAttributes = props.setAttributes;

		var title = attributes.title || '';
		var text = attributes.text || '';
		var imageId = attributes.imageId || 0;
		var primaryButtonLabel = attributes.primaryButtonLabel || '';
		var primaryButtonUrl = attributes.primaryButtonUrl || '';
		var secondaryButtonLabel = attributes.secondaryButtonLabel || '';
		var secondaryButtonUrl = attributes.secondaryButtonUrl || '';

		var isIncomplete =
			! title ||
			! text ||
			! imageId ||
			! primaryButtonLabel ||
			! primaryButtonUrl;

		var blockProps = useBlockProps( {
			className: isIncomplete ? 'hero hero--incomplete' : 'hero'
		} );

		// A minimal, non-WYSIWYG preview on the canvas
		var preview = el(
			'div',
			{ className: 'hero__editor-preview' },
			el( 'strong', null, 'Hero' ),
			el(
				'div',
				{ className: 'hero__editor-summary' },
				el( 'div', null, title ? 'Titre : OK' : 'Titre : manquant' ),
				el( 'div', null, text ? 'Texte : OK' : 'Texte : manquant' ),
				el( 'div', null, imageId ? 'Image : OK' : 'Image : manquante' ),
				el(
					'div',
					null,
					primaryButtonLabel && primaryButtonUrl
						? 'Bouton principal : OK'
						: 'Bouton principal : manquant'
				),
				el(
					'div',
					null,
					secondaryButtonLabel && secondaryButtonUrl
						? 'Bouton secondaire : OK'
						: 'Bouton secondaire : optionnel'
				)
			)
		);

		var sidebar = el(
			InspectorControls,
			null,
			el(
				PanelBody,
				{ title: 'Hero', initialOpen: true },
				isIncomplete &&
					el( Notice, { status: 'warning', isDismissible: false }, 'Champs obligatoires manquants.' ),

				// Title / text as RichText is fine, but in the sidebar it’s less confusing
				el( RichText, {
					tagName: 'div',
					value: title,
					onChange: function( value ) {
						setAttributes( { title: value } );
					},
					placeholder: 'Titre (obligatoire)',
					allowedFormats: []
				} ),
				el( RichText, {
					tagName: 'div',
					value: text,
					onChange: function( value ) {
						setAttributes( { text: value } );
					},
					placeholder: 'Texte court (obligatoire)',
					allowedFormats: []
				} ),

				el( 'hr', null ),

				el( TextControl, {
					label: 'Bouton principal - libellé (obligatoire)',
					value: primaryButtonLabel,
					onChange: function( value ) {
						setAttributes( { primaryButtonLabel: value } );
					}
				} ),
				el( TextControl, {
					label: 'Bouton principal - URL (obligatoire)',
					value: primaryButtonUrl,
					type: 'url',
					onChange: function( value ) {
						setAttributes( { primaryButtonUrl: value } );
					}
				} ),

				el( 'hr', null ),

				el( TextControl, {
					label: 'Bouton secondaire - libellé (optionnel)',
					value: secondaryButtonLabel,
					onChange: function( value ) {
						setAttributes( { secondaryButtonLabel: value } );
					}
				} ),
				el( TextControl, {
					label: 'Bouton secondaire - URL (optionnel)',
					value: secondaryButtonUrl,
					type: 'url',
					onChange: function( value ) {
						setAttributes( { secondaryButtonUrl: value } );
					}
				} ),

				el( 'hr', null ),

				el(
					'div',
					{ style: { marginTop: '8px' } },
					el(
						'div',
						{ style: { marginBottom: '8px', fontWeight: '600' } },
						'Image (obligatoire)'
					),
					el(
						MediaUploadCheck,
						null,
						el( MediaUpload, {
							onSelect: function( media ) {
								if ( media && media.id ) {
									setAttributes( { imageId: media.id } );
								}
							},
							allowedTypes: [ 'image' ],
							value: imageId,
							render: function( obj ) {
								return el(
									Fragment,
									null,
									el(
										Button,
										{ onClick: obj.open, variant: 'secondary' },
										imageId ? 'Remplacer l’image' : 'Choisir une image'
									),
									el(
										'div',
										{ style: { marginTop: '6px', fontSize: '12px', opacity: 0.8 } },
										imageId ? 'Image sélectionnée' : 'Aucune image sélectionnée'
									)
								);
							}
						} )
					)
				)
			)
		);

		return el( Fragment, null, sidebar, el( 'div', blockProps, preview ) );
	}

	window.MyThemeHeroEdit = HeroEdit;
} )( window.wp );
