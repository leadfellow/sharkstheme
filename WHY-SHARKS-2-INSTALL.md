# Why Sharks 2 Block - Installatsioonijuhend

## ✅ Loodud Failid

Kõik vajalikud failid on loodud:

1. ✅ `template-parts/blocks/why-sharks-2/why-sharks-2.php` - PHP template
2. ✅ `template-parts/blocks/why-sharks-2/README.md` - Dokumentatsioon
3. ✅ `assets/css/30-components/why-sharks-2.css` - CSS stiilid
4. ✅ `acf-json/group_why_sharks_2.json` - ACF väljad
5. ✅ `inc/blocks.php` - Bloki registreerimine (uuendatud)
6. ✅ `assets/css/site.css` - CSS import (uuendatud)
7. ✅ `inc/theme.php` - Editor styles (uuendatud)
8. ✅ `demo-why-sharks-2.html` - Demo HTML
9. ✅ `WHY-SHARKS-2-SUMMARY.md` - Kokkuvõte

## 🚀 Järgmised Sammud

### 1. Sünkrooni ACF Väljad

1. Logi WordPressi admini
2. Mine **ACF → Tools**
3. Klõpsa **Sync Available** tab
4. Leia "Why Sharks 2 Block"
5. Klõpsa **Sync**

### 2. Kontrolli Blokki Gutenbergis

1. Ava mis tahes lehekülg või postitus
2. Klõpsa **+** (Lisa blokk)
3. Otsi "**Why Sharks 2**" või "**Why Sharks 2 (Icons)**"
4. Blokk peaks ilmuma kategoorias "**Sharks Blocks**"

### 3. Lisa Blokk Lehele

1. Klõpsa blokil
2. Täida väljad:
   - **Section Title**: "MIKS MEIE"
   - **Main Heading**: "Miks valida Marketing Sharks?"
   - **Description**: Kirjeldav tekst
3. Lisa funktsioone:
   - Klõpsa "**Add Feature Card**"
   - Vali ikoon dropdown menüüst (10 valikut saadaval)
   - Sisesta "**Feature Text**"

### 4. Testi Demo HTML-i

Ava brauseris:
```
http://your-site.com/wp-content/themes/sharks2025/demo-why-sharks-2.html
```

## 🎨 Saadaolevad Ikoonid

Ikoonid on valitavad dropdown menüüst - ei ole vaja SVG koodi kopeerida!

### 10 Ikooni Valikut:

1. **Star (Täht)** ⭐ - Kvaliteet ja tipptase
2. **Plus (Rist)** ➕ - Lisandväärtus
3. **Wave (Laine)** 🌊 - Paindlikkus
4. **Diamond (Teemant)** 💎 - Väärtus
5. **Circle (Ring)** ⭕ - Terviklikkus
6. **Square (Ruut)** ◻️ - Stabiilsus
7. **Triangle (Kolmnurk)** 🔺 - Kasv
8. **Heart (Süda)** ❤️ - Hoolivus
9. **Check (Linnuke)** ✓ - Kinnitatud
10. **Arrow (Nool)** → - Progress

**Vaata täpsemat juhendist**: `WHY-SHARKS-2-ICONS.md`

## 🔧 Troubleshooting

### Probleem: Blokk ei ilmu Gutenbergis

**Lahendus:**
1. Kontrolli, kas ACF Pro on aktiveeritud
2. Mine ACF → Tools → Sync Available
3. Sünkrooni "Why Sharks 2 Block"
4. Värskenda lehte (F5)

### Probleem: Stiilid ei rakendu

**Lahendus:**
1. Tühjenda vahemälu:
   - WordPress: WP Super Cache / W3 Total Cache
   - Brauser: Ctrl+Shift+R (Windows) või Cmd+Shift+R (Mac)
2. Kontrolli, kas CSS fail eksisteerib:
   ```
   assets/css/30-components/why-sharks-2.css
   ```
3. Kontrolli, kas site.css sisaldab importi:
   ```css
   @import url('./30-components/why-sharks-2.css');
   ```

### Probleem: Ikoonid ei kuvata

**Lahendus:**
1. Kontrolli, kas ikoon on valitud dropdown menüüst
2. Tühjenda vahemälu (Ctrl+Shift+R)
3. Sünkrooni ACF väljad (ACF → Tools → Sync)
4. Värskenda lehte (F5)

### Probleem: Responsive ei tööta

**Lahendus:**
1. Kontrolli viewport meta tag-i:
   ```html
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   ```
2. Testi erinevatel seadmetel
3. Kasuta Chrome DevTools (F12) → Device Toolbar

## 📱 Responsive Testimine

### Desktop (>1400px)
- 4 kaarti reas
- Container padding: 120px 58px

### Tablet (900-1400px)
- 2 kaarti reas
- Container padding: 60px 30px

### Mobile (<900px)
- 1 kaart reas (vertikaalne)
- Container padding: 40px 20px

## 📝 Näidis Sisu

### Section Title
```
MIKS MEIE
```

### Main Heading
```
Miks valida Marketing Sharks?
```

### Description
```
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
```

### Feature 1
```
Perefirma, millel on pikaajalised strateegiad.
```

### Feature 2
```
Selge ja läbipaistev eelarve. Meie eesmärk on, et iga investeeritud euro tooks ärile tagasi mitmekordselt.
```

### Feature 3
```
Me loome lahendusi, mis on esteetilised, funktsionaalsed ja konversioonidele suunatud.
```

### Feature 4
```
Me ei seo kliente endaga kohustuslikus vormis, kui projekt on valmis, anname halduse ja täieliku kontrolli alati sulle. Nii säilib võim sinu käes, samal ajal kui meie oleme olemas, kui vajad professionaalset tuge.
```

## ✨ Valmis!

Blokk on nüüd valmis kasutamiseks! Kui on küsimusi, vaata:
- `WHY-SHARKS-2-SUMMARY.md` - Üksikasjalik kokkuvõte
- `template-parts/blocks/why-sharks-2/README.md` - Tehnilised detailid
- `demo-why-sharks-2.html` - Visuaalne demo
