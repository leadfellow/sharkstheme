# Portfolio1 Failide ülevaade

## 📁 Failide struktuur

```
sharks2025/
│
├── acf-json/
│   └── group_portfolio1.json              # ACF väljad (JSON)
│
├── assets/
│   ├── css/
│   │   └── portfolio1.css                 # Stiilid (~10KB)
│   └── js/
│       └── portfolio1.js                  # JavaScript (~3KB)
│
├── inc/
│   └── blocks.php                         # Bloki registreerimine (muudetud)
│
├── template-parts/
│   └── blocks/
│       └── portfolio1/
│           ├── portfolio1.php             # Põhimall
│           ├── README.md                  # Täielik dokumentatsioon
│           ├── KASUTUSJUHEND.md          # Kasutusjuhend (EST)
│           ├── INSTALL.md                # Installeerimisjuhend
│           ├── FEATURES.md               # Funktsioonide kirjeldus
│           ├── CHANGELOG.md              # Muudatuste logi
│           ├── QUICK-START.md            # Kiire alustamine
│           └── FILES.md                  # See fail
│
├── demo-portfolio1.html                   # Demo HTML
├── PORTFOLIO1-SUMMARY.md                  # Kokkuvõte
└── functions.php                          # Teema versioon (muudetud)
```

---

## 📄 Failide kirjeldused

### 1. ACF JSON fail

**Fail:** `acf-json/group_portfolio1.json`

**Kirjeldus:**
- ACF väljad JSON formaadis
- Sünkroniseeritakse automaatselt
- Sisaldab kõiki bloki välju

**Suurus:** ~8KB

**Kasutamine:**
```
WordPress Admin → Custom Fields → Tools → Sync
```

---

### 2. CSS fail

**Fail:** `assets/css/portfolio1.css`

**Kirjeldus:**
- Kõik bloki stiilid
- Responsive disain
- Animatsioonid ja transitions
- Hover efektid

**Suurus:** ~10KB (minified: ~7KB)

**Sisaldab:**
- Filtreerimise stiilid
- Akordioni animatsioonid
- MacBook mockup stiilid
- Statistika graafiku stiilid
- Responsive breakpointid
- Mobile optimeerimised

**Laetakse:**
```php
wp_enqueue_style('portfolio1-css', ..., SHARKS_VERSION);
```

---

### 3. JavaScript fail

**Fail:** `assets/js/portfolio1.js`

**Kirjeldus:**
- Kategooriate filtreerimine
- Akordioni funktsioon
- Mobiilse nähtavuse haldamine
- Event listeners

**Suurus:** ~3KB (minified: ~2KB)

**Funktsioonid:**
- `initCategoryFilters()` - Initsialiseerib filtreerimise
- `filterItems()` - Filtreerib töid
- `initAccordions()` - Initsialiseerib akordionid
- `handleMobileVisibility()` - Haldab mobiilset nähtavust

**Laetakse:**
```php
wp_enqueue_script('portfolio1-js', ..., SHARKS_VERSION, true);
```

---

### 4. PHP mall

**Fail:** `template-parts/blocks/portfolio1/portfolio1.php`

**Kirjeldus:**
- Põhimall bloki renderdamiseks
- ACF väljad
- HTML struktuur
- PHP logic

**Suurus:** ~8KB

**Sisaldab:**
- ACF väljad
- HTML struktuuri
- Loop'id kategooriate ja tööde jaoks
- Conditional rendering

**Kasutamine:**
```php
'render_template' => 'template-parts/blocks/portfolio1/portfolio1.php'
```

---

### 5. Dokumentatsioonifailid

#### README.md
**Kirjeldus:** Täielik dokumentatsioon
**Suurus:** ~15KB
**Sisaldab:**
- Ülevaade
- Funktsioonid
- ACF väljad
- Kasutamine
- Näited

