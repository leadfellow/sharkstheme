# Wide Picture Block - Implementation Summary

## Overview
Uus **Wide Picture** ACF Gutenberg blokk, mis kuvab pildi content ala laiuselt kohandatavate seadetega.

## Loodud Failid

### 1. ACF Field Definition
**Fail:** `acf-json/group_wide_picture.json`
- Defineerib kõik bloki väljad
- Automaatselt laetakse WordPressi ACF poolt

### 2. PHP Template
**Fail:** `template-parts/blocks/wide-picture/wide-picture.php`
- Renderdab bloki HTML-i
- Toetab responsive pilte (srcset)
- Lazy loading
- Semantic HTML (figure, figcaption)
- Placeholder editoris kui pilt puudub

### 3. CSS Stiilid
**Fail:** `assets/css/30-components/wide-picture.css`
- Täielik stiilimine
- Responsive disain
- Spacing variandid
- Border radius variandid
- Shadow efekt
- Editor stiilid

### 4. Bloki Registreerimine
**Fail:** `inc/blocks.php` (rida ~978)
- ACF bloki registreerimine
- Kategooria: 'sharks-blocks'
- Ikoon: 'format-image'
- Supports: align, anchor, spacing, color

### 5. CSS Import
**Fail:** `assets/css/site.css`
- Lisatud wide-picture.css import
- Lisatud entry-content spacing reeglid

### 6. Dokumentatsioon
**Failid:**
- `template-parts/blocks/wide-picture/README.md` - Detailne dokumentatsioon
- `demo-wide-picture.html` - Visuaalne demo kõigi variantidega

## Funktsioonid

### Põhifunktsioonid
✅ **Full-width pilt** - Pilt täidab content ala laiuse  
✅ **Responsive** - Automaatne srcset ja sizes  
✅ **Lazy loading** - Optimeeritud jõudlus  
✅ **Alt text** - Kohandatav accessibility tekst  
✅ **Caption** - Valikuline allkiri  

### Kohandatavad Seaded

#### Spacing (Top & Bottom)
- **None** - 0
- **Small** - 2rem
- **Medium** - 4rem (default)
- **Large** - 6rem

#### Border Radius
- **None** - 0 (default)
- **Small** - 8px
- **Medium** - 16px
- **Large** - 24px

#### Efektid
- **Shadow** - True/False (vari pildile)
- **Caption** - Valikuline allkiri
- **Custom Alt** - Kohandatud alt tekst

## ACF Väljad

### Kohustuslikud
1. **wide_picture_image** (Image) - Pilt

### Valikulised
1. **block_anchor** (Text) - Ankru ID sisemistele linkidele
2. **wide_picture_alt_text** (Text) - Kohandatud alt tekst
3. **wide_picture_caption** (Textarea) - Pildi allkiri
4. **wide_picture_spacing_top** (Select) - Ülemine vahe
5. **wide_picture_spacing_bottom** (Select) - Alumine vahe
6. **wide_picture_border_radius** (Select) - Nurkade ümardus
7. **wide_picture_shadow** (True/False) - Vari efekt

## Kasutamine

### WordPressis
1. Ava lehekülg Gutenbergis
2. Lisa plokk "Wide Picture"
3. Vali pilt Media Library'st
4. Kohanda seadeid (spacing, radius, shadow, caption)
5. Salvesta

### CSS Klassid
```css
.block-wide-picture                 /* Peamine wrapper */
.block-wide-picture__container      /* Sisu konteiner */
.block-wide-picture__figure         /* Figure element */
.block-wide-picture__image          /* Pilt */
.block-wide-picture__caption        /* Allkiri */

/* Modifierid */
.spacing-top-{none|small|medium|large}
.spacing-bottom-{none|small|medium|large}
.radius-{none|small|medium|large}
.has-shadow
```

## Näited

### 1. Default (Medium spacing, no radius)
```html
<div class="block-wide-picture spacing-top-medium spacing-bottom-medium radius-none">
  ...
</div>
```

### 2. Rounded with Shadow
```html
<div class="block-wide-picture spacing-top-medium spacing-bottom-medium radius-large has-shadow">
  ...
</div>
```

### 3. Minimal Spacing
```html
<div class="block-wide-picture spacing-top-small spacing-bottom-small radius-small">
  ...
</div>
```

## Responsive Käitumine

### Desktop (>768px)
- Täis spacing väärtused
- Max-width: 1440px (content area width)
- Padding: var(--space-2)

### Mobile (≤768px)
- Vähendatud spacing (1.5rem, 2.5rem, 4rem)
- Minimaalne padding: var(--space-1)
- Täis laius säilib

## Performance

✅ **Responsive Images** - WordPress srcset ja sizes  
✅ **Lazy Loading** - Native browser lazy loading  
✅ **Optimized CSS** - Minimaalne, hästi struktureeritud  
✅ **No JavaScript** - Puhas HTML/CSS lahendus  
✅ **Core Web Vitals** - Optimeeritud CLS, LCP  

## Accessibility

✅ **Semantic HTML** - `<figure>` ja `<figcaption>`  
✅ **Alt Text** - Kohandatav või automaatne  
✅ **Keyboard Navigation** - Pole interaktiivseid elemente  
✅ **Screen Readers** - Korralik struktuuri tugi  

## Integratsioon Teemaga

### Entry Content Rules
Blokk on lisatud `site.css` entry-content reeglitesse:
- Margin: 0 (ei lisa ekstra vahet)
- Padding-inline: 0 (ei lisa külgmist paddingut)
- Auto-centered (margin-left/right: auto)

### Block Spacing
Blokk kasutab oma sisemist spacing süsteemi:
- Top/bottom padding klassidega
- Ei sõltu entry-content gap'ist
- Täielik kontroll spacing üle

## Demo

Vaata `demo-wide-picture.html` faili, et näha kõiki variante:
- Default style
- Border radius variandid
- Shadow efekt
- Spacing variandid
- Caption näited

## Järgmised Sammud

1. **Aktiveeri ACF JSON**
   - Veendu, et `acf-json/` kaust on kirjutatav
   - ACF laadib automaatselt field group'i

2. **Testi Gutenbergis**
   - Loo uus lehekülg
   - Lisa Wide Picture blokk
   - Testi kõiki seadeid

3. **Lisa Pildid**
   - Laadi üles kvaliteetsed pildid
   - Veendu, et alt text on olemas
   - Testi responsive käitumist

4. **Optimeeri**
   - Kasuta WebP/AVIF formaate
   - Kompresseeri pildid
   - Testi jõudlust PageSpeed Insights'iga

## Troubleshooting

### Blokk ei ilmu Gutenbergis
- Kontrolli, et ACF Pro on aktiveeritud
- Veendu, et `inc/blocks.php` on laetud
- Kontrolli `acf-json/group_wide_picture.json` olemasolu

### Stiilid ei rakendu
- Veendu, et `assets/css/site.css` sisaldab importi
- Kontrolli, et CSS fail on õigesti laetud
- Tühjenda cache

### Pilt ei kuvata
- Kontrolli, et pilt on valitud ACF väljal
- Veendu, et pildil on õiged õigused
- Kontrolli browser console'i erroreid

## Autor

Loodud: 2026-01-08  
Teema: Sharks 2025  
Versioon: 1.0.0
