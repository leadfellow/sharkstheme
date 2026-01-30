# Four Steps Block - Struktuuri Ülevaade

## Visuaalne Struktuur

```
┌─────────────────────────────────────────────────────────────────┐
│                         FOUR STEPS BLOCK                        │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌────────────────────────────────────────────────────────┐    │
│  │                       HEADER                           │    │
│  │                                                        │    │
│  │    [Icon Left]   PEALKIRI (TITLE)   [Icon Right]     │    │
│  │                                                        │    │
│  └────────────────────────────────────────────────────────┘    │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                       CONTENT                           │   │
│  │                                                         │   │
│  │  ┌──────────────┐    ┌──────────────────────────────┐  │   │
│  │  │ LEFT COLUMN  │    │      RIGHT COLUMN            │  │   │
│  │  │              │    │                              │  │   │
│  │  │ ┌──────────┐ │    │  (01) Strateegiline analüüs │  │   │
│  │  │ │  CARD    │ │    │                              │  │   │
│  │  │ │          │ │    │  ┌────────────────────────┐  │  │   │
│  │  │ │  [Icon]  │ │    │  │ (02) Lahenduste        │  │  │   │
│  │  │ │    02    │ │    │  │      kavandamine       │  │  │   │
│  │  │ │          │ │    │  │  (highlighted - white) │  │  │   │
│  │  │ └──────────┘ │    │  └────────────────────────┘  │  │   │
│  │  │              │    │                              │  │   │
│  │  │ Description  │    │  (03) Praktiline teostus    │  │   │
│  │  │ text here    │    │  ─────────────────────────  │  │   │
│  │  │              │    │                              │  │   │
│  │  └──────────────┘    │  (04) Tulemuste analüüs     │  │   │
│  │                      │  ─────────────────────────  │  │   │
│  │                      └──────────────────────────────┘  │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

## HTML Struktuur

```html
<section class="block-four-steps">
  <div class="four-steps__container">
    
    <!-- Header -->
    <div class="four-steps__header">
      <div class="four-steps__icon--left">
        [SVG Icon]
      </div>
      <h2 class="four-steps__title">
        Neli sammu eduni
      </h2>
      <div class="four-steps__icon--right">
        [SVG Icon]
      </div>
    </div>

    <!-- Content -->
    <div class="four-steps__content">
      
      <!-- Left Column -->
      <div class="four-steps__left-column">
        <div class="four-steps__card">
          <div class="four-steps__card-background">
            [SVG Background Icon]
          </div>
          <div class="four-steps__card-number">02</div>
        </div>
        <p class="four-steps__card-description">
          Formuleerime eesmärgid...
        </p>
      </div>

      <!-- Right Column -->
      <div class="four-steps__right-column">
        
        <!-- Step 1 -->
        <div class="four-steps__step">
          <span class="four-steps__step-number">(01)</span>
          <span class="four-steps__step-text">Strateegiline analüüs</span>
        </div>

        <!-- Step 2 (Highlighted) -->
        <div class="four-steps__step four-steps__step--highlighted">
          <span class="four-steps__step-number">(02)</span>
          <span class="four-steps__step-text">Lahenduste kavandamine</span>
        </div>

        <!-- Step 3 (Border) -->
        <div class="four-steps__step four-steps__step--border">
          <span class="four-steps__step-number">(03)</span>
          <span class="four-steps__step-text">Praktiline teostus</span>
        </div>

        <!-- Step 4 (Border) -->
        <div class="four-steps__step four-steps__step--border">
          <span class="four-steps__step-number">(04)</span>
          <span class="four-steps__step-text">Tulemuste analüüs</span>
        </div>

      </div>
    </div>

  </div>
</section>
```

## CSS Klassid Hierarhia

```
.block-four-steps
├── .four-steps__container
    ├── .four-steps__header
    │   ├── .four-steps__icon--left
    │   ├── .four-steps__title
    │   └── .four-steps__icon--right
    │
    └── .four-steps__content
        ├── .four-steps__left-column
        │   ├── .four-steps__card
        │   │   ├── .four-steps__card-background
        │   │   └── .four-steps__card-number
        │   └── .four-steps__card-description
        │
        └── .four-steps__right-column
            └── .four-steps__step (x4)
                ├── .four-steps__step--highlighted (optional)
                ├── .four-steps__step--border (optional)
                ├── .four-steps__step-number
                └── .four-steps__step-text
```

## ACF Väljade Struktuur

```
Four Steps Block
├── Anchor (ID)                    [text]
├── Header
│   ├── Header Icon Left           [select: x, asterisk, star]
│   ├── Header Title               [text]
│   └── Header Icon Right          [select: x, asterisk, star]
├── Card
│   ├── Card Background Icon       [select: asterisk-stroke, x, star]
│   ├── Card Number                [text, max 3 chars]
│   └── Card Description           [textarea]
└── Steps                          [repeater, min 1, max 4]
    ├── Step Text                  [text]
    ├── Is Highlighted             [true/false]
    └── Has Border                 [true/false]
