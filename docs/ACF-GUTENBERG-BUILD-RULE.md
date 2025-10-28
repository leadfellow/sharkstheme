# ACF + Gutenberg Build Rule (Cursor/Claude)

**Eesmärk:** Võta Figma kujundus → too värvid/typograafia/spacing tokens → ehita WordPressi teema, kus plokid on ACF Blockid ja stiilid on tokenitel põhinev CSS.

**Fookus:** Puhas struktuur, editor = front, minimaalne kood, copy-paste valmidus.

---

## 0) Eeldused / põhimõtted

- **Stack:** WordPress (Gutenberg), ACF Pro, oma teema (või child-teema)
- **Strateegia:** Figma Styles/Variables → CSS custom properties → theme.json + :root tokenid → ACF Blocks (PHP + CSS)
- **Kvaliteet:** editor kasutab sama CSS-i (editor-styles), Grid/Flex, gap, clamp(), SVG inline kui vaja värvi muuta
- **Nimekonventsioon:** komponendipõhine CSS (`.block-hero`, `.card`, `.btn`), utility'd minimaalselt

---

## 1) Kaustastruktuur

```
your-theme/
├─ functions.php
├─ theme.json
├─ acf-json/                     # (ACF Local JSON – versioneerimine)
├─ inc/
│  ├─ theme.php                  # toed, enqueued CSS
│  └─ blocks.php                 # ACF blockide register
├─ assets/
│  └─ css/
│     ├─ site.css                # front + tokenid
│     ├─ editor.css              # editor – importib site.css
│     ├─ 00-settings/variables.css
│     ├─ 20-elements/typography.css
│     ├─ 30-components/{button.css, card.css, hero.css}
│     └─ 40-layout/{grid.css, header.css}
└─ template-parts/
   └─ blocks/
      ├─ hero/hero.php
      └─ card-grid/card-grid.php
```

---

## 2) Figma → tokenid

1. Pane Figma's **Color/Text Styles + Variables** paika
2. Ekspordi CSS custom properties (Dev Mode → Inspect või Tokens Studio → Export → CSS)
3. Loo `assets/css/00-settings/variables.css`:

```css
:root {
  --color-primary: #3B82F6;
  --color-accent: #F59E0B;
  --color-text: #111827;
  --color-bg: #ffffff;

  --font-sans: "Inter", system-ui, sans-serif;

  --fs-h1: clamp(28px, 2.6vw, 48px);
  --fs-h2: clamp(22px, 2.0vw, 36px);
  --fs-body: 16px;

  --space-1: .5rem;
  --space-2: 1rem;
  --space-3: 1.5rem;
  --radius-m: 12px;
}
```

---

## 3) theme.json (toimiv editor + palett)

```json
{
  "version": 2,
  "settings": {
    "spacing": { 
      "units": ["px","rem","%","vw"], 
      "blockGap": "1.2rem" 
    },
    "color": {
      "palette": [
        { "slug": "primary", "name": "Primary", "color": "var(--color-primary)" },
        { "slug": "accent",  "name": "Accent",  "color": "var(--color-accent)" },
        { "slug": "text",    "name": "Text",    "color": "var(--color-text)" }
      ]
    },
    "typography": {
      "fontFamilies": [
        { "slug": "sans", "name": "Inter", "fontFamily": "var(--font-sans)" }
      ]
    }
  },
  "styles": {
    "typography": { "fontFamily": "var(--font-sans)" },
    "color": { "text": "var(--color-text)", "background": "var(--color-bg)" }
  }
}
```

---

## 4) Teema hook'id + CSS-i laadimine

### inc/theme.php

```php
<?php
add_action('after_setup_theme', function () {
  add_theme_support('editor-styles');
  add_editor_style('assets/css/editor.css'); // editor = front
  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
});

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('site', get_stylesheet_directory_uri().'/assets/css/site.css', [], '1.0');
});
```

### assets/css/site.css

```css
@import url('./00-settings/variables.css');

html { font-size: 100%; }
body { 
  font-family: var(--font-sans); 
  line-height: 1.5; 
  color: var(--color-text); 
  background: var(--color-bg); 
}
.container { 
  width: min(1100px, 92vw); 
  margin-inline: auto; 
  padding-inline: var(--space-2); 
}
.grid { 
  display: grid; 
  gap: var(--space-2); 
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); 
}
```

### assets/css/editor.css

```css
@import url('./site.css');
.editor-styles-wrapper .container { max-width: none; }
```

---

## 5) ACF Blocks registreerimine

### functions.php

