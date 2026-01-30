# Why Sharks 2 Block - Täielik Dokumentatsioon

## 📋 Sisukord

1. [Ülevaade](#ülevaade)
2. [Loodud Failid](#loodud-failid)
3. [Kiire Start](#kiire-start)
4. [ACF Väljad](#acf-väljad)
5. [Kasutamine](#kasutamine)
6. [Stiilid](#stiilid)
7. [Responsive](#responsive)
8. [Troubleshooting](#troubleshooting)
9. [Näited](#näited)

---

## Ülevaade

**Why Sharks 2** on uuendatud ACF Gutenberg blokk "Miks valida Marketing Sharks" sektsiooni jaoks. See on tumeda taustaga versioon, mis sisaldab SVG ikoone iga funktsiooni kaardil.

### Peamised Funktsioonid
- ✅ Must taust, valge tekst
- ✅ SVG ikoonide tugi (42×42px)
- ✅ Kuni 10 funktsiooni kaarti
- ✅ Automaatne nummerdamine (01, 02, 03...)
- ✅ Täielikult responsive
- ✅ Vaikeväärtused 4 kaardiga

### Erinevused "Why Sharks" Blokist

| Funktsioon | Why Sharks | Why Sharks 2 |
|------------|------------|--------------|
| Taust | Valge | Must |
| Tekst | Must | Valge |
| Ikoonid | ❌ | ✅ (42×42px SVG) |
| Max kaarte | 5 | 10 |
| Heading | 2 rida | 1 rida |
| CSS Class | `.block-why-sharks` | `.block-why-sharks-2` |

---

## Loodud Failid

### 1. PHP Template
```
template-parts/blocks/why-sharks-2/why-sharks-2.php
```
- ACF väljade lugemine
- Automaatne nummerdamine
- SVG ikoonide renderdamine
- Vaikeväärtused

### 2. CSS Stiilid
```
assets/css/30-components/why-sharks-2.css
```
- Must taust (#000000)
- Valge tekst (#ffffff)
- Responsive breakpoints
- Flexbox layout

### 3. ACF JSON
```
acf-json/group_why_sharks_2.json
```
- Section Title (text)
- Main Heading (text)
- Description (textarea)
- Features (repeater):
  - Icon SVG (textarea)
  - Feature Text (textarea)

### 4. Dokumentatsioon
```
template-parts/blocks/why-sharks-2/README.md
WHY-SHARKS-2-SUMMARY.md
WHY-SHARKS-2-INSTALL.md
WHY-SHARKS-2-VISUAL-GUIDE.md
WHY-SHARKS-2-README.md (see fail)
demo-why-sharks-2.html
```

### 5. Muudetud Failid
```
inc/blocks.php              (bloki registreerimine)
assets/css/site.css         (@import lisatud)
inc/theme.php               (editor_style lisatud)
```

---

## Kiire Start

### 1. Sünkrooni ACF Väljad

```
WordPress Admin → ACF → Tools → Sync Available → "Why Sharks 2 Block" → Sync
```

### 2. Lisa Blokk

1. Ava Gutenberg redaktor
2. Klõpsa **+** (Lisa blokk)
3. Otsi "**Why Sharks 2**"
4. Klõpsa blokil

### 3. Täida Väljad

```
Section Title: MIKS MEIE
Main Heading: Miks valida Marketing Sharks?
Description: Lorem Ipsum is simply dummy text...
```

### 4. Lisa Funktsioone

1. Klõpsa "**Add Feature Card**"
2. Vali ikoon dropdown menüüst (10 valikut)
3. Sisesta "**Feature Text**"
4. Korda 2-10 korda

---

## ACF Väljad

### Section Title
- **Tüüp**: Text
- **Kohustuslik**: Ei
- **Vaikeväärtus**: "MIKS MEIE"
- **Näide**: "MIKS MEIE", "MEIST", "WHY US"

### Main Heading
- **Tüüp**: Text
- **Kohustuslik**: Jah
- **Vaikeväärtus**: "Miks valida Marketing Sharks?"
- **Näide**: "Miks valida Marketing Sharks?", "Miks meie?"

### Description
- **Tüüp**: Textarea
- **Kohustuslik**: Ei
- **Read**: 4
- **Näide**: "Lorem Ipsum is simply dummy text of the printing and typesetting industry..."

### Features (Repeater)
- **Min**: 0
- **Max**: 10
- **Layout**: Block

#### Icon
- **Tüüp**: Select (Dropdown)
- **Kohustuslik**: Ei
- **Valikud**: 10 erinevat ikooni
  - Star (Täht)
  - Plus (Rist)
  - Wave (Laine)
  - Diamond (Teemant)
  - Circle (Ring)
  - Square (Ruut)
  - Triangle (Kolmnurk)
  - Heart (Süda)
  - Check (Linnuke)
  - Arrow (Nool)
- **Vaikeväärtus**: Star
- **UI**: Searchable dropdown

#### Feature Text
- **Tüüp**: Textarea
- **Kohustuslik**: Jah
- **Read**: 3
- **Näide**: "Perefirma, millel on pikaajalised strateegiad."

---

## Kasutamine

### Põhikasutus

```php
// Template: why-sharks-2.php
$section_title = get_field('section_title');
$main_heading = get_field('main_heading');
$description = get_field('description');
$features = get_field('features');
```

### Vaikeväärtused

Kui ühtegi funktsiooni ei lisata, kuvatakse 4 vaikekaarti:

1. **Ikoon 1** (Star Pattern)
   - "Perefirma, millel on pikaajalised strateegiad."

2. **Ikoon 2** (Plus Pattern)
   - "Selge ja läbipaistev eelarve. Meie eesmärk on, et iga investeeritud euro tooks ärile tagasi mitmekordselt."

3. **Ikoon 3** (Wave Pattern)
   - "Me loome lahendusi, mis on esteetilised, funktsionaalsed ja konversioonidele suunatud."

4. **Ikoon 4** (Diamond Pattern)
   - "Me ei seo kliente endaga kohustuslikus vormis, kui projekt on valmis, anname halduse ja täieliku kontrolli alati sulle. Nii säilib võim sinu käes, samal ajal kui meie oleme olemas, kui vajad professionaalset tuge."

---

## Stiilid

### Värvid

```css
Background: #000000 (Must)
Text: #FFFFFF (Valge)
Divider: #BBBAB6 (Hall)
```

### Fondid

```css
Section Title: Manrope 700, 18px, uppercase
Main Heading: Helvetica, 36px, letter-spacing: -1.8px
Description: Helvetica, 18px, line-height: 1.4
Card Number: Switzer 500, 26px, letter-spacing: -1.3px
Feature Text: Helvetica, 18px, line-height: 1.4
```

### Spacing

```css
Container Padding: 120px 58px
Gap (vertical): 62px
Gap (horizontal): 20px
Card Gap: 22px
```

### Layout

```css
Display: Flex
Max-width: 1440px
Card Width: 316px
Icon Size: 42px × 42px
```

---

## Responsive

### Desktop (>1400px)

```
Container: 120px 58px padding
Layout: 4 cards per row
Card Width: 316px
```

### Tablet (900-1400px)

```
Container: 60px 30px padding
Layout: 2 cards per row
Card Width: 50% - 10px
```

### Mobile (<900px)

```
Container: 40px 20px padding
Layout: 1 card per row (vertical)
Card Width: 100%
Heading: 28px → 24px
```

### Breakpoints

```css
@media (max-width: 1400px) { /* 2 cards */ }
@media (max-width: 900px)  { /* Vertical */ }
@media (max-width: 600px)  { /* Mobile */ }
```

---

## Troubleshooting

### Probleem: Blokk ei ilmu Gutenbergis

**Lahendus:**
1. Kontrolli ACF Pro aktiveerimist
2. Sünkrooni ACF väljad: ACF → Tools → Sync
3. Värskenda lehte (F5)
4. Kontrolli konsool-i vigu (F12)

### Probleem: Stiilid ei rakendu

**Lahendus:**
1. Tühjenda vahemälu (Ctrl+Shift+R)
2. Kontrolli CSS faili olemasolu:
   ```
   assets/css/30-components/why-sharks-2.css
   ```
3. Kontrolli site.css importi:
   ```css
   @import url('./30-components/why-sharks-2.css');
   ```
4. Kontrolli inc/theme.php editor_style array-d

### Probleem: Ikoonid ei kuvata

**Lahendus:**
1. Kontrolli SVG koodi:
   - Algab `<svg` tagiga
   - Sisaldab `viewBox="0 0 42 42"`
   - Sisaldab `fill="white"` või `stroke="white"`
2. Eemalda üleliigsed tühikud
3. Kopeeri SVG kood otse ACF väljale
4. Kontrolli SVG valideerimist: https://validator.w3.org/

### Probleem: Responsive ei tööta

**Lahendus:**
1. Kontrolli viewport meta tag-i:
   ```html
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   ```
2. Testi Chrome DevTools-iga (F12)
3. Kontrolli CSS media queries-e
4. Testi erinevatel seadmetel

---

## Näited

### SVG Ikoonid

#### Ikoon 1 - Star Pattern
```svg
<svg width="42" height="42" viewBox="0 0 42 42" fill="none">
    <path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="white" stroke-width="1.4"/>
</svg>
```

#### Ikoon 2 - Plus Pattern
```svg
<svg width="42" height="42" viewBox="0 0 42 42" fill="none">
    <path d="M26.0869 8.71484L31.793 3.00977L38.9893 10.2051L33.2822 15.9111L41.3516 15.9121V26.0889H33.9551L39.375 31.123L32.4492 38.5791L26.0869 32.6699V41.3545H15.9102V33.2842L10.2041 38.9902L3.00781 31.7939L8.71289 26.0889H0.643555V15.9111H8.04199L2.62109 10.877L9.54688 3.41992L15.9102 9.3291V0.646484H26.0869V8.71484Z" fill="white"/>
</svg>
```

#### Ikoon 3 - Wave Pattern
```svg
<svg width="42" height="42" viewBox="0 0 42 42" fill="none">
    <path d="M39.9969 2.00314C38.8906 0.896835 37.0969 0.896835 35.9906 2.00314L29.4969 8.49687C24.8042 13.1896 17.1958 13.1896 12.5031 8.49686L6.00941 2.00314C4.90311 0.896834 3.10944 0.896835 2.00314 2.00314C0.896835 3.10944 0.896835 4.90311 2.00314 6.00941L8.49687 12.5031C13.1896 17.1958 13.1896 24.8042 8.49686 29.4969L2.00314 35.9906C0.896834 37.0969 0.896835 38.8906 2.00314 39.9969C3.10944 41.1032 4.90311 41.1032 6.00941 39.9969L12.5031 33.5031C17.1958 28.8104 24.8042 28.8104 29.4969 33.5031L35.9906 39.9969C37.0969 41.1032 38.8906 41.1032 39.9969 39.9969C41.1032 38.8906 41.1032 37.0969 39.9969 35.9906L33.5031 29.4969C28.8104 24.8042 28.8104 17.1958 33.5031 12.5031L39.9969 6.00941C41.1032 4.90311 41.1032 3.10944 39.9969 2.00314Z" fill="white"/>
</svg>
```

#### Ikoon 4 - Diamond Pattern
```svg
<svg width="42" height="42" viewBox="0 0 42 42" fill="none">
    <path d="M20.8916 41.7793L14.9189 27.6768L20.8906 30.3945L27.4229 27.4219L20.8916 41.7793ZM12.0439 20.8896L14.9189 27.6768L0.000976562 20.8906L14.6758 14.6748L12.0439 20.8896ZM41.7803 20.8906L27.4229 27.4219L30.3955 20.8896L27.6777 14.918L41.7803 20.8906ZM27.6777 14.918L20.8906 12.043L14.6758 14.6748L20.8916 0L27.6777 14.918Z" fill="white"/>
</svg>
```

### Näidis Sisu

```
Section Title: MIKS MEIE
Main Heading: Miks valida Marketing Sharks?
Description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.

Feature 1: Perefirma, millel on pikaajalised strateegiad.
Feature 2: Selge ja läbipaistev eelarve. Meie eesmärk on, et iga investeeritud euro tooks ärile tagasi mitmekordselt.
Feature 3: Me loome lahendusi, mis on esteetilised, funktsionaalsed ja konversioonidele suunatud.
Feature 4: Me ei seo kliente endaga kohustuslikus vormis, kui projekt on valmis, anname halduse ja täieliku kontrolli alati sulle.
```

---

## Testimine

### Demo HTML
```
http://your-site.com/wp-content/themes/sharks2025/demo-why-sharks-2.html
```

### WordPress
1. Ava lehekülg või postitus
2. Lisa blokk "Why Sharks 2"
3. Kontrolli eelvaadet
4. Testi responsive-t

### Chrome DevTools
1. Vajuta F12
2. Klõpsa Device Toolbar (Ctrl+Shift+M)
3. Vali seade:
   - Desktop: 1440px
   - Tablet: 768px
   - Mobile: 375px

---

## Lisainfo

### Dokumentatsioon
- `WHY-SHARKS-2-SUMMARY.md` - Üksikasjalik kokkuvõte
- `WHY-SHARKS-2-INSTALL.md` - Installatsioonijuhend
- `WHY-SHARKS-2-VISUAL-GUIDE.md` - Visuaalne juhend
- `template-parts/blocks/why-sharks-2/README.md` - Tehnilised detailid

### Demo
- `demo-why-sharks-2.html` - Visuaalne demo

### Võrdlus
- Vaata originaalset "Why Sharks" blokki võrdluseks:
  - `template-parts/blocks/why-sharks/why-sharks.php`
  - `assets/css/30-components/why-sharks.css`

---

## Kontakt

Kui on küsimusi või probleeme:
1. Kontrolli dokumentatsiooni
2. Vaata demo-d
3. Võrdle originaalse "Why Sharks" blokiga
4. Kontrolli ACF väljade sünkroonimist

---

**Versioon**: 1.0.0  
**Kuupäev**: 2026-01-30  
**Autor**: Marketing Sharks  
**Teema**: sharks2025
