# Wide Picture Block

Full-width image block that spans the content area width with customizable spacing, border radius, shadow, and optional caption.

## Features

- **Full-width display**: Image spans the entire content area
- **Responsive**: Automatically adapts to different screen sizes with srcset
- **Customizable spacing**: Control top and bottom spacing (none, small, medium, large)
- **Border radius**: Choose from none, small, medium, or large rounded corners
- **Optional shadow**: Add a subtle shadow effect to the image
- **Caption support**: Add an optional caption below the image
- **Custom alt text**: Override image alt text for better accessibility
- **Lazy loading**: Images are lazy-loaded for better performance

## ACF Fields

### Required Fields
- **Picture** (Image): The main image to display

### Optional Fields
- **Alt Text** (Text): Custom alt text for accessibility (falls back to image's alt text if empty)
- **Caption** (Textarea): Optional caption displayed below the image
- **Top Spacing** (Select): Spacing above the block
  - None (0)
  - Small (2rem)
  - Medium (4rem) - default
  - Large (6rem)
- **Bottom Spacing** (Select): Spacing below the block
  - None (0)
  - Small (2rem)
  - Medium (4rem) - default
  - Large (6rem)
- **Border Radius** (Select): Corner rounding
  - None (0) - default
  - Small (8px)
  - Medium (16px)
  - Large (24px)
- **Shadow** (True/False): Add shadow effect to the image

## Usage

1. Add the "Wide Picture" block in the Gutenberg editor
2. Select an image from the media library
3. Optionally customize:
   - Alt text for accessibility
   - Caption text
   - Spacing above and below
   - Border radius
   - Shadow effect

## CSS Classes

The block uses the following CSS classes:
- `.block-wide-picture` - Main wrapper
- `.block-wide-picture__container` - Inner container with max-width
- `.block-wide-picture__figure` - Figure element
- `.block-wide-picture__image` - The image itself
- `.block-wide-picture__caption` - Caption text (if present)

### Modifier Classes
- `.spacing-top-{none|small|medium|large}` - Top spacing
- `.spacing-bottom-{none|small|medium|large}` - Bottom spacing
- `.radius-{none|small|medium|large}` - Border radius
- `.has-shadow` - Shadow effect

## Example Use Cases

1. **Portfolio showcase**: Display full-width project images
2. **Blog post images**: Add featured images within content
3. **Product photography**: Showcase products in full detail
4. **Case study visuals**: Display screenshots or mockups
5. **Infographics**: Show wide infographic images

## Responsive Behavior

- **Desktop**: Full content width with configured spacing
- **Tablet**: Maintains full width, slightly reduced spacing
- **Mobile**: Full width with minimal padding, reduced spacing values

## Accessibility

- Supports custom alt text for screen readers
- Semantic HTML with `<figure>` and `<figcaption>` elements
- Proper heading hierarchy if caption is used

## Performance

- Uses WordPress responsive image sizes (srcset)
- Lazy loading enabled by default
- Optimized for Core Web Vitals

## Files

- **Template**: `template-parts/blocks/wide-picture/wide-picture.php`
- **Styles**: `assets/css/30-components/wide-picture.css`
- **ACF JSON**: `acf-json/group_wide_picture.json`
- **Registration**: `inc/blocks.php` (line ~978)
