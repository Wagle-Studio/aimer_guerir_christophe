# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

WordPress website for "Aimer Guérir", a magnetizer/healer practice (Christophe Rebours, Vernon, France). The site is entirely in French.

## Development Environment

The stack runs via Docker Compose:

```bash
# Start the environment
docker compose up -d

# Stop the environment
docker compose down
```

- **WordPress**: http://localhost:8080 (default)
- **phpMyAdmin**: http://localhost:8081 (default)
- **Credentials**: user `wordpress`, password `wordpress`, DB `wordpress`

The `wp-content/` directory is volume-mounted into the WordPress container — file changes take effect immediately without rebuilding.

Environment variables can be overridden via a `.env` file (ports, DB credentials, etc.).

## Theme Architecture

All custom code lives in `wp-content/themes/aimer-guerir/`. The theme is a classic PHP theme (not a full-site editing block theme).

### Page Templates

- **`front-page.php`** — Home page. Renders blocks sequentially by calling `require` on each `blocks/*/render.php`. Each render file returns an HTML string via `ob_start()`/`ob_get_clean()`. If required data is missing from the Customizer, the block returns an empty string and is silently skipped.
- **`page.php`** — Inner pages. Uses standard WordPress block editor content via `the_content()`.

### Block Architecture (`blocks/`)

Each custom section (hero, pains, therapeutic-support, cta, about, testimonials, choose-practitioner, services, newsletter) lives in its own directory with:

- **`render.php`** — Reads values from `get_theme_mod()`, validates them, and returns HTML. Always uses `ob_start()`/`ob_get_clean()`.
- **`customizer.php`** — Registers WordPress Customizer panels/sections/settings/controls for the block's editable content.
- **`style.css`** — Block-specific CSS, enqueued by `functions.php`.

### Pattern Architecture (`patterns/`)

Block patterns for the Gutenberg editor. Each pattern directory contains:

- **`pattern.php`** — PHP file with a header comment declaring pattern metadata (`Title`, `Slug`, `Categories`, `Keywords`), followed by block markup. Can include PHP for dynamic assets (e.g., SVG icons via `include get_theme_file_path()`).
- **`style.css`** — Auto-enqueued on the front-end.
- **`editor.css`** — Auto-enqueued in the block editor.

`functions.php` automatically discovers and enqueues CSS from `patterns/*/style.css` and `patterns/*/editor.css`, and busts the pattern cache when pattern files change.

> **IMPORTANT — Creating or modifying a pattern:** always read `patterns/CLAUDE.md` first. It contains the complete checklist, naming conventions, CSS variables, and the mandatory `build.sh` step.

### Partials (`partials/`)

- `site-header.php` / `site-header.css` — Site header with logo, contact info, and responsive navigation.
- `site-footer.php` / `site-footer.css` — Site footer.

These are included via `header.php` and `footer.php`.

### CSS Conventions

- **`assets/css/main.css`** — Global CSS custom properties (`--primary`, `--font-heading`, `--font-body`, etc.) and base/utility styles. This is the design system foundation.
- **`theme.json`** — WordPress design tokens (colors, typography, spacing), which generate `--wp--preset--*` variables. Keep in sync with `main.css` values.
- BEM-like naming: `.block__element`, `.block--modifier`.
- Button variants: `.btn`, `.btn--primary`, `.btn--secondary`, `.btn--icon`.

### Icons (`assets/icons/`)

SVG icons are PHP files that output inline SVG markup. Include them with:
```php
<?php include get_theme_file_path('assets/icons/icon-name.php'); ?>
```

### Adding a New Home Page Block

1. Create `blocks/my-block/render.php` (read from `get_theme_mod()`, return HTML string).
2. Create `blocks/my-block/customizer.php` (register Customizer controls).
3. Create `blocks/my-block/style.css`.
4. Enqueue the stylesheet in `functions.php` under `wp_enqueue_scripts`.
5. Add `require_once get_theme_file_path('/blocks/my-block/customizer.php');` at the bottom of `functions.php`.
6. Add `$render('/blocks/my-block/render.php');` in `front-page.php`.
