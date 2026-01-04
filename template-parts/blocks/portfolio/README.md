# Portfolio / Tehtud Tööd Block

Filterable portfolio grid with categories.

## Features

- **Category Filtering**: Add custom categories and filter portfolio items
- **Responsive Grid**: 2-column grid on desktop, single column on mobile
- **Yellow Background Option**: Add yellow accent background to specific items
- **Custom Links**: Each portfolio item can link to detail page or external URL
- **Customizable Button Text**: Change button text per item

## ACF Fields

### Categories (Repeater)
- **Category Name** (Text): Name of the category for filtering
  - First category is always the "All" category
  - Examples: "Kõik tööd", "Veebilehed", "Turunduskampaaniad"

### Portfolio Items (Repeater)
- **Image** (Image): Portfolio item image (recommended: 428x428px)
- **Yellow Background** (True/False): Add yellow (#e1ff04) background behind image
- **Category** (Select): Category for filtering (must match category name)
- **Link** (URL): Link to portfolio item detail page
- **Button Text** (Text): Custom button text (default: "Vaata lähemalt")

## Usage

1. Add the block to your page
2. Add categories (first one will be "All")
3. Add portfolio items with images, categories, and links
4. Items will automatically organize into 2-column rows
5. Filtering works automatically via JavaScript

## Layout

- **Header**: Two decorative icons + "TEHTUD TÖÖD" title
- **Navigation**: Category filters with active state (dot indicator)
- **Grid**: Portfolio items in 2-column rows
- **Item**: Image + button with arrow icon

## Responsive Breakpoints

- **Desktop (1024px+)**: 2 columns, 428x428px images
- **Tablet (768px-1024px)**: 1 column, 500px images
- **Mobile (480px-768px)**: 1 column, 400px images
- **Small Mobile (<480px)**: 1 column, 300px images

## JavaScript

Filtering is handled automatically:
- Click category to filter items
- First category shows all items
- Other categories show only matching items
- Active category gets dot indicator and underline
- Grid reorganizes after filtering

## Customization

### Colors
- Background: White (#ffffff)
- Text: Black (#000000)
- Inactive categories: Gray (#bbbab6)
- Yellow background: #e1ff04

### Fonts
- Primary: 'Outfit', 'Switzer', 'Helvetica', Arial, sans-serif
- Title: 82px (responsive)
- Navigation: 20px (responsive)
- Button: 20px (responsive)




