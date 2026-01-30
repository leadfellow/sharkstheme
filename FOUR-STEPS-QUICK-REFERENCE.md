# Four Steps Block - Kiire Referents

## 🚀 Kiire Alustamine

1. **Lisa blokk:** Gutenberg → "+" → Otsi "Four Steps"
2. **Seadista:** Täida ACF väljad
3. **Avalda:** Salvesta ja vaata

## 📋 ACF Väljad (Kiirülevaade)

| Väli | Tüüp | Kohustuslik | Vaikeväärtus |
|------|------|-------------|--------------|
| Anchor (ID) | Text | ❌ | - |
| Header Icon Left | Select | ❌ | x |
| Header Title | Text | ✅ | "Neli sammu eduni" |
| Header Icon Right | Select | ❌ | asterisk |
| Card Background Icon | Select | ❌ | asterisk-stroke |
| Card Number | Text | ❌ | "02" |
| Card Description | Textarea | ❌ | Default text |
| Steps | Repeater | ✅ | - |
| └─ Step Text | Text | ✅ | - |
| └─ Is Highlighted | True/False | ❌ | false |
| └─ Has Border | True/False | ❌ | false |

## 🎨 Ikoonide Valikud

### Header Ikoonid (vasakul ja paremal)
- `x` - X (Rist)
- `asterisk` - Asterisk (Tärn)
- `star` - Star (Täht)

### Card Background Ikoonid
- `asterisk-stroke` - Asterisk Stroke (vaikimisi)
- `x` - X (Rist)
- `star` - Star (Täht)

## 📐 Mõõdud

```
Container: 1440px max-width
Padding: 120px 58px
Header Icons: 62px × 62px
Title Font: 82px
Card: 513px × 350px
Card Number: 82px
Step Font: 32px
```

## 🎯 CSS Klassid

```css
.block-four-steps                  /* Põhiklass */
.four-steps__container             /* Konteiner */
.four-steps__header                /* Päis */
.four-steps__icon--left            /* Vasakpoolne ikoon */
.four-steps__icon--right           /* Parempoolne ikoon */
.four-steps__title                 /* Pealkiri */
.four-steps__content               /* Sisu */
.four-steps__left-column           /* Vasak veerg */
.four-steps__card                  /* Must kast */
.four-steps__card-background       /* Kaardi taustaikon */
.four-steps__card-number           /* Kaardi number */
.four-steps__card-description      /* Kaardi kirjeldus */
.four-steps__right-column          /* Parem veerg */
.four-steps__step                  /* Samm */
.four-steps__step--highlighted     /* Esiletõstetud samm */
.four-steps__step--border          /* Samm äärega */
.four-steps__step-number           /* Sammu number */
.four-steps__step-text             /* Sammu tekst */
```

## 🎨 Värvid

```css
Background:     #f7f7f5  /* Hele hall */
Card:           #000000  /* Must */
Text:           #000000  /* Must */
Step Number:    #bbbab6  /* Hall */
Border:         #bbbab6  /* Hall */
Highlight:      #ffffff  /* Valge */
```

## 📱 Responsive

| Breakpoint | Layout | Icons | Title | Steps |
|------------|--------|-------|-------|-------|
| >1200px | 2 cols | 62px | 82px | 32px |
| 768-1200px | 1 col | 40px | 48px | 24px |
| 480-768px | 1 col | 40px | 36px | 20px |
| <480px | 1 col | 40px | 36px | 20px |

## 📁 Failid

```
PHP:  template-parts/blocks/four-steps/four-steps.php
CSS:  assets/css/30-components/four-steps.css
ACF:  acf-json/group_four_steps.json
Demo: demo-four-steps.html
```

## 🔧 Registreerimine

```php
// inc/blocks.php
acf_register_block_type([
    'name' => 'four-steps',
    'title' => 'Four Steps',
    'category' => 'sharks-blocks',
    'icon' => 'editor-ol-rtl',
]);
```

## 💡 Näited

