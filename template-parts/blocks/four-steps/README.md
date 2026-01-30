# Four Steps Block

Flexible ACF Gutenberg block for displaying a 4-step process with customizable icons, card, and steps list.

## Quick Start

1. Add block in Gutenberg editor: Search "Four Steps"
2. Configure header: Title + left/right icons
3. Configure card: Background icon + number + description
4. Add steps: Up to 4 steps with optional highlighting and borders

## Features

- ✅ Customizable header with SVG icons
- ✅ Black card with icon background and number
- ✅ Description text below card
- ✅ Up to 4 steps with auto-numbering
- ✅ Highlight steps with white background
- ✅ Add borders below steps
- ✅ Fully responsive design
- ✅ Multiple icon options (X, Asterisk, Star)

## Files

- **Template:** `four-steps.php`
- **Styles:** `assets/css/30-components/four-steps.css`
- **ACF Config:** `acf-json/group_four_steps.json`
- **Demo:** `demo-four-steps.html`

## Documentation

- **Full Guide:** `FOUR-STEPS-SUMMARY.md` (English)
- **User Guide:** `FOUR-STEPS-KASUTUSJUHEND.md` (Estonian)

## Example Configuration

```
Header: "Neli sammu eduni"
Icons: X (left) + Asterisk (right)

Card:
- Background: Asterisk Stroke
- Number: "02"
- Description: "Formuleerime eesmärgid..."

Steps:
1. "Strateegiline analüüs"
2. "Lahenduste kavandamine" (highlighted)
3. "Praktiline teostus" (border)
4. "Tulemuste analüüs" (border)
```

## Block Registration

```php
acf_register_block_type([
    'name'            => 'four-steps',
    'title'           => __('Four Steps', 'sharks2025'),
    'render_template' => 'template-parts/blocks/four-steps/four-steps.php',
    'category'        => 'sharks-blocks',
    'icon'            => 'editor-ol-rtl',
    'keywords'        => ['steps', 'process', 'neli', 'sammud'],
]);
```

## Support

For issues or questions, check the full documentation files.

---

**Version:** 1.0.0  
**Created:** 2026-01-29  
**Author:** Marketing Sharks
