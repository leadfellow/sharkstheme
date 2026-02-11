# Portfolio1 Installeerimisjuhend

## Automaatne installeerimine (ACF Sync)

Portfolio1 blokk on juba installeeritud ja valmis kasutamiseks!

### 1. Sünkroniseeri ACF väljad

1. Mine WordPressi adminpaneeli
2. Ava **Custom Fields → Tools**
3. Vaata "Sync available" sektsiooni
4. Kui näed "Portfolio1 Block", kliki **Sync**
5. Väljad on nüüd sünkroniseeritud

### 2. Kontrolli bloki olemasolu

1. Ava mõni leht või postitus Gutenberg editoris
2. Kliki "+" nuppu
3. Otsi "Portfolio1" või "Portfolio1 (Expandable)"
4. Blokk peaks olema nähtav "Sharks Blocks" kategoorias

### 3. Lisa blokk lehele

1. Kliki bloki peale
2. Blokk lisatakse lehele
3. Täida ACF väljad
4. Salvesta leht

## Failide struktuur

```
sharks2025/
├── acf-json/
│   └── group_portfolio1.json          # ACF väljad
├── assets/
│   ├── css/
│   │   └── portfolio1.css             # Stiilid
│   └── js/
│       └── portfolio1.js              # JavaScript
├── inc/
│   └── blocks.php                     # Bloki registreerimine
├── template-parts/
│   └── blocks/
│       └── portfolio1/
│           ├── portfolio1.php         # Põhimall
│           ├── README.md             # Dokumentatsioon
│           ├── KASUTUSJUHEND.md      # Kasutusjuhend
│           └── INSTALL.md            # See fail
└── demo-portfolio1.html              # Demo HTML
```

## Käsitsi installeerimine (kui ACF Sync ei tööta)

### Variant 1: ACF JSON import

1. Mine **Custom Fields → Tools**
2. Vali "Import Field Groups"
3. Vali fail: `acf-json/group_portfolio1.json`
4. Kliki "Import"

### Variant 2: Käsitsi loomine

Kui ACF JSON ei tööta, saad väljad käsitsi luua:

1. Mine **Custom Fields → Add New**
2. Pane nimeks "Portfolio1 Block"
3. Lisa väljad vastavalt `group_portfolio1.json` failile
4. Määra asukoht: Block = acf/portfolio1

## Kontrolli installeerimist

### 1. Kontrolli faile

Veendu, et kõik failid on olemas:

```bash
# Kontrolli ACF JSON faili
ls acf-json/group_portfolio1.json

# Kontrolli CSS faili
ls assets/css/portfolio1.css

# Kontrolli JS faili
ls assets/js/portfolio1.js

# Kontrolli PHP malli
ls template-parts/blocks/portfolio1/portfolio1.php
```

### 2. Kontrolli bloki registreerimist

Ava `inc/blocks.php` ja veendu, et Portfolio1 blokk on registreeritud:

```php
// Portfolio1 Block
acf_register_block_type([
    'name'            => 'portfolio1',
    'title'           => __('Portfolio1 (Expandable)', 'sharks2025'),
    // ...
]);
```

### 3. Kontrolli teema versiooni

Ava `functions.php` ja kontrolli versiooni:

```php
define('SHARKS_VERSION', '1.8.7'); // või uuem
```

### 4. Testi blokki

1. Loo uus leht või postitus
2. Lisa Portfolio1 blokk
3. Täida väljad testdatadega
4. Salvesta ja vaata eelvaadet
5. Kontrolli, et:
   - ✅ Filtreerimine töötab
   - ✅ Akordion avaneb/sulgub
   - ✅ Taustad vahelduvad
   - ✅ Pildid kuvatakse
   - ✅ Statistika kuvatakse

## Tõrkeotsing

### Blokk ei ilmu Gutenbergis

**Probleem:** Portfolio1 blokk ei ole nähtav blokide nimekirjas.

**Lahendus:**
1. Kontrolli, et ACF Pro on aktiveeritud
2. Kontrolli, et `inc/blocks.php` sisaldab Portfolio1 registreerimist
3. Tühjenda WordPressi vahemälu (kui kasutad vahemälu pluginat)
4. Tühjenda brauseri vahemälu
5. Logi WordPressist välja ja uuesti sisse

