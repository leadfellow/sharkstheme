# Why Sharks 2 Block - Kokkuvõte

## Ülevaade

Uus ACF Gutenberg blokk "Why Sharks 2 (Icons)" on loodud "Miks valida Marketing Sharks" sektsiooni jaoks. See on uuendatud versioon originaalsest "Why Sharks" blokist, mis sisaldab SVG ikoone ja tumeda tausta.

## Loodud Failid

### 1. PHP Template
**Asukoht**: `template-parts/blocks/why-sharks-2/why-sharks-2.php`
- ACF väljade lugemine
- Automaatne nummerdamine (01, 02, 03...)
- SVG ikoonide tugi
- Vaikeväärtused 4 kaardiga

### 2. CSS Stiilid
**Asukoht**: `assets/css/30-components/why-sharks-2.css`
- Must taust (#000000)
- Valge tekst (#ffffff)
- Responsive disain (desktop → tablet → mobile)
- Flexbox layout
- Manrope font pealkiri jaoks
- Helvetica font teksti jaoks

### 3. ACF JSON
**Asukoht**: `acf-json/group_why_sharks_2.json`
- Section Title (text)
- Main Heading (text)
- Description (textarea)
- Features (repeater):
  - Icon SVG (textarea)
  - Feature Text (textarea)

### 4. Bloki Registreerimine
**Asukoht**: `inc/blocks.php`
- Registreeritud kui 'acf/why-sharks-2'
- Kategooria: 'sharks-blocks'
- Ikoon: 'star-filled'
- Toetab: align, anchor, spacing, color

### 5. CSS Import
**Muudetud failid**:
- `assets/css/site.css` - lisatud @import
- `inc/theme.php` - lisatud editor_style

### 6. Dokumentatsioon
- `template-parts/blocks/why-sharks-2/README.md`
- `demo-why-sharks-2.html`
- `WHY-SHARKS-2-SUMMARY.md` (see fail)

## Kasutamine WordPressis

1. **Ava Gutenberg redaktor**
2. **Lisa uus blokk** → Otsi "Why Sharks 2"
3. **Täida väljad**:
   - Section Title: "MIKS MEIE"
   - Main Heading: "Miks valida Marketing Sharks?"
   - Description: Kirjeldav tekst
4. **Lisa funktsioone**:
   - Klõpsa "Add Feature Card"
   - Kopeeri SVG kood
   - Sisesta funktsiooni tekst
5. **Salvesta ja avalda**

## Disaini Spetsifikatsioonid

### Värvid
- Taust: `#000000` (must)
- Tekst: `#FFFFFF` (valge)
- Divider: `#BBBAB6` (hall)

### Fondid
- Pealkiri: Manrope 700, 18px uppercase
- Heading: Helvetica, 36px
- Tekst: Helvetica, 18px
- Numbrid: Switzer 500, 26px

### Spacing
- Container padding: 120px 58px
- Gap between sections: 62px
- Card gap: 22px
- Features gap: 20px

### Layout
- Desktop: 4 kaarti reas (316px laius)
- Tablet (1400px): 2 kaarti reas
- Mobile (900px): 1 kaart reas (vertikaalne)

## SVG Ikoonide Formaat

```svg
<svg width="42" height="42" viewBox="0 0 42 42" fill="none">
    <path d="..." fill="white"/>
</svg>
```

- Suurus: 42x42px
- Värv: Valge
- ViewBox: 0 0 42 42

## Vaikeväärtused

Kui ühtegi funktsiooni ei lisata, kuvatakse 4 vaikekaarti:

1. **Ikoon 1**: Täht (star pattern)
   - Tekst: "Perefirma, millel on pikaajalised strateegiad."

2. **Ikoon 2**: Plus (cross pattern)
   - Tekst: "Selge ja läbipaistev eelarve. Meie eesmärk on, et iga investeeritud euro tooks ärile tagasi mitmekordselt."

3. **Ikoon 3**: Lained (wave pattern)
   - Tekst: "Me loome lahendusi, mis on esteetilised, funktsionaalsed ja konversioonidele suunatud."

4. **Ikoon 4**: Teemant (diamond pattern)
   - Tekst: "Me ei seo kliente endaga kohustuslikus vormis, kui projekt on valmis, anname halduse ja täieliku kontrolli alati sulle. Nii säilib võim sinu käes, samal ajal kui meie oleme olemas, kui vajad professionaalset tuge."

## Testimine

### Demo HTML
Ava brauseris: `demo-why-sharks-2.html`

### WordPress
1. Ava mis tahes lehekülg või postitus
2. Lisa blokk "Why Sharks 2 (Icons)"
3. Kontrolli eelvaadet
4. Testi erinevatel ekraanisuurustel

## Responsive Breakpoints

```css
@media (max-width: 1400px) { /* 2 kaarti reas */ }
@media (max-width: 900px)  { /* Vertikaalne layout */ }
@media (max-width: 600px)  { /* Mobile optimeeringud */ }
```

## Erinevused Originaalsest "Why Sharks" Blokist

| Funktsioon | Why Sharks | Why Sharks 2 |
|------------|------------|--------------|
| Taust | Valge | Must |
| Tekst | Must | Valge |
| Ikoonid | ❌ | ✅ |
| Max kaarte | 5 | 10 |
| Heading | 2 rida | 1 rida |
| Layout | Sama | Sama |

## Järgmised Sammud

1. ✅ Blokk loodud ja registreeritud
2. ✅ CSS lisatud ja imporditud
3. ✅ ACF väljad määratletud
4. ✅ Dokumentatsioon loodud
5. ⏳ Testimine WordPressis
6. ⏳ ACF väljade sünkroonimine (ACF → Sync)

## Troubleshooting

### Blokk ei ilmu Gutenbergis
1. Kontrolli, kas ACF Pro on aktiveeritud
2. Mine ACF → Tools → Sync Available
3. Sünkrooni "Why Sharks 2 Block"

### Stiilid ei rakendu
1. Kontrolli, kas CSS fail on õiges asukohas
2. Tühjenda vahemälu (cache)
3. Kontrolli, kas site.css sisaldab @import direktiivi

### Ikoonid ei kuvata
1. Kontrolli SVG koodi õigsust
2. Veendu, et SVG sisaldab viewBox atribuuti
3. Kontrolli, kas fill/stroke on "white"

## Kontakt

Kui on küsimusi või probleeme, kontrolli:
- `template-parts/blocks/why-sharks-2/README.md`
- `demo-why-sharks-2.html`
- Originaalne "Why Sharks" blokk võrdluseks
