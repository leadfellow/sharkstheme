# Four Steps Block - Dokumentatsioon

## Ülevaade

**Four Steps** on ACF Gutenberg blokk, mis kuvab protsessi või tegevuskava 4 sammuna. Blokk koosneb:
- Kohandatavast päisest koos ikoonidega vasakul ja paremal
- Vasakul pool asuvast mustast kaardist koos ikooni ja numbriga
- Paremal pool asuvast sammude nimekirjast (kuni 4 sammu)

## Failid

### PHP Template
- **Asukoht:** `template-parts/blocks/four-steps/four-steps.php`
- **Funktsioon:** Renderdab bloki HTML struktuuri

### CSS Stiilid
- **Asukoht:** `assets/css/30-components/four-steps.css`
- **Funktsioon:** Bloki stiilid ja responsive disain

### ACF Konfiguratsioon
- **Asukoht:** `acf-json/group_four_steps.json`
- **Funktsioon:** ACF väljade definitsioon

### Demo
- **Asukoht:** `demo-four-steps.html`
- **Funktsioon:** Standalone HTML demo bloki väljanägemisest

## ACF Väljad

### Header (Päis)

1. **Anchor (ID)** - `block_anchor`
   - Tüüp: Text
   - Valikuline
   - Näide: `sammud`, `steps`
   - Kasutus: Sisemiste linkide jaoks (#sammud)

2. **Header Icon Left** - `header_icon_left`
   - Tüüp: Select
   - Valikud:
     - `x` - X (Rist)
     - `asterisk` - Asterisk (Tärn)
     - `star` - Star (Täht)
   - Vaikeväärtus: `x`

3. **Header Title** - `header_title`
   - Tüüp: Text
   - Kohustuslik
   - Vaikeväärtus: "Neli sammu eduni"
   - Näide: "Neli sammu eduni"

4. **Header Icon Right** - `header_icon_right`
   - Tüüp: Select
   - Valikud: Samad kui vasakul ikoonil
   - Vaikeväärtus: `asterisk`

### Card (Must kast)

5. **Card Background Icon** - `card_background_icon`
   - Tüüp: Select
   - Valikud:
     - `asterisk-stroke` - Asterisk Stroke (Tärn kontuuriga)
     - `x` - X (Rist)
     - `star` - Star (Täht)
   - Vaikeväärtus: `asterisk-stroke`

6. **Card Number** - `card_number`
   - Tüüp: Text
   - Valikuline
   - Vaikeväärtus: "02"
   - Max pikkus: 3 tähemärki
   - Näide: "02", "03", "01"

7. **Card Description** - `card_description`
   - Tüüp: Textarea
   - Valikuline
   - Vaikeväärtus: "Formuleerime eesmärgid. Töötame välja edasise tegevuskava ja optimaalse turundusstrateegia."
   - Kirjeldus musta kasti all

### Steps (Sammud)

8. **Steps** - `steps`
   - Tüüp: Repeater
   - Kohustuslik
   - Min: 1, Max: 4
   - Alamväljad:
     - **Step Text** - `step_text` (Text, kohustuslik)
       - Sammu tekst
       - Näide: "Strateegiline analüüs"
     - **Is Highlighted** - `is_highlighted` (True/False)
       - Kas samm on esiletõstetud (valge taust)?
       - Vaikeväärtus: false
     - **Has Border** - `has_border` (True/False)
       - Kas sammu all on äär?
       - Vaikeväärtus: false

## Kasutamine WordPress-is

1. **Lisa blokk lehele:**
   - Ava lehekülg/postitus Gutenberg editoris
   - Kliki "+" nuppu bloki lisamiseks
   - Otsi "Four Steps" või "Neli sammu"
   - Vali "Four Steps" blokk kategooriast "Sharks Blocks"

2. **Seadista päis:**
   - Vali vasakpoolne ikoon (X, Asterisk või Star)
   - Sisesta pealkiri (nt. "Neli sammu eduni")
   - Vali parempoolne ikoon

3. **Seadista must kast:**
   - Vali taustaikon (Asterisk Stroke, X või Star)
   - Sisesta number (nt. "02")
   - Sisesta kirjeldus

4. **Lisa sammud:**
   - Kliki "Lisa samm"
   - Sisesta sammu tekst
   - Märgi "Is Highlighted" kui soovid valget tausta
   - Märgi "Has Border" kui soovid äära sammu alla
   - Lisa kuni 4 sammu

## Näidis Konfiguratsioon

```
Header Icon Left: X (Rist)
Header Title: "Neli sammu eduni"
Header Icon Right: Asterisk (Tärn)

Card Background Icon: Asterisk Stroke
Card Number: "02"
Card Description: "Formuleerime eesmärgid. Töötame välja edasise tegevuskava ja optimaalse turundusstrateegia."

Steps:
1. Step Text: "Strateegiline analüüs"
   Is Highlighted: false
   Has Border: false

2. Step Text: "Lahenduste kavandamine"
   Is Highlighted: true (valge taust)
   Has Border: false

3. Step Text: "Praktiline teostus"
   Is Highlighted: false
   Has Border: true (äär all)

4. Step Text: "Tulemuste analüüs"
   Is Highlighted: false
   Has Border: true (äär all)
```

## Disain & Stiilid

### Värvid
- Taust: `#f7f7f5` (hele hall)
- Must kast: `#000000` (must)
- Valge esiletõst: `#ffffff` (valge)
- Tekst: `#000000` (must)
- Sammu number: `#bbbab6` (hall)
- Äär: `#bbbab6` (hall)

### Fondid
- Pealkiri: Outfit, 82px, font-weight 500
- Sammu tekst: Outfit, 32px, font-weight 500
- Kirjeldus: Helvetica/Arial, 18px

### Spacing
- Konteiner max-width: 1440px
- Padding: 120px 58px
- Gap päise ja sisu vahel: 82px
- Gap vasaku ja parema veeru vahel: 62px

### Responsive
- **Desktop (>1200px):** Täielik paigutus
- **Tablet (768px-1200px):** Vertikaalne paigutus, vähendatud fondid
- **Mobile (<768px):** Väiksemad ikoonid ja fondid
- **Small Mobile (<480px):** Minimaalsed suurused

## Ikoonid

Blokk sisaldab 4 erinevat ikooni:

1. **X (Rist)** - `x`
   - Ristikujuline ikoon
   - Kasutus: Header ikoonid, kaardi taust

2. **Asterisk (Tärn)** - `asterisk`
   - Tärnkujuline ikoon (täidetud)
   - Kasutus: Header ikoonid

3. **Star (Täht)** - `star`
   - Täht-kujuline ikoon (kontuuriga)
   - Kasutus: Header ikoonid, kaardi taust

4. **Asterisk Stroke (Tärn kontuuriga)** - `asterisk-stroke`
   - Suur tärnkujuline ikoon kontuuriga
   - Kasutus: Kaardi taust (vaikimisi)

## Tehnilised Detailid

### Block Registration
- **Name:** `acf/four-steps`
- **Category:** `sharks-blocks`
- **Icon:** `editor-ol-rtl`
- **Keywords:** `steps`, `process`, `neli`, `sammud`, `eduni`, `four`

### Supports
- Align: `wide`, `full`
- Anchor: `true`
- Spacing: `padding`, `margin`
- Color: `background`

### Mode
- **Preview mode:** Blokk kuvatakse kohe eelvaates

## Paigaldamine

Blokk on automaatselt registreeritud `inc/blocks.php` failis ja CSS on lisatud `assets/css/site.css` faili.

## Troubleshooting

### Blokk ei kuvata
1. Kontrolli, et ACF Pro on aktiveeritud
2. Kontrolli, et `group_four_steps.json` on `acf-json` kaustas
3. Mine WordPress adminisse ja sünkroniseeri ACF väljagrupp

### Stiilid ei laadi
1. Kontrolli, et `four-steps.css` on `assets/css/30-components/` kaustas
2. Kontrolli, et import on lisatud `site.css` faili
3. Tühjenda vahemälu

### Ikoonid ei kuvata
1. Kontrolli, et SVG ikoonid on korrektselt määratletud `$icon_map` massiivis
2. Kontrolli, et ikoonide nimed vastavad ACF valikutele

## Versioon

- **Loodud:** 2026-01-29
- **Versioon:** 1.0.0
- **Autor:** Marketing Sharks