#### KASUTUSJUHEND.md
**Kirjeldus:** Samm-sammult juhend eesti keeles
**Suurus:** ~12KB
**Sisaldab:**
- Kiire alustamine
- Töö lisamine
- Näidisandmed
- Soovitused
- Tõrkeotsing

#### INSTALL.md
**Kirjeldus:** Installeerimisjuhend
**Suurus:** ~8KB
**Sisaldab:**
- Automaatne installeerimine
- Käsitsi installeerimine
- Kontrolli installeerimine
- Tõrkeotsing

#### FEATURES.md
**Kirjeldus:** Funktsioonide kirjeldus
**Suurus:** ~10KB
**Sisaldab:**
- Peamised funktsioonid
- Tehnilised detailid
- Kasutusstsenaariume
- Tulevased funktsioonid

#### CHANGELOG.md
**Kirjeldus:** Muudatuste logi
**Suurus:** ~5KB
**Sisaldab:**
- Versioonide ajalugu
- Muudatused
- Teadaolevad probleemid
- Tulevased versioonid

#### QUICK-START.md
**Kirjeldus:** Kiire alustamine
**Suurus:** ~4KB
**Sisaldab:**
- 5-minutiline seadistus
- Kiired näpunäited
- Kiire tõrkeotsing

#### FILES.md
**Kirjeldus:** See fail
**Suurus:** ~6KB
**Sisaldab:**
- Failide struktuur
- Failide kirjeldused
- Suurused ja kasutamine

---

### 6. Demo fail

**Fail:** `demo-portfolio1.html`

**Kirjeldus:**
- Töötav HTML demo
- 2 näidistööd
- Kõik funktsioonid

**Suurus:** ~12KB

**Sisaldab:**
- Täielik HTML struktuur
- Inline CSS link
- Inline JS link
- Näidisandmed

**Kasutamine:**
```
Ava brauseris: file:///path/to/demo-portfolio1.html
```

---

### 7. Kokkuvõte fail

**Fail:** `PORTFOLIO1-SUMMARY.md`

**Kirjeldus:** Kiire ülevaade
**Suurus:** ~6KB
**Sisaldab:**
- Mis on Portfolio1?
- Peamised funktsioonid
- Kiire alustamine
- Tehnilised detailid

---

### 8. Muudetud failid

#### functions.php
**Muudatus:** Teema versioon
```php
// Enne
define('SHARKS_VERSION', '1.8.6');

// Pärast
define('SHARKS_VERSION', '1.8.7');
```

#### inc/blocks.php
**Muudatus:** Portfolio1 bloki registreerimine
```php
// Lisatud
acf_register_block_type([
    'name' => 'portfolio1',
    'title' => __('Portfolio1 (Expandable)', 'sharks2025'),
    // ...
]);
```

---

## 📊 Failide suurused

| Fail | Suurus | Minified |
|------|--------|----------|
| group_portfolio1.json | ~8KB | - |
| portfolio1.css | ~10KB | ~7KB |
| portfolio1.js | ~3KB | ~2KB |
| portfolio1.php | ~8KB | - |
| README.md | ~15KB | - |
| KASUTUSJUHEND.md | ~12KB | - |
| INSTALL.md | ~8KB | - |
| FEATURES.md | ~10KB | - |
| CHANGELOG.md | ~5KB | - |
| QUICK-START.md | ~4KB | - |
| FILES.md | ~6KB | - |
| demo-portfolio1.html | ~12KB | - |
| PORTFOLIO1-SUMMARY.md | ~6KB | - |
| **KOKKU** | **~107KB** | **~9KB (runtime)** |

---

## 🔄 Failide sõltuvused

```
portfolio1.php
├── Requires: ACF Pro
├── Loads: portfolio1.css
├── Loads: portfolio1.js
└── Uses: group_portfolio1.json (ACF fields)

portfolio1.css
└── No dependencies

portfolio1.js
└── No dependencies (Vanilla JS)

group_portfolio1.json
└── Requires: ACF Pro
```