### Näide 1: Põhiseadistus
```
Title: "Neli sammu eduni"
Icons: X + Asterisk
Card: 02 + Description
Steps: 4 sammu (2. esiletõstetud)
```

### Näide 2: Minimalistlik
```
Title: "Meie protsess"
Icons: Star + Star
Card: 01 + Short text
Steps: 4 sammu (kõik äärega)
```

## ⚡ Kiired Käsud

### ACF Sünkroniseerimine
```
WP Admin → ACF → Tools → Sync → "Four Steps Block"
```

### CSS Värskendamine
```
Ctrl + F5 (vahemälu tühjendamine)
```

### Demo Avamine
```
Open: demo-four-steps.html in browser
```

## 🐛 Troubleshooting

| Probleem | Lahendus |
|----------|----------|
| Blokk ei kuvata | ACF → Tools → Sync |
| Stiilid ei laadi | Ctrl + F5 |
| Ikoonid puuduvad | Kontrolli $icon_map |
| Layout katki | Kontrolli CSS import |

## 📚 Dokumentatsioon

- **Täielik:** `FOUR-STEPS-SUMMARY.md`
- **Kasutaja:** `FOUR-STEPS-KASUTUSJUHEND.md`
- **Paigaldus:** `FOUR-STEPS-INSTALLATION.md`
- **Struktuur:** `FOUR-STEPS-STRUCTURE.md`
- **Quick Ref:** `FOUR-STEPS-QUICK-REFERENCE.md` (see fail)

## ✅ Checklist

### Enne Kasutamist
- [ ] ACF Pro aktiveeritud
- [ ] Blokk sünkroniseeritud
- [ ] CSS laetud
- [ ] Demo testitud

### Bloki Lisamisel
- [ ] Pealkiri sisestatud
- [ ] Ikoonid valitud
- [ ] Kaardi number sisestatud
- [ ] Kirjeldus lisatud
- [ ] Sammud lisatud (1-4)
- [ ] Esiletõstmised seadistatud
- [ ] Ääred seadistatud

### Enne Avaldamist
- [ ] Eelvaade kontrollitud
- [ ] Mobile vaade testitud
- [ ] Sisu korrektselt
- [ ] Ikoonid kuvatakse
- [ ] Spacing OK

## 🎯 Parimad Praktikad

### ✅ Tee
- Kasuta lühikesi pealkirju (max 4 sõna)
- Esiletõsta ainult üht sammu
- Kasuta ääri visuaalseks eraldamiseks
- Hoia kirjeldused lühikesed

### ❌ Väldi
- Pikki pealkirju
- Rohkem kui 4 sammu
- Kõigi sammude esiletõstmist
- Väga pikki kirjeldusi

## 🔗 Lingid

- **Block Slug:** `acf/four-steps`
- **Category:** `sharks-blocks`
- **Icon:** `editor-ol-rtl`
- **Keywords:** `steps`, `process`, `neli`, `sammud`, `eduni`, `four`

## 📞 Tugi

Kui vajad abi:
1. Vaata dokumentatsiooni
2. Ava demo fail
3. Kontrolli ACF sünkroniseerimist
4. Tühjenda vahemälu

---

**Loodud:** 2026-01-29  
**Versioon:** 1.0.0  
**Status:** ✅ Valmis  
**Autor:** Marketing Sharks

---

## 🚀 Kiire Start (Copy-Paste)

```php
// Näidis ACF konfiguratsioon
Header Icon Left: x
Header Title: "Neli sammu eduni"
Header Icon Right: asterisk
Card Background Icon: asterisk-stroke
Card Number: "02"
Card Description: "Formuleerime eesmärgid. Töötame välja edasise tegevuskava ja optimaalse turundusstrateegia."

Steps:
1. "Strateegiline analüüs" (tavaline)
2. "Lahenduste kavandamine" (esiletõstetud)
3. "Praktiline teostus" (äär)
4. "Tulemuste analüüs" (äär)
```

---

**💡 Vihje:** Salvesta see fail järjehoidjatesse kiire juurdepääsu jaoks!
