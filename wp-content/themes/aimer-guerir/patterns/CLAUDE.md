# Créer un nouveau pattern — guide complet

## Structure de fichiers

```
patterns/
└── mon-pattern/          ← nom en kebab-case, ex: "contact-map"
    ├── pattern.php       ← obligatoire : markup Gutenberg + métadonnées
    ├── style.css         ← obligatoire : styles front-end
    └── editor.css        ← optionnel : overrides spécifiques à l'éditeur
```

---

## 1. `pattern.php` — le fichier principal

### En-tête obligatoire (bloc de commentaire PHP)

```php
<?php
/**
 * Title: Titre lisible affiché dans l'éditeur
 * Slug: aimer-guerir/mon-pattern
 * Categories: aimer-guerir
 * Keywords: mot1, mot2, mot3
 */
?>
```

- `Slug` : toujours préfixé `aimer-guerir/` suivi du nom du dossier exact.
- `Categories` : toujours `aimer-guerir` (catégorie personnalisée du thème).
- `Keywords` : 2 à 4 mots-clés en français pour la recherche dans l'éditeur.

### Structure du markup

Bloc racine obligatoire avec `align: full` pour s'étendre sur toute la largeur :

```php
<!-- wp:group {"tagName":"section","align":"full","className":"pattern_mon_pattern","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull pattern_mon_pattern">

  <!-- wp:group {"className":"pattern_mon_pattern__wrapper","layout":{"type":"default"}} -->
  <div class="wp-block-group pattern_mon_pattern__wrapper">
    <!-- contenu ici -->
  </div>
  <!-- /wp:group -->

</section>
<!-- /wp:group -->
```

- Utiliser `"tagName":"section"` sur le bloc racine pour la sémantique HTML.
- `__wrapper` : le div intérieur qui porte `max-width`, `padding` et `margin: 0 auto`.

### Inclure une icône SVG

```php
<?php include get_theme_file_path('assets/icons/nom-icone.php'); ?>
```

### Inclure une image placeholder

```php
<img src="<?php echo esc_url(get_theme_file_uri('assets/images/pattern-placeholder-400.svg')); ?>" alt="Description" />
```

---

## 2. `style.css` — styles front-end

### Convention de nommage CSS — BEM avec underscore

**Toujours utiliser des underscores** (`_`) comme séparateur dans les noms de classes, pas des tirets :

```css
/* ✅ Correct */
.pattern_mon_pattern { }
.pattern_mon_pattern__wrapper { }
.pattern_mon_pattern__title { }

/* ❌ Incorrect (ancienne convention présente dans certains patterns) */
.pattern-mon-pattern { }
.pattern-mon-pattern__wrapper { }
```

> Note : quelques anciens patterns (`blog-home`, `appointment-header`) utilisent encore des tirets. Ne pas reproduire ce style.

### Structure CSS type

```css
/* Bloc racine */
.pattern_mon_pattern {
  background-color: var(--cream); /* ou --background, --beige, --white */
}

/* Wrapper centré */
.pattern_mon_pattern__wrapper {
  max-width: 1280px;
  padding: 72px 24px;   /* vertical: 72px–100px / horizontal: toujours 24px */
  margin: 0 auto;
}

/* ... éléments enfants ... */

/* Responsive : toujours mobile-first, breakpoint principal à 768px */
@media screen and (min-width: 768px) {
  .pattern_mon_pattern__wrapper {
    padding: 100px 24px;
  }
}
```

### Variables CSS disponibles (depuis `tokens.css`)

```css
/* Couleurs */
var(--primary)      /* rouge principal #a40027 */
var(--primary-05)   /* rouge 5% opacité */
var(--primary-15)   /* rouge 15% opacité */
var(--primary-25)   /* rouge 25% opacité */
var(--primary-50)   /* rouge 50% opacité */
var(--primary-75)   /* rouge 75% opacité */
var(--black)        /* brun foncé #440e0e */
var(--white)        /* blanc #ffffff */
var(--background)   /* blanc cassé #faf9f6 */
var(--cream)        /* crème translucide */
var(--beige)        /* beige translucide */

/* Typographie */
var(--font-heading) /* Playfair Display */
var(--font-body)    /* Inter */

/* Ombres */
var(--picture-shadow) /* ombre forte pour photos */
var(--card-shadow)    /* ombre douce pour cartes */
```

---

## 3. `editor.css` — styles éditeur (optionnel)

À créer uniquement si le rendu dans l'éditeur Gutenberg nécessite des corrections par rapport au front-end (largeur, espacement, etc.).

Toutes les règles doivent être préfixées `.editor-styles-wrapper` :

```css
.editor-styles-wrapper .pattern_mon_pattern {
  width: 100vw;
  margin-left: calc(50% - 50vw);
}

.editor-styles-wrapper .pattern_mon_pattern__wrapper {
  max-width: 1280px;
  margin: 0 auto;
}
```

---

## 4. Enregistrer le CSS dans le build

Après avoir créé les fichiers CSS, les déclarer dans **`build.sh`** (à la racine du thème) dans la section `SOURCES` :

```bash
# Dans build.sh, section "Patterns (éditeur + front)"
"$THEME_DIR/patterns/mon-pattern/style.css"
```

Puis régénérer `bundle.css` :

```bash
bash build.sh
```

> `editor.css` est chargé automatiquement par WordPress — pas besoin de le déclarer dans `build.sh`.

---

## Checklist complète

- [ ] Créer `patterns/mon-pattern/pattern.php` avec l'en-tête de métadonnées
- [ ] Slug = `aimer-guerir/mon-pattern` (correspond exactement au nom du dossier)
- [ ] Classes CSS en `pattern_nom_du_pattern__element` (underscores)
- [ ] Créer `patterns/mon-pattern/style.css`
- [ ] Créer `patterns/mon-pattern/editor.css` si nécessaire
- [ ] Ajouter `style.css` dans `build.sh` (section Patterns)
- [ ] Lancer `bash build.sh` pour régénérer `bundle.css`
- [ ] Committer tous les fichiers modifiés : `pattern.php`, `style.css`, `editor.css` (si créé) et `bundle.css`