---

## 📝 Failide kasutamine

### Arenduses

```bash
# CSS muutmine
edit assets/css/portfolio1.css
# Tühjenda vahemälu

# JavaScript muutmine
edit assets/js/portfolio1.js
# Tühjenda vahemälu

# PHP malli muutmine
edit template-parts/blocks/portfolio1/portfolio1.php
# Salvesta ja värskenda

# ACF väljad muutmine
WordPress Admin → Custom Fields → Edit
# Salvesta ja sünkroniseeri
```

### Produktsioonis

```bash
# Minify CSS
cssnano assets/css/portfolio1.css

# Minify JavaScript
uglifyjs assets/js/portfolio1.js

# Optimeeri pildid
tinypng *.jpg *.png
```

---

## 🔒 Failide õigused

Soovitatavad failide õigused:

```bash
# PHP failid
chmod 644 *.php

# CSS/JS failid
chmod 644 *.css *.js

# JSON failid
chmod 644 *.json

# Markdown failid
chmod 644 *.md

# Kaustad
chmod 755 template-parts/blocks/portfolio1/
```

---

## 🗑️ Failide eemaldamine

Kui soovid Portfolio1 eemaldada:

```bash
# 1. Eemalda ACF väljad
WordPress Admin → Custom Fields → Portfolio1 Block → Move to Trash

# 2. Eemalda failid
rm acf-json/group_portfolio1.json
rm assets/css/portfolio1.css
rm assets/js/portfolio1.js
rm -rf template-parts/blocks/portfolio1/
rm demo-portfolio1.html
rm PORTFOLIO1-SUMMARY.md

# 3. Eemalda registreerimine
# Muuda inc/blocks.php (eemalda Portfolio1 blokk)

# 4. Uuenda teema versiooni
# Muuda functions.php (increment version)

# 5. Tühjenda vahemälu
```

---

## 📦 Failide varundamine

Varunda enne muudatusi:

```bash
# Loo varundus
tar -czf portfolio1-backup-$(date +%Y%m%d).tar.gz \
  acf-json/group_portfolio1.json \
  assets/css/portfolio1.css \
  assets/js/portfolio1.js \
  template-parts/blocks/portfolio1/ \
  demo-portfolio1.html \
  PORTFOLIO1-SUMMARY.md

# Taasta varundusest
tar -xzf portfolio1-backup-20260211.tar.gz
```

---

## 🔍 Failide otsimine

```bash
# Leia kõik Portfolio1 failid
find . -name "*portfolio1*"

# Leia PHP failid
find . -name "*portfolio1*.php"

# Leia CSS failid
find . -name "*portfolio1*.css"

# Leia dokumentatsiooni failid
find . -name "*portfolio1*.md"
```

---

## ✅ Failide kontroll

Kontrolli, et kõik failid on olemas:

```bash
# ACF JSON
[ -f acf-json/group_portfolio1.json ] && echo "✅ ACF JSON OK"

# CSS
[ -f assets/css/portfolio1.css ] && echo "✅ CSS OK"

# JavaScript
[ -f assets/js/portfolio1.js ] && echo "✅ JavaScript OK"

# PHP mall
[ -f template-parts/blocks/portfolio1/portfolio1.php ] && echo "✅ PHP OK"

# Dokumentatsioon
[ -f template-parts/blocks/portfolio1/README.md ] && echo "✅ README OK"
[ -f template-parts/blocks/portfolio1/KASUTUSJUHEND.md ] && echo "✅ KASUTUSJUHEND OK"
[ -f template-parts/blocks/portfolio1/INSTALL.md ] && echo "✅ INSTALL OK"

# Demo
[ -f demo-portfolio1.html ] && echo "✅ Demo OK"
```

---

**Viimati uuendatud:** 2026-02-11  
**Versioon:** 1.0.0
