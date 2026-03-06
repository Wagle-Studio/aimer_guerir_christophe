#!/usr/bin/env bash
# =============================================================
# Build CSS — concatène toutes les sources en un bundle.css plat.
# Usage : bash build.sh (depuis n'importe quel répertoire)
# =============================================================

set -euo pipefail

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
OUTPUT="$THEME_DIR/assets/css/bundle.css"

# Liste ordonnée des fichiers sources à concaténer.
# Les @import présents dans ces fichiers sont ignorés (déjà résolus ici).
SOURCES=(
  # Design tokens (variables CSS — doit être en premier)
  "$THEME_DIR/assets/css/tokens.css"
  # Styles de base
  "$THEME_DIR/assets/css/main.css"
  # Partials (header, footer)
  "$THEME_DIR/partials/site-header.css"
  "$THEME_DIR/partials/site-footer.css"
  # Blocs de la page d'accueil
  "$THEME_DIR/blocks/hero/style.css"
  "$THEME_DIR/blocks/pains/style.css"
  "$THEME_DIR/blocks/therapeutic-support/style.css"
  "$THEME_DIR/blocks/cta/style.css"
  "$THEME_DIR/blocks/about/style.css"
  "$THEME_DIR/blocks/testimonials/style.css"
  "$THEME_DIR/blocks/choose-practitioner/style.css"
  "$THEME_DIR/blocks/services/style.css"
  "$THEME_DIR/blocks/newsletter/style.css"
  # Patterns (éditeur + front)
  "$THEME_DIR/patterns/about-me/style.css"
  "$THEME_DIR/patterns/about-cabinet/style.css"
  "$THEME_DIR/patterns/appointment-header/style.css"
  "$THEME_DIR/patterns/appointment-session-clinic/style.css"
  "$THEME_DIR/patterns/appointment-session-distance/style.css"
  "$THEME_DIR/patterns/appointment-session-home/style.css"
  "$THEME_DIR/patterns/blog-home/style.css"
  "$THEME_DIR/patterns/appointment-cta/style.css"
  "$THEME_DIR/patterns/newsletter-cta/style.css"
  "$THEME_DIR/patterns/appointment-about/style.css"
  "$THEME_DIR/patterns/pains-list/style.css"
)

{
  echo "/* ============================================================="
  echo "   bundle.css — généré automatiquement par build.sh"
  echo "   Ne pas modifier ce fichier directement."
  echo "   Modifier les sources, puis relancer : bash build.sh"
  echo "   ============================================================= */"
  echo ""

  for file in "${SOURCES[@]}"; do
    if [[ -f "$file" ]]; then
      rel="${file#"$THEME_DIR/"}"
      echo "/* --- $rel --- */"
      # Supprime les lignes @import (déjà résolus par la concaténation)
      grep -v '^@import' "$file"
      echo ""
    else
      echo "/* AVERTISSEMENT : fichier source introuvable : ${file#"$THEME_DIR/"} */" >&2
    fi
  done
} > "$OUTPUT"

echo "bundle.css regenere -> $OUTPUT"
