# Frontpage Hero Banner Block

Large hero banner specifically designed for the frontpage with dramatic title, description, CTA button and portfolio card.

## Features

- ✨ **Large Uppercase Title** - Eye-catching 180px title
- 🎨 **Decorative Union Shape** - SVG geometric shape in background
- 📝 **Description Text** - 36px description with custom letter spacing
- 🔘 **Primary CTA Button** - Underlined text with arrow icon
- 🖼️ **Portfolio Card** - Image with button overlay
- 📱 **Fully Responsive** - Adapts from 1440px to mobile

## Design Specifications

### Desktop (1440px)
- Container: 1440px x 900px
- Title: 180px, -9px letter spacing, uppercase
- Description: 36px, -1.8px letter spacing
- Portfolio card: 316px x 200px image
- Union shape: 860.292px positioned at right

### Tablet (900px - 1200px)
- Title: 120px
- Stacked layout (description above portfolio)
- Union shape: 700px, reduced opacity

### Mobile (< 640px)
- Title: 48px
- Description: 22px
- Full-width portfolio card
- Union shape: 400px, 30% opacity

## ACF Fields

| Field | Type | Required | Default |
|-------|------|----------|---------|
| `main_title` | Text | Yes | "HUNGRY FOR YOUR SUCCESS" |
| `description` | Textarea | No | "Choose a service..." |
| `cta_text` | Text | No | "Küsi pakkumist" |
| `cta_url` | URL | No | "#contact" |
| `portfolio_text` | Text | No | "Tehtud tööd" |
| `portfolio_url` | URL | No | "#portfolio" |
| `portfolio_image` | Image | No | Placeholder |

## Usage

1. Add block in Gutenberg editor
2. Search for "Frontpage Hero Banner"
3. Fill in the title (required)
4. Optionally customize description, CTA and portfolio card
5. Upload portfolio image (316x200px recommended)

## Typography

- **Title Font:** Switzer (fallback: Helvetica, Arial)
- **Body Font:** Helvetica (fallback: Arial)
- **Title Weight:** 500
- **Button Weight:** 500

## Colors

- Background: `#000000` (Black)
- Text: `#FFFFFF` (White)
- Union Shape: `#757472` (Gray)
- Portfolio Button Background: `#FFFFFF` (White)
- Portfolio Button Text: `#000000` (Black)

## Accessibility

- Semantic HTML5 (`<section>`, `<h1>`)
- Alt text for portfolio image
- Keyboard accessible buttons
- Sufficient color contrast (white on black)

## Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Notes

- Designed for full-width alignment only
- Union shape is decorative (pointer-events: none)
- Portfolio image uses object-fit: cover
- Hover effects on CTA and portfolio button
- Smooth transitions (0.3s ease)


