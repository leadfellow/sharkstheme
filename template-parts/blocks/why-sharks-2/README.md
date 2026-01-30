# Why Sharks 2 Block

Uuendatud "Miks valida Marketing Sharks" blokk koos ikoonidega ja tumeda taustaga.

## Funktsioonid

- **Section Title**: Väike uppercase pealkiri (nt. "MIKS MEIE")
- **Main Heading**: Peamine pealkiri
- **Description**: Kirjeldav tekst pealkirja all
- **Feature Cards**: Kuni 10 funktsiooni kaarti, igaüks sisaldab:
  - Automaatne nummerdamine (01, 02, 03...)
  - SVG ikoon (42x42px)
  - Funktsiooni kirjeldus

## Disain

- **Taust**: Must (#000000)
- **Tekst**: Valge (#ffffff)
- **Divider**: Hall (#BBBAB6)
- **Fondi suurus**: 18px (tekst), 36px (pealkiri), 26px (numbrid)
- **Layout**: Flexbox, 4 kaarti reas (desktop), responsive mobile jaoks

## Kasutamine

1. Lisa blokk Gutenbergi redaktoris: "Why Sharks 2 (Icons)"
2. Täida väljad:
   - Section Title (nt. "MIKS MEIE")
   - Main Heading (nt. "Miks valida Marketing Sharks?")
   - Description
3. Lisa funktsiooni kaarte:
   - Klõpsa "Add Feature Card"
   - Vali ikoon dropdown menüüst
   - Sisesta funktsiooni kirjeldus

## Ikoonid

Ikoonid on valitavad dropdown menüüst. Saadaval on 10 erinevat ikooni:

1. **Star (Täht)** - 16-haruline täht muster
2. **Plus (Rist)** - 8-haruline rist
3. **Wave (Laine)** - Laineline muster
4. **Diamond (Teemant)** - 4-haruline teemant
5. **Circle (Ring)** - Kontsentriline ring
6. **Square (Ruut)** - Kontsentriline ruut
7. **Triangle (Kolmnurk)** - Kontsentriline kolmnurk
8. **Heart (Süda)** - Süda kujund
9. **Check (Linnuke)** - Linnuke märk
10. **Arrow (Nool)** - Nool paremale

Kõik ikoonid on 42x42px ja valge värviga.

## Responsive

- **Desktop (>1400px)**: 4 kaarti reas
- **Tablet (900-1400px)**: 2 kaarti reas
- **Mobile (<900px)**: 1 kaart reas (vertikaalne)

## Vaikeväärtused

Kui ühtegi funktsiooni kaarti ei lisata, kuvatakse 4 vaikekaarti:
1. Perefirma, millel on pikaajalised strateegiad
2. Selge ja läbipaistev eelarve
3. Esteetilised ja funktsionaalsed lahendused
4. Kliendile täielik kontroll projekti üle

## Failid

- **Template**: `template-parts/blocks/why-sharks-2/why-sharks-2.php`
- **Styles**: `assets/css/30-components/why-sharks-2.css`
- **ACF Fields**: `acf-json/group_why_sharks_2.json`
- **Registration**: `inc/blocks.php`
