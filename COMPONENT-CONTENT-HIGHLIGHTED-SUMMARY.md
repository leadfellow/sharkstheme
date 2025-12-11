# Content with Highlighted Block - Komponent

## 📋 Ülevaade

Uus WordPress ACF Gutenberg blokk teksti kuvamiseks koos esiletõstmisega. Kasutab standardseid SVG ikoonivalikuid nagu teised komponendid.

## 📁 Loodud/Uuendatud failid

### Loodud failid:
1. **ACF JSON**: `acf-json/group_content_highlighted.json`
2. **PHP Template**: `template-parts/blocks/content-highlighted/content-highlighted.php`
3. **CSS**: `assets/css/30-components/content-highlighted.css`
4. **README**: `template-parts/blocks/content-highlighted/README.md`
5. **Demo 1**: `demo-content-highlighted.html`
6. **Demo 2**: `demo-content-highlighted-icons.html`

### Uuendatud failid:
1. **Blokid**: `inc/blocks.php` - lisatud "Content with Highlighted" bloki registreerimine
2. **CSS import**: `assets/css/site.css` - lisatud CSS import ja spacing reeglid

## ✨ Funktsioonid

### 1. Ikoonide valik (standardne)
- ✅ **X** - Rist/X kujund
- ✅ **Asterisk** - Tärn kujund
- ✅ **Star** - Täht kujund (vaikimisi)
- ✅ **Circle** - Ring kujund

Kõik ikoonid on 42x42px ja valge värviga.

### 2. Teksti esiletõstmine
- Kasuta nurksulge `[sõna]` teksti esiletõstmiseks
- Näide: `See on [esiletõstetud] tekst` → "esiletõstetud" kuvatakse highlight_color värviga

### 3. Värvi valikud
- **Background Color** - taustavärv (vaikimisi: #000000)
- **Text Color** - põhiteksti värv (vaikimisi: #757472)
- **Highlight Text Color** - esiletõstetud teksti värv (vaikimisi: #FFFFFF)

### 4. Show Icon toggle
- Võimalik ikoon välja lülitada
- Vaikimisi on ikoon sisse lülitatud

## 🎨 ACF Väljad

| Väli | Tüüp | Vaikeväärtus | Kirjeldus |
|------|------|--------------|-----------|
| `show_icon` | True/False | 1 (jah) | Kuva ikoon |
| `icon` | Select | "star" | Ikooni valik (x, asterisk, star, circle) |
| `text_content` | Textarea | - | Tekst kus [sõnad] on esiletõstetud |
| `background_color` | Color Picker | #000000 | Taustavärv |
| `text_color` | Color Picker | #757472 | Teksti värv |
| `highlight_color` | Color Picker | #FFFFFF | Esiletõstetud teksti värv |

## 📱 Responsive

- **Desktop (>1024px)**: Font 36px, ikoon 42px
- **Tablet (768-1024px)**: Font 28px, ikoon 42px
- **Mobile (<768px)**: Font 22px, ikoon 32px
- **Small Mobile (<480px)**: Font 18px, ikoon 28px

## 🔧 Tehnilised detailid

### Icon Map (PHP)
```php
$icon_map = [
    'x' => '<svg width="42" height="42">...</svg>',
    'asterisk' => '<svg width="42" height="42">...</svg>',
    'star' => '<svg width="42" height="42">...</svg>',
    'circle' => '<svg width="42" height="42">...</svg>'
];
```

### Text Processing
```php
function process_highlighted_text($text, $highlight_color) {
    // Konverteerib [text] -> <span class="...">text</span>
    // Lisab nl2br() toe
}
```

## 📖 Kasutamine WordPress'is

1. Gutenberg editoris otsi **"Content with Highlighted"**
2. Seadista väljad:
   - Lülita **Show Icon** sisse/välja
   - Vali **Icon** (X, Asterisk, Star või Circle)
   - Sisesta **Text Content**: `See on [esiletõstetud] tekst`
   - Vali **Background Color**
   - Vali **Text Color**
   - Vali **Highlight Text Color**

## 📝 Näited

### Näide 1: Star ikoon (vaikimisi)
```
Show Icon: ✓
Icon: Star
Text: See on [esiletõstetud] tekst
Background: #000000
Text Color: #757472
Highlight Color: #FFFFFF
```

### Näide 2: Ilma ikoonita
```
Show Icon: ✗
Text: Ainult [tekst ilma] ikoonita
Background: #000000
Text Color: #757472
Highlight Color: #FFFFFF
```

### Näide 3: Mitme sõna esiletõstmine
```
Text: See on [esimene] ja siin [teine] esiletõst.
```

## 🚀 Olekord

✅ ACF JSON konfiguratsioon loodud
✅ PHP template loodud
✅ CSS loodud (koos responsive käitumisega)
✅ Bloki registreerimine loodud
✅ CSS import lisatud site.css
✅ Spacing reeglid lisatud
✅ Demo failid loodud
✅ README dokumentatsioon loodud
✅ Ikoonide süsteem ühildub teiste komponentidega

## 🎯 Järgmised sammud

1. WordPress'is mine ACF → Tools → Sync
2. Sünkroniseeri "Content with Highlighted Block"
3. Lisa blokk lehele ja testi
4. Vaata `demo-content-highlighted.html` ja `demo-content-highlighted-icons.html` näiteid

---

**Loodud:** 2025-12-11
**Komponendi nimi:** Content with Highlighted
**ACF Grupp:** group_content_highlighted_block
**Block ID:** acf/content-highlighted

