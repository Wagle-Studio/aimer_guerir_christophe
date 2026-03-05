# Aimer Guérir — Site vitrine

🌐 WordPress · 🐘 PHP · 🎨 CSS · 🐳 Docker · 🚀 CD GitHub Actions

Site vitrine pour Christophe Rebours, magnétiseur à Vernon (France).

## Stack

| Couche | Technologie |
|---|---|
| CMS | WordPress 6 + PHP 8.2 |
| Thème | Thème classique PHP sur mesure (`aimer-guerir`) |
| Base de données | MariaDB 11.3 |
| Dev local | Docker Compose |
| CD | GitHub Actions → déploiement sur push `master` |

## Démarrage rapide

```bash
docker compose up -d
```

- **WordPress** : http://localhost:8080
- **phpMyAdmin** : http://localhost:8081
- Identifiants par défaut : `wordpress` / `wordpress`

Les modifications dans `wp-content/` prennent effet immédiatement (volume monté).

Variables d'environnement surchargeables via un fichier `.env` (ports, credentials…).

## Architecture du thème

```
wp-content/themes/aimer-guerir/
├── assets/
│   ├── css/
│   │   ├── bundle.css       # Point d'entrée CSS (imports)
│   │   ├── main.css         # Variables globales + utilitaires
│   │   └── editor.css       # Styles injectés dans l'éditeur
│   ├── icons/               # SVG en PHP (include inline)
│   └── images/
├── blocks/                  # Sections de la page d'accueil
│   └── <bloc>/
│       ├── render.php       # HTML via ob_start/ob_get_clean
│       ├── customizer.php   # Contrôles WordPress Customizer
│       └── style.css
├── patterns/                # Patterns Gutenberg (pages intérieures)
│   └── <pattern>/
│       ├── pattern.php      # Métadonnées + markup bloc
│       ├── style.css        # Chargé front + éditeur
│       └── editor.css       # Éditeur uniquement (si nécessaire)
├── partials/                # Header et footer
├── front-page.php           # Page d'accueil (blocs custom)
├── page.php                 # Pages intérieures (the_content)
├── functions.php            # Enqueue, Customizer, patterns
└── theme.json               # Design tokens WordPress
```

### Convention CSS

- Propriétés globales dans `main.css` (`--primary`, `--font-heading`…)
- Nommage BEM : `.block__element`, `.block--modifier`
- Classes de patterns scopées : `pattern_<nom>__element`
- Variantes bouton : `.btn`, `.btn--primary`, `.btn--secondary`, `.btn--icon`

### Ajouter un bloc page d'accueil

1. Créer `blocks/mon-bloc/render.php`, `customizer.php`, `style.css`
2. Enqueuer le stylesheet dans `functions.php`
3. Ajouter `require_once` du `customizer.php` dans `functions.php`
4. Ajouter `$render('/blocks/mon-bloc/render.php')` dans `front-page.php`
