# 🐛 Debug Guide - ACF Blokid ei ilmu

## Probleem: Ei näe ACF blokke kui vajutan + Gutenbergis

---

## ✅ Samm 1: Kontrolli ACF Pro versiooni

### WordPressis:

```
Plugins → Kontrolli "Advanced Custom Fields PRO"
```

**Vajalik versioon:** ACF Pro 5.8.0 või uuem (ACF blokid töötavad alates 5.8)

**Kui ACF Pro ei ole aktiveeritud:**
1. Mine Plugins
2. Aktiveeri "Advanced Custom Fields PRO"
3. Refresh lehte

---

## ✅ Samm 2: Kontrolli Field Groups

### WordPressis:

```
Custom Fields → Field Groups
```

**Peaksid nägema 5 groupi:**
- Contact Form Block (Location: Block == acf/contact-form)
- CTA Block (Location: Block == acf/cta)
- Hero Block (Location: Block == acf/hero)
- Pricing Block (Location: Block == acf/pricing)
- Services Block (Location: Block == acf/services)

**Kui ei näe:**
1. Mine Custom Fields → Sync
2. Sync kõik field groups
3. Refresh

---

## ✅ Samm 3: Kontrolli Teema

### WordPressis:

```
Appearance → Themes
```

**Kontrolli:**
- ✅ "Sharks 2025" on aktiveeritud
- ✅ Ei ole Child Theme (kui on, aktiveeri parent theme)

---

## ✅ Samm 4: Debug Mode

Lisa `wp-config.php` faili (enne `/* That's all, stop editing! */`):

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Siis vaata `/wp-content/debug.log` faili - kas seal on vigu?

---

## ✅ Samm 5: Käsitsi Test

### Loo test fail:

Loo fail `wp-content/themes/sharks2025/test-blocks.php`:

```php
<?php
require_once('../../../wp-load.php');

echo "<h1>ACF Blocks Debug</h1>";

// Check ACF Pro
if (function_exists('acf_register_block_type')) {
    echo "<p style='color:green;'>✅ ACF Pro active and acf_register_block_type() exists</p>";
} else {
    echo "<p style='color:red;'>❌ ACF Pro NOT active or function doesn't exist</p>";
}

// Check theme
$theme = wp_get_theme();
echo "<p>Current theme: <strong>" . $theme->get('Name') . "</strong></p>";

// Check if blocks are registered
$block_types = WP_Block_Type_Registry::get_instance()->get_all_registered();
$acf_blocks = array_filter($block_types, function($block) {
    return strpos($block->name, 'acf/') === 0;
});

echo "<h2>Registered ACF Blocks (" . count($acf_blocks) . "):</h2>";
if (!empty($acf_blocks)) {
    echo "<ul>";
    foreach ($acf_blocks as $block) {
        echo "<li>{$block->name} - {$block->title}</li>";
    }
    echo "</ul>";
} else {
    echo "<p style='color:red;'>No ACF blocks found!</p>";
}

// Check field groups
$field_groups = acf_get_field_groups();
echo "<h2>ACF Field Groups (" . count($field_groups) . "):</h2>";
if (!empty($field_groups)) {
    echo "<ul>";
    foreach ($field_groups as $group) {
        echo "<li>{$group['title']} (Key: {$group['key']})</li>";
        // Check location
        if (!empty($group['location'])) {
            foreach ($group['location'] as $location_group) {
                foreach ($location_group as $rule) {
                    if ($rule['param'] === 'block') {
                        echo " → Location: Block == {$rule['value']}";
                    }
                }
            }
        }
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p style='color:red;'>No field groups found!</p>";
}
```

Külasta: `http://your-site.com/wp-content/themes/sharks2025/test-blocks.php`

See näitab:
- ✅ Kas ACF Pro on aktiivne
- ✅ Milliseid ACF blokke on registreeritud
- ✅ Milliseid field groups on olemas

---

## ✅ Samm 6: Cache Clear

### Clear kõik cache'd:

1. **WordPress cache:**
   ```
   Kui kasutad cache plugin'i (W3 Total Cache, WP Super Cache):
   → Mine Settings → Clear All Cache
   ```

2. **Browser cache:**
   ```
   Chrome/Edge: Ctrl + Shift + Delete
   Firefox: Ctrl + Shift + Delete
   ```

3. **Hard refresh lehte:**
   ```
   Ctrl + Shift + R (Windows)
   Cmd + Shift + R (Mac)
   ```

4. **Server cache (kui on):**
   ```
   Küsi hostingu toelt cache tühjendamist
   ```

---

## ✅ Samm 7: Kontrolli Permissions

### Serveris:

```bash
cd /var/www/html/wp-content/themes/sharks2025
chmod -R 755 .
chown -R www-data:www-data .
```

**Eriti tähtis:**
```bash
chmod 755 acf-json/
chmod 644 acf-json/*.json
```

---

## ✅ Samm 8: Test erinevat lehte

Vahel Gutenberg cache'ib lehti. Proovi:

1. **Loo täiesti uus leht:**
   ```
   Pages → Add New
   Title: "Test ACF Blocks"
   ```

2. **Vajuta +**

3. **Otsi:**
   ```
   Otsi: "hero"
   Otsi: "sharks"
   ```

---

## ✅ Samm 9: Kontrolli ACF Settings

### WordPressis:

```
Custom Fields → Settings (või Tools)
```

**Kontrolli:**
- ✅ "Block JSON" on enabled (kui on selline seade)
- ✅ Ei ole "Disable block editor" checked

---

## 🔍 Kõige tõenäolisemad põhjused:

### 1. ACF Pro ei ole aktiveeritud
**Lahendus:** Plugins → Activate ACF Pro

### 2. ACF Pro versioon liiga vana
**Lahendus:** Update ACF Pro (vähemalt 5.8.0)

### 3. Field Groups ei ole õigesti seadistatud
**Lahendus:** Custom Fields → Sync

### 4. Cache probleem
**Lahendus:** Clear kõik cache'd + hard refresh

### 5. Theme ei ole aktiveeritud
**Lahendus:** Appearance → Themes → Activate Sharks 2025

---

## 🆘 Kui midagi ei aita:

### Variant A: Kasuta Classic Editor ajutiselt

```php
// functions.php - lisa ajutiselt
add_filter('use_block_editor_for_post', '__return_false');
```

### Variant B: Test ACF blokke käsitsi

Loo test page template:

```php
// page-test.php
<?php get_header(); ?>

<div class="container">
    <?php
    // Test Hero Block directly
    if (function_exists('acf_register_block_type')) {
        echo "ACF Pro is active!";
        
        // Get registered blocks
        $blocks = acf_get_block_types();
        echo "<pre>";
        print_r($blocks);
        echo "</pre>";
    } else {
        echo "ACF Pro NOT active!";
    }
    ?>
</div>

<?php get_footer(); ?>
```

---

## 📞 Support Checklist

Kui tahad abi küsida, siis anna teada:

- [ ] ACF Pro versioon?
- [ ] WordPress versioon?
- [ ] PHP versioon?
- [ ] Kas näed field groups (Custom Fields)?
- [ ] Kas näed "Sharks Blocks" kategooriat editoris?
- [ ] Kas debug.log'is on vigu?
- [ ] Kas test-blocks.php näitab blokke?

---

**Proovi neid samme järjekorras ja anna teada, mis punktis probleem ilmneb!** 🔧

