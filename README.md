# Elektro Furrer AG WordPress Theme

Ein massgeschneidertes WordPress-Theme für Elektro Furrer AG, entwickelt von VonWeb.

## Entwicklung

### Voraussetzungen

- Node.js
- npm/yarn
- Local WP für lokale Entwicklung

### Setup

```bash
# Installation der Abhängigkeiten
npm install

# Entwicklungsmodus mit automatischer Aktualisierung
npm run dev

# Browser-Sync für Live-Reload
npm run sync

# Produktions-Build
npm run build
```

## Theme-Struktur

```
vonweb/
├── dist/           # Kompilierte Assets (generiert)
├── src/            # Quellcode
│   ├── assets/     # Bilder, Icons, Fonts
│   ├── js/         # JavaScript-Module
│   └── scss/       # SCSS-Dateien (modular strukturiert)
├── template-parts/ # Wiederverwendbare Template-Teile
│   ├── blocks/     # ACF-Blöcke
│   ├── components/ # Wiederverwendbare Komponenten
│   ├── job/        # Templates für Stellenangebote
│   ├── post/       # Templates für Beiträge
│   └── referenzen/ # Templates für Referenzen
└── *.php           # Theme-Dateien
```

## Wartung

Regelmäßige Updates:

- WordPress Core
- Plugins
- Theme-Komponenten

## Support

Bei Fragen oder Problemen:

- E-Mail: info@vonweb.ch
- Web: https://vonweb.ch

## Lizenz

Proprietär - Alle Rechte vorbehalten © VonWeb
