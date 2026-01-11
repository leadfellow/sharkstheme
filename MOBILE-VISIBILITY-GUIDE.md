# Mobile Visibility Guide

## Ülevaade

Kõikidele ACF blokkidele on võimalik lisada "Kuva mobiilis" linnuke, mis kontrollib, kas blokk kuvatakse mobiilseadmetes (alla 768px).

## Kuidas see töötab

### 1. ACF Väli

Igale blokile saab lisada järgmise välja ACF JSON failis:

```json
{
    "key": "field_BLOCKNAME_show_on_mobile",
    "label": "Kuva mobiilis",
    "name": "show_on_mobile",
    "type": "true_false",
    "instructions": "Määra, kas see blokk kuvatakse mobiilseadmetes (alla 768px)",
    "required": 0,
    "default_value": 1,
    "ui": 1,
    "ui_on_text": "Jah",
    "ui_off_text": "Ei",
    "wrapper": {
        "width": "50"
    }
}
```

**Oluline:** 
- `key` peab olema unikaalne iga bloki jaoks (asenda `BLOCKNAME` bloki nimega)
- `default_value: 1` tähendab, et vaikimisi kuvatakse blokk mobiilis
- Pane see väli kohe pärast `block_anchor` välja

### 2. PHP Template

Bloki template failis lisa järgmine kood enne `<section>` tagi:

```php
// Block attributes
$anchor = sharks_get_block_anchor($block, 'block-name');
$class_name = 'block-name';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Add mobile visibility class
$mobile_class = sharks_get_mobile_visibility_class();
if ($mobile_class) {
    $class_name .= ' ' . $mobile_class;
}
```

### 3. CSS

CSS on juba lisatud `assets/css/site.css` failis:

```css
@media (max-width: 768px) {
  .hide-on-mobile {
    display: none !important;
  }
}
```

## Näide: Frontpage Hero Banner

### ACF JSON (acf-json/group_frontpage_hero_banner.json)

```json
{
    "key": "field_frontpage_hero_banner_show_on_mobile",
    "label": "Kuva mobiilis",
    "name": "show_on_mobile",
    "type": "true_false",
    "instructions": "Määra, kas see blokk kuvatakse mobiilseadmetes (alla 768px)",
    "required": 0,
    "default_value": 1,
    "ui": 1,
    "ui_on_text": "Jah",
    "ui_off_text": "Ei",
    "wrapper": {
        "width": "50"
    }
}
```

### PHP Template (template-parts/blocks/frontpage-hero-banner/frontpage-hero-banner.php)

```php
// Block attributes
$anchor = sharks_get_block_anchor($block, 'frontpage-hero-banner');
$class_name = 'block-frontpage-hero-banner';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
// Add mobile visibility class
$mobile_class = sharks_get_mobile_visibility_class();
if ($mobile_class) {
    $class_name .= ' ' . $mobile_class;
}
```

## Kuidas lisada teistele blokkidele

1. **Kopeeri ACF väli** ülaltoodud JSON struktuurist
2. **Muuda `key` unikaalseks** - asenda `BLOCKNAME` oma bloki nimega
3. **Lisa väli ACF JSON faili** kohe pärast `block_anchor` välja
4. **Lisa PHP kood** bloki template faili
5. **Salvesta ja värskenda** ACF välju WordPressi admin paneelis

## Funktsioonid

### `sharks_get_mobile_visibility_class()`

Asub failis: `inc/theme-helpers.php`

```php
function sharks_get_mobile_visibility_class() {
    $show_on_mobile = get_field('show_on_mobile');
    
    // If field doesn't exist or is true (default), show on mobile
    if ($show_on_mobile === null || $show_on_mobile === true || $show_on_mobile === 1) {
        return '';
    }
    
    // If explicitly set to false, hide on mobile
    return 'hide-on-mobile';
}
```

## Testimine

1. Ava blokk WordPressi editoris
2. Leia "Kuva mobiilis" linnuke
3. Keela linnuke (Ei)
4. Salvesta lehekülg
5. Ava lehekülg mobiilvaates (alla 768px)
6. Blokk peaks olema peidetud

## Blokid, kus see on juba lisatud

- ✅ Frontpage Hero Banner

## Blokid, kuhu tuleks veel lisada

- [ ] Hero
- [ ] Our Facts
- [ ] Services
- [ ] Team
- [ ] Testimonials
- [ ] Why Sharks
- [ ] Why We
- [ ] Portfolio
- [ ] ... (kõik teised blokid)

## Märkmed

- Vaikimisi kuvatakse kõik blokid mobiilis (`default_value: 1`)
- Kui väli ei eksisteeri, kuvatakse blokk samuti mobiilis
- Ainult kui linnuke on selgelt välja lülitatud, peidetakse blokk mobiilis
- Breakpoint on 768px (iPad portrait ja väiksemad seadmed)
