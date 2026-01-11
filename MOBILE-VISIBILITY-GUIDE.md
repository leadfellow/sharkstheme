# Mobile Visibility Guide

## Ülevaade

Kõikidele ACF blokkidele lisatakse **automaatselt** "Kuva mobiilis" linnuke, mis kontrollib, kas blokk kuvatakse mobiilseadmetes (alla 768px).

## ✅ Automaatne Lisamine

Alates nüüd on "Kuva mobiilis" väli **automaatselt** kõikidel ACF blokkidel olemas! 

- Väli lisatakse automaatselt läbi `acf/load_field_group` filtri
- Vaikimisi on linnuke SEES (blokk kuvatakse mobiilis)
- Administraator saab iga bloki juures otsustada, kas see kuvatakse mobiilis või mitte

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

**UUENDATUD - Lihtsam viis!**

Bloki template failis kasuta `sharks_get_block_class()` funktsiooni:

```php
// Block attributes
$anchor = sharks_get_block_anchor($block, 'block-name');
$class_name = sharks_get_block_class($block, 'block-name');
```

See funktsioon lisab automaatselt:
- Bloki base class
- Custom className (kui on määratud)
- Mobile visibility class (kui show_on_mobile on false)

**Vana viis (töötab ka):**

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

### PHP Template (template-parts/blocks/frontpage-hero-banner/frontpage-hero-banner.php)

**UUENDATUD - Lihtne viis:**

```php
// Block attributes
$anchor = sharks_get_block_anchor($block, 'frontpage-hero-banner');
$class_name = sharks_get_block_class($block, 'block-frontpage-hero-banner');
```

Seejärel kasuta template'is:

```php
<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>">
    <!-- Block content -->
</section>
```

## Kuidas lisada teistele blokkidele

**HÜVA UUDIS:** ACF väli lisatakse automaatselt kõikidele blokkidele!

Pead ainult muutma bloki template faili:

1. **Ava bloki template fail** (nt. `template-parts/blocks/hero/hero.php`)
2. **Leia või lisa block attributes sektsioon**
3. **Kasuta `sharks_get_block_class()` funktsiooni:**

```php
// Block attributes
$anchor = sharks_get_block_anchor($block, 'hero');
$class_name = sharks_get_block_class($block, 'block-hero');
```

4. **Salvesta fail**

Nii lihtne see ongi! ACF väli on juba olemas, sa pead ainult template faili uuendama.

## Funktsioonid

### `sharks_get_block_class($block, $base_class)`

**Asub failis:** `inc/blocks.php`

**Kirjeldus:** Tagastab täieliku class name'i koos mobile visibility klassiga

**Parameetrid:**
- `$block` - Bloki data array
- `$base_class` - Bloki base class (nt. 'block-hero')

**Tagastab:** String - täielik class name

```php
function sharks_get_block_class($block, $base_class) {
    $class_name = $base_class;
    
    // Add custom className if exists
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Add mobile visibility class
    $mobile_class = sharks_get_mobile_visibility_class();
    if ($mobile_class) {
        $class_name .= ' ' . $mobile_class;
    }
    
    return $class_name;
}
```

### `sharks_get_mobile_visibility_class()`

**Asub failis:** `inc/theme-helpers.php`

**Kirjeldus:** Kontrollib show_on_mobile välja ja tagastab CSS klassi

**Tagastab:** String - 'hide-on-mobile' või tühi string

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

### ACF Filter Hook

**Asub failis:** `functions.php`

Automaatselt lisab "Kuva mobiilis" välja kõikidele ACF blokkidele:

```php
add_filter('acf/load_field_group', function($field_group) {
    // Checks if this is a block field group
    // Adds show_on_mobile field automatically
    // Returns modified field group
});
```

## Testimine

1. Ava blokk WordPressi editoris
2. Leia "Kuva mobiilis" linnuke
3. Keela linnuke (Ei)
4. Salvesta lehekülg
5. Ava lehekülg mobiilvaates (alla 768px)
6. Blokk peaks olema peidetud

## Blokid, kus template on uuendatud

- ✅ Frontpage Hero Banner - kasutab `sharks_get_block_class()`

## Blokid, kus template vajab uuendamist

Järgmised blokid vajavad template faili uuendamist, et kasutada `sharks_get_block_class()` funktsiooni:

- [ ] Hero (`template-parts/blocks/hero/hero.php`)
- [ ] Our Facts (`template-parts/blocks/our-facts/our-facts.php`)
- [ ] Services (`template-parts/blocks/services/services.php`)
- [ ] Team (`template-parts/blocks/team/team.php`)
- [ ] Testimonials (`template-parts/blocks/testimonials/testimonials.php`)
- [ ] Why Sharks (`template-parts/blocks/why-sharks/why-sharks.php`)
- [ ] Why We (`template-parts/blocks/why-we/why-we.php`)
- [ ] Portfolio (`template-parts/blocks/portfolio/portfolio.php`)
- [ ] ... (kõik teised ~40 blokki)

**Märkus:** Isegi kui template ei ole uuendatud, on ACF väli juba olemas ja töötab! Template uuendamine on vajalik ainult selleks, et CSS klass lisataks automaatselt.

## Märkmed

- Vaikimisi kuvatakse kõik blokid mobiilis (`default_value: 1`)
- Kui väli ei eksisteeri, kuvatakse blokk samuti mobiilis
- Ainult kui linnuke on selgelt välja lülitatud, peidetakse blokk mobiilis
- Breakpoint on 768px (iPad portrait ja väiksemad seadmed)
