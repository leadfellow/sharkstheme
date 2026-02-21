# Roll Process Block

Interactive process/timeline section with hover effects and dividers.

## Features

- Large main title at the top
- Multiple process items separated by divider lines
- Two text styles: Gray (light) and Black (bold, uppercase)
- Hover effects that transform gray text to uppercase
- Optional decorative cursor icon
- Fully responsive design
- Customizable background color

## ACF Fields

### Main Title (Required)
- **Field:** `main_title`
- **Type:** Text
- Large heading displayed at the top of the section

### Process Items (Repeater)
- **Field:** `process_items`
- Each item contains:
  - **Text** (required): The process step text
  - **Style**: Choose between:
    - `gray`: Light gray text (transforms to uppercase on hover)
    - `black`: Bold black uppercase text

### Show Cursor Icon
- **Field:** `show_cursor_icon`
- **Type:** True/False
- Displays a decorative cursor icon (default: yes)

### Background Color
- **Field:** `background_color`
- **Type:** Color Picker
- Default: `#ffffff`

## Usage Example

Based on the provided design:

1. **Main Title:** "Disainiprotsessi lõpuks jõuab sinuni"
2. **Process Items:**
   - "Logo ja selle erinevad versioonid" (gray)
   - "Stiiliraamat värvide, fontide ja juhistega" (black)
   - "Kujunduspõhjad sotsiaalmeediasse, veebi ja trükki" (gray)
   - "Failid kõigis vajalikes formaatides" (gray)
   - "Visuaalne süsteem, mida on lihtne kasutada" (gray)

## Styling

- **Main Title:** 82px, Inter font, uppercase, -4.1px letter spacing
- **Black Text:** 42px, Inter font, uppercase, bold
- **Gray Text:** 36px, Arial, -1.8px letter spacing
- **Hover Effects:** 
  - Gray text transforms to uppercase with Inter font
  - Subtle scale effect (1.02x)
  - Smooth cubic-bezier transition

## Responsive Breakpoints

- **Desktop (>1400px):** Full size
- **Tablet (768px-1400px):** Reduced font sizes
- **Mobile (<768px):** Further reduced, adjusted spacing

## Files

- **Template:** `template-parts/blocks/roll-process/roll-process.php`
- **Styles:** `assets/css/30-components/roll-process.css`
- **JavaScript:** `assets/js/roll-process.js`
- **ACF Fields:** `acf-json/group_roll_process.json`

## Block Registration

Registered in `inc/blocks.php` with:
- Category: `sharks-blocks`
- Icon: `editor-ol`
- Supports: align, anchor, spacing, color
- Mode: `preview`
