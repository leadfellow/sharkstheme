# Ankru linkide kasutamine (Anchor Links)

## Mis on ankru link?

Ankru link (anchor link) võimaldab luua sisemisi linke lehel, mis liiguvad otse konkreetse sektsiooni juurde. Näiteks `#contact` viib kasutaja otse kontakti sektsiooni juurde.

## Kuidas lisada ankur blokile?

### Meetod 1: ACF väli (SOOVITATAV) ⭐

Kõikidel Sharks 2025 blokidel on nüüd **"Anchor (ID)"** väli otse bloki seadetes!

1. **Ava blokk** Gutenberg editoris
2. **Leia "Anchor (ID)" väli** bloki seadetes (ülemine osa)
3. **Sisesta ankru nimi**: `contact`, `hero`, `services`, `pricing`
4. **Salvesta leht**

**Eelised:**
- ✅ Lihtne ja mugav
- ✅ Kohe nähtav bloki seadetes
- ✅ Automaatne puhastamine (eemaldab # märgi, tühikud jne)
- ✅ Prepend `#` näitab, kuidas link välja näeb

**Näide:**
```
Anchor (ID): contact
Tulemus: #contact
```

### Meetod 2: Gutenberg Advanced (alternatiiv)

1. **Ava blokk** Gutenberg editoris
2. **Ava Block Settings** (parempoolne külgriba)
3. **Leia "Advanced" sektsioon** (kerimise all)
4. **Lisa "HTML anchor"**: `contact`, `hero`, `services`
5. **Salvesta leht**

**Reeglid:**
- Ainult väiketähed
- Ei tohi sisaldada tühikuid (kasuta `-` või `_`)
- Ei tohi alata numbriga
- Ei tohi sisaldada erimärke (v.a `-` ja `_`)

## Kuidas kasutada ankru linki?

### Sisemised lingid (samal lehel)

```html
<a href="#contact">Võta ühendust</a>
<a href="#hero">Tagasi üles</a>
<a href="#pricing">Vaata hindu</a>
```

### Välised lingid (teiselt lehelt)

```html
<a href="https://yoursite.com/page#contact">Kontakt</a>
<a href="/services#pricing">Teenuste hinnad</a>
```

### Menüüs

WordPress menüüs:
1. Mine **Appearance → Menus**
2. Lisa **Custom Link**
3. URL: `#contact`
4. Link Text: `Kontakt`

## Näited blokide kaupa

### Hero blokk
- **Anchor**: `hero`
- **Link**: `<a href="#hero">Tagasi üles</a>`

### CTA blokk
- **Anchor**: `contact`
- **Link**: `<a href="#contact">Võta ühendust</a>`

### Inquiry blokk
- **Anchor**: `inquiry`
- **Link**: `<a href="#inquiry">Saada päring</a>`

### Services blokk
- **Anchor**: `services`
- **Link**: `<a href="#services">Meie teenused</a>`

### Pricing blokk
- **Anchor**: `pricing`
- **Link**: `<a href="#pricing">Hinnad</a>`

### Portfolio blokk
- **Anchor**: `portfolio`
- **Link**: `<a href="#portfolio">Tehtud tööd</a>`

### FAQ blokk
- **Anchor**: `faq`
- **Link**: `<a href="#faq">KKK</a>`

## Smooth scrolling

Ankru lingid kasutavad automaatselt smooth scrolling'ut tänu CSS-ile:

```css
html {
  scroll-behavior: smooth;
}
```

See on juba lisatud `assets/css/site.css` failis.

## Kasutamine CTA/Hero/Frontpage Hero Banner nuppudega

### Link tüüp

Kui valid **Button Type** → **Link**, saad sisestada ankru lingi:

```
Button Text: Võta ühendust
Button Type: Link
Button URL: #contact
```

### Modal tüüp

Kui valid **Button Type** → **Modal**, avaneb modaal popup.

### Calendly tüüp

Kui valid **Button Type** → **Calendly**, avaneb Calendly uues aknas.

## Näide: Täielik landing page

```html
<!-- Hero sektsioon -->
<section id="hero">
  <h1>Tere tulemast!</h1>
  <a href="#services">Vaata teenuseid</a>
</section>

<!-- Teenused sektsioon -->
<section id="services">
  <h2>Meie teenused</h2>
  <a href="#pricing">Vaata hindu</a>
</section>

<!-- Hinnad sektsioon -->
<section id="pricing">
  <h2>Hinnad</h2>
  <a href="#contact">Võta ühendust</a>
</section>

<!-- Kontakt sektsioon -->
<section id="contact">
  <h2>Võta ühendust</h2>
  <a href="#hero">Tagasi üles</a>
</section>
```

## Troubleshooting

### Link ei tööta
- Kontrolli, et ankur on õigesti lisatud blokile
- Kontrolli, et link algab `#` märgiga
- Kontrolli, et ankru nimi on täpselt sama (väiketähed!)

### Scroll läheb vale kohta
- Kontrolli, et ankur on lisatud õigele blokile
- Kui header on fixed, võib scroll olla veidi valesti (see on normaalne)

### Smooth scrolling ei tööta
- Kontrolli, et `scroll-behavior: smooth;` on CSS-is olemas
- Mõned vanad brauserid ei toeta smooth scrolling'ut

## Kõik blokid, mis toetavad ankrut

✅ Kõik Sharks 2025 blokid toetavad ankrut:

- Hero
- Frontpage Hero Banner
- Services
- Pricing
- CTA
- Contact Form
- Case Study Detail
- Case Story
- Case Studies Grid
- Accordion
- Closed Accordion
- Comparison Table
- FAQ
- Testimonials
- Why Us
- Why That
- Sharks Headings
- Content Grey
- Service Cards
- Specialist
- Label Bar
- Inquiry
- Inquiry 2
- Consultation
- 10 Steps
- Heading Half
- Select Text
- Sharks Heading 2
- Spacer
- Content Highlighted
- Table 2
- Two Box CTA
- What Includes
- Who We Are
- Our Facts
- Max Accordion
- Portfolio
- Works5
- Works3
- Works1

## Parimad praktikad

1. **Kasuta kirjeldavaid nimesid**: `contact`, `services`, `pricing`
2. **Hoia lühike**: `cta`, `hero`, `faq`
3. **Kasuta `-` tühikute asemel**: `our-services`, `contact-form`
4. **Väldi numbreid alguses**: `section1` ❌ → `section-1` ✅
5. **Testi alati**: kliki lingil ja vaata, kas scroll töötab

## Näide: One-page website

```
Hero (#hero)
  ↓ Link: #services
Services (#services)
  ↓ Link: #portfolio
Portfolio (#portfolio)
  ↓ Link: #pricing
Pricing (#pricing)
  ↓ Link: #testimonials
Testimonials (#testimonials)
  ↓ Link: #contact
Contact (#contact)
  ↓ Link: #hero (Back to top)
```

Iga blokk on ankruga märgistatud ja lingid viivad järgmise sektsiooni juurde!

