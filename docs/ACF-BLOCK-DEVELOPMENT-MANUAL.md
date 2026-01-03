# ACF Blokide Arendamise Manuaal

## 📚 Sisukord

1. [Ülevaade](#ülevaade)
2. [Eeldused](#eeldused)
3. [Failistruktuur](#failistruktuur)
4. [Samm-sammult juhend uue bloki loomiseks](#samm-sammult-juhend-uue-bloki-loomiseks)
5. [ACF Field Group loomine](#acf-field-group-loomine)
6. [PHP Template loomine](#php-template-loomine)
7. [CSS Stiilide lisamine](#css-stiilide-lisamine)
8. [JavaScript lisamine](#javascript-lisamine)
9. [Best Practices](#best-practices)
10. [Näited](#näited)
11. [Troubleshooting](#troubleshooting)

---

## Ülevaade

See manuaal kirjeldab, kuidas luua ja hallata ACF (Advanced Custom Fields) blokke Sharks 2025 WordPress teemas. Projekt kasutab **ACF Pro** pluginat koos **ACF Local JSON** funktsionaalsusega, mis võimaldab versiooni kontrolli ja meeskonnatööd.

### Projektis kasutatav arhitektuur:

```
ACF Block = Registreering (PHP) + Field Group (JSON) + Template (PHP) + Stiilid (CSS) + JS (valikuline)
```

---

## Eeldused

Enne alustamist veendu, et sul on:

- ✅ **ACF Pro** plugin installitud ja aktiveeritud
- ✅ **WordPress 6.0+** ja **PHP 7.4+**
- ✅ Ligipääs koodieditorile
- ✅ Arusaam ACF väljadest (text, textarea, repeater, image, jne)
- ✅ Põhiteadmised PHP, HTML, CSS ja WordPressi teemasüsteemist

---

## Failistruktuur

Projekt järgib selget ja loogilist failistruktuuri:

```
sharks2025/
├── functions.php                          # Laadib inc/ failid
├── inc/
│   ├── blocks.php                         # ⭐ Kõik ACF blokide registreerimised
│   ├── theme.php
│   ├── post-types.php
│   └── patterns.php
├── template-parts/blocks/
│   └── {block-name}/                      # ⭐ Iga bloki kaust
│       ├── {block-name}.php               # ⭐ Template fail
│       └── README.md (valikuline)         # Bloki dokumentatsioon
├── acf-json/                              # ⭐ ACF field groupide JSON failid
│   └── group_{block-name}.json            # ⭐ Auto-genereeritud ACF JSON
├── assets/
│   ├── css/
│   │   ├── 30-components/
│   │   │   └── {block-name}.css           # ⭐ Bloki stiilid
│   │   └── site.css                       # Importib kõik CSS-id
│   └── js/
│       └── {block-name}.js                # ⭐ Bloki JavaScript (valikuline)
└── docs/
    └── *.md                               # Dokumentatsioon
```

### Nimetamiskonventsioonid:

- **Block name:** kebab-case (`hero`, `service-cards`, `two-box-cta`)
- **ACF field names:** snake_case (`section_title`, `cta_text`)
- **CSS class names:** BEM metodoloogia (`.block-hero`, `.block-hero__title`)
- **File names:** kebab-case (`hero.php`, `service-cards.css`)

---

## Samm-sammult juhend uue bloki loomiseks

### SAMM 1: Defineeri bloki nõuded

Enne koodi kirjutamist vasta küsimustele:

- ❓ **Mis on bloki nimi ja eesmärk?** (nt "Testimonials Carousel")
- ❓ **Millised väljad on vajalikud?** (pealkiri, tekst, pildid, repeaterid?)
- ❓ **Kas vajab JavaScripti?** (carousel, accordion, tabs?)
- ❓ **Kas on design mockup?** (Figma link või screenshot)

### SAMM 2: Registreeri blokk

Ava fail **`inc/blocks.php`** ja lisa uus `acf_register_block_type()` registreering.

**Näide: "Testimonials" bloki registreerimine**

```php
// Testimonials Block
acf_register_block_type([
    'name'            => 'testimonials',  // ⚠️ Unikaalne nimi ilma acf/ prefiksita
    'title'           => __('Testimonials', 'sharks2025'),
    'description'     => __('Customer testimonials carousel', 'sharks2025'),
    'render_template' => 'template-parts/blocks/testimonials/testimonials.php',
    'category'        => 'sharks-blocks',  // Kasuta custom kategooriat
    'icon'            => 'format-quote',   // Dashicons ikoon
    'keywords'        => ['testimonials', 'reviews', 'feedback', 'carousel'],
    'supports'        => [
        'align'   => ['wide', 'full'],    // Laiusevalikud
        'anchor'  => true,                 // ID atribuut
        'spacing' => ['padding', 'margin'],
        'color'   => ['text', 'background', 'link']
    ],
    'mode'            => 'preview',        // preview, edit või auto
    'example'         => [                 // Dummy data block picker'is
        'attributes' => [
            'mode' => 'preview',
            'data' => [
                'section_title' => 'What Our Clients Say',
            ]
        ]
    ],
    'enqueue_assets'  => function() {      // ⚠️ Ainult kui vajad JS/CSS
        wp_enqueue_script(
            'testimonials-js',
            get_template_directory_uri() . '/assets/js/testimonials.js',
            [],
            filemtime(get_template_directory() . '/assets/js/testimonials.js'),
            true
        );
    }
]);
```

#### Parameetrite selgitus:

| Parameeter | Kohustuslik | Kirjeldus |
|------------|-------------|-----------|
| `name` | ✅ | Bloki unikaalne nimi (ilma `acf/` prefiksita) |
| `title` | ✅ | Bloki nimi Gutenbergi liides |
| `render_template` | ✅ | Tee PHP template failini |
| `category` | ✅ | Kategooria (kasuta `sharks-blocks`) |
| `icon` | ⚪ | Dashicons ikoon või custom SVG |
| `keywords` | ⚪ | Otsingusõnad bloki leidmiseks |
| `supports` | ⚪ | Gutenbergi funktsioonid (align, color, spacing) |
| `mode` | ⚪ | `preview` (soovitatud), `edit` või `auto` |
| `example` | ⚪ | Dummy data block picker'is |
| `enqueue_assets` | ⚪ | JS/CSS laadimine bloki jaoks |

### SAMM 3: Loo bloki kaust ja PHP template

Loo kaust `template-parts/blocks/{block-name}/` ja sinna fail `{block-name}.php`.

**Näide: `template-parts/blocks/testimonials/testimonials.php`**

```php
<?php
/**
 * Testimonials Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// ====== 1. GET ACF FIELDS ======
$section_title = get_field('section_title') ?: 'What Our Clients Say';
$section_text = get_field('section_text') ?: '';
$testimonials = get_field('testimonials');

// ====== 2. DUMMY DATA (kui pole sisu) ======
if (empty($testimonials)) {
    $testimonials = [
        [
            'client_name' => 'John Doe',
            'client_company' => 'Example Corp',
            'testimonial_text' => 'Great service and professional team!',
            'client_photo' => null
        ],
        [
            'client_name' => 'Jane Smith',
            'client_company' => 'Tech Solutions',
            'testimonial_text' => 'Exceeded our expectations in every way.',
            'client_photo' => null
        ]
    ];
}

// ====== 3. BLOCK ATTRIBUTES ======
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'testimonials-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

?>

<!-- ====== 4. HTML MARKUP ====== -->
<section 
    id="<?php echo esc_attr($anchor); ?>" 
    class="block-testimonials<?php echo esc_attr($align_class . $class_name); ?>"
>
    <div class="container">
        <?php if ($section_title || $section_text): ?>
            <div class="block-testimonials__header">
                <?php if ($section_title): ?>
                    <h2 class="block-testimonials__title"><?php echo esc_html($section_title); ?></h2>
                <?php endif; ?>
                
                <?php if ($section_text): ?>
                    <p class="block-testimonials__text"><?php echo esc_html($section_text); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($testimonials)): ?>
            <div class="block-testimonials__carousel">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="block-testimonials__item">
                        <?php if (!empty($testimonial['client_photo'])): ?>
                            <div class="block-testimonials__photo">
                                <?php echo wp_get_attachment_image($testimonial['client_photo'], 'thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <blockquote class="block-testimonials__quote">
                            <?php echo esc_html($testimonial['testimonial_text'] ?? ''); ?>
                        </blockquote>
                        
                        <cite class="block-testimonials__author">
                            <strong><?php echo esc_html($testimonial['client_name'] ?? ''); ?></strong>
                            <?php if (!empty($testimonial['client_company'])): ?>
                                <span><?php echo esc_html($testimonial['client_company']); ?></span>
                            <?php endif; ?>
                        </cite>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
```

#### Template faili anatoomia:

1. **PHP DocBlock** - faili kirjeldus
2. **Security check** - `if (!defined('ABSPATH')) exit;`
3. **ACF väljad** - `get_field()` kõned fallback väärtustega
4. **Dummy data** - placeholder sisu, kui välju pole täidetud
5. **Block attributes** - align, anchor, className
6. **HTML markup** - semantiline ja puhas HTML koos `esc_html()` ja `esc_attr()`

### SAMM 4: Loo ACF Field Group

**Variant A: WordPressis (UI kaudu)**

1. Mine **Custom Fields → Add New**
2. Pane nimeks: **Block Name Block** (nt "Testimonials Block")
3. Lisa väljad (Text, Textarea, Repeater, Image, jne)
4. **Location rules:** 
   - `Block` → `is equal to` → `acf/testimonials`
5. **Salvesta** - JSON fail luuakse automaatselt `acf-json/` kausta

**Variant B: JSON faili käsitsi loomine**

Loo fail `acf-json/group_testimonials.json`:

```json
{
    "key": "group_testimonials",
    "title": "Testimonials Block",
    "fields": [
        {
            "key": "field_testimonials_section_title",
            "label": "Section Title",
            "name": "section_title",
            "type": "text",
            "instructions": "Main heading for testimonials section",
            "required": 0,
            "default_value": "What Our Clients Say",
            "placeholder": "What Our Clients Say"
        },
        {
            "key": "field_testimonials_section_text",
            "label": "Section Description",
            "name": "section_text",
            "type": "textarea",
            "instructions": "Optional description below title",
            "required": 0,
            "rows": 3
        },
        {
            "key": "field_testimonials_items",
            "label": "Testimonials",
            "name": "testimonials",
            "type": "repeater",
            "instructions": "Add customer testimonials",
            "required": 0,
            "layout": "block",
            "button_label": "Add Testimonial",
            "sub_fields": [
                {
                    "key": "field_testimonial_name",
                    "label": "Client Name",
                    "name": "client_name",
                    "type": "text",
                    "required": 1,
                    "placeholder": "John Doe"
                },
                {
                    "key": "field_testimonial_company",
                    "label": "Company",
                    "name": "client_company",
                    "type": "text",
                    "required": 0,
                    "placeholder": "Company Name"
                },
                {
                    "key": "field_testimonial_text",
                    "label": "Testimonial Text",
                    "name": "testimonial_text",
                    "type": "textarea",
                    "required": 1,
                    "rows": 4
                },
                {
                    "key": "field_testimonial_photo",
                    "label": "Client Photo",
                    "name": "client_photo",
                    "type": "image",
                    "required": 0,
                    "return_format": "id",
                    "preview_size": "thumbnail"
                }
            ]
        }
    ],
    "location": [
        [
            {
                "param": "block",
                "operator": "==",
                "value": "acf/testimonials"
            }
        ]
    ],
    "menu_order": 0,
    "position": "normal",
    "style": "default",
    "label_placement": "top",
    "instruction_placement": "label",
    "active": true
}
```

#### Välja tüüpide valik:

| Välja tüüp | Kasutus |
|------------|---------|
| `text` | Lühike tekst (pealkiri, nimi) |
| `textarea` | Pikk tekst (kirjeldus, paragrahv) |
| `wysiwyg` | Rich text editor (HTML sisu) |
| `image` | Pildid (logo, foto, ikoon) |
| `url` | Lingid |
| `email` | E-maili aadressid |
| `number` | Numbrid (hind, kogus) |
| `true_false` | Checkbox (näita/peida) |
| `select` | Dropdown valikud |
| `color_picker` | Värvi valik |
| `repeater` | Korduvad väljad (nimekirjad, grid) |
| `group` | Väljade grupeerimine |

### SAMM 5: Loo CSS stiilid

Loo fail `assets/css/30-components/testimonials.css`:

```css
/* ====================================
   Testimonials Block
   ==================================== */

.block-testimonials {
  padding: var(--spacing-xl) 0;
  background: var(--color-bg-light);
}

/* Header */
.block-testimonials__header {
  text-align: center;
  margin-bottom: var(--spacing-lg);
}

.block-testimonials__title {
  font-size: var(--font-size-h2);
  font-weight: var(--font-weight-bold);
  color: var(--color-heading);
  margin-bottom: var(--spacing-sm);
}

.block-testimonials__text {
  font-size: var(--font-size-lg);
  color: var(--color-text-muted);
  max-width: 600px;
  margin: 0 auto;
}

/* Carousel */
.block-testimonials__carousel {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: var(--spacing-md);
}

/* Single testimonial */
.block-testimonials__item {
  background: var(--color-white);
  border-radius: var(--border-radius);
  padding: var(--spacing-md);
  box-shadow: var(--shadow-card);
  transition: transform 0.3s ease;
}

.block-testimonials__item:hover {
  transform: translateY(-5px);
}

.block-testimonials__photo {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  overflow: hidden;
  margin-bottom: var(--spacing-sm);
}

.block-testimonials__photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.block-testimonials__quote {
  font-size: var(--font-size-base);
  line-height: 1.6;
  color: var(--color-text);
  margin-bottom: var(--spacing-sm);
  font-style: italic;
}

.block-testimonials__author {
  display: block;
  font-style: normal;
}

.block-testimonials__author strong {
  display: block;
  font-weight: var(--font-weight-bold);
  color: var(--color-heading);
  margin-bottom: 4px;
}

.block-testimonials__author span {
  font-size: var(--font-size-sm);
  color: var(--color-text-muted);
}

/* Responsive */
@media (max-width: 768px) {
  .block-testimonials__carousel {
    grid-template-columns: 1fr;
  }
}
```

**Lisa import faili `assets/css/site.css`:**

```css
@import url('./30-components/testimonials.css');
```

#### CSS Best Practices:

- ✅ **Kasuta BEM metodoloogiat** (`.block-testimonials__element`)
- ✅ **Kasuta CSS muutujaid** (`var(--spacing-md)`, `var(--color-primary)`)
- ✅ **Mobile-first approach** - lisa media queries suurematele ekraanidele
- ✅ **Kasuta semantilisi classnamе'e** (`.block-testimonials__quote` mitte `.tst-q`)

### SAMM 6: Lisa JavaScript (valikuline)

Kui blokk vajab interaktiivsust (carousel, accordion, tabs), loo `assets/js/testimonials.js`:

```javascript
/**
 * Testimonials Carousel
 */
document.addEventListener('DOMContentLoaded', function() {
  const carousels = document.querySelectorAll('.block-testimonials__carousel');
  
  carousels.forEach(carousel => {
    // Lisa carousel loogika (nt Swiper.js)
    console.log('Testimonials carousel initialized', carousel);
  });
});
```

**Lae JavaScript failis `inc/blocks.php` registreeringus:**

```php
'enqueue_assets' => function() {
    wp_enqueue_script(
        'testimonials-js',
        get_template_directory_uri() . '/assets/js/testimonials.js',
        [], // Dependencyd (nt ['jquery'])
        filemtime(get_template_directory() . '/assets/js/testimonials.js'),
        true // Load in footer
    );
}
```

### SAMM 7: Testi blokki

1. ✅ **Värskenda Permalinks:** Settings → Permalinks → Save
2. ✅ **Loo või redigeeri lehte:** Pages → Add New
3. ✅ **Lisa blokk:** Vajuta `+` → otsi "Testimonials"
4. ✅ **Täida väljad** ja vaata eelvaadet
5. ✅ **Kontrolli:**
   - Blokk ilmub õigesti
   - Dummy data töötab (kui väljad on tühjad)
   - Stiilid laevad
   - JavaScript töötab
   - Responsive on korras

---

## ACF Field Group loomine

### JSON failide töövoog

Sharks 2025 projekt kasutab **ACF Local JSON** funktsiooni:

```php
// functions.php
add_filter('acf/settings/save_json', function($path) {
    return SHARKS_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]);
    $paths[] = SHARKS_DIR . '/acf-json';
    return $paths;
});
```

#### Kuidas see töötab:

1. **Loomisel/muutmisel:** ACF salvestab field groupi `acf-json/` kausta
2. **Versiooni kontrollimisel:** Commit'i JSON failid GitHubi
3. **Teistel arendajatel:** ACF laeb JSON failid automaatselt

### Field Group struktuur

```json
{
    "key": "group_{block-name}",        // Unikaalne ID
    "title": "Block Name Block",        // Pealkiri WP adminpanelis
    "fields": [                         // Väljade array
        {
            "key": "field_{block}_{name}",
            "label": "Field Label",     // Nähtav label
            "name": "field_name",       // Välja nimi (snake_case)
            "type": "text",             // Välja tüüp
            "instructions": "...",      // Juhised
            "required": 0,              // 0 või 1
            "default_value": "",        // Default väärtus
            "placeholder": "..."        // Placeholder text
        }
    ],
    "location": [                       // Kus blokk ilmub
        [
            {
                "param": "block",
                "operator": "==",
                "value": "acf/{block-name}"
            }
        ]
    ],
    "active": true
}
```

### Repeater väljade näide

Repeater võimaldab korduvat sisu (nt teenuste list, galerii):

```json
{
    "key": "field_services_items",
    "label": "Services",
    "name": "services",
    "type": "repeater",
    "layout": "block",              // block, table või row
    "button_label": "Add Service",
    "min": 0,                       // Miinimum ridade arv
    "max": 10,                      // Maksimum ridade arv
    "sub_fields": [
        {
            "key": "field_service_title",
            "label": "Service Title",
            "name": "title",
            "type": "text",
            "required": 1
        },
        {
            "key": "field_service_description",
            "label": "Description",
            "name": "description",
            "type": "textarea",
            "rows": 3
        }
    ]
}
```

**PHP template kasutus:**

```php
$services = get_field('services');
if ($services):
    foreach ($services as $service):
        echo '<h3>' . esc_html($service['title']) . '</h3>';
        echo '<p>' . esc_html($service['description']) . '</p>';
    endforeach;
endif;
```

---

## PHP Template loomine

### Template struktuur (best practice)

```php
<?php
/**
 * Block Name Template
 * 
 * @package sharks2025
 */

// ====== 1. SECURITY ======
if (!defined('ABSPATH')) {
    exit;
}

// ====== 2. GET ACF FIELDS ======
$field1 = get_field('field1') ?: 'Default value';
$field2 = get_field('field2');
$repeater = get_field('repeater_field');

// ====== 3. DUMMY DATA (optional) ======
if (empty($repeater)) {
    $repeater = [
        ['title' => 'Example 1', 'text' => 'Lorem ipsum...'],
        ['title' => 'Example 2', 'text' => 'Dolor sit amet...'],
    ];
}

// ====== 4. BLOCK ATTRIBUTES ======
$block_id = 'block-' . ($block['id'] ?? uniqid());
$class_name = 'block-name';

if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// ====== 5. INLINE STYLES (optional) ======
$bg_color = get_field('background_color');
$style = '';
if ($bg_color) {
    $style = 'style="background-color: ' . esc_attr($bg_color) . ';"';
}

?>

<!-- ====== 6. HTML MARKUP ====== -->
<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" <?php echo $style; ?>>
    <div class="container">
        <!-- Bloki sisu -->
    </div>
</section>
```

### Escapimise funktsioonid

| Funktsioon | Kasutus |
|------------|---------|
| `esc_html()` | HTML sisu (tekst) |
| `esc_attr()` | HTML atribuudid (class, id) |
| `esc_url()` | URL-id (href, src) |
| `wp_kses_post()` | Rich text (wysiwyg) |
| `wp_get_attachment_image()` | Pildid (tagastab `<img>` tag) |

**Näide:**

```php
<h2><?php echo esc_html($title); ?></h2>
<a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($class); ?>">
    <?php echo esc_html($text); ?>
</a>
<div><?php echo wp_kses_post($wysiwyg_content); ?></div>
```

### Pildide käsitlemine

```php
// Image ID
$image_id = get_field('image');
if ($image_id) {
    echo wp_get_attachment_image($image_id, 'large', false, ['class' => 'my-image']);
}

// Image array
$image = get_field('image');
if ($image) {
    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
}
```

### Conditional logic

```php
$show_section = get_field('show_section');
if ($show_section):
    // Kuva sektsioon
endif;
```

---

## CSS Stiilide lisamine

### CSS failide organisatsioon

```
assets/css/
├── 00-settings/
│   └── variables.css          # CSS muutujad
├── 20-elements/
│   └── typography.css         # Üldised stiilid
├── 30-components/
│   └── {block-name}.css       # ⭐ Bloki stiilid
├── 40-layout/
│   └── grid.css
├── site.css                   # ⭐ Importib kõik
└── editor.css                 # Gutenberg editor stiilid
```

### CSS muutujad (variables.css)

Kasuta olemasolevaid muutujaid:

```css
/* Colors */
var(--color-primary)
var(--color-secondary)
var(--color-accent)
var(--color-heading)
var(--color-text)
var(--color-text-muted)
var(--color-bg-light)
var(--color-white)

/* Spacing */
var(--spacing-xs)    /* 8px */
var(--spacing-sm)    /* 16px */
var(--spacing-md)    /* 24px */
var(--spacing-lg)    /* 48px */
var(--spacing-xl)    /* 80px */

/* Typography */
var(--font-size-h1)
var(--font-size-h2)
var(--font-size-h3)
var(--font-size-base)
var(--font-size-sm)
var(--font-weight-normal)
var(--font-weight-bold)

/* Other */
var(--border-radius)
var(--shadow-card)
var(--transition-base)
```

### BEM metodoloogia

```css
/* Block */
.block-testimonials { }

/* Element */
.block-testimonials__header { }
.block-testimonials__title { }
.block-testimonials__item { }

/* Modifier */
.block-testimonials--dark { }
.block-testimonials__item--featured { }
```

### Responsive design

```css
/* Mobile first */
.block-testimonials__grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--spacing-md);
}

/* Tablet */
@media (min-width: 768px) {
  .block-testimonials__grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Desktop */
@media (min-width: 1024px) {
  .block-testimonials__grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
```

---

## JavaScript lisamine

### Millal JavaScript on vajalik?

- ✅ Carousel/Slider
- ✅ Accordion/Tabs
- ✅ Modal/Popup
- ✅ Animations (scroll-triggered)
- ✅ Form validation
- ✅ Interactive charts/maps

### JavaScript faili struktuur

```javascript
/**
 * Block Name JavaScript
 * 
 * @package sharks2025
 */

(function() {
  'use strict';

  // DOM Ready
  document.addEventListener('DOMContentLoaded', function() {
    initBlockName();
  });

  /**
   * Initialize block
   */
  function initBlockName() {
    const blocks = document.querySelectorAll('.block-name');
    
    if (blocks.length === 0) {
      return;
    }

    blocks.forEach(block => {
      setupBlock(block);
    });
  }

  /**
   * Setup single block instance
   */
  function setupBlock(block) {
    const button = block.querySelector('.block-name__button');
    
    if (button) {
      button.addEventListener('click', handleClick);
    }
  }

  /**
   * Handle click event
   */
  function handleClick(e) {
    e.preventDefault();
    console.log('Clicked');
  }

})();
```

### JavaScript laadimine

**Variant 1: `enqueue_assets` callback (soovitatud)**

```php
// inc/blocks.php
'enqueue_assets' => function() {
    wp_enqueue_script(
        'block-name-js',
        get_template_directory_uri() . '/assets/js/block-name.js',
        [], // Dependencies
        filemtime(get_template_directory() . '/assets/js/block-name.js'),
        true // Load in footer
    );
}
```

**Variant 2: Inline PHP template'is**

```php
// template-parts/blocks/block-name/block-name.php
wp_enqueue_script(
    'block-name-js',
    get_template_directory_uri() . '/assets/js/block-name.js',
    [],
    SHARKS_VERSION,
    true
);
```

### Näited: Projektis kasutatud JavaScript

**Ten Steps carousel (ten-steps.js):**

```javascript
document.addEventListener('DOMContentLoaded', function() {
  const blocks = document.querySelectorAll('.block-ten-steps');
  
  blocks.forEach(block => {
    const carousel = block.querySelector('.block-ten-steps__carousel');
    const prevBtn = block.querySelector('.block-ten-steps__nav--prev');
    const nextBtn = block.querySelector('.block-ten-steps__nav--next');
    const counter = block.querySelector('.block-ten-steps__counter-current');
    
    let currentIndex = 0;
    const totalSteps = carousel.querySelectorAll('.block-ten-steps__item').length;
    
    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + totalSteps) % totalSteps;
      updateCarousel();
    });
    
    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % totalSteps;
      updateCarousel();
    });
    
    function updateCarousel() {
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
      counter.textContent = (currentIndex + 1).toString().padStart(2, '0');
    }
  });
});
```

---

## Best Practices

### ✅ DO (Tee nii):

1. **Kasuta ACF Local JSON** - commit'i field groupid Git'i
2. **Loo dummy data** - blokk näeb välja hea ka ilma sisuta
3. **Kasuta BEM CSS** - `.block-name__element--modifier`
4. **Escape kõik output** - `esc_html()`, `esc_attr()`, `esc_url()`
5. **Kasuta CSS muutujaid** - `var(--spacing-md)` mitte `24px`
6. **Järgi nimetamiskonventsioone** - kebab-case failidele, snake_case ACF väljadele
7. **Tee mobile-first** - alusta väikestest ekraanidest
8. **Kommenteeri koodi** - PHP DocBlocks ja CSS kommentaarid
9. **Testi erinevatel ekraanidel** - mobile, tablet, desktop
10. **Dokumenteeri keerulised blokid** - loo README.md bloki kaustas

### ❌ DON'T (Ära tee nii):

1. **Ära hard-code väärtusi** - kasuta ACF välju
2. **Ära unusta escapimist** - XSS turvarisk
3. **Ära kasuta inline style'e** - kasuta CSS faile
4. **Ära lae JS/CSS iga bloki jaoks** - kasuta `enqueue_assets` ainult kui vajalik
5. **Ära kopeeri-kleebi koodi** - kasuta reusable funktsioone
6. **Ära ignoreeri dummy data** - hea UX block picker'is
7. **Ära kasuta geneerilisi class name'e** - `.title` asemel `.block-testimonials__title`
8. **Ära unusta responsive design'i** - test mobile!
9. **Ära muuda `functions.php` otse** - kasuta `inc/blocks.php`
10. **Ära delete ACF JSON faile** - need on versiooni kontrolli all

### Performance

- ✅ **Lazy load images:** kasuta `loading="lazy"` atribuuti
- ✅ **Minifitseeri CSS/JS:** production build'is
- ✅ **Kasuta SVG ikoone:** väiksem failisuurus kui PNG/JPG
- ✅ **Avoid layout shift:** defineeri pildi/bloki kõrgus

### Accessibility

- ✅ **Semantic HTML:** kasuta `<section>`, `<article>`, `<nav>`, jne
- ✅ **Alt text piltidel:** `<?php echo esc_attr($image['alt']); ?>`
- ✅ **Keyboard navigation:** carousels, tabs
- ✅ **ARIA labels:** screen reader support
- ✅ **Contrast ratio:** tekst loetav taustal

---

## Näited

### Näide 1: Lihtne CTA blokk

**1. Registreering (`inc/blocks.php`):**

```php
acf_register_block_type([
    'name'            => 'simple-cta',
    'title'           => __('Simple CTA', 'sharks2025'),
    'description'     => __('Call to action with title, text and button', 'sharks2025'),
    'render_template' => 'template-parts/blocks/simple-cta/simple-cta.php',
    'category'        => 'sharks-blocks',
    'icon'            => 'megaphone',
    'keywords'        => ['cta', 'button', 'call to action'],
    'supports'        => [
        'align'   => ['wide', 'full'],
        'anchor'  => true,
        'color'   => ['text', 'background']
    ],
    'mode' => 'preview'
]);
```

**2. ACF Field Group (`acf-json/group_simple_cta.json`):**

```json
{
    "key": "group_simple_cta",
    "title": "Simple CTA Block",
    "fields": [
        {
            "key": "field_simple_cta_title",
            "label": "Title",
            "name": "title",
            "type": "text",
            "required": 1,
            "default_value": "Ready to get started?"
        },
        {
            "key": "field_simple_cta_text",
            "label": "Text",
            "name": "text",
            "type": "textarea",
            "rows": 3
        },
        {
            "key": "field_simple_cta_button_text",
            "label": "Button Text",
            "name": "button_text",
            "type": "text",
            "default_value": "Contact Us"
        },
        {
            "key": "field_simple_cta_button_url",
            "label": "Button URL",
            "name": "button_url",
            "type": "url"
        }
    ],
    "location": [
        [
            {
                "param": "block",
                "operator": "==",
                "value": "acf/simple-cta"
            }
        ]
    ],
    "active": true
}
```

**3. Template (`template-parts/blocks/simple-cta/simple-cta.php`):**

```php
<?php
if (!defined('ABSPATH')) exit;

$title = get_field('title') ?: 'Ready to get started?';
$text = get_field('text');
$button_text = get_field('button_text') ?: 'Contact Us';
$button_url = get_field('button_url') ?: '#';

$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : '';
$class_name = 'block-simple-cta';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <h2><?php echo esc_html($title); ?></h2>
        <?php if ($text): ?>
            <p><?php echo esc_html($text); ?></p>
        <?php endif; ?>
        <a href="<?php echo esc_url($button_url); ?>" class="button">
            <?php echo esc_html($button_text); ?>
        </a>
    </div>
</section>
```

**4. CSS (`assets/css/30-components/simple-cta.css`):**

```css
.block-simple-cta {
  padding: var(--spacing-xl) 0;
  text-align: center;
  background: var(--color-primary);
  color: var(--color-white);
}

.block-simple-cta h2 {
  font-size: var(--font-size-h2);
  margin-bottom: var(--spacing-sm);
}

.block-simple-cta p {
  font-size: var(--font-size-lg);
  margin-bottom: var(--spacing-md);
  opacity: 0.9;
}

.block-simple-cta .button {
  display: inline-block;
  padding: 16px 32px;
  background: var(--color-white);
  color: var(--color-primary);
  border-radius: var(--border-radius);
  text-decoration: none;
  font-weight: var(--font-weight-bold);
  transition: var(--transition-base);
}

.block-simple-cta .button:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-card);
}
```

### Näide 2: Cards Grid (repeater)

**ACF Field Group fragment:**

```json
{
    "key": "field_cards_items",
    "label": "Cards",
    "name": "cards",
    "type": "repeater",
    "layout": "block",
    "button_label": "Add Card",
    "sub_fields": [
        {
            "key": "field_card_icon",
            "label": "Icon",
            "name": "icon",
            "type": "image",
            "return_format": "id"
        },
        {
            "key": "field_card_title",
            "label": "Title",
            "name": "title",
            "type": "text",
            "required": 1
        },
        {
            "key": "field_card_text",
            "label": "Text",
            "name": "text",
            "type": "textarea",
            "rows": 3
        }
    ]
}
```

**Template fragment:**

```php
$cards = get_field('cards');

if (empty($cards)) {
    $cards = [
        ['title' => 'Card 1', 'text' => 'Placeholder text'],
        ['title' => 'Card 2', 'text' => 'Placeholder text'],
        ['title' => 'Card 3', 'text' => 'Placeholder text'],
    ];
}
?>

<div class="cards-grid">
    <?php foreach ($cards as $card): ?>
        <div class="card">
            <?php if (!empty($card['icon'])): ?>
                <div class="card__icon">
                    <?php echo wp_get_attachment_image($card['icon'], 'thumbnail'); ?>
                </div>
            <?php endif; ?>
            
            <h3 class="card__title"><?php echo esc_html($card['title'] ?? ''); ?></h3>
            
            <?php if (!empty($card['text'])): ?>
                <p class="card__text"><?php echo esc_html($card['text']); ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
```

---

## Troubleshooting

### Probleem: Blokk ei ilmu Gutenbergi liideses

**Lahendused:**

1. **Värskenda permalinke:** Settings → Permalinks → Save
2. **Kontrolli registreeringut:** Kas `acf_register_block_type()` on `inc/blocks.php` failis?
3. **Kontrolli ACF Pro'd:** Kas plugin on aktiveeritud?
4. **Kontrolli location rules:** Kas ACF field group on seotud `acf/{block-name}`?

### Probleem: ACF väljad ei ilmu

**Lahendused:**

1. **Kontrolli location rules:** Block → is equal to → `acf/{block-name}`
2. **Kontrolli JSON faili:** Kas `acf-json/group_{name}.json` eksisteerib?
3. **Sünkroniseeri:** Custom Fields → Sync available → Sync
4. **Kontrolli õigekirja:** Kas bloki `name` kattub location rule'is?

### Probleem: CSS ei laadi

**Lahendused:**

1. **Kontrolli importi:** Kas `@import url('./30-components/{block}.css');` on `site.css` failis?
2. **Clear cache:** Brauseri cache, WordPressi cache plugin
3. **Kontrolli faili teed:** Kas fail eksisteerib `assets/css/30-components/` kaustas?
4. **Inspekteeri:** Brauseri DevTools → Network → Kas CSS fail laeb?

### Probleem: JavaScript ei tööta

**Lahendused:**

1. **Kontrolli console'i:** Brauseri DevTools → Console → Vaata errore
2. **Kontrolli enqueue:** Kas `enqueue_assets` on registreeringus?
3. **Kontrolli selector'it:** Kas JS otsib õiget class nime?
4. **Kontrolli DOMContentLoaded:** Kas kood on wrap'itud event listener'isse?

### Probleem: Blokk näeb välja katki (broken)

**Lahendused:**

1. **Kontrolli PHP errore:** WP Debug mode (wp-config.php: `define('WP_DEBUG', true);`)
2. **Kontrolli template path'i:** Kas `render_template` tee on õige?
3. **Kontrolli PHP syntax'it:** Kas kõik muutujad on defineeritud?
4. **Kontrolli escapimist:** Kas kõik `echo` kasutab `esc_html()` vms?

### Probleem: Dummy data ei ilmu

**Lahendused:**

1. **Kontrolli conditional:** `if (empty($field)) { /* dummy data */ }`
2. **Kontrolli array struktuuri:** Kas dummy data vastab ACF struktuurile?
3. **Kontrolli fallback operaatorit:** `get_field('title') ?: 'Default'`

---

## Kokkuvõte

### Uue bloki loomise checklist:

- [ ] **1. Defineeri nõuded** (väljad, design, JavaScript?)
- [ ] **2. Registreeri blokk** `inc/blocks.php` failis
- [ ] **3. Loo template** `template-parts/blocks/{name}/{name}.php`
- [ ] **4. Loo ACF field group** (UI või JSON)
- [ ] **5. Loo CSS** `assets/css/30-components/{name}.css`
- [ ] **6. Importi CSS** `site.css` failis
- [ ] **7. Lisa JavaScript** (kui vajalik) `assets/js/{name}.js`
- [ ] **8. Testi blokki** (mobile, tablet, desktop)
- [ ] **9. Commit Git'i** (PHP, CSS, JS, ACF JSON)
- [ ] **10. Dokumenteeri** (loo README.md kui keeruline)

### Abimaterjalid:

- [ACF Blocks dokumentatsioon](https://www.advancedcustomfields.com/resources/blocks/)
- [ACF Field Types](https://www.advancedcustomfields.com/resources/)
- [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [BEM CSS metodoloogia](https://getbem.com/)

---

**Koostatud:** 2026
**Projekt:** Sharks 2025 WordPress Theme
**ACF Pro versioon:** 6.x
**WordPress versioon:** 6.x+



