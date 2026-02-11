# Portfolio1 Funktsioonid

## Ülevaade

Portfolio1 on laiendatav portfolio komponent, mis ühendab kategooriate filtreerimise, MacBook mockup'id, detailse projekti kirjelduse ja enne/pärast statistika.

## Peamised funktsioonid

### 1. ✨ Kategooriate filtreerimine

**Kirjeldus:**
- Dünaamiline kategooriate filtreerimine
- Esimene kategooria näitab kõiki töid (tavaliselt "Kõik")
- Sujuv fade-in/fade-out animatsioon
- Aktiivse kategooria esiletõstmine

**Kasutamine:**
```
Kategooriad:
1. Kõik Kodulehed (koik) - näitab kõiki
2. Veebilehed (veebilehed) - näitab ainult veebilehti
3. Eridisain (eridisain) - näitab ainult eridisaini
```

**Tehnilised detailid:**
- JavaScript põhine filtreerimine
- Kategooria slug peab vastama töö kategooriale
- Sujuv üleminek (300ms)
- Responsive disain

### 2. 🎯 Avatud/Suletud akordion

**Kirjeldus:**
- Iga töö algab suletud olekus
- "loe lähemalt projektist" nupp avab/sulgeb detailid
- Ainult üks töö saab korraga avatud olla
- Automaatne keerimine avatud sisuni

**Animatsioonid:**
- Sujuv max-height animatsioon (500ms)
- Ikooni vahetumine (plus → X)
- Fade-in efekt sisule

**Tehnilised detailid:**
- JavaScript põhine toggle
- CSS max-height animatsioon
- Smooth scroll avamisel
- Automaatne teiste sulgemine

### 3. 🎨 Vahelduvad taustad

