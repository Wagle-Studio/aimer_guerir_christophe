( function( wp ) {
	if ( ! wp || ! wp.blockEditor || ! wp.components || ! wp.element ) {
		return;
	}

	var useBlockProps = wp.blockEditor.useBlockProps;
	var RichText = wp.blockEditor.RichText;
	var MediaUpload = wp.blockEditor.MediaUpload;
	var MediaUploadCheck = wp.blockEditor.MediaUploadCheck;
	var TextControl = wp.components.TextControl;
	var Button = wp.components.Button;
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

		var isIncomplete = ! title || ! text || ! imageId || ! primaryButtonLabel || ! primaryButtonUrl;

		var blockProps = useBlockProps( {
			className: isIncomplete ? 'hero hero--incomplete' : 'hero'
		} );

		return el(
			'div',
			blockProps,
			el(
				'div',
				{ className: 'hero__content' },
				el( RichText, {
					tagName: 'h1',
					className: 'hero__title',
					value: title,
					onChange: function( value ) {
						setAttributes( { title: value } );
					},
					placeholder: 'Hero title',
					allowedFormats: []
				} ),
				el( RichText, {
					tagName: 'p',
					className: 'hero__text',
					value: text,
					onChange: function( value ) {
						setAttributes( { text: value } );
					},
					placeholder: 'Hero text',
					allowedFormats: []
				} ),
				el(
					'div',
					{ className: 'hero__actions' },
					el( TextControl, {
						label: 'Primary button label',
						value: primaryButtonLabel,
						onChange: function( value ) {
							setAttributes( { primaryButtonLabel: value } );
						}
					} ),
					el( TextControl, {
						label: 'Primary button URL',
						value: primaryButtonUrl,
						onChange: function( value ) {
							setAttributes( { primaryButtonUrl: value } );
						},
						type: 'url'
					} ),
					el( TextControl, {
						label: 'Secondary button label (optional)',
						value: secondaryButtonLabel,
						onChange: function( value ) {
							setAttributes( { secondaryButtonLabel: value } );
						}
					} ),
					el( TextControl, {
						label: 'Secondary button URL (optional)',
						value: secondaryButtonUrl,
						onChange: function( value ) {
							setAttributes( { secondaryButtonUrl: value } );
						},
						type: 'url'
					} )
				),
				isIncomplete &&
					el( 'p', { className: 'hero__notice' }, 'Missing required fields.' )
			),
			el(
				'div',
				{ className: 'hero__media' },
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
									{
										onClick: obj.open,
										variant: 'secondary',
										className: 'hero__media-button'
									},
									imageId ? 'Replace image' : 'Select image'
								)
							);
						}
					} )
				),
				el(
					'p',
					{ className: 'hero__media-help' },
					imageId ? 'Image selected.' : 'No image selected.'
				)
			)
		);
	}

	window.MyThemeHeroEdit = HeroEdit;
} )( window.wp );
