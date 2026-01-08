# Sharks 2025 WordPress Theme

Modern WordPress theme built with **ACF Blocks** and **Gutenberg**, following component-based architecture with CSS custom properties (design tokens).

## Features

- ✅ ACF Pro Blocks (Hero, Services, Pricing, CTA, Contact Form)
- ✅ CSS Design Tokens (colors, typography, spacing)
- ✅ Editor = Frontend (same styles in editor and frontend)
- ✅ Responsive Grid System
- ✅ Mobile-friendly Navigation
- ✅ Contact Form 7 Integration
- ✅ Footer with Multiple Widget Areas
- ✅ Clean, Semantic HTML5
- ✅ Accessibility Best Practices

## Requirements

- WordPress 6.0+
- PHP 7.4+
- **ACF Pro** (Advanced Custom Fields Pro)
- **Contact Form 7** (for contact form block)

## Installation

1. Download the theme
2. Upload to `/wp-content/themes/sharks2025`
3. Install required plugins:
   - ACF Pro
   - Contact Form 7 (optional)
4. Activate the theme
5. Configure ACF Field Groups (see below)

## Setup

### 1. ACF Field Groups

After activating the theme, the `acf-json` folder will sync field definitions automatically. If you need to create them manually:

#### Hero Block (`acf/hero`)
- `headline` (Text)
- `subheadline` (Textarea)
- `primary_cta_text` (Text)
- `primary_cta_url` (URL)
- `secondary_cta_text` (Text)
- `secondary_cta_url` (URL)
- `media` (Image)
- `style_variant` (Select: default, centered, dark)

#### Services Block (`acf/services`)
- `section_title` (Text)
- `section_text` (Textarea)
- `services` (Repeater)
  - `icon` (Image)
  - `title` (Text)
  - `description` (Textarea)
  - `link_url` (URL)
  - `link_text` (Text)

#### Pricing Block (`acf/pricing`)
- `section_title` (Text)
- `section_text` (Textarea)
- `pricing_plans` (Repeater)
  - `plan_name` (Text)
  - `description` (Textarea)
  - `price` (Number)
  - `currency` (Text)
  - `period` (Text)
  - `featured` (True/False)
  - `features` (Repeater)
    - `feature_text` (Text)
    - `disabled` (True/False)
  - `button_text` (Text)
  - `button_url` (URL)

#### CTA Block (`acf/cta`)
- `title` (Text)
- `text` (Textarea)
- `primary_button_text` (Text)
- `primary_button_url` (URL)
- `secondary_button_text` (Text)
- `secondary_button_url` (URL)
- `style_variant` (Select: default, accent, gradient, dark, light)

#### Contact Form Block (`acf/contact-form`)
- `title` (Text)
- `text` (Textarea)
- `cf7_shortcode` (Text)
- `show_contact_info` (True/False)
- `email` (Email)
- `phone` (Text)
- `address` (Textarea)

### 2. Navigation Menus

Go to **Appearance → Menus** and create:
- Primary Menu (header navigation)
- Footer Menu 1, 2, 3 (footer columns)

### 3. Homepage Setup

1. Create a new page called "Home"
2. Add ACF blocks in this order:
   - Hero Block
   - Services Block
   - Pricing Block
   - CTA Block
   - Contact Form Block
3. Go to **Settings → Reading**
4. Set "Your homepage displays" to "A static page"
5. Select "Home" as the homepage

## Customization

### Design Tokens

Edit `assets/css/00-settings/variables.css` to customize:
- Colors
- Typography
- Spacing
- Border radius
- Shadows

### Theme Colors

Update colors in both:
1. `assets/css/00-settings/variables.css` (CSS variables)
2. `theme.json` (Gutenberg color palette)

### Adding New Blocks

1. Register block in `inc/blocks.php`
2. Create PHP template in `template-parts/blocks/{block-name}/{block-name}.php`
3. Create CSS in `assets/css/30-components/{block-name}.css`
4. Import CSS in `assets/css/site.css`
5. Create ACF Field Group for the block

## File Structure

```
sharks2025/
├─ functions.php              # Main theme file
├─ theme.json                 # Gutenberg configuration
├─ style.css                  # Theme header (required)
├─ header.php                 # Site header
├─ footer.php                 # Site footer
├─ front-page.php             # Homepage template
├─ index.php                  # Blog archive
├─ acf-json/                  # ACF field definitions
├─ inc/
│  ├─ theme.php               # Theme setup & enqueues
│  └─ blocks.php              # ACF block registration
├─ assets/css/
│  ├─ site.css                # Main stylesheet
│  ├─ editor.css              # Editor styles
│  ├─ 00-settings/
│  │  └─ variables.css        # Design tokens
│  ├─ 20-elements/
│  │  └─ typography.css       # Typography styles
│  ├─ 30-components/
│  │  ├─ button.css
│  │  ├─ card.css
│  │  ├─ hero.css
│  │  ├─ pricing.css
│  │  ├─ cta.css
│  │  └─ contact-form.css
│  └─ 40-layout/
│     ├─ grid.css
│     ├─ header.css
│     └─ footer.css
└─ template-parts/blocks/
   ├─ hero/hero.php
   ├─ services/services.php
   ├─ pricing/pricing.php
   ├─ cta/cta.php
   └─ contact-form/contact-form.php
```

## 📚 Documentation

### For Developers

Comprehensive guides for building ACF-based WordPress projects with Figma integration:

- **[📖 Developer Guides Overview](docs/README-DEVELOPER-GUIDES.md)** - Start here! Guide to all documentation
- **[⚡ Quick Start Guide](docs/FIGMA-TO-WORDPRESS-QUICKSTART.md)** - Create your first ACF block in 30 minutes
- **[📘 Complete Developer Guide](docs/DEVELOPER-GUIDE-ACF-FIGMA.md)** - Full workflow from Figma to WordPress
- **[🤖 AI + Figma Make Guide](docs/FIGMA-MAKE-AI-PROMPTS.md)** - Use AI assistants (ChatGPT, Claude, Cursor) with Figma exports
- **[🎓 ACF Block Development Manual](docs/ACF-BLOCK-DEVELOPMENT-MANUAL.md)** - Deep dive into ACF blocks
- **[🎨 Figma Import Guide](docs/FIGMA-IMPORT-GUIDE.md)** - Design tokens import workflow
- **[📐 ACF + Gutenberg Build Rule](docs/ACF-GUTENBERG-BUILD-RULE.md)** - Architecture and best practices

### For Users

- **[🧭 Blocks & Patterns Guide](docs/BLOCKS-PATTERNS-GUIDE.md)** - How to find and use ACF blocks in Gutenberg
- **[🚀 Setup Guide](docs/SETUP-GUIDE.md)** - Initial theme setup
- **[📦 Dummy Content](docs/DUMMY-CONTENT.md)** - Sample content for testing

### Quick Links

**New to ACF blocks?** → Start with [Quick Start Guide](docs/FIGMA-TO-WORDPRESS-QUICKSTART.md)

**Using AI tools?** → Check [AI + Figma Make Guide](docs/FIGMA-MAKE-AI-PROMPTS.md)

**Need reference?** → See [Complete Developer Guide](docs/DEVELOPER-GUIDE-ACF-FIGMA.md)

**Troubleshooting?** → All guides have troubleshooting sections

## Support

For issues and questions, please refer to:
- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [Project Documentation](docs/README-DEVELOPER-GUIDES.md)

## License

GPL v2 or later

## Credits

Built with ❤️ following the ACF + Gutenberg Build Rule

**Stack:** WordPress, ACF Pro, Gutenberg, CSS Custom Properties, BEM Methodology

