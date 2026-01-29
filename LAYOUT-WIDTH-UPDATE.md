# Layout Width Update - 1440px

## Summary
Updated the entire page width including header, footer, and content areas from 1200px to 1440px.

## Changes Made

### 1. Main Container Width Override
**File:** ssets/css/site.css
- Added CSS override at the end of the file:
\\css
:root {
  --container-max: 1440px !important;
}
\
### 2. Container Wide Class Update
**File:** ssets/css/site.css
- Updated .container--wide class:
\\css
.container--wide {
  width: min(1440px, 92vw);
}
\
### 3. Hero Component
**File:** ssets/css/30-components/hero.css
- Updated hardcoded max-width from 1200px to 1440px

### 4. FAQ Component
**File:** ssets/css/30-components/faq.css
- Updated hardcoded max-width from 1200px to 1440px

## Components Already Using Variable
The following components already use \ar(--container-max)\ and will automatically inherit the new 1440px width:
- heading-half.css
- select-text.css
- All other components using the CSS variable

## Header & Footer
Both header and footer were already configured with max-width: 1440px, so no changes were needed.

## Result
The entire page layout (header, content area, and footer) now uses a consistent 1440px maximum width.

## Date
Updated: 
