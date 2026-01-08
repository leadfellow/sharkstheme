# Why We Block

## Ülevaade
"Why We" blokk on mõeldud ettevõtte väärtuste ja statistika esitlemiseks. Blokk sisaldab animeeritud numbreid, mis kasvavad dünaamiliselt, kui kasutaja kerib lehte alla.

## Funktsioonid
- ✅ Väike ülemine pealkiri
- ✅ Suur keskne kirjeldus
- ✅ Alakirjeldus
- ✅ Kuni 4 statistika numbrit koos kirjeldustega
- ✅ Animeeritud numbrid (kasvavad 0-st target väärtuseni)
- ✅ Kaks dekoratiivset pilti (üleval vasakul ja all paremal)
- ✅ Täielikult responsive disain
- ✅ Intersection Observer API (animatsioon käivitub kui element on nähtav)

## ACF Väljad

### Heading (Pealkiri)
- **Tüüp:** Text
- **Kohustuslik:** Jah
- **Vaikeväärtus:** "miks meie"
- **Kirjeldus:** Väike ülemine pealkiri

### Main Description (Peamine kirjeldus)
- **Tüüp:** Textarea
- **Kohustuslik:** Jah
- **Kirjeldus:** Suur keskne kirjeldus

### Sub Description (Alakirjeldus)
- **Tüüp:** Textarea
- **Kohustuslik:** Ei
- **Kirjeldus:** Väiksem kirjeldus peamise all

### Stats (Statistika)
- **Tüüp:** Repeater
- **Min:** 0
- **Max:** 4
- **Alamväljad:**
  - **Number:** Statistika number (nt. "95%", "250+", "15.5")
  - **Label:** Kirjeldus numbri all

### Image Top Left (Pilt üleval vasakul)
- **Tüüp:** Image
- **Kohustuslik:** Ei
- **Kirjeldus:** Dekoratiivne pilt vasakus ülanurgas

### Image Bottom Right (Pilt all paremal)
- **Tüüp:** Image
- **Kohustuslik:** Ei
- **Kirjeldus:** Dekoratiivne pilt paremas alanurgas

## Numbrite Animatsioon

### Toetatud Formaadid
JavaScript toetab erinevaid numbri formaate:
- **Protsendid:** `95%`, `99.5%`
- **Plussiga:** `250+`, `1000+`
- **Tavalised numbrid:** `42`, `15.5`
- **Mis tahes suffiksiga:** `3x`, `5k`, `10M`

### Animatsiooni Omadused
- **Kestus:** 2 sekundit
- **Easing:** Cubic ease-out (sujuv aeglustuv animatsioon)
- **Käivitumine:** Kui 30% elemendist on nähtav ekraanil
- **Ühekordne:** Iga number animeerub ainult üks kord

### Kuidas See Töötab
1. Leht laadib ja numbrid on alguses nähtavad oma lõppväärtustega
2. Kui kasutaja kerib alla ja statistika blokk tuleb nähtavale
3. JavaScript tuvastab selle Intersection Observer API abil
4. Numbrid animeeruvad 0-st oma lõppväärtuseni
5. Animatsioon kasutab `requestAnimationFrame` sujuvuse jaoks

## Failid

### PHP Template
```
template-parts/blocks/why-we.php
```

### CSS Stiilid
```
assets/css/30-components/why-we.css
```

### JavaScript
```
assets/js/why-we.js
```

### ACF JSON
```
acf-json/group_why_we.json
```

## Kasutamine

1. **Lisa blokk lehele:**
   - Ava leht Gutenberg editoris
   - Vajuta "+" nuppu
   - Otsi "Why We"
   - Vali blokk

2. **Täida väljad:**
   - Lisa pealkiri (nt. "miks meie")
   - Lisa peamine kirjeldus
   - Lisa alakirjeldus (valikuline)
   - Lisa statistika numbrid ja kirjeldused
   - Lisa pildid (valikuline)

3. **Salvesta ja vaata:**
   - Salvesta leht
   - Vaata lehte brauseris
   - Kerige alla, et näha numbrite animatsiooni

## Näidis Sisu

```
Heading: miks meie

Main Description: We are a passionate and forward-thinking team dedicated to transforming ideas into impactful digital experiences.

Sub Description: Me alati teeme tööd hingega ja kvaliteediga ning teekond meiega on lihtne ja kasumlik.

Stats:
1. Number: 95%
   Label: klientidest soovitavad meid edasi

2. Number: 250+
   Label: kodulehekülje ja e-poe oleme loonud
```

## Responsive Disain

### Desktop (> 768px)
- Container padding: 100px 58px
- Stat number font-size: 82px
- Main description: 36px
- Pildid: 200x200px

### Mobile (≤ 768px)
- Container padding: 60px 24px
- Stat number font-size: 48px
- Main description: 24px
- Pildid: 120x120px
- Stats vertikaalselt (flex-direction: column)

## Tehnilised Detailid

### Fonts
- **Heading & Stats:** Switzer (500)
- **Main Heading:** Manrope (700)
- **Body text:** Default theme font

### Värvid
- **Tekst:** #000000, #141414
- **Taust:** #f5f5f5
- **Pildi taust:** #e1ff04 (kollane)

### JavaScript API
- **Intersection Observer:** Tuvastab kui element on nähtav
- **requestAnimationFrame:** Sujuv animatsioon
- **Gutenberg Preview Support:** Töötab ka editori eelvaates

## Troubleshooting

### Numbrid ei animeeru
1. Kontrolli, et JavaScript fail on laaditud
2. Kontrolli, et `data-target` atribuut on olemas
3. Ava browser console ja vaata vigu

### Stiilid ei tööta
1. Kontrolli, et CSS fail on importitud `site.css` failis
2. Kontrolli, et Manrope ja Switzer fondid on laaditud

### Gutenberg eelvaade ei tööta
1. Kontrolli, et blokk on registreeritud `inc/blocks.php` failis
2. Kontrolli, et ACF JSON on importitud

## Järgmised Sammud

Pärast failide loomist:

1. **Registreeri blokk** `inc/blocks.php` failis
2. **Impordi CSS** `assets/css/site.css` failis
3. **Enqueue JavaScript** `functions.php` failis
4. **Impordi ACF JSON** WordPress adminpaneelist
5. **Testi blokki** Gutenberg editoris
