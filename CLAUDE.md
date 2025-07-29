# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

### Development
- `npm run dev` - Development mode with webpack watch (auto-rebuild on changes)
- `npm run build` - Production build with minification
- `npm run sync` - Browser-sync for live reload during development

### Local Development Environment
This is a WordPress theme for Local WP. The theme is located at `/wp-content/themes/korporation-giswil/`.

## Architecture Overview

This is a custom WordPress theme for "Elektro Furrer AG" built with modern tooling and ACF (Advanced Custom Fields) integration.

### Key Technologies
- **Build System**: Webpack with Babel transpilation
- **Styling**: SCSS with modular architecture (BEM methodology)  
- **JavaScript**: ES6+ modules with individual feature files
- **WordPress**: Custom theme with ACF blocks and custom post types
- **Frontend**: Swiper.js for carousels, custom animations and interactions

### Directory Structure

**Source Files (`src/`)**:
- `scss/` - Modular SCSS architecture:
  - `1_helpers/` - Variables, mixins, functions, breakpoints
  - `2_base/` - Typography, base styles, animations
  - `3_layout/` - Header, footer, menu, layout components
  - `4_components/` - Feature-specific components organized by functionality
- `js/` - Individual JavaScript modules for specific features
- `assets/` - Static assets (fonts, icons, images)

**Template Structure (`template-parts/`)**:
- `blocks/` - ACF custom blocks (each with block.json and PHP template)
- `components/` - Reusable template components
- Content-type specific folders: `events/`, `jobs/`, `news/`, `referenzen/`, `services/`, `team/`

**Built Assets (`dist/`)**:
- `bundle.js` - Compiled JavaScript
- `style.css` - Compiled CSS

### ACF Integration
The theme heavily uses ACF Pro with custom blocks. All blocks are registered in `functions.php:register_acf_blocks()` and have corresponding:
- `block.json` - Block configuration
- PHP template file - Block rendering logic

Available custom blocks include: page-header, image-with-content, downloads, referenzen-overview, news-overview, jobs-overview, team-overview, history, sponsoring-overview.

### Custom Post Types
The theme includes custom post types for:
- Bereiche (services/departments)
- Dienstleistungen (services)  
- Events
- Referenzen (references/projects)
- Standorte (locations)
- Stellen (job positions)

Each has corresponding single templates (`single-{post-type}.php`) and archive functionality.

### JavaScript Architecture
Individual feature modules in `src/js/` handle specific functionality:
- `swiper.js` - Carousel implementations
- `accordion.js` - Accordion components
- `*-filter.js` - Category filtering for various content types
- `gallery.js` - Image gallery functionality
- Animation and interaction modules

### Styling Architecture
SCSS follows a structured approach:
- Component-based organization matching template structure
- Responsive design with breakpoint mixins
- Custom animations and hover effects
- Utility classes and helper functions

### Asset Management
- Webpack handles JS/CSS compilation and optimization
- Custom image sizes defined in functions.php (tiny, small, medium-size, large, huge, extra-large)
- SVG icons stored in `src/assets/icons/`
- Custom fonts (Hanken Grotesk, Manrope) in `src/assets/fonts/`

### WordPress Customizations
- Custom dashboard widgets with important links
- Restricted block editor (only specific core and ACF blocks allowed)
- Gravity Forms integration with editor permissions
- Custom image sizes for responsive images
- Navigation menu registration

This theme prioritizes maintainable, modular code with clear separation between content types and reusable components.