```php
<?php
require_once get_stylesheet_directory() . '/inc/theme.php';
require_once get_stylesheet_directory() . '/inc/blocks.php';
```

### inc/blocks.php

```php
<?php
add_action('acf/init', function() {
  if (!function_exists('acf_register_block_type')) return;

  acf_register_block_type([
    'name'            => 'hero',
    'title'           => __('Hero'),
    'description'     => __('Suur pealkiri + tekst + CTA'),
    'render_template' => 'template-parts/blocks/hero/hero.php',
    'category'        => 'layout',
    'icon'            => 'cover-image',
    'keywords'        => ['hero','banner'],
    'supports'        => [
      'align'   => ['wide','full'],
      'anchor'  => true,
      'spacing' => ['padding','margin'],
      'color'   => ['text','background','link']
    ],
    'mode'            => 'preview'
  ]);

  acf_register_block_type([
    'name'            => 'card-grid',
    'title'           => __('Card Grid'),
    'render_template' => 'template-parts/blocks/card-grid/card-grid.php',
    'category'        => 'layout',
    'icon'            => 'screenoptions',
    'supports'        => [
      'align'   => ['wide','full'],
      'anchor'  => true,
      'spacing' => ['padding','margin'],
      'color'   => ['background']
    ]
  ]);
});
```

---

## 6) ACF Field Groupid (schema)

### Hero Block
**Location:** Block == acf/hero

- `headline` (Text)
- `subheadline` (Textarea)
- `cta_text` (Text)
- `cta_url` (URL)
- `media` (Image)
- *(valikuline)* `style_variant` (Select: Default/Accent)

### Card Grid Block
**Location:** Block == acf/card-grid

- `intro_title` (Text)
- `cards` (Repeater)
  - `title` (Text)
  - `text` (Textarea)
  - `icon` (Image / või SVG raw)

