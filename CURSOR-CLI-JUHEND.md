# Sharks 2025 teema - Cursor juhend

## Projekti ülevaade

**Teema nimi:** Sharks 2025  
**Versioon:** 1.9.0  
**Tüüp:** WordPress teema ACF Blocks + Gutenberg  
**Asukoht:** `/var/www/html/sharks-wp/wp-content/themes/sharks2025`

---

## Projekti struktuur

```
sharks2025/
├── functions.php          # Teema seaded, SHARKS_VERSION
├── style.css              # WP teema info (stiilid on site.css-is)
├── header.php             # Päis
├── footer.php             # Jalus
├── front-page.php         # Avalehe template
├── single.php             # Üksiku postituse template
├── page.php               # Lehe template
│
├── inc/                   # PHP funktsioonid
│   ├── theme.php          # Teema setup, enqueue
│   ├── blocks.php         # ACF blokkide registreerimine
│   ├── post-types.php     # Custom post types
│   ├── admin-settings.php # Admin seaded
│   ├── menu-icons.php     # Menüü ikoonid
│   └── schema.php         # Schema.org markup
│
├── template-parts/blocks/ # ACF BLOKID (54 blokki)
│   ├── hero/
│   ├── four-steps/
│   ├── portfolio1/
│   ├── experience/
│   ├── testimonials/
│   ├── cta/
│   ├── blog-posts/
│   └── ... (47 muud blokki)
│
├── assets/
│   ├── css/
│   │   ├── 00-settings/variables.css  # CSS muutujad
│   │   ├── 30-components/             # Blokkide stiilid
│   │   ├── 40-layout/                 # Layout stiilid
│   │   └── site.css                   # Kompileeritud CSS
│   └── js/                            # JavaScript failid
│
├── acf-json/              # ACF väljade JSON eksport
└── .cursor/rules/         # Cursor reeglid
```

---

## Olulised reeglid

### 1. Versiooni tõstmine (KOHUSTUSLIK!)

Pärast IGAT CSS/JS muudatust tõsta versiooni `functions.php` failis:

```php
// Praegune versioon
define('SHARKS_VERSION', '1.9.0');

// Pärast muudatust
define('SHARKS_VERSION', '1.9.1');
```

**Miks?** Versioon on cache-busting parameeter. Ilma selleta kasutajad näevad vanu stiile.

### 2. CSS struktuur

- **Muutujad:** `assets/css/00-settings/variables.css`
- **Blokkide stiilid:** `assets/css/30-components/[bloki-nimi].css`
- **Layout:** `assets/css/40-layout/`

### 3. Blokkide struktuur

Iga blokk asub `template-parts/blocks/[bloki-nimi]/` kaustas:
- `[bloki-nimi].php` - PHP template
- `README.md` - dokumentatsioon (kui on)

ACF väljad: `acf-json/group_[bloki_nimi].json`

---

## Olemasolevad blokid (54 tk)

| Blokk | Kirjeldus |
|-------|-----------|
| `hero` | Avalehe hero banner |
| `four-steps` | 4-sammuline protsess |
| `portfolio1` | Portfoolio filtritega |
| `experience` | Kogemuse näitajad |
| `testimonials` | Klientide tagasiside |
| `cta` | Call-to-action |
| `blog-posts` | Blogipostitused |
| `team` | Meeskond |
| `certificates` | Sertifikaadid |
| `faq` | KKK accordion |
| `inquiry` / `inquiry-2` | Päringuvormid |
| `why-sharks` / `why-sharks-2` | Miks valida meid |
| `progress` | Progress bar |
| `table-2` | Tabel |
| `wide-picture` | Lai pilt |
| `content-highlighted` | Esiletõstetud sisu |
| `closed-accordion` | Suletud accordion |
| ... | ja veel 37 blokki |

---

## Ülesannete andmine

### Blokkide muutmine

```
ÜLESANNE: Muuda [bloki-nimi] blokki

MUUDATUS:
- [Konkreetne muudatus]

FAILID:
- @template-parts/blocks/[bloki-nimi]/[bloki-nimi].php
- @assets/css/30-components/[bloki-nimi].css
```

### Näide: Hero bloki muutmine

```
ÜLESANNE: Muuda hero bloki tausta värvi

MUUDATUS:
- Taustavärv peaks olema #1a1a2e

FAILID:
- @template-parts/blocks/hero/hero.php
- @assets/css/30-components/hero.css
```

### Näide: Uue bloki loomine

```
ÜLESANNE: Loo uus blokk "partners"

NÕUDED:
- Näitab partnerite logosid
- 6 logo reas
- Hover efekt
- ACF väljad: logo pilt, link, nimi

FAILID:
- @template-parts/blocks/partners/partners.php (uus)
- @assets/css/30-components/partners.css (uus)
- @inc/blocks.php (lisa registreerimine)
- @acf-json/group_partners.json (uus)
```

### Näide: CSS muutmine

```
ÜLESANNE: Muuda four-steps bloki värve

MUUDATUS:
- Ikoonide taustavärv: #f237a6
- Teksti värv: #ffffff

FAIL: @assets/css/30-components/four-steps.css

NB! Ära unusta SHARKS_VERSION tõsta!
```

### Näide: Bugfix

```
PROBLEEM: Portfolio1 filter ei tööta mobiilis

OODATUD: Filter peaks avanema ja sulguma

FAILID:
- @assets/js/portfolio1.js
- @assets/css/portfolio1.css
```

---

## Kiirviited failidele

| Vajadus | Fail |
|---------|------|
| Teema versioon | `@functions.php` |
| CSS muutujad | `@assets/css/00-settings/variables.css` |
| Päis | `@header.php` |
| Jalus | `@footer.php` |
| Menüü | `@inc/menu-icons.php` |
| Blokkide register | `@inc/blocks.php` |
| Post types | `@inc/post-types.php` |

---

## Workflow

1. **Anna ülesanne** - kirjelda täpselt mida vaja
2. **Agent loeb** - vaatab failid üle
3. **Agent muudab** - teeb muudatused
4. **Agent tõstab versiooni** - uuendab SHARKS_VERSION
5. **Agent raporteerib** - näitab mis tehti

---

## Mida MITTE teha

- ❌ Ära muuda `style.css` sisu (ainult meta info)
- ❌ Ära kustuta `acf-json` faile käsitsi
- ❌ Ära unusta versiooni tõsta pärast CSS muudatusi
- ❌ Ära lisa inline stiile PHP failidesse (kasuta CSS faile)

---

## Mida ALATI teha

- ✅ Kasuta olemasolevaid CSS muutujaid `variables.css`-ist
- ✅ Järgi olemasolevat koodi stiili
- ✅ Tõsta SHARKS_VERSION pärast visuaalseid muudatusi
- ✅ Testi mobiilivaates

---

*Sharks 2025 teema - Cursor juhend*
