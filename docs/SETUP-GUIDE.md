# Sharks 2025 Theme - Setup Guide

Järgi neid samme teema seadistamiseks.

## 1. Eeldused

Enne teema aktiveerimist veendu, et sul on installitud:

- ✅ WordPress 6.0 või uuem
- ✅ PHP 7.4 või uuem
- ✅ **ACF Pro plugin** (kohustuslik!)
- ✅ **Contact Form 7** plugin (soovituslik kontaktvormi jaoks)

## 2. Teema Aktiveerimine

1. Mine **Appearance → Themes**
2. Aktiveeri **Sharks 2025** teema
3. Veendu, et ACF Pro on aktiveeritud

## 3. ACF Field Groupide Seadistamine

Teema sisaldab valmis ACF field group'e `acf-json/` kaustas. Kui need automaatselt ei laadi:

### Hero Block Field Group

**Location:** Block equals to `acf/hero`

Väljad:
- `headline` - Text
- `subheadline` - Textarea
- `primary_cta_text` - Text
- `primary_cta_url` - URL
- `secondary_cta_text` - Text
- `secondary_cta_url` - URL
- `media` - Image
- `style_variant` - Select (choices: default, centered, dark)

### Services Block Field Group

**Location:** Block equals to `acf/services`

Väljad:
- `section_title` - Text
- `section_text` - Textarea
- `services` - Repeater
  - `icon` - Image
  - `title` - Text
  - `description` - Textarea
  - `link_url` - URL
  - `link_text` - Text

### Pricing Block Field Group

**Location:** Block equals to `acf/pricing`

Väljad:
- `section_title` - Text
- `section_text` - Textarea
- `pricing_plans` - Repeater
  - `plan_name` - Text
  - `description` - Textarea
  - `price` - Number
  - `currency` - Text (default: €)
  - `period` - Text (default: month)
  - `featured` - True/False
  - `features` - Repeater
    - `feature_text` - Text
    - `disabled` - True/False
  - `button_text` - Text
  - `button_url` - URL

### CTA Block Field Group

**Location:** Block equals to `acf/cta`

Väljad:
- `title` - Text
- `text` - Textarea
- `primary_button_text` - Text
- `primary_button_url` - URL
- `secondary_button_text` - Text
- `secondary_button_url` - URL
- `style_variant` - Select (choices: default, accent, gradient, dark, light)

### Contact Form Block Field Group

**Location:** Block equals to `acf/contact-form`

Väljad:
- `title` - Text
- `text` - Textarea
- `cf7_shortcode` - Text
- `show_contact_info` - True/False
- `email` - Email
- `phone` - Text
- `address` - Textarea

## 4. Menüüde Loomine

Mine **Appearance → Menus** ja loo järgmised menüüd:

1. **Primary Menu** (header navigatsioon)
   - Assukoht: Primary Menu
   - Näide linkidest: Home, Services, Pricing, Contact

2. **Footer Menu 1** (footer esimene veerg)
   - Assukoht: Footer Menu 1
   - Näide: About, Team, Careers

3. **Footer Menu 2** (footer teine veerg)
   - Assukoht: Footer Menu 2
   - Näide: Services, Solutions, Products

4. **Footer Menu 3** (footer kolmas veerg)
   - Assukoht: Footer Menu 3
   - Näide: Contact, Support, FAQ

## 5. Avalehe Seadistamine

### Samm 1: Loo Avaleht

1. Mine **Pages → Add New**
2. Pealkirjaks "Home" või "Avaleht"
3. Lisa järgmised ACF blokid järjekorras:

   **a) Hero Block**
   - Headline: "Welcome to Sharks 2025"
   - Subheadline: "Your trusted partner in success"
   - Primary CTA: "Get Started" → #contact
   - Secondary CTA: "Learn More" → #services
   - Lisa Hero pilt

   **b) Services Block**
   - Section Title: "Our Services"
   - Section Text: "We offer comprehensive solutions..."
   - Lisa 3-6 teenust ikoonide ja kirjeldustega

   **c) Pricing Block**
   - Section Title: "Choose Your Plan"
   - Section Text: "Flexible pricing options..."
   - Lisa 2-4 hinnapakett
   - Märgi üks "Featured" planiks

   **d) CTA Block**
   - Title: "Ready to Get Started?"
   - Text: "Join hundreds of satisfied customers"
   - Button: "Start Free Trial" → /signup

   **e) Contact Form Block**
   - Title: "Get In Touch"
   - Lisa Contact Form 7 shortcode: `[contact-form-7 id="123" title="Contact form"]`
   - Aktiveeri "Show Contact Info"
   - Lisa email, telefon, aadress