```

## Failide Struktuur

```
sharks2025/
├── template-parts/
│   └── blocks/
│       └── four-steps/
│           ├── four-steps.php      ← PHP Template
│           └── README.md           ← Quick Reference
│
├── assets/
│   └── css/
│       └── 30-components/
│           └── four-steps.css      ← Styles
│
├── acf-json/
│   └── group_four_steps.json       ← ACF Config
│
├── inc/
│   └── blocks.php                  ← Block Registration
│
└── docs/
    ├── demo-four-steps.html        ← Demo
    ├── FOUR-STEPS-SUMMARY.md       ← Full Docs
    ├── FOUR-STEPS-KASUTUSJUHEND.md ← User Guide
    ├── FOUR-STEPS-INSTALLATION.md  ← Installation
    └── FOUR-STEPS-STRUCTURE.md     ← This File
```

## Ikoonide Mapping

```php
$icon_map = [
    'x'               => '<svg>...</svg>',  // X (Rist)
    'asterisk'        => '<svg>...</svg>',  // Asterisk (Tärn)
    'star'            => '<svg>...</svg>',  // Star (Täht)
    'asterisk-stroke' => '<svg>...</svg>',  // Asterisk Stroke (Tärn kontuuriga)
];
```

### Ikoonide Kasutus

| Ikoon             | Header Left | Header Right | Card Background |
|-------------------|-------------|--------------|-----------------|
| X (Rist)          | ✅          | ✅           | ✅              |
| Asterisk (Tärn)   | ✅          | ✅           | ❌              |
| Star (Täht)       | ✅          | ✅           | ✅              |
| Asterisk Stroke   | ❌          | ❌           | ✅ (default)    |

## Responsive Breakpoints

```css
/* Desktop (Default) */
> 1200px
- Two columns (card left, steps right)
- Full size icons (62px)
- Full size fonts (82px title, 32px steps)

/* Tablet */
768px - 1200px
- Single column (card top, steps bottom)
- Medium icons (40px)
- Medium fonts (48px title, 24px steps)

/* Mobile */
480px - 768px
- Single column
- Small icons (40px)
- Small fonts (36px title, 20px steps)

/* Small Mobile */
< 480px
- Single column
- Minimal sizes
- Optimized spacing
```

## Värviskeemid

```css
/* Colors */
--bg-color:         #f7f7f5  /* Light gray background */
--card-bg:          #000000  /* Black card */
--text-color:       #000000  /* Black text */
--number-color:     #bbbab6  /* Gray step numbers */
--border-color:     #bbbab6  /* Gray borders */
--highlight-bg:     #ffffff  /* White highlight */
```

## Spacing System

```css
/* Container */
max-width: 1440px
padding: 120px 58px

/* Gaps */
header-content-gap: 82px
left-right-gap: 62px
card-description-gap: 22px
steps-gap: 30px
step-internal-gap: 50px

/* Card */
width: 513px
height: 350px
```

## Sammude Variandid

### 1. Tavaline Samm
```html
<div class="four-steps__step">
  <span class="four-steps__step-number">(01)</span>
  <span class="four-steps__step-text">Strateegiline analüüs</span>
</div>
```

### 2. Esiletõstetud Samm
```html
<div class="four-steps__step four-steps__step--highlighted">
  <span class="four-steps__step-number">(02)</span>
  <span class="four-steps__step-text">Lahenduste kavandamine</span>
</div>
```

### 3. Samm Äärega
```html
<div class="four-steps__step four-steps__step--border">
  <span class="four-steps__step-number">(03)</span>
  <span class="four-steps__step-text">Praktiline teostus</span>
</div>
```

### 4. Esiletõstetud + Äärega
```html
<div class="four-steps__step four-steps__step--highlighted four-steps__step--border">
  <span class="four-steps__step-number">(04)</span>
  <span class="four-steps__step-text">Tulemuste analüüs</span>
</div>
```

## Data Flow

```
ACF Fields
    ↓
PHP Template (four-steps.php)
    ↓
HTML Output
    ↓
CSS Styling (four-steps.css)
    ↓
Browser Rendering
```

## Block Registration Flow

```
inc/blocks.php
    ↓
acf_register_block_type()
    ↓
WordPress Block Registry
    ↓
Gutenberg Editor
    ↓
ACF Fields (acf-json/group_four_steps.json)
    ↓
User Input
    ↓
Render Template (four-steps.php)
    ↓
Frontend Display
```

---

**Loodud:** 2026-01-29  
**Versioon:** 1.0.0  
**Autor:** Marketing Sharks
