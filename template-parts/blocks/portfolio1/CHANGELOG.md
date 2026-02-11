# Portfolio1 Muudatuste logi

Kõik olulised muudatused selles projektis dokumenteeritakse siin.

Formaat põhineb [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) põhimõtetel.

## [1.0.5] - 2026-02-11

### Muudetud
- 🎨 Filtreerimise nuppude stiil täpsustatud
- 🔤 Font: Switzer Medium 20px, letter-spacing: -0.03em
- 🎨 Mitteaktiivne: #757472 (hall), ilma allakriipsutuseta
- 🎨 Aktiivne: #000000 (must), allakriipsutusega
- ❌ Eemaldatud alumine border-bottom joon
- ❌ Eemaldatud sinine border aktiivse nupu alt

## [1.0.4] - 2026-02-11

### Muudetud
- 🎨 CSS uuendatud vastavalt Figma disainile
- 📐 Täpsed mõõtmed ja gap'id
- 🔤 Täpsed fontide suurused ja kaalud
- 🎨 Täpsed värvid (#F7F7F5, #F237A6, #BBBAB6, #141414)
- 📏 Container max-width: 1440px, padding: 58px
- 🔤 Pealkiri: Switzer 82px, letter-spacing: -0.05em
- 🔤 Kategooria: Helvetica 18px, värv: #F237A6
- 🔤 Kirjeldus: Helvetica 18px, line-height: 140%
- 🔤 "Loe lähemalt": Switzer 42px
- 📐 Header gap: 356px
- 📐 Content gap: 132px
- 📐 MacBook section padding: 120px 58px
- 🎨 Content right background: #FFFFFF

## [1.0.3] - 2026-02-11

### Muudetud
- 🖤 MacBook mockup'i taust on nüüd alati must
- 📐 Must taust laieneb täislaius (full-bleed)
- 🎨 Padding lisatud musta tausta ümber (60px desktop, 40px mobile)
- ✨ Tugevam varjuga efekt mockup'ile

## [1.0.2] - 2026-02-11

### Lisatud
- 🎨 "Kõik Kodulehed" nupp lisatakse automaatselt
- 📱 Horizontal scroll mobiilis filtreerimise nuppudele

### Muudetud
- 🎨 Filtreerimise nuppude disain (ilma border'ita, allakriipsutus)
- 🔵 Aktiivne nupp on sinine allakriipsutusega
- 📍 Punktiiriga eraldatud nupud
- 📝 Suurem ja jämedam tekst nuppudel
- 🔄 JavaScript filtreerimine töötab "all" kategooriaga

### Parandatud
- 📖 Dokumentatsioon uuendatud "Kõik" nupu infoga

## [1.0.1] - 2026-02-11

### Lisatud
- 🎨 Eelnevalt määratud ikoonid dropdown valikuga
  - Ikoon 1 (X-mustriga)
  - Ikoon 2 (Tärniga)
  - Custom SVG kood
  - Ilma ikoonita
- 🔧 Conditional logic ACF-is (Custom SVG väli kuvatakse ainult kui valitud)

### Muudetud
- 📝 Logo SVG väli muudetud dropdown valikuks
- 📖 Dokumentatsioon uuendatud ikoonide valikuga

## [1.0.0] - 2026-02-11

### Lisatud
- ✨ Esialgne Portfolio1 komponendi väljalase
- 🎯 Kategooriate filtreerimise funktsioon
- 📱 Avatud/Suletud akordioni funktsioon
- 💻 MacBook Pro mockup tugi
- 📊 Enne/Pärast statistika graafik
- 🎨 Vahelduvad taustad (valge/hall)
- 🔗 Logo SVG tugi
- 🎯 CTA nuppude tugi
- 📱 Responsive disain (desktop, tablet, mobile)
- ♿ Põhiline accessibility tugi
- 📖 Täielik dokumentatsioon (README, KASUTUSJUHEND, INSTALL, FEATURES)
- 🎨 Demo HTML fail
- 🔧 ACF JSON väljad

### ACF väljad
- Anchor (ID) sisemiste linkide jaoks
- Kuva mobiilis toggle
- Kategooriad (repeater):
  - Kategooria nimi
  - Kategooria slug
- Portfolio tööd (repeater):
  - Kategooria ja kategooria silt
  - Pealkiri
  - Logo SVG kood
  - Kirjeldus
  - Nupu tekst ja link
  - Peamine pilt (MacBook mockup)
  - Screenshot pilt
  - Lähteülesanne (pealkiri, sissejuhatus, punktid)
  - Lahendus (pealkiri, tekst)
  - Statistika (enne, pärast, silt)

### CSS funktsioonid
- Kategooriate filtreerimise stiilid
- Akordioni animatsioonid
- MacBook mockup stiilid
- Statistika graafiku stiilid
- Hover efektid
- Responsive breakpointid
- Mobile optimeerimised

### JavaScript funktsioonid
- `initCategoryFilters()` - Kategooriate filtreerimine
- `filterItems()` - Tööde filtreerimine
- `initAccordions()` - Akordioni funktsioon
- `handleMobileVisibility()` - Mobiilse nähtavuse haldamine

### Dokumentatsioon
- README.md - Täielik dokumentatsioon
- KASUTUSJUHEND.md - Samm-sammult juhend eesti keeles
- INSTALL.md - Installeerimisjuhend ja tõrkeotsing
- FEATURES.md - Detailne funktsioonide kirjeldus
- CHANGELOG.md - Muudatuste logi
- PORTFOLIO1-SUMMARY.md - Kiire ülevaade

### Tehnilised spetsifikatsioonid
- WordPress 5.8+ tugi
- ACF Pro 5.9+ tugi
- PHP 7.4+ tugi
- Kaasaegsete brauserite tugi (Chrome, Firefox, Safari, Edge)
- CSS: ~10KB (minified)
- JavaScript: ~3KB (minified)

### Jõudlus
- Optimeeritud CSS transitions
- Efficient JavaScript
- Minimeeritud DOM manipulatsioonid
- Kiire laadimisaeg

### Accessibility
- Semantic HTML struktuur
- Alt tekstid piltidele
- Keyboard navigation tugi
- Focus states
- Kontrastne värvipalett

## Tulevased versioonid

### [1.1.0] - Planeeritud

#### Lisatakse
- [ ] Lazy loading piltidele
- [ ] ARIA labels täielik tugi
- [ ] Animeeritud statistika (counter up)
- [ ] Lightbox piltide jaoks
- [ ] Täiustatud keyboard navigation
- [ ] Focus trap akordionides

#### Parandatakse
- [ ] Accessibility täiustused
- [ ] Jõudluse optimeerimised
- [ ] Mobile UX täiustused

### [1.2.0] - Planeeritud

#### Lisatakse
- [ ] Video tugi MacBook mockup'is
- [ ] Mitme pildi galerii
- [ ] Projekti tagid
- [ ] Sorteerimise valikud (kuupäev, nimi, populaarsus)
- [ ] Otsingu funktsioon
- [ ] URL parameetrite tugi (deep linking)

#### Parandatakse
- [ ] Filtreerimise jõudlus
- [ ] Animatsioonide sujuvus
- [ ] Mobile performance

### [1.3.0] - Planeeritud

#### Lisatakse
- [ ] AJAX laadimise tugi
- [ ] Infinite scroll
- [ ] Grid/List vaade toggle
- [ ] Ekspordi funktsioon (PDF)
- [ ] Sotsiaalmeedia jagamise nupud
- [ ] Projekti hindamise süsteem

#### Parandatakse
- [ ] SEO optimeerimised
- [ ] Schema.org markup
- [ ] Open Graph tags

## Teadaolevad probleemid

### Versioon 1.0.0

Hetkel teadaolevaid probleeme ei ole.

## Versioonide märkused

### Versiooni numbrid

Versioon: MAJOR.MINOR.PATCH

- **MAJOR**: Suured muudatused, mis ei ole tagasiühilduvad
- **MINOR**: Uued funktsioonid, mis on tagasiühilduvad
- **PATCH**: Vea parandused ja väikesed täiustused

### Tagasiühilduvus

- **1.0.x**: Täielikult tagasiühilduv
- **1.x.0**: Tagasiühilduv, võib vajada väikeseid kohandusi
- **2.0.0**: Võib sisaldada murdvaid muudatusi

## Tänu

Täname kõiki, kes on panustanud Portfolio1 komponendi arendamisse!

### Inspiratsioon
- Kaasaegsed portfolio disainid
- MacBook mockup'id
- Akordioni UI patterns
- Filtreerimise best practices

### Tehnoloogiad
- WordPress & Gutenberg
- Advanced Custom Fields Pro
- Vanilla JavaScript
- Modern CSS (Flexbox, Transitions)

## Kontakt

Kui leiad vigu või sul on ettepanekuid, palun:

1. Kontrolli dokumentatsiooni
2. Vaata teadaolevaid probleeme
3. Testi demo HTML failiga
4. Kontrolli brauseri konsooli
5. Võta ühendust arendusmeeskonnaga

---

**Viimati uuendatud:** 2026-02-11  
**Praegune versioon:** 1.0.0  
**Teema versioon:** 1.8.7+