**Kirjeldus:**
- Paarisarvulised tööd: valge taust (#ffffff)
- Paaritud tööd: hall taust (#f5f5f5)
- Automaatne vaheldus
- Visuaalne eraldamine

**Paigutus:**
```
Töö 1: Valge taust
Töö 2: Hall taust
Töö 3: Valge taust
Töö 4: Hall taust
...
```

**Tehnilised detailid:**
- PHP põhine klassi määramine
- CSS klasside kasutamine (.bg-white, .bg-gray)
- Automaatne index põhine vaheldus

### 4. 💻 MacBook Mockup

**Kirjeldus:**
- Realistlik MacBook Pro mockup
- Peegeldav ekraan efekt
- Varjuga 3D efekt
- Responsive disain

**Spetsifikatsioonid:**
- Aspect ratio: 16:10
- Bezel: 3% padding
- Border radius: 12px (väline), 8px (sisemine)
- Box shadow: 0 20px 60px rgba(0,0,0,0.3)

**Soovitused:**
- Pildi suurus: 1200x800px
- Formaat: JPG või PNG
- Optimeeritud veebile (alla 500KB)

### 5. 📊 Enne/Pärast statistika

**Kirjeldus:**
- Graafiline enne/pärast võrdlus
- "Enne" tulp: hall taust, 50% kõrgus
- "Pärast" tulp: must taust, 100% kõrgus
- Statistika kirjeldus all

**Visuaal:**
```
┌─────────┬─────────┐
│  Enne   │ Pärast  │
│   150   │   450   │ <- Numbrid
│  (50%)  │ (100%)  │ <- Kõrgus
└─────────┴─────────┘
   Külastajat kuus    <- Kirjeldus
```

**Tehnilised detailid:**
- Flexbox paigutus
- Dünaamiline kõrgus
- Kontrastne värvipalett
- Responsive disain

### 6. 📝 Detailne projekti kirjeldus

**Komponendid:**
- **Lähteülesanne:** Numbriline list kliendi nõuetest
- **Lahendus:** Tekstiline kirjeldus lahendusest
- **Screenshot:** Lisapilt projektist
- **Statistika:** Enne/pärast numbrid

**Paigutus:**
```
┌─────────────────┬─────────────────┐
│ Lähteülesanne   │   Screenshot    │
│                 │                 │
│ Lahendus        │   Statistika    │
└─────────────────┴─────────────────┘
```

### 7. 🎭 Logo ikoonide tugi

**Kirjeldus:**
- Eelnevalt määratud ikoonid või custom SVG
- 3 valikut:
  - **Ilma ikoonita**: Logo ei kuvata
  - **Ikoon 1 (X-mustriga)**: Keerukam X-kujuline muster
  - **Ikoon 2 (Tärniga)**: 8-haruline täht
  - **Custom SVG kood**: Oma SVG kood
- Inline SVG kood
- Skaleeritav ja terav
- Must värv vaikimisi

**Eelnevalt määratud ikoonid:**

**Ikoon 1 - X-mustriga:**
- Keerukam geomeetriline muster
- 4 X-kujulist elementi
- Sobib modernsetele brändidele

**Ikoon 2 - Tärniga:**
- 8-haruline täht
- Sümmeetriline disain
- Sobib klassikalistele brändidele

**Custom SVG kasutamine:**
```html
<path d="..." fill="black" />
```

**Soovitused:**
- Kasuta valmis ikoone kiireks seadistamiseks
- Vali ikoon, mis sobib brändi stiilile
- Custom SVG ainult kui valmis ikoonid ei sobi
- Custom SVG puhul kasuta ainult path või g elemente
- Ära lisa svg tage
- Hoia kood lühike ja optimeeritud
- Kasuta must värvi (#000000)

**Tehnilised detailid:**
- ViewBox: 0 0 62 62
- Suurus: 62x62px
- Fill: black (#000000)
- Conditional logic ACF-is (Custom SVG väli kuvatakse ainult kui valitud)

### 8. 🔗 CTA nupud

**Kirjeldus:**
- Kohandatav nupu tekst
- Välised lingid (target="_blank")
- Hover efektid
- Nool ikoon

**Hover efekt:**
- Taust: valge → must
- Tekst: must → valge
- Nool: must taust → valge taust, valge nool → must nool
- Üleminek: 300ms

**Tehnilised detailid:**
- Inline-flex paigutus
- SVG ikoon
- CSS transitions
- Accessible (keyboard navigation)

### 9. 📱 Responsive disain

**Breakpointid:**
- Desktop: > 1024px (täielik paigutus)
- Tablet: 768px - 1024px (vertikaalne paigutus)
- Mobile: < 768px (kohandatud suurused)

**Mobile muudatused:**
- Vertikaalne header paigutus
- Väiksemad fondid
- Väiksemad ikoonid
- Kohandatud vahemikud
- Vertikaalne statistika

### 10. ⚡ Jõudlus

**Optimeerimised:**
- CSS transitions (mitte animations)
- Efficient JavaScript
- Lazy loading piltidele (tulevikus)
- Minimeeritud DOM manipulatsioonid

**Laadimisaeg:**
- CSS: ~10KB (minified)
- JavaScript: ~3KB (minified)
- Kokku: ~13KB

### 11. ♿ Accessibility

**Funktsioonid:**
- Semantic HTML
- ARIA labels (tulevikus)
- Keyboard navigation
- Focus states
- Alt tekstid piltidele

**Soovitused:**
- Kasuta kirjeldavaid alt tekste
- Hoia kontrast kõrge
- Testi keyboard navigatsiooniga

### 12. 🎨 Kohandatavus

**Kohandatavad elemendid:**
- Kategooriate nimed ja slug'id
- Töö pealkiri ja kirjeldus
- Logo SVG
- CTA nupu tekst ja link
- Lähteülesande ja lahenduse pealkirjad
- Statistika numbrid ja kirjeldus

**Värvipalett:**
- Must: #000000
- Valge: #ffffff
- Hall taust: #f5f5f5
- Teksti hall: #333333, #666666
- Statistika enne: #f0f0f0
- Statistika pärast: #000000

## Kasutusstsenaariume

### 1. Veebiagentuur

**Kasutus:**
- Kategooriad: Kõik, Veebilehed, E-poed, Landing pages
- Tööd: Klientide projektid
- Statistika: Külastajad, konversioonid, müük

### 2. Disaini stuudio

**Kasutus:**
- Kategooriad: Kõik, Brändid, UI/UX, Illustratsioonid
- Tööd: Disainiprojektid
- Statistika: Brändi teadlikkus, kasutajate rahulolu

### 3. Turundusagentuur

**Kasutus:**
- Kategooriad: Kõik, SEO, Sotsiaalmeediad, Kampaaniad
- Tööd: Turundusprojektid
- Statistika: Jälgijad, engagement, ROI

### 4. Arendusettevõte

**Kasutus:**
- Kategooriad: Kõik, Veebirakendused, Mobiilirakendused, API-d
- Tööd: Arendusprojektid
- Statistika: Kasutajad, tehingud, jõudlus

## Tehnilised spetsifikatsioonid

### HTML struktuur

```html
<section class="portfolio1-block">
  <div class="portfolio1-container">
    <div class="portfolio1-filter">...</div>
    <div class="portfolio1-items">
      <div class="portfolio1-item">
        <div class="portfolio1-header">...</div>
        <div class="portfolio1-macbook-section">...</div>
        <div class="portfolio1-details-wrapper">
          <div class="portfolio1-read-more-section">...</div>
          <div class="portfolio1-content-section">...</div>
        </div>
      </div>
    </div>
  </div>
</section>
```

### CSS klassid

**Põhiklassid:**
- `.portfolio1-block` - Peamine wrapper
- `.portfolio1-container` - Sisu container
- `.portfolio1-filter` - Filtreerimise nupud
- `.portfolio1-items` - Tööde nimekiri
- `.portfolio1-item` - Üksik töö

**Taust klassid:**
- `.bg-white` - Valge taust
- `.bg-gray` - Hall taust

**Olek klassid:**
- `.active` - Aktiivne filter/akordion
- `.hidden` - Peidetud element

### JavaScript API

**Funktsioonid:**
- `initCategoryFilters()` - Initsialiseerib filtreerimise
- `filterItems(container, category)` - Filtreerib töid
- `initAccordions()` - Initsialiseerib akordionid
- `handleMobileVisibility()` - Haldab mobiilset nähtavust

**Event listeners:**
- Click - filtreerimise nupud
- Click - akordioni nupud
- Resize - mobiilne nähtavus

## Tulevased funktsioonid

### Versioon 1.1

- [ ] Lazy loading piltidele
- [ ] ARIA labels accessibility jaoks
- [ ] Animeeritud statistika (counter up)
- [ ] Lightbox piltide jaoks

### Versioon 1.2

- [ ] Video tugi MacBook mockup'is
- [ ] Mitme pildi galerii
- [ ] Projekti tagid
- [ ] Sorteerimise valikud

### Versioon 1.3

- [ ] AJAX laadimise tugi
- [ ] Infinite scroll
- [ ] Grid/List vaade toggle
- [ ] Otsingu funktsioon

## Kokkuvõte

Portfolio1 on võimas ja paindlik portfolio komponent, mis pakub:

✅ Kategooriate filtreerimist
✅ Laiendatavaid akordione
✅ MacBook mockup'e
✅ Enne/pärast statistikat
✅ Responsive disaini
✅ Kohandatavust
✅ Head jõudlust
✅ Accessibility tuge

Ideaalne lahendus veebiagentuuridele, disaini stuudiotele, turundusagentuuridele ja arendusettevõtetele, kes soovivad oma töid professionaalselt esitleda.
