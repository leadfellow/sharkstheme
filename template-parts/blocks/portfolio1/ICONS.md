# Portfolio1 Ikoonide juhend

## Saadaolevad ikoonid

Portfolio1 pakub 3 eelnevalt määratud ikooni ja võimalust kasutada custom SVG koodi.

---

## 1. Ilma ikoonita

**Valik:** `none`

**Kirjeldus:** Logo ei kuvata pealkirja kõrval.

**Kasutamine:**
- Kui bränd ei vaja logo ikooni
- Kui soovid minimalistlikku välimust
- Kui logo on juba pealkirjas

---

## 2. Ikoon 1 (X-mustriga)

**Valik:** `icon1`

**Kirjeldus:** Keerukam geomeetriline muster X-kujuliste elementidega.

**Visuaal:**
```
┌─────────┐
│ ╲     ╱ │
│   ╲ ╱   │
│   ╱ ╲   │
│ ╱     ╲ │
└─────────┘
```

**SVG kood:**
```html
<path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/>
```

**Omadused:**
- ViewBox: 0 0 62 62
- Fill: black
- Keerukam geomeetria
- 4 X-kujulist elementi

**Sobib:**
- Modernsetele brändidele
- Tehnoloogia ettevõtetele
- Kaasaegsetele disainidele
- Dünaamilistele brändidele

**Näited:**
- Tech startupid
- Disaini stuudiod
- Innovatiivsed ettevõtted
- Digitaalsed agentuurid

---

## 3. Ikoon 2 (Tärniga)

**Valik:** `icon2`

**Kirjeldus:** 8-haruline täht sümmeetrilise disainiga.

**Visuaal:**
```
┌─────────┐
│    |    │
│  ╲ | ╱  │
│ ──   ── │
│  ╱ | ╲  │
│    |    │
└─────────┘
```

**SVG kood:**
```html
<path d="M38.5107 12.864L46.9326 4.44214L57.5557 15.0652L49.1328 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5107 48.2263V61.0466H23.4873V49.1335L15.0635 57.5574L4.44141 46.9343L12.8643 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4873 13.7693V0.953857H38.5107V12.864Z" fill="black"/>
```

**Omadused:**
- ViewBox: 0 0 62 62
- Fill: black
- Sümmeetriline disain
- 8 haru

**Sobib:**
- Klassikalistele brändidele
- Luksuslikele brändidele
- Traditsioonilisematele ettevõtetele
- Professionaalsetele teenustele

**Näited:**
- Advokaadibürood
- Konsultatsioonifirmad
- Luksustooted
- Hotellid ja restoranid

---

## 4. Custom SVG kood

**Valik:** `custom`

**Kirjeldus:** Kasuta oma SVG koodi.

**Kasutamine:**
1. Vali "Custom SVG kood" dropdown'ist
2. Ilmub "Custom Logo SVG kood" väli
3. Lisa oma SVG path kood

**Näide:**
```html
<path d="M31 0L38.472 23.528L62 31L38.472 38.472L31 62L23.528 38.472L0 31L23.528 23.528L31 0Z" fill="black"/>
```

