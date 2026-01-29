# Hero block

## Fields
- title (string, required)
- text (string, required)
- imageId (attachment id, required)
- primaryButtonLabel + primaryButtonUrl (required)
- secondaryButtonLabel + secondaryButtonUrl (optional)

## Front markup (render.php)
```html
<section class="hero">
  <div class="hero__content">
    <h1 class="hero__title">...</h1>
    <p class="hero__text">...</p>
    <div class="hero__actions">
      <a class="hero__button hero__button--primary" href="#">...</a>
      <a class="hero__button hero__button--secondary" href="#">...</a>
    </div>
  </div>
  <div class="hero__media">
    <!-- wp_get_attachment_image() output -->
  </div>
</section>
```

## Where to change things
- Block settings (attributes/supports): `wp-content/themes/my-theme/blocks/hero/block.json`
- Editor UI: `wp-content/themes/my-theme/blocks/hero/edit.js`
- Front render: `wp-content/themes/my-theme/blocks/hero/render.php`
- Front styles: `wp-content/themes/my-theme/blocks/hero/style.css`
- Editor-only styles: `wp-content/themes/my-theme/blocks/hero/editor.css`
