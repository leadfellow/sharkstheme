# Case Studies Portfolio - Kasutajajuhend

## 📋 Ülevaade

Case Studies (Portfoolio/Projektivaade) funktsioon võimaldab sul kuvada oma tehtud töid, projekte ja klientide eduloo. See koosneb:

- ✅ **Custom Post Type**: `case_study` 
- ✅ **Taxonomies**: Categories & Tags
- ✅ **2 ACF Blokki**: Case Study Detail, Case Studies Grid
- ✅ **Template'id**: Single, Archive
- ✅ **Dummy Data**: Placeholder content eelvaateks

---

## 🚀 Kiire Algus

### 1. Aktiveeri Permalinks

Pärast Case Studies aktiveerimist:

1. WordPress Admin → **Settings** → **Permalinks**
2. Lihtsalt vajuta **Save Changes** (permalink'id uuenevad)
3. Nüüd töötab `/case-studies/` URL

### 2. Lisa Uus Case Study

1. WordPress Admin → **Case Studies** → **Add New**
2. Täida väljad:
   - **Title**: Projekti nimi (nt "E-Commerce Platform Redesign")
   - **Excerpt**: Lühike kirjeldus (näidatakse kaartidel)
   - **Featured Image**: Kaanepilt
   - **Case Study Details** (ACF fields):
     - Client Name
     - Project Timeline
     - Project Year
     - Hero Image (suur pilt)
     - The Challenge
     - The Solution
     - The Results
     - Key Features (list)
     - Technologies Used (list)
     - Metrics (numbrid ja labelid)
     - Client Testimonial
     - Gallery
     - Website URL

### 3. Kuva Case Studies Grid Blokina

Lehe editoris:

1. Lisa block: **Case Studies Grid**
2. Seadista:
   - Section Title: "Our Work"
   - Section Subtitle: "Explore our projects"
   - Number to Show: 6
   - Grid Layout: 2-col / 3-col / 4-col
   - Show Excerpt: ✅
   - Show View All Button: ✅
   - Filter by Category (optional)

### 4. Kasuta Pattern'id

Block Inserter → **Patterns** → **Sections** või **Landing Pages**:

- **Case Studies Grid (3 Columns)** - Standard 3-veerune grid
- **Case Studies Portfolio (2 Columns)** - 2-veerune detailsem vaade
- **Portfolio Landing Page** - Hero + Case Studies + CTA (täisleht)

---

## 📂 Failistruktuur

```
wp-content/themes/sharks2025/
├── inc/
│   ├── post-types.php (Custom Post Type registreerimine)
│   ├── blocks.php (ACF blokid)
│   └── patterns.php (Block patterns)
├── template-parts/blocks/
│   ├── case-studies-grid/
│   │   └── case-studies-grid.php
│   └── case-study-detail/
│       └── case-study-detail.php
├── single-case_study.php (Üksiku case study vaade)
├── archive-case_study.php (Kõikide case studies list)
├── acf-json/
│   ├── group_case_study.json (Post type ACF fields)
│   ├── group_case_studies_grid.json (Grid block fields)
│   └── group_case_study_detail.json (Detail block fields)
└── assets/css/30-components/
    └── case-study.css
```

---

## 🎨 Blokid

### 1. **Case Studies Grid** (`acf/case-studies-grid`)

Kuvab case studies'e grid layout'is.

**Seadistused:**
- Section Title & Subtitle
- Posts to Show (number)
- Filter by Category
- Grid Layout (2-col, 3-col, 4-col)
- Show Excerpt (true/false)
- Show CTA Button (true/false)

**Dummy Data:**
Kui pole ühtegi case study'd, näitab automaatselt 6 placeholder case study'd.

**Kasutamine:**
```
<!-- wp:acf/case-studies-grid {
  "data":{
    "section_title":"Our Work",
    "posts_to_show":"6",
    "grid_layout":"3-col",
    "show_excerpt":"1"
  }
} /-->
```

### 2. **Case Study Detail** (`acf/case-study-detail`)

Kuvab üksiku case study detailse vaate.

**Seadistused:**
- Select Case Study (post picker)
- Sections to Display (checkboxes):
  - Hero Image
  - Project Overview
  - The Challenge
  - The Solution
  - The Results
  - Key Features
  - Metrics
  - Technologies
  - Testimonial
  - Gallery

**Dummy Data:**
Kui pole valitud case study'd või pole ACF andmeid, näitab placeholder sisu.

**Kasutamine:**
- Lisa blokina mistahes lehele
- Vali case study post picker'ist
- Vali, milliseid sektsioone kuvada

---

## 📄 Template'id

### Single Case Study (`single-case_study.php`)

Kuvab üksiku case study täisvaate.

**URL:** `/case-studies/my-project/`

**Sisaldab:**
- Hero Image (täislaius)
- Project Overview (title, excerpt, meta: client, timeline, year, website URL)
- The Challenge
- The Solution
- Key Features (list)
- The Results
- Metrics (suur grid numbrite ja statistikaga)
- Technologies (badge'id)
- Client Testimonial (quote)
- Gallery (pildid)
- Main Content (WP editor content)
- Navigation (prev/next case studies)

### Archive Case Studies (`archive-case_study.php`)

Kuvab kõik case studies'e.

**URL:** `/case-studies/`

**Sisaldab:**
- Archive Header (title, description)
- Case Study Cards (3-column grid)
- Pagination

**Category Archive:**
URL: `/case-study-category/web-development/`

**Tag Archive:**
URL: `/case-study-tag/wordpress/`

---

## 🎨 Styling

### CSS Classes

**Grid:**
```css
.case-studies-grid
.case-studies-grid__header
.case-studies-grid__title
.case-studies-grid__subtitle
.case-studies-grid__grid (--2-col, --3-col, --4-col)
.case-studies-grid__cta
```

**Card:**
```css
.case-study-card
.case-study-card__image (--placeholder)
.case-study-card__overlay
.case-study-card__content
.case-study-card__meta
.case-study-card__title
.case-study-card__excerpt
.case-study-card__link
.case-study-card__categories
.case-study-card__category
```

**Detail:**
```css
.case-study-detail
.case-study-detail__hero
.case-study-detail__overview
.case-study-detail__title
.case-study-detail__lead
.case-study-detail__meta
.case-study-detail__section
.case-study-detail__section-title
.case-study-detail__features
.case-study-detail__metrics
.case-study-detail__metric
.case-study-detail__technologies
.case-study-detail__tech-badge
.case-study-detail__testimonial
.case-study-detail__quote
.case-study-detail__gallery
.case-study-detail__navigation
```

### CSS Custom Properties

Kasutab teema muutujaid:
```css
--color-primary
--color-secondary
--color-text
--color-text-light
--color-bg
--color-bg-light
--color-border
--space-1 ... --space-6
--fs-h1, --fs-h2, --fs-h3
--lh-tight, --lh-normal, --lh-relaxed
--radius-sm, --radius-m, --radius-lg
--transition-fast, --transition-normal
```

---

## 📊 ACF Fields

### Case Study Post Type Fields

| Field | Type | Description |
|-------|------|-------------|
| `client_name` | Text | Kliendi nimi |
| `project_timeline` | Text | Projekti kestus (nt "3 months") |
| `project_year` | Number | Projekti aasta |
| `hero_image` | Image | Suur hero pilt |
| `challenge` | Textarea | Probleem/väljakutse |
| `solution` | Textarea | Lahendus |
| `results` | Textarea | Tulemused |
| `key_features` | Repeater | Põhilised funktsioonid |
| `technologies` | Repeater | Kasutatud tehnoloogiad |
| `metrics` | Repeater | Statistika (value + label) |
| `testimonial` | Group | Kliendi tagasiside (text, author, position) |
| `gallery` | Gallery | Projektipildid |
| `website_url` | URL | Link projekti lehele |

### Case Studies Grid Block Fields

| Field | Type | Description |
|-------|------|-------------|
| `section_title` | Text | Sektsiooni pealkiri |
| `section_subtitle` | Textarea | Alapealkiri |
| `posts_to_show` | Number | Mitu case study'd näidata |
| `filter_category` | Taxonomy | Filtreeri kategooria järgi |
| `grid_layout` | Select | 2-col / 3-col / 4-col |
| `show_excerpt` | True/False | Näita excerpt'i |
| `show_cta` | True/False | Näita "View All" nuppu |

### Case Study Detail Block Fields

| Field | Type | Description |
|-------|------|-------------|
| `select_case_study` | Post Object | Vali case study |
| `show_sections` | Checkbox | Vali kuvatavad sektsioonid |

---

## 🔧 Kohandamine

### Muuda Grid Columns

`archive-case_study.php` või `case-studies-grid.php`:

```php
// Muuda 3-col → 4-col
<div class="case-studies-grid__grid case-studies-grid__grid--4-col">
```

CSS-is:
```css
.case-studies-grid__grid--custom {
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
}
```

### Lisa Custom Taxonomy Filter

`archive-case_study.php` enne grid'i:

```php
<div class="case-study-filters">
  <?php
  $categories = get_terms([
    'taxonomy' => 'case_study_category',
    'hide_empty' => true
  ]);
  
  foreach ($categories as $cat) {
    echo '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
  }
  ?>
</div>
```

### Muuda Metrics Color

`assets/css/30-components/case-study.css`:

```css
.case-study-detail__metrics {
  background: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 100%);
}
```

---

## 💡 Näpunäited

### Hero Image Optimeerimiseks

- **Soovitatud suurus:** 1920x800px
- **Formaat:** JPEG (optimeeritud)
- **Max faili suurus:** <500KB
- **Aspect ratio:** 21:9 (ultra-wide)

### Card Thumbnail

- **Soovitatud suurus:** 800x500px
- **Aspect ratio:** 16:10
- **Auto-crop:** WordPress `large` size

### Gallery Images

- **Soovitatud suurus:** 1200x800px
- **Aspect ratio:** 3:2
- **Lightbox:** (tulevikus integreerida)

### SEO

Lisa excerpt iga case study'le:
```
- Excerpt = meta description
- 150-160 tähemärki
- Sisaldab võtmesõnu
- Kutsub tegevusele
```

### Categories vs Tags

**Categories (Kategooriad):**
- Laiemad grupid
- Nt: Web Development, Mobile Apps, Branding

**Tags (Sildid):**
- Spetsiifilised märksõnad
- Nt: WordPress, React, E-commerce, Healthcare

---

## 🐛 Troubleshooting

### Case Studies ei ilmu

1. Kontrolli, kas `inc/post-types.php` on require'itud `functions.php`-s
2. Mine Settings → Permalinks → Save Changes
3. Hard refresh lehte (Ctrl+Shift+R)

### ACF väljad ei kuvatu

1. Kontrolli, kas ACF Pro on aktiivne
2. Vaata, kas `acf-json/group_case_study.json` eksisteerib
3. WordPress Admin → ACF → Sync (kui vaja)

### Grid näitab alati dummy data

1. Kontrolli, kas on olemas published case study'd
2. Vaata `WP_Query` debug'i:
```php
var_dump($case_studies->post_count);
```

### CSS ei lae

1. Kontrolli, kas `case-study.css` on lisatud `site.css`-i
2. Kontrolli, kas see on lisatud `inc/theme.php` `add_editor_style` array'sse
3. Increment theme version (`functions.php`)
4. Hard refresh

---

## 📚 Edasised Sammud

### Täiendamised:

1. **Ajax Filter** - Filtreeri case studies ilma lehte refreshimata
2. **Lightbox** - Suurenda gallery pilte
3. **Related Case Studies** - Näita sarnaseid projekte
4. **Load More** - Infinite scroll
5. **Search** - Otsi case studies'e
6. **Social Share** - Jaga case study'd

### Integratsioonid:

- **Yoast SEO** - Meta fields
- **Contact Form 7** - Projekti inquiry form
- **WPML** - Multikeel tugi

---

## ✅ Checklist

Enne live'i minekut kontrolli:

- [ ] Vähemalt 6 case study'd lisatud
- [ ] Kõik ACF väljad täidetud
- [ ] Hero images optimeeritud
- [ ] Excerpts kirjutatud (SEO)
- [ ] Categories määratud
- [ ] Permalinks saved
- [ ] Mobile responsive testu
- [ ] Cross-browser test (Chrome, Firefox, Safari)
- [ ] Page speed test
- [ ] 404 error check

---

## 🎉 Valmis!

Case Studies süsteem on nüüd valmis kasutamiseks!

**Archive URL:** `/case-studies/`  
**Single URL:** `/case-studies/your-project-name/`

Lisa uusi projekte, kasuta blokke ja pattern'e, ning näita oma tööd maailmale! 🚀