### ACF väljad ei ilmu

**Probleem:** Blokk on olemas, aga ACF väljad ei kuvata.

**Lahendus:**
1. Mine **Custom Fields → Tools**
2. Sünkroniseeri "Portfolio1 Block"
3. Kui sünkroniseerimist ei ole, impordi `group_portfolio1.json`
4. Kontrolli, et väljad on seotud `acf/portfolio1` blokiga

### Stiilid ei laadi

**Probleem:** Blokk kuvatakse, aga stiilid puuduvad.

**Lahendus:**
1. Kontrolli, et `assets/css/portfolio1.css` eksisteerib
2. Kontrolli faili õigusi (peaks olema loetav)
3. Kontrolli teema versiooni `functions.php` failis
4. Tühjenda brauseri vahemälu (Ctrl+Shift+R)
5. Tühjenda WordPressi vahemälu

### JavaScript ei tööta

**Probleem:** Filtreerimine või akordion ei tööta.

**Lahendus:**
1. Kontrolli, et `assets/js/portfolio1.js` eksisteerib
2. Ava brauseri konsool (F12) ja vaata vigu
3. Kontrolli, et JavaScript laetakse (vaata Network tab'i)
4. Tühjenda brauseri vahemälu
5. Kontrolli, et pole JavaScript konflikte teiste pluginatega

### Pildid ei kuvata

**Probleem:** Pildid ei laadi või on katki.

**Lahendus:**
1. Kontrolli, et pildid on õigesti üles laetud
2. Kontrolli pildi URL'i (peaks algama `https://`)
3. Kontrolli pildi suurust (mitte üle 2MB)
4. Kontrolli pildi formaati (JPG, PNG, WebP)
5. Kontrolli serveri õigusi

### Filtreerimine ei tööta

**Probleem:** Kategooriate filtreerimine ei tööta.

**Lahendus:**
1. Kontrolli, et kategooria slug vastab töö kategooriale
2. Kontrolli, et slug on õigesti sisestatud (väiketähed, ilma tühikuteta)
3. Ava brauseri konsool ja vaata vigu
4. Kontrolli, et JavaScript on laetud

## Testimine

### Testi kategooriate filtreerimist

1. Lisa vähemalt 3 kategooriat
2. Lisa vähemalt 2 tööd igasse kategooriasse
3. Kliki filtreerimise nuppudel
4. Kontrolli, et õiged tööd kuvatakse

### Testi akordioni

1. Lisa vähemalt 2 tööd
2. Kliki "loe lähemalt projektist" nupul
3. Kontrolli, et töö avaneb
4. Kliki teise töö nupul
5. Kontrolli, et esimene töö sulgub

### Testi mobiilis

1. Ava leht mobiilseadmes või kasuta brauseri DevTools
2. Kontrolli, et:
   - Filtreerimise nupud on loetavad
   - Tekstid on loetavad
   - Pildid laadivad kiiresti
   - Akordion töötab
   - Statistika kuvatakse õigesti

## Värskendamine

Kui tulevikus tuleb värskendusi:

1. **ACF väljad:** Sünkroniseeri uuesti Custom Fields → Tools
2. **CSS/JS:** Tühjenda vahemälu ja kontrolli versiooni
3. **PHP mall:** Failid värskendatakse automaatselt

## Lisainfo

- **Dokumentatsioon:** `README.md`
- **Kasutusjuhend:** `KASUTUSJUHEND.md`
- **Demo:** `demo-portfolio1.html`
- **ACF väljad:** `acf-json/group_portfolio1.json`

## Abi

Kui vajad abi:

1. Kontrolli dokumentatsiooni failid
2. Vaata demo HTML faili
3. Kontrolli brauseri konsooli vigade osas
4. Tühjenda vahemälu ja proovi uuesti
5. Kontrolli WordPressi ja ACF Pro versioone

## Miinimumnõuded

- ✅ WordPress 5.8 või uuem
- ✅ ACF Pro 5.9 või uuem
- ✅ PHP 7.4 või uuem
- ✅ Sharks 2025 teema

## Edukat kasutamist!

Portfolio1 blokk on nüüd valmis kasutamiseks. Kui kõik on õigesti installeeritud, peaks blokk olema nähtav Gutenberg editoris ja valmis kasutamiseks.