**Nõuded:**
- Ainult `<path>` või `<g>` elemendid
- Ära lisa `<svg>` tage
- ViewBox peaks olema 0 0 62 62
- Kasuta must värvi (#000000)
- Hoia kood optimeeritud

**Soovitused:**
- Ekspordi SVG Illustrator'ist või Figma'st
- Optimeeri SVGOMG.com abil
- Eemalda tarbetud atribuudid
- Hoia path kood lühike

**Näited:**
- Brändi logo
- Spetsiaalne ikoon
- Unikaalne sümbol
- Custom graafika

---

## Kuidas valida õige ikoon?

### Modernne bränd
```
Soovitus: Ikoon 1 (X-mustriga)
Põhjus: Dünaamiline ja kaasaegne
```

### Klassikaline bränd
```
Soovitus: Ikoon 2 (Tärniga)
Põhjus: Sümmeetriline ja professionaalne
```

### Unikaalne bränd
```
Soovitus: Custom SVG kood
Põhjus: Täielik kontroll disaini üle
```

### Minimalistlik bränd
```
Soovitus: Ilma ikoonita
Põhjus: Puhas ja lihtne välimus
```

---

## Ikoonide võrdlus

| Omadus | Ikoon 1 | Ikoon 2 | Custom |
|--------|---------|---------|--------|
| Keerukus | Keskmine | Keskmine | Varieeruv |
| Sümmeetria | Jah | Jah | Varieeruv |
| Stiil | Modernne | Klassikaline | Varieeruv |
| Seadistamine | Lihtne | Lihtne | Keskmine |
| Unikaalsus | Madal | Madal | Kõrge |

---

## Tehnilised detailid

### ViewBox
```
0 0 62 62
```

### Suurus
```
62x62 pikslit
```

### Värv
```
Fill: black (#000000)
```

### Paigutus
```
Pealkirja kõrval, paremal pool
Gap: 16px
```

### CSS klass
```css
.portfolio1-logo-icon {
    width: 62px;
    height: 62px;
    flex-shrink: 0;
}
```

---

## ACF seadistus

### Logo tüüp väli
```
Type: Select
Choices:
- none: Ilma ikoonita
- icon1: Ikoon 1 (X-mustriga)
- icon2: Ikoon 2 (Tärniga)
- custom: Custom SVG kood
Default: none
```

### Custom Logo SVG kood väli
```
Type: Textarea
Conditional Logic:
- Show if Logo tüüp = custom
Rows: 3
```

---

## PHP implementatsioon

```php
$logo_type = isset($item['logo_type']) ? $item['logo_type'] : 'none';
$logo_svg = '';

if ($logo_type === 'icon1') {
    $logo_svg = '<path d="M59.043 2.95701C57.4099..." fill="black"/>';
} elseif ($logo_type === 'icon2') {
    $logo_svg = '<path d="M38.5107 12.864L46.9326..." fill="black"/>';
} elseif ($logo_type === 'custom' && !empty($item['logo_svg'])) {
    $logo_svg = $item['logo_svg'];
}

if (!empty($logo_svg)): ?>
    <div class="portfolio1-logo-icon">
        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
            <g><?php echo $logo_svg; ?></g>
        </svg>
    </div>
<?php endif;
```

---

## Näpunäited

### 💡 Kiire seadistamine
Kasuta Ikoon 1 või Ikoon 2 kiireks seadistamiseks.

### 💡 Custom ikoon
Kasuta custom SVG'd ainult kui valmis ikoonid ei sobi.

### 💡 Optimeerimine
Optimeeri custom SVG kood enne lisamist.

### 💡 Testimine
Testi ikooni erinevatel ekraanidel.

### 💡 Kontrast
Veendu, et ikoon on nähtav kõikidel taustadel.

---

## Tõrkeotsing

### Ikoon ei kuvata

**Probleem:** Ikoon ei ilmu pealkirja kõrval.

**Lahendus:**
1. Kontrolli, et "Logo tüüp" on valitud
2. Kontrolli, et "Logo tüüp" ei ole "Ilma ikoonita"
3. Custom SVG puhul kontrolli, et kood on õigesti sisestatud

### Custom SVG ei tööta

**Probleem:** Custom SVG kood ei kuva ikooni.

**Lahendus:**
1. Kontrolli, et "Logo tüüp" on "Custom SVG kood"
2. Kontrolli, et SVG kood on õigesti sisestatud
3. Eemalda `<svg>` tagid, jäta ainult `<path>` või `<g>`
4. Kontrolli, et path kood on kehtiv

### Ikoon on vale suurus

**Probleem:** Ikoon on liiga suur või liiga väike.

**Lahendus:**
1. Kontrolli CSS klassi `.portfolio1-logo-icon`
2. Veendu, et ViewBox on 0 0 62 62
3. Tühjenda brauseri vahemälu

---

## Lisainfo

- **Dokumentatsioon:** README.md
- **Kasutusjuhend:** KASUTUSJUHEND.md
- **Funktsioonid:** FEATURES.md
- **Demo:** demo-portfolio1.html

---

**Viimati uuendatud:** 2026-02-11  
**Versioon:** 1.0.1
