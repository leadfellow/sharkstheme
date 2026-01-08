# Blog Posts Block

Dünaamiline blogi postituste blokk kategooriate filtri ja kahe laadimise tüübiga.

## Funktsioonid

### 1. Postituste arv
- Vali 2-20 postitust korraga (paarisarvud)
- Default: 6 postitust

### 2. Hover värv
- Kohandatav värv hover efektidele
- Rakendub:
  - Kategooria nimed
  - Postituse pealkirjad
  - "Vaata lähemalt" link
  - Noolte taust
  - Navigatsiooni linkidel
- Default: `#f237a6` (roosa)

### 3. Laadimise tüüp

#### Pagination (Lehekülgede numbrid)
- Klassikaline lehekülgede vahetus
- Numbrid ja "Eelmine/Järgmine" nupud
- URL muutub (SEO sõbralik)

#### Infinite Scroll (Kerides laeb juurde)
- "Laadi veel" nupp
- Automaatne laadimine scrollides
- AJAX põhine
- Smooth kasutajakogemus

### 4. Kategooriate filter
- Näita/peida kategooriate navigatsioon
- Aktiivne kategooria on märgitud punktiga
- AJAX filtreerimine (lehte ei laadita)
- "Kõik postitused" valik

## ACF Väljad

```
- posts_per_page (number): 2-20, default 6
- hover_color (color_picker): default #f237a6
- loading_type (select): pagination | infinite
- show_categories (true_false): default true
```

## Kasutamine

1. Lisa blokk Gutenberg editoris
2. Vali "Blog Posts" Sharks Blocks kategooriast
3. Konfigureeri seaded:
   - Määra postituste arv
   - Vali hover värv
   - Vali laadimise tüüp
   - Lülita kategooriad sisse/välja

## Stiilid

Blokk kasutab:
- Hover efektid piltidel (zoom)
- Smooth transitsioonid
- Responsive disain (mobile-first)
- Kahe-veerune grid (desktop)
- Üks-veerune grid (mobile)

## AJAX Endpointid

### Load More
```
POST /wp-admin/admin-ajax.php
action: load_more_blog_posts
page: int
posts_per_page: int
category: string
hover_color: string
```

### Filter
```
POST /wp-admin/admin-ajax.php
action: filter_blog_posts
category: string
posts_per_page: int
hover_color: string
loading_type: string
```

## Näide

```html
<!-- Bloki väljund -->
<div class="blog-posts-block" data-loading-type="infinite" data-hover-color="#f237a6">
  <nav class="blog-nav">...</nav>
  <div class="blog-posts-grid">
    <div class="blog-posts-row">
      <article class="blog-post-card">...</article>
      <article class="blog-post-card">...</article>
    </div>
  </div>
  <button class="blog-load-more">Laadi veel</button>
</div>
```

## Responsive

- **Desktop (>920px)**: 2 postitust reas
- **Tablet (480-920px)**: 1 postitus reas, keskele joondatud
- **Mobile (<480px)**: 1 postitus reas, täislaius

## Failid

```
template-parts/blocks/blog-posts/
├── blog-posts.php          # Bloki template
└── README.md               # Dokumentatsioon

assets/css/30-components/
└── blog-posts.css          # Stiilid

assets/js/
└── blog-posts.js           # JavaScript (AJAX)

acf-json/
└── group_blog_posts.json   # ACF konfiguratsioon

inc/
└── blocks.php              # Bloki registreerimine

functions.php               # AJAX funktsioonid
```

## Märkmed

- Kasutab WordPress standardseid postitusi (`post` post type)
- Kategooriad tulevad WordPress taxonomy'st
- Fallback pilt Unsplash'ist kui featured image puudub
- SEO optimeeritud (proper heading tags, alt texts)
- Accessibility friendly (semantic HTML)
