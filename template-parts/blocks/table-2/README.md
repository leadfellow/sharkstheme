# Table 2 Block

Lihtne tabelikomponent täieliku värvikontrolliga - tausta, piiride ja teksti värvid on täielikult kohandatavad.

## 📋 Ülevaade

Võimaldab luua paindlikke tabeleid kus:
- Saab valida **taustavärvi**
- Saab valida **border värvi**
- Saab valida **teksti värve** (header, body, label)
- Tulpade pealkirjad on **kohakuti tulpadega**
- Toetab **mitme rea teksti** lahtrites

## 🎨 Kasutamine WordPress'is

1. **Lisa blokk**: Gutenberg editoris otsi "Table 2"
2. **Seadista värvid**:
   - **Background Color** - tabeli taustavärv
   - **Border Color** - tabeli piiride värv
   - **Header Text Color** - tulpade pealkirjade värv
   - **Body Text Color** - lahtrite teksti värv
   - **Row Label Text Color** - esimese veeru (label) teksti värv

3. **Lisa tulbad** (Column Headers):
   - Lisa nii palju tulpasid kui vaja (1-10)
   - Sisesta iga tulba pealkiri

4. **Lisa ridu** (Table Rows):
   - Lisa nii palju ridu kui vaja
   - Iga rea jaoks:
     - **Row Label** - esimese veeru tekst (kategooria)
     - **Row Cells** - lisa lahtrid iga tulba jaoks
     - Tekstis võid kasutada reavahetusi

## 📐 Struktuur

```
┌─────────────┬──────────┬──────────┬──────────┐
│   (Empty)   │ Header 1 │ Header 2 │ Header 3 │  ← Header Row
├─────────────┼──────────┼──────────┼──────────┤
│   Label 1   │  Cell 1  │  Cell 2  │  Cell 3  │  ← Data Row 1
├─────────────┼──────────┼──────────┼──────────┤
│   Label 2   │  Cell 1  │  Cell 2  │  Cell 3  │  ← Data Row 2
└─────────────┴──────────┴──────────┴──────────┘
```

## 📊 Näide: E-kaubanduse platvormide võrdlus

### Column Headers:
1. WordPress + WooCommerce
2. Shopify
3. Magento
4. Prestashop

### Rows:

**Row 1:**
- Label: `Hind`
- Cells:
  - `Taskukohane algkulu, hooldus ja uuendused lisakuluga`
  - `Igakuine tasu, tehingutasud mõnel paketil`
  - `Väga kallis, kõrge arendus- ja hoolduskulu`
  - `Mõõdukas, üldiselt odavam kui Magento`

**Row 2:**
- Label: `Kiirus`
- Cells:
  - `Valmib 3–6 nädalaga, sõltub mahust`
  - `Väga kiire lansseerimine, sobib alustavale ettevõtjale`
  - `Pikk arendusprotsess, mitu kuud kuni aasta`
  - `Mõned nädalad kuni kuu-kaks`

## 🎯 ACF Väljad

| Väli | Tüüp | Vaikeväärtus | Kirjeldus |
|------|------|--------------|-----------|
| `background_color` | Color Picker | #FFFFFF | Tabeli taustavärv |
| `border_color` | Color Picker | #BBBAB6 | Tabeli piiride värv |
| `header_text_color` | Color Picker | #000000 | Tulpade pealkirjade värv |
| `body_text_color` | Color Picker | #000000 | Lahtrite teksti värv |
| `label_text_color` | Color Picker | #000000 | Esimese veeru värv |
| `column_headers` | Repeater | - | Tulpade pealkirjad (1-10) |
| `table_rows` | Repeater | - | Tabeli read (label + cells) |

## 📱 Responsive

- **Desktop (>1024px)**: Täisfunktsionaalsus, 224px label + 275px cells
- **Tablet (768-1024px)**: Horisontaalne scrollimine, min-width: 900px
- **Mobile (<768px)**: Vähendatud suurused, min-width: 800px
- **Small Mobile (<480px)**: Veel väiksemad suurused, min-width: 700px

## 🎨 Disaini detailid

### Mõõtmed:
- Container padding: `120px 58px`
- Label veerg: `224px` laiune
- Data cells: `275px` laiune
- Cell padding: `20px 10px`

### Fondid:
- **Header/Label**: Switzer, 26px, uppercase, letter-spacing -1.3px
- **Body**: Helvetica, 18px, line-height 1.4

### Piirid:
- Border: `1px solid` (border_color)
- Viimase rea all ei ole piiri

## 💡 Nipid

1. **Mitme rea tekst**: Tekstiväljal kasuta reavahetust (Enter), see konverteeritakse `<br>` tagiks
2. **Tulpade arv**: Pealkiri tulpade arv peaks vastama lahtrite arvule igas reas
3. **Värvid**: Kasuta kontrasti - hele taust + tume tekst või vastupidi
4. **Border värv**: Tuhmimad värvid (#BBBAB6, rgba) toimivad paremini

## 🔧 Tehnilised detailid

- **Komponent**: `template-parts/blocks/table-2/table-2.php`
- **CSS**: `assets/css/30-components/table-2.css`
- **ACF JSON**: `acf-json/group_table_2.json`
- **Registreerimine**: `inc/blocks.php`

## 📖 Demo

Vaata `demo-table-2.html` näiteid:
1. Valge taust - e-kaubanduse platvormide võrdlus (7 rida x 4 tulpa)
2. Must taust - hinnapaketid (2 rida x 3 tulpa)

---

**Loodud:** 2025-12-11  
**Komponendi nimi:** Table 2  
**ACF Grupp:** group_table_2_block  
**Block ID:** acf/table-2

