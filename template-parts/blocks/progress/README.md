# Progress Block

Accordion-style progress/process section with expandable items.

## Features

- ✅ Customizable main title and subtitle
- ✅ Left and right icon selection (Asterisk, Star, X, Squares)
- ✅ Repeater field for unlimited progress items
- ✅ Accordion functionality (one item open at a time)
- ✅ Default open state per item
- ✅ Smooth expand/collapse animations
- ✅ Numbered items (01, 02, 03...)
- ✅ Fully responsive design
- ✅ Mobile-optimized layout

## Admin Fields

### Header Settings

1. **Anchor (ID)** - Optional anchor for internal links (e.g., #protsess)
2. **Left Icon** - Choose from: Asterisk, Star, X, Squares (default: Asterisk)
3. **Right Icon** - Choose from: Asterisk, Star, X, Squares (default: Squares)
4. **Main Title** - Large uppercase title (default: "DIGITURUNDUSE PROTSESS")
5. **Subtitle** - Description text below the title

### Progress Items (Repeater)

For each item:
- **Title** - Item title (e.g., "Kohtumine", "Strateegialoome")
- **Content** - Description text (shown when expanded)
- **Default Open** - Toggle to open this item by default

## Usage

1. Add the "Progress" block to your page
2. Configure the main title and subtitle
3. Select left and right icons
4. Add progress items using the repeater:
   - Enter title for each step
   - Add detailed content/description
   - Optionally set one item to be open by default
5. Publish and view

## Example Content

### Default Example (Digiturunduse Protsess)

**Main Title:** DIGITURUNDUSE PROTSESS

**Subtitle:** Oleme 12+ aastaga kogemusi lihvinud ja teame tänu sellele hästi, millised võtmetegevused toimivad ja millistele teguritele erineval hetkel keskenduda. Teeme seda, mis toimib!

**Items:**
1. Kohtumine
2. Strateegialoome (default open with content)
3. Raport
4. Esimene etapp
5. Teine etapp
6. Kolmas etapp
7. Lõppvaatus

## Styling

The block uses:
- **Font:** Switzer for headings, Helvetica for body text
- **Colors:** Black text (#000000), grey numbers (#bbbab6)
- **Spacing:** 120px top/bottom padding, 58px left/right padding
- **Responsive:** Adjusts padding, font sizes, and layout for mobile

## JavaScript Functionality

- Click on any accordion header to expand/collapse
- Only one item can be open at a time
- Smooth rotation animation on plus icon (45deg when open)
- Smooth max-height transition for content

## Responsive Breakpoints

- **Desktop (>1200px):** Full size layout
- **Tablet (768px-1200px):** Reduced font sizes and padding
- **Mobile (<768px):** Stacked icons, smaller text, reduced padding
- **Small Mobile (<480px):** Minimal padding and font sizes

## Files

- `progress.php` - Block template
- `progress.css` - Block styles
- `progress.js` - Accordion functionality
- `group_progress.json` - ACF field configuration

## Notes

- Accordion items are numbered automatically (01, 02, 03...)
- Plus icon rotates 45° when item is expanded
- Content supports line breaks (nl2br)
- Icons are inline SVG for best performance
- Works in Gutenberg editor preview mode
