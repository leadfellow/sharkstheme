# Two Box CTA Block

Kaks kõrvutist kaarti ikoonide, funktsioonide/teksti ja CTA nuppudega. Ideaalne võrdluseks (nt Valmispõhi vs Eridisain, Koduleht vs E-pood).

## 📋 Ülevaade

Komponent koosneb kahest kaardist:
- **Vasak kaart** (Left Card)
- **Parem kaart** (Right Card)

Iga kaart sisaldab:
- ✅ **Ikoon** (valikuline, standardsed SVG ikoonid)
- ✅ **Pealkiri** (suur, uppercase)
- ✅ **Sisu** (kas feature labels või plain text)
  - **Feature Labels**: +/- märgistusega punktid
    - `+` (Yellow #e1ff04) - positiivsed omadused
    - `-` (Pink #f237a6) - negatiivsed omadused
  - **Plain Text**: lihtne tekst ilma labeliteta
- ✅ **CTA Button** koos URL-iga

## 🎨 Kasutamine WordPress'is

### 1. Lisa blokk
Gutenberg editoris otsi **"Two Box CTA"**

### 2. Seadista värvid
- **Section Background Color** - sektsiooni taustavärv (vaikimisi: #FFFFFF)
- **Card Background Color** - mõlema kaardi taustavärv (vaikimisi: #F7F7F5)

### 3. Seadista vasak kaart (Left Card)
1. **Show Icon** - lülita ikoon sisse/välja
2. **Icon** - vali ikoon (X, Asterisk, Star, Circle)
3. **Title** - pealkiri (nt "VALMISPÕHI")
4. **Content Type** - vali:
   - **Feature Labels (+/-)** - punktide loend +/- märgistusega
   - **Plain Text** - lihtne tekst
5. Kui valid "Feature Labels":
   - Lisa feature read
   - Iga rea jaoks vali **Type** (+ või -) ja **Text**
6. Kui valid "Plain Text":
   - Sisesta **Description Text**
7. **Button Text** - nupu tekst (nt "Saada päring")
8. **Button URL** - nupu link

### 4. Seadista parem kaart (Right Card)
Sama loogika nagu vasak kaart.

## 📊 Näited

### Näide 1: Valmispõhi vs Eridisain (Feature Labels)

**Vasak kaart:**
- Title: `VALMISPÕHI`
- Icon: `Asterisk`
- Content Type: `Feature Labels`
- Features:
  - `+` Kiire valmimisaeg ja väiksem omainvesteering
  - `+` Sobib piiratud eelarvega projektidele
  - `+` Kujundust ja struktuuri kohandatakse minimaalselt
  - `-` Vähem eristuv konkurentide seas
- Button: `Saada päring` → `#contact`

**Parem kaart:**
- Title: `ERIDISAIN`
- Icon: `Star`
- Content Type: `Feature Labels`
- Features:
  - `+` Unikaalne ja omapärane lahendus sinu brändile
  - `+` Loob eristuva kasutajakogemuse
  - `+` Suurendab konversioone
  - `-` Suurem ajakulu ja kõrgem alginvesteering
- Button: `Saada päring` → `#contact`

### Näide 2: Koduleht vs E-pood (Plain Text)

**Vasak kaart:**
- Title: `KODULEHT`
- Icon: `X`
- Content Type: `Plain Text`
- Description: `Kui sul on tooteid, mida soovid müüa...`
- Button: `Soovin kodulehte` → `#contact`

**Parem kaart:**
- Title: `E-POOD`
- Icon: `Star`
- Content Type: `Plain Text`
- Description: `Kui esimärk on tukustada oma teenusid...`
- Button: `Soovin E-poodi` → `#contact`

## 🎯 ACF Väljad

### Section Level:
| Väli | Tüüp | Vaikeväärtus |
|------|------|--------------|
| `section_background_color` | Color Picker | #FFFFFF |
| `card_background_color` | Color Picker | #F7F7F5 |

### Per Card (Left & Right):
| Väli | Tüüp | Kirjeldus |
|------|------|-----------|
| `show_icon` | True/False | Kuva ikoon |
| `icon` | Select | X, Asterisk, Star, Circle |
| `title` | Text | Kaardi pealkiri (uppercase) |
| `content_type` | Radio | "labels" või "text" |
| `features` | Repeater | Feature list kui content_type="labels" |
| `features.feature_type` | Select | "plus" või "minus" |
| `features.feature_text` | Text | Feature tekst |
| `description_text` | Textarea | Tekst kui content_type="text" |
| `button_text` | Text | CTA nupu tekst |
| `button_url` | URL | CTA nupu link |

## 🎨 Disaini detailid

### Mõõtmed:
- Container padding: `120px 58px`
- Card height: `652px` (desktop), automaatne (mobile)
- Card padding: `42px`
- Gap between cards: `20px`

### Ikoon:
- Suurus: `42x42px`

### Title:
- Font: Switzer, 82px, uppercase
- Letter-spacing: -4.1px
- Line-height: 1.1

### Feature Labels:
- Bullet: `15x15px`, border-radius 2px
- Yellow: `#e1ff04` (positiivne)
- Pink: `#f237a6` (negatiivne)
- Text: Helvetica, 18px, line-height 1.4
- Gap: 12px between items

### Button:
- Background: `#000000`
- Hover: `#333333`
- Padding: `12px 26px`
- Font: Switzer, 20px, letter-spacing -0.6px
- Arrow icon: 12x10px

## 📱 Responsive

- **Desktop (>1200px)**: 2 kaarti kõrvuti
- **Tablet (<1200px)**: Kaardid üksteise alla, min-height: 500px
- **Mobile (<768px)**: Title 40px, väiksemad padding-id
- **Small Mobile (<480px)**: Title 32px, veelgi kompaktsem

## 🔧 Tehnilised detailid

- **Komponent**: `template-parts/blocks/two-box-cta/two-box-cta.php`
- **CSS**: `assets/css/30-components/two-box-cta.css`
- **ACF JSON**: `acf-json/group_two_box_cta.json`
- **Registreerimine**: `inc/blocks.php`

## 💡 Kasutusjuhud

1. **Teenuste võrdlus**: Valmispõhi vs Eridisain
2. **Tootevõrdlus**: Koduleht vs E-pood
3. **Pakettide võrdlus**: Basic vs Pro
4. **Strateegia valik**: Orgaaniline vs Tasuline turundus

## 📖 Demo

Vaata `demo-two-box-cta.html`:
1. **Näide 1**: Valmispõhi vs Eridisain koos feature labels
2. **Näide 2**: Koduleht vs E-pood koos plain text

---

**Loodud:** 2025-12-11  
**Komponendi nimi:** Two Box CTA  
**ACF Grupp:** group_two_box_cta_block  
**Block ID:** acf/two-box-cta

