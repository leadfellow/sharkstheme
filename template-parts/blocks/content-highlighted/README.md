# Content with Highlighted Block

Komponenti kasutatakse teksti kuvamiseks, kus saab märgistada teatud sõnu esiletõstmiseks.

## Kasutamine WordPress'is

1. **Lisa blokk**: Gutenberg editoris otsi "Content with Highlighted"
2. **Seadista väljad**:
   - **Show Icon**: Lülita ikoon sisse/välja (vaikimisi: sisse)
   - **Icon**: Vali ikoon (X, Asterisk, Star, Circle) - vaikimisi: Star
   - **Text Content**: Sisesta tekst ja pane nurksulgudesse `[sõnad]`, mida tahad esile tõsta
   - **Background Color**: Vali taustavärv (vaikimisi: must #000000)
   - **Text Color**: Vali teksti põhivärv (vaikimisi: hall #757472)
   - **Highlight Text Color**: Vali esiletõstetud teksti värv (vaikimisi: valge #FFFFFF)

## Näited

### Näide 1: Põhikasutus
```
Tekst: 
Tänaseks on turundusmaastikul e-poe nullist arendamine eilne päev. [Levinumad platvormid] on WordPress + WooCommerce, Shopify, Magento ja Prestashop, mis võimaldavad kiiret ja turvalist arendust.

Tulemus:
- "Levinumad platvormid" kuvatakse highlight_color värviga
- Ülejäänud tekst kuvatakse text_color värviga
```

### Näide 2: Mitme sõna esiletõstmine
```
Tekst:
See on [esimene esiletõst] ja siin on [teine esiletõst] samal real.

Tulemus:
- Mõlemad nurksulgudes olevad tekstid kuvatakse highlight_color värviga
```

### Näide 3: Ilma ikoonita
```
- Lülita "Show Icon" väli välja
- Lisad ainult teksti ja värvid
```

### Näide 4: Erinevad ikoonid
```
- Vali ikooniks "X", "Asterisk", "Star" või "Circle"
- Kõik ikoonid on 42x42px ja kohanduvad automaatselt
```

## Väljad (ACF)

| Väli | Tüüp | Kohustuslik | Kirjeldus |
|------|------|-------------|-----------|
| `show_icon` | True/False | Ei | Kuva ikoon (vaikimisi: jah) |
| `icon` | Select | Ei | Ikooni valik: X, Asterisk, Star, Circle (vaikimisi: Star) |
| `text_content` | Textarea | Jah | Tekst kus `[sõnad]` on esiletõstetud |
| `background_color` | Color Picker | Ei | Taustavärv (vaikimisi #000000) |
| `text_color` | Color Picker | Ei | Teksti põhivärv (vaikimisi #757472) |
| `highlight_color` | Color Picker | Ei | Esiletõstetud teksti värv (vaikimisi #FFFFFF) |

## Tehnilised detailid

- **Komponent**: `template-parts/blocks/content-highlighted/content-highlighted.php`
- **CSS**: `assets/css/30-components/content-highlighted.css`
- **ACF JSON**: `acf-json/group_content_highlighted.json`
- **Registreerimine**: `inc/blocks.php`

## Responsive käitumine

- **Desktop (>1024px)**: Täisfunktsionaalsus
- **Tablet (768-1024px)**: Font size 28px
- **Mobile (<768px)**: Font size 22px, ikoon 32px
- **Small Mobile (<480px)**: Font size 18px, ikoon 28px

## Funktsioonid

### `process_highlighted_text($text, $highlight_color)`
Konverteerib `[tekstis olevad]` nurksulud HTML span elementideks:
```php
[sõna] → <span class="block-content-highlighted__text-highlight" style="color: #FFFFFF;">sõna</span>
```

## Kasutatud klasside struktuur

```
.block-content-highlighted
  └── .block-content-highlighted__container
      └── .block-content-highlighted__content
          ├── .block-content-highlighted__icon-container (valikuline)
          │   └── svg (inline SVG ikoon)
          └── .block-content-highlighted__text
              └── .block-content-highlighted__text-highlight (automaatne)
```

## Saadaolevad ikoonid

Komponendis on 4 eelnevalt määratletud ikooni:
- **X** - Rist/X kujund
- **Asterisk** - Tärn/asterisk kujund
- **Star** - Täht kujund (vaikimisi)
- **Circle** - Ring kujund

Kõik ikoonid on valge värviga ja 42x42px suurusega.

## Demo

Vaata `demo-content-highlighted.html` faili näidete jaoks.

