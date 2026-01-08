# Why Sharks Block

## Ülevaade

"Why Sharks" blokk on disainitud, et näidata, miks kliendid valivad Marketing Sharksi. Blokk koosneb:
- Väike ülaosa pealkiri (nt. "meist")
- Kaherealisest peamisest pealkirjast
- Kirjeldavast tekstist
- Kuni 5 nummerdatud kaardist põhjustega

## ACF Väljad

### Section Title
- **Tüüp:** Text
- **Vaikeväärtus:** "meist"
- **Kirjeldus:** Väike uppercase pealkiri vasakul ülaosas

### Main Heading - Line 1
- **Tüüp:** Text
- **Nõutav:** Jah
- **Vaikeväärtus:** "Marketing Sharks on piisavalt suur,"
- **Kirjeldus:** Pealkirja esimene rida

### Main Heading - Line 2
- **Tüüp:** Text
- **Nõutav:** Jah
- **Vaikeväärtus:** "et võtta vastu mistahes väljakutse ja piisavalt väike, et klientidest hoolida."
- **Kirjeldus:** Pealkirja teine rida

### Description
- **Tüüp:** Textarea
- **Kirjeldus:** Kirjeldav tekst pealkirja all

### Reason Cards (Repeater)
- **Min:** 0
- **Max:** 5
- **Kirjeldus:** Põhjuste kaardid, mis nummerdatakse automaatselt (01, 02, 03...)

#### Card Text
- **Tüüp:** Text
- **Nõutav:** Jah
- **Näide:** "lähtume kliendist ja tema vajadustest"

## Kasutamine

1. Lisa blokk Gutenberg editoris
2. Otsi "Why Sharks" või "Sharks Blocks" kategooriast
3. Kohanda väljad:
   - Sisesta section title (nt. "meist")
   - Sisesta pealkiri (2 rida)
   - Lisa kirjeldus
   - Lisa kuni 5 põhjuste kaarti

## Disain

### Desktop
- Horisontaalne paigutus
- Section title vasakul
- Pealkiri ja kirjeldus paremal
- 5 kaarti reas all

### Tablet (< 1024px)
- Kaardid 2 veerus

### Mobile (< 768px)
- Vertikaalne paigutus
- Kõik elemendid üksteise all
- Kaardid täislaiuses

## Stiilid

- **Font:** Helvetica (body), Manrope (section title), Switzer (card numbers)
- **Värvid:** 
  - Tekst: #000000
  - Kirjeldus: #141414
  - Kaardi numbrid: #bbbab6
  - Eraldaja: #BBBAB6
- **Spacing:** 
  - Container gap: 62px
  - Cards gap: 20px
  - Card internal gap: 15px

## Demo

Vaata `demo-why-sharks.html` faili, et näha blokki tegevuses ilma WordPressita.

## Näide

```
[MEIST]                      [Marketing Sharks on piisavalt suur,]
                             [et võtta vastu mistahes väljakutse...]
                             
                             [Hea koostöö üheks aluseks on...]

[(01)]  [(02)]  [(03)]  [(04)]  [(05)]
─────   ─────   ─────   ─────   ─────
tekst   tekst   tekst   tekst   tekst
```

## Tehnilised Detailid

- **Block Name:** `why-sharks`
- **Category:** `sharks-blocks`
- **Icon:** `awards`
- **Supports:** align (wide, full), anchor, spacing, color
- **Template:** `template-parts/blocks/why-sharks/why-sharks.php`
- **CSS:** `assets/css/30-components/why-sharks.css`
- **ACF Group:** `group_why_sharks_block`