4. Salvesta leht

### Samm 2: Sea Avaleheks

1. Mine **Settings → Reading**
2. Vali "A static page"
3. Homepage: vali "Home"
4. Salvesta

## 6. Contact Form 7 Seadistamine

1. Mine **Contact → Add New**
2. Loo kontaktvorm järgmiste väljadega:
   - Name (required)
   - Email (required)
   - Phone
   - Message (required)
3. Salvesta ja kopeeri shortcode
4. Lisa shortcode Contact Form Block'i

## 7. Logo ja Saidi Identiteet

**UUS!** Nüüd saad logo lisada kahel viisil:

### Meetod 1: Sharks Settings (soovitatud)

1. Mine **Sharks Settings** → **Branding** tab
2. **Site Logo:** Lisa logo pilt
3. **Logo Width:** Desktop laius (default: 160px)
4. **Logo Mobile Width:** Mobile laius (default: 120px)
5. Salvesta

### Meetod 2: WordPress Customizer

1. Mine **Appearance → Customize → Site Identity**
2. Lisa logo (soovitatud suurus: 200x60px)
3. Lisa site icon (favicon)
4. Salvesta

## 8. Värvide Kohandamine

### Sharks Settings (soovitatud)

1. Mine **Sharks Settings**
2. **Colors tab:** Vali värve color picker'ist
3. **Typography tab:** Sea font-family ja sizes
4. **Spacing tab:** Sea spacing scale
5. **Border Radius tab:** Sea border radiused
6. Salvesta - `variables.css` ja `theme.json` uuendatakse automaatselt!

### Käsitsi CSS Tokenid

Redigeeri `assets/css/00-settings/variables.css`:

```css
:root {
  --color-primary: #0066CC;      /* Oma brändi värv */
  --color-secondary: #00A3E0;    /* Sekundaarne värv */
  --color-accent: #FF6B35;       /* Aktsendi värv */
  /* ... */
}
```

### Gutenberg Palett

Uuenda `theme.json` värve (või kasuta Sharks Settings automaatset update'i):

```json
{
  "settings": {
    "color": {
      "palette": [
        { "slug": "primary", "name": "Primary", "color": "#0066CC" }
      ]
    }
  }
}
```

## 9. Testimine

### Kontrolli järgmist:

- ✅ Avaleht kuvab kõiki plokke korrektselt
- ✅ Menüüd töötavad (header ja footer)
- ✅ Mobile menüü avaneb ja sulgub
- ✅ Kontaktvorm töötab
- ✅ Pricing plokk kuvab hinnapaketid korrektselt
- ✅ CTA nupud viivad õigetesse asukohtadesse
- ✅ Responsive disain (mobile, tablet, desktop)
- ✅ Logo näitab õigesti desktop'is ja mobile'is

## 10. Valikulised Täiendused

### Social Media Lingid

Redigeeri `footer.php` ja uuenda social links array:

```php
$social_links = [
    'facebook' => 'https://facebook.com/yourpage',
    'twitter' => 'https://twitter.com/yourhandle',
    'linkedin' => 'https://linkedin.com/company/yourcompany',
    'instagram' => 'https://instagram.com/yourhandle',
];
```

### Google Fonts

Lisa `inc/theme.php` faili enqueue funktsioon:

```php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );
}, 5);
```

## Toe ja Abi

Kui sul on probleeme või küsimusi:

1. Veendu, et ACF Pro on aktiveeritud
2. Kontrolli, et kõik field group'id on õigesti seadistatud
3. Vaata `acf-json/` kausta - kas seal on failid?
4. Kontrolli browseri konsooli vigade osas
5. Aktiveeri WordPress debug mode: `define('WP_DEBUG', true);`
6. **Sharks Settings → System Information** - kontrolli debug infot

## Täiendavad Ressursid

- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [WordPress Block Editor](https://wordpress.org/support/article/wordpress-editor/)
- [Contact Form 7 Guide](https://contactform7.com/docs/)
- [Figma Import Guide](docs/FIGMA-IMPORT-GUIDE.md)

---

**Edu teemaga töötamisel!** 🚀

