# Gutenberg Block Patterns ja Block Styles - Kasutusjuhend

## Mis on Block Patterns ja Block Styles?

### Block Patterns (Plokimustrid)
Block Patterns on eelnevalt konfigureeritud blokide kombinatsioonid, mida saad kiiresti lisada oma lehele. Need on nagu "mallid" või "eelseadistused".

**Näide:** "Hero + Services" pattern sisaldab juba hero blokki ja services blokki koos eelseadistatud sisuga.

### Block Styles (Plokistiilid)
Block Styles lisavad olemasolevatele blokkidele visuaalseid variante. Need muudavad ainult välimust, mitte struktuuri.

**Näide:** Hero blokil võib olla "Default", "Centered" või "Dark" stiil.

---

## Kuidas Block Patterns'eid kasutada?

### 1. Leia Patterns

Gutenberg editoris:
1. Vajuta **+** (Add Block) nuppu
2. Vali **Patterns** tab
3. Vaata kategooriaid:
   - **Landing Pages** - täislahendused
   - **Sections** - üksikud sektsioonid

### 2. Saadaval Patternid

#### Landing Pages kategoorias:

**Hero + Services Section**
- Hero banner + teenuste grid
- Ideaalne avalehe alguseks

**Complete Landing Page**
- Täielik avaleht kõigi sektsioonidega
- Hero → Services → Pricing → CTA → Contact

#### Sections kategoorias:

**Pricing + CTA**
- Hinnapaketid + call to action
- Ideaalne pricing lehele

**Services + Contact Form**
- Teenused + kontaktvorm
- Hea "Teenused" lehele

**Centered Hero**
- Keskjoondatud hero
- Efektne avalehe banner

**Dark CTA Section**
- Tumeda taustaga CTA
- Silmapaistev call to action

### 3. Pattereni lisamine

```
1. Vajuta +
2. Vali Patterns
3. Vali kategooria (Landing Pages või Sections)
4. Kliki patternil
5. Pattern ilmub lehele - muuda sisu oma vajaduste järgi!
```

---

## Kuidas Block Styles'e kasutada?

### 1. Vali Block

Kliki blokile, mida soovid muuta.

### 2. Ava Styles

Block toolbar'is või paremas külgpanelis näed **Styles** sektsiooni.

### 3. Vali Style

Kliki soovitud stiilil - muudatus rakendub kohe!

---

## Saadaval Block Styles

### Hero Block

**Default** ⭐ (vaikimisi)
- Standardne kahe veeruga hero
- Tekst vasakul, pilt paremal

**Centered**
- Keskjoondatud sisu
- Tekst ja pilt üksteise all
- Ideaalne suurte pealkirjade jaoks

**Dark Background**
- Tumeda taustaga versioon
- Valge tekst

**Gradient Background**
- Gradiendiga taust (primary → secondary)
- Efektne ja kaasaegne

### Services Block

**Default** ⭐
- Standard grid
- Kaardid koos shadow'ga

**Alternate (Centered)**
- Keskjoondatud sisu
- Ikoon, pealkiri, tekst järjest

**Minimal**
- Minimalistlik stiil
- Ilma shadow'ta, ainult border

### Pricing Block

**Default** ⭐
- Standard hinnakaardid
- Featured plan eristub

**Compact**
- Kompaktsem versioon
- Väiksemad padding'id

**Highlighted Featured**
- Featured plan on täielikult värviline
- Väga silmapaistev

### CTA Block

**Default** ⭐
- Primary värvi taust

**Accent**
- Accent värvi taust (oranž)

**Gradient**
- Gradiendiga taust

**Dark**
- Tume taust

**Light**
- Hele taust tume tekstiga

### Contact Form Block

**Default** ⭐
- Standard layout

**Boxed**
- Vorm on boxis koos shadow'ga
- Efektsem välimus

**Side by Side**
- Info ja vorm kõrvuti (desktop)
- Mobile'is üksteise all

---

## Kuidas ise Patterns'eid luua?

### Meetod 1: WordPressis (lihtne)

1. Loo lehele soovitud plokikombinatsioon
2. Vali kõik plokid (Shift + kliki)
3. Vajuta **⋮** (Options)
4. Vali **Create Pattern**
5. Anna nimi ja kategooria
6. Salvesta!

### Meetod 2: Koodiga (advanced)

Redigeeri `inc/patterns.php`:

```php
register_block_pattern('sharks2025/my-pattern', [
    'title'       => __('Minu Pattern', 'sharks2025'),
    'description' => __('Kirjeldus', 'sharks2025'),
    'categories'  => ['sharks-sections'],
    'keywords'    => ['keyword1', 'keyword2'],
    'content'     => '
        <!-- wp:acf/hero {"name":"acf/hero","data":{...}} /-->
        <!-- wp:acf/services {"name":"acf/services","data":{...}} /-->
    ',
]);
```

