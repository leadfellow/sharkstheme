# How to Start Block

Full-width two-column block with light and dark sections, perfect for showcasing service offerings or design processes.

## Features

### Left Section (Light)
- **Title**: Large heading with support for colored text parts
- **Description**: Subtitle text below the title
- **Icons**: Up to 5 icons at the bottom (Asterisk, Star, X)
- **Background**: Light gray (#f7f7f5)

### Right Section (Dark)
- **Top Icon**: Optional star icon at the top
- **Tab Content**: Each tab has its own title and text content
- **Navigation Tabs**: Up to 5 clickable tabs with active state indicator
- **Interactive**: Clicking a tab changes the content above
- **Background**: Black (#000000)

## ACF Fields

| Field | Type | Required | Description |
|-------|------|----------|-------------|
| `left_title` | Textarea | No | Title for left section (supports HTML for colors) |
| `left_description` | Textarea | No | Description text for left section |
| `left_icons` | Repeater | No | Icons for left section (max 5) |
| `right_top_icon` | True/False | No | Show icon at top of right section |
| `tabs` | Repeater | No | Navigation tabs with content (max 5) |
| `tabs[].label` | Text | Yes | Tab label text |
| `tabs[].title` | Text | No | Content title shown when tab is active |
| `tabs[].content` | Textarea | No | Text content shown when tab is active |
| `tabs[].is_active` | True/False | No | Is this tab active by default |

## Usage Example

### Left Title with Colors
Use HTML in the left_title field:
```html
<span class="how-to-start__title-part how-to-start__title-part--light">Millest </span><span class="how-to-start__title-part how-to-start__title-part--dark">alustada?</span>
```

### Tab Content with Bold
Use `<strong>` tags in tab content field:
```html
<strong>UX</strong> ehk user experience on kasutajakogemus...
```

### Interactive Tabs
Each tab can have:
- **Label**: The text shown on the tab button
- **Title**: The heading shown when tab is active
- **Content**: The text content shown when tab is active
- **Active**: Whether this tab is selected by default

When a user clicks a tab, the content area smoothly switches to show that tab's title and content.

## Responsive Behavior

- **Desktop (>1024px)**: Two columns side by side, full viewport height
- **Tablet/Mobile (<1024px)**: Stacked vertically, each section full viewport height
- **Mobile (<768px)**: Reduced font sizes and padding

## Technical Details

- **Component**: `template-parts/blocks/how-to-start/how-to-start.php`
- **CSS**: `assets/css/30-components/how-to-start.css`
- **ACF JSON**: `acf-json/group_how_to_start.json`
- **Registration**: `inc/blocks.php`

## Default Content

If no fields are filled, the block displays example content about UX/UI design services.

## Class Structure

```
.how-to-start
  └── .how-to-start__container
      ├── .how-to-start__section.how-to-start__section--light
      │   └── .how-to-start__content-light
      │       ├── .how-to-start__hero-text
      │       │   ├── .how-to-start__title
      │       │   └── .how-to-start__description
      │       └── .how-to-start__icons
      │           └── .how-to-start__icon
      └── .how-to-start__section.how-to-start__section--dark
          └── .how-to-start__content-dark
              ├── .how-to-start__top-icon
              ├── .how-to-start__main-content
              │   ├── .how-to-start__main-title
              │   └── .how-to-start__text-content
              └── .how-to-start__tabs
                  └── .how-to-start__tab
                      ├── .how-to-start__tab-dot
                      └── .how-to-start__tab-label
```

## Available Icons

### Left Section Icons (Black)
- **Asterisk** - Plus/asterisk shape
- **Star** - Multi-point star (outlined)
- **X** - Decorative X shape

### Right Section Icon (White)
- **Star** - Multi-point star (outlined, white stroke)

All icons are inline SVG and scale responsively.