**Soovitus:** Aktiveeri **ACF Local JSON** – loo juurkausta `acf-json/` (ACF salvestab definitsioonid failidena ja saad Git'is versioneerida).

---

## 7) Render-mallid (PHP)

### template-parts/blocks/hero/hero.php

```php
<?php
$headline     = get_field('headline') ?: 'Your headline';
$subheadline  = get_field('subheadline') ?: '';
$cta_text     = get_field('cta_text') ?: '';
$cta_url      = get_field('cta_url') ?: '';
$media        = get_field('media');
$align_class  = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor       = !empty($block['anchor']) ? $block['anchor'] : 'hero-' . $block['id'];
?>
<section id="<?php echo esc_attr($anchor); ?>" class="block-hero<?php echo esc_attr($align_class); ?>">
  <div class="container block-hero__inner">
    <div class="block-hero__content">
      <h1 class="block-hero__title"><?php echo esc_html($headline); ?></h1>
      <?php if ($subheadline): ?>
        <p class="block-hero__text"><?php echo esc_html($subheadline); ?></p>
      <?php endif; ?>
      <?php if ($cta_text && $cta_url): ?>
        <a class="btn" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?></a>
      <?php endif; ?>
    </div>
    <?php if ($media): ?>
      <figure class="block-hero__media">
        <?php echo wp_get_attachment_image($media, 'large'); ?>
      </figure>
    <?php endif; ?>
  </div>
</section>
```

### assets/css/30-components/hero.css

```css
.block-hero { 
  padding: clamp(2rem, 6vw, 6rem) 0; 
  background: var(--color-bg); 
}
.block-hero__inner { 
  display: grid; 
  gap: var(--space-3); 
  grid-template-columns: 1.2fr .8fr; 
  align-items: center; 
}
.block-hero__title { 
  font-size: var(--fs-h1); 
  margin: 0 0 var(--space-2); 
}
.block-hero__text { 
  font-size: var(--fs-body); 
  margin: 0 0 var(--space-2); 
  color: var(--color-text); 
}
.block-hero__media img { 
  border-radius: var(--radius-m); 
  width: 100%; 
  height: auto; 
}
.btn { 
  display: inline-flex; 
  align-items: center; 
  gap: .5rem; 
  padding: .75rem 1rem; 
  border-radius: 9999px; 
  background: var(--color-primary); 
  color: #fff; 
  text-decoration: none; 
}
@media (max-width: 900px) { 
  .block-hero__inner { grid-template-columns: 1fr; } 
}
```

### template-parts/blocks/card-grid/card-grid.php

```php
<?php
$intro = get_field('intro_title');
$cards = get_field('cards') ?: [];
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'card-grid-' . $block['id'];
?>
<section id="<?php echo esc_attr($anchor); ?>" class="block-card-grid">
  <div class="container">
    <?php if ($intro): ?>
      <h2 class="block-card-grid__title"><?php echo esc_html($intro); ?></h2>
    <?php endif; ?>
    <div class="grid">
      <?php foreach ($cards as $c): ?>
        <article class="card">
          <?php if (!empty($c['icon'])): ?>
            <div class="card__icon"><?php echo wp_get_attachment_image($c['icon'], 'thumbnail'); ?></div>
          <?php endif; ?>
          <h3 class="card__title"><?php echo esc_html($c['title'] ?? ''); ?></h3>
          <p class="card__text"><?php echo esc_html($c['text'] ?? ''); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
```

### assets/css/30-components/card.css

```css
.card { 
  background: #fff; 
  border-radius: var(--radius-m); 
  padding: var(--space-2); 
  box-shadow: 0 2px 10px rgba(0,0,0,.06); 
}
.card__title { 
  font-size: var(--fs-h2); 
  margin: 0 0 .4rem; 
}
.card__text { 
  color: var(--color-text); 
}
```

---

## 8) Block Styles & Patternid

### Block Style (näide)

```php
add_action('init', function(){
  register_block_style('acf/card-grid', [
    'name'  => 'elevated',
    'label' => __('Elevated')
  ]);
});
```

```css
.is-style-elevated .card { 
  box-shadow: 0 8px 24px rgba(0,0,0,.12); 
}
```

### Pattern (Hero + Cards)

```php
register_block_pattern('theme/landing-hero-cards', [
  'title' => __('Landing: Hero + Cards'),
  'content' =>
    '<!-- wp:acf/hero {"name":"acf/hero","data":{"headline":"Grow with partners","subheadline":"Send, receive, and close deals together."}} /-->' .
    '<!-- wp:acf/card-grid {"name":"acf/card-grid","data":{"intro_title":"Why choose us"}} /-->',
  'categories' => ['landing']
]);
```

---

## 9) Asset reeglid

- **SVG ikoonid:** inline HTML-ina kui vajad dünaamilist värvi (`fill: currentColor;`)
- **Pildid:** WebP/AVIF, responsive suurused (`wp_get_attachment_image`)
- **Figma mõõdud:** kasuta Grid/Flex + gap; ära lukusta kõiki px-dega

---

## 10) Kontrollnimekiri (PR enne merge'i)

- [ ] `:root` tokenid kattuvad Figma värvide/typo/spacinguga
- [ ] `theme.json` palett töötab editoris (värvivalik plokkides)
- [ ] Editor = front (`editor.css` importib `site.css`)
- [ ] ACF Field Groupid on `acf-json/` all (git versioonis)
- [ ] Plokid renderduvad ilma PHP notice'iteta, `esc_html()`/`esc_url()`
- [ ] Mobile: Grid → 1 veerg (≤900px), piisav tap target nuppudel
- [ ] Pildid optimeeritud, `loading="lazy"` vaikimisi WP poolt OK
- [ ] Block Styles/Patternid olemas kordussektsioonide kiiruseks

---

## 11) Kiire FAQ

### Kas Figma → koodi generaatorit kasutada?
Võib prototüübiks (Anima/Locofy), aga puhasta output: eemalda liigsed divid/inline stiil, vii väärtused tokeniteks.

### Kuidas Gutenbergis "variant" lahendada?
`register_block_style()` + `.is-style-…` CSS **või** ACF select → lisa wrapperile variant-klass.

### Kuidas hoida editorit visuaalselt sama?
`add_theme_support('editor-styles')` + `add_editor_style('assets/css/editor.css')` ja kasuta samu token'eid.

---

## 12) Copy-paste stardipaketid

- **Lisatoed + CSS load:** `inc/theme.php` (ülal)
- **Block register:** `inc/blocks.php` (ülal)
- **Tokenid:** `assets/css/00-settings/variables.css`
- **Front CSS:** `assets/css/site.css`
- **Editor CSS:** `assets/css/editor.css`
- **Hero PHP + CSS:** `template-parts/blocks/hero/hero.php` + `assets/css/30-components/hero.css`
- **Card Grid PHP + CSS:** `template-parts/blocks/card-grid/card-grid.php` + `assets/css/30-components/card.css`

---

## 13) Laiendused (valikuline)

- PostCSS Autoprefixer (build pipeline)
- SCSS kui tiim eelistab (kompileeri → `site.css`)
- Design Tokens CSV/JSON → genereeri `variables.css` automaatselt