**Kuidas saada content string'i?**
1. Loo lehele soovitud plokid
2. Lülitu **Code Editor** režiimi (⋮ → Code Editor)
3. Kopeeri plokikood
4. Lisa `content` välja

---

## Kuidas ise Block Styles'e luua?

### 1. Registreeri Style

Redigeeri `inc/block-styles.php`:

```php
register_block_style('acf/hero', [
    'name'  => 'my-style',
    'label' => __('Minu Stiil', 'sharks2025'),
]);
```

### 2. Lisa CSS

Redigeeri `assets/css/30-components/block-styles.css`:

```css
.is-style-my-style.block-hero {
  background: red;
  color: white;
}

.is-style-my-style.block-hero .block-hero__title {
  color: white;
}
```

**Oluline:** CSS klass on `.is-style-{name}` + bloki klass

### 3. Testi

1. Refresh lehte
2. Lisa Hero block
3. Vali "Minu Stiil" styles'ist
4. Näed punast tausta!

---

## Pattern Kategooriate loomine

Lisa `inc/patterns.php` faili:

```php
register_block_pattern_category('sharks-portfolio', [
    'label' => __('Portfolio Sections', 'sharks2025'),
]);
```

Nüüd saad luua pattern'eid `sharks-portfolio` kategooriasse!

---

## Praktilised näited

### Näide 1: Uus "About Us" Pattern

```php
// inc/patterns.php
register_block_pattern('sharks2025/about-us', [
    'title'       => __('About Us Section', 'sharks2025'),
    'categories'  => ['sharks-sections'],
    'content'     => '
        <!-- wp:heading {"textAlign":"center"} -->
        <h2 class="has-text-align-center">About Our Company</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">We are a team of passionate professionals...</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:acf/services {"name":"acf/services","data":{"section_title":"Our Values"}} /-->
    ',
]);
```

### Näide 2: Uus "Rounded" Hero Style

```php
// inc/block-styles.php
register_block_style('acf/hero', [
    'name'  => 'rounded',
    'label' => __('Rounded Corners', 'sharks2025'),
]);
```

```css
/* assets/css/30-components/block-styles.css */
.is-style-rounded.block-hero {
  border-radius: var(--radius-2xl);
  overflow: hidden;
  margin: var(--space-3) 0;
}

.is-style-rounded.block-hero .block-hero__media img {
  border-radius: 0;
}
```

---

## Tips & Tricks

### Pattern'id
- ✅ Kasuta pattern'eid korduvate layoutide jaoks
- ✅ Loo pattern'eid klientidele, et nad saaksid kiiresti lehti luua
- ✅ Lisa placeholder sisu, mida on lihtne asendada
- ✅ Grupeeri pattern'id kategooriate alla

### Block Styles
- ✅ Hoia stiilid lihtsad ja fokusseeritud
- ✅ Ära muuda struktuuri, ainult välimust
- ✅ Testi kõiki style'e mobile'is
- ✅ Nimeta stiilid selgelt (mitte "Style 1", vaid "Dark" vms)

### Koodi kvaliteet
- ✅ Lisa kommentaarid PHP faili
- ✅ Kasuta CSS token'eid (var(--color-primary))
- ✅ Testi enne production'i
- ✅ Dokumenteeri oma custom pattern'eid

---

## Troubleshooting

### Pattern ei ilmu
- ✅ Kontrolli, et `inc/patterns.php` on functions.php'sse require'itud
- ✅ Refresh lehte (Ctrl/Cmd + Shift + R)
- ✅ Kontrolli, et kategooria on registreeritud

### Block Style ei tööta
- ✅ Kontrolli CSS klassi nime: `.is-style-{name}`
- ✅ Veendu, et CSS on importitud `site.css`'i
- ✅ Kontrolli, et style on õige bloki jaoks registreeritud
- ✅ Clear cache

### CSS ei rakendu
- ✅ Kontrolli CSS selektori spetsiifilisust
- ✅ Lisa `!important` kui vaja (viimasena)
- ✅ Inspekteeri elementi browser'is

---

## Lisamaterjal

### Kasulikud Ressursid
- [WordPress Block Pattern Directory](https://wordpress.org/patterns/)
- [Block Pattern API](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/)
- [Block Styles API](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/)

### Näited patterns'ist:
- Vaata `inc/patterns.php` - 6 valmis pattern'i
- Vaata `inc/block-styles.php` - 20+ valmis stiili

---

**Pro Tip:** Alusta olemasolevate patterns'ite ja styles'iga, siis kopeeri ja kohanda neid oma vajadustele!

