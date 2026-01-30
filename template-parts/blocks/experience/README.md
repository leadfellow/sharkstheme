# Experience Block

Experience section with headline, feature items, CTA button and images.

## Features

- **Two-part headline**: Gray and black colored text parts
- **Feature items**: Display up to 10 features with star icons (recommended: 5 items)
  - First row: 3 items
  - Second row: 2 items
- **CTA button**: Black button with arrow icon
- **Image gallery**: Two images with fade animation effect
- **Fully responsive**: Optimized for all screen sizes

## ACF Fields

### Anchor & Mobile
- **Anchor (ID)**: Custom anchor for internal links (e.g., `#experience`)
- **Show on Mobile**: Toggle to show/hide block on mobile devices

### Content
- **Headline (Gray Part)**: First part of the headline (gray color)
- **Headline (Black Part)**: Second part of the headline (black color)

### Features Tab
- **Feature 1**: First feature (first row, left)
- **Feature 2**: Second feature (first row, center)
- **Feature 3**: Third feature (first row, right)
- **Feature 4**: Fourth feature (second row, left)
- **Feature 5**: Fifth feature (second row, right)

### CTA & Images Tab
- **CTA Button Text**: Text for the call-to-action button
- **CTA Button URL**: Link URL for the button
- **Image 1**: First image (base layer)
- **Image 2**: Second image (fades in/out over first image)

## Usage

1. Add the "Experience" block to your page
2. Fill in the headline parts (gray and black)
3. Go to "Features" tab and fill in 5 feature texts
4. Go to "CTA & Images" tab
5. Set the CTA button text and URL
6. Upload two images for the image gallery
7. Publish and view

## Layout

```
┌─────────────────────────────────────────────┐
│  Headline (Gray Part) Headline (Black Part) │
├─────────────────────────────────┬───────────┤
│  ⭐ Feature 1   ⭐ Feature 2     │           │
│  ⭐ Feature 3                    │  Images   │
│  ⭐ Feature 4   ⭐ Feature 5     │  (2)      │
│                                  │           │
│  ┌───────────────────────────┐  │           │
│  │  CTA Button with Arrow  → │  │           │
│  └───────────────────────────┘  │           │
└─────────────────────────────────┴───────────┘
```

## Responsive Behavior

- **Desktop (>1400px)**: Side-by-side layout with images on the right
- **Tablet (900-1400px)**: Stacked layout, images below content
- **Mobile (<900px)**: Single column, features stacked vertically
- **Small Mobile (<600px)**: Reduced padding and font sizes

## Styling

The block uses:
- **Font**: Switzer (headings), Helvetica (body text)
- **Colors**: White background, black text, gray accent (#bbbab6)
- **Animation**: Image 2 fades in/out over Image 1 (4s loop)

## Default Values

If no content is provided, the block displays:
- Default headline: "Vaatamata aastatepikkusele kogemusele oleme paindlik ja värske"
- 5 default features about company achievements
- Default CTA: "küsi pakkimust"
- Placeholder images from Unsplash

## Files

- **Template**: `template-parts/blocks/experience/experience.php`
- **Styles**: `assets/css/30-components/experience.css`
- **ACF Config**: `acf-json/group_experience.json`
- **Registration**: `inc/blocks.php`
