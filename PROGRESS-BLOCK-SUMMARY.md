# Progress Block - Kasutusjuhend

## 📋 Ülevaade

Progress blokk on accordion-stiilis protsessi/sammude kuvamise element, mis võimaldab kasutajal näha protsessi samme ja avada detailse info iga sammu kohta.

## ✅ Loodud Failid

### 1. ACF Väljade Konfiguratsioon
- `acf-json/group_progress.json` - ACF väljade definitsioon

### 2. Bloki Template
- `template-parts/blocks/progress/progress.php` - Bloki PHP template

### 3. Stiilid ja Skriptid
- `assets/css/progress.css` - Bloki CSS stiilid
- `assets/js/progress.js` - Accordion funktsionaalsus

### 4. Dokumentatsioon
- `template-parts/blocks/progress/README.md` - Detailne dokumentatsioon
- `demo-progress.html` - Demo fail testimiseks
- `PROGRESS-BLOCK-SUMMARY.md` - See fail

### 5. Registreerimine
- `inc/blocks.php` - Blokk registreeritud (rida 1058-1083)

## 🎨 Disain

Blokk järgib täpselt teie esitatud HTML disaini:
- **Konteiner:** Max-width 1440px, keskele joondatud
- **Pealkiri:** Suur uppercase pealkiri kahe ikooni vahel
- **Alapealkiri:** Kirjeldav tekst
- **Accordion:** Numberdatud sammud (01, 02, 03...)
- **Animatsioon:** Pluss ikoon pöördub 45° kui element on avatud
- **Üks korraga:** Ainult üks element saab olla avatud

## 🔧 Haldusliidesest Seadistamine

### 1. Lisa Blokk
WordPress adminpaneelil:
1. Ava leht/postitus
2. Vajuta "+" nuppu
3. Otsi "Progress"
4. Lisa blokk

### 2. Seadista Põhiinfo
- **Anchor (ID):** Valikuline ankur linkimiseks (nt. #protsess)
- **Left Icon:** Vali vasak ikoon (Asterisk, Star, X, Squares)
- **Right Icon:** Vali parem ikoon (Asterisk, Star, X, Squares)
- **Main Title:** Peamine pealkiri (nt. "DIGITURUNDUSE PROTSESS")
- **Subtitle:** Alapealkiri/kirjeldus

### 3. Lisa Sammud (Progress Items)
Iga sammu jaoks:
1. Vajuta "Add Item"
2. **Title:** Sammu pealkiri (nt. "Kohtumine")
3. **Content:** Detailne kirjeldus (kuvatakse avamisel)
4. **Default Open:** Märgi kui see samm peaks olema vaikimisi avatud

### 4. Salvesta ja Avalda
Vajuta "Update" või "Publish"

## 📱 Responsiivsus

Blokk on täielikult responsiivne:
- **Desktop (>1200px):** Täismõõdus layout
- **Tablet (768-1200px):** Vähendatud fondid ja vahed
- **Mobile (<768px):** Vertikaalne paigutus, väiksemad fondid
- **Small Mobile (<480px):** Minimaalne padding

## 🎯 Näidis Sisu

```
Main Title: DIGITURUNDUSE PROTSESS

Subtitle: Oleme 12+ aastaga kogemusi lihvinud ja teame tänu sellele hästi, 
millised võtmetegevused toimivad ja millistele teguritele erineval hetkel 
keskenduda. Teeme seda, mis toimib!

Items:
(01) Kohtumine
(02) Strateegialoome [DEFAULT OPEN]
     → Kohtumisel kogutud infole lisaks töötleme analüütilisi andmeid...
(03) Raport
(04) Esimene etapp
(05) Teine etapp
(06) Kolmas etapp
(07) Lõppvaatus
```

## 🚀 Kasutamine

### WordPress Adminpaneelil
1. Ava leht
2. Lisa "Progress" blokk
3. Täida väljad
4. Salvesta

### Demofaili Vaatamine
Ava brauser: `demo-progress.html`

### Ankru Linkimine
Kui seadistasid ankru (nt. "protsess"):
```html
<a href="#protsess">Mine protsessi juurde</a>
```

## 🎨 Kohandamine

### Värvide Muutmine
Muuda `assets/css/progress.css` failis:
```css
.progress-accordion-number {
  color: #bbbab6; /* Numbrite värv */
}

.progress-accordion-title {
  color: #000000; /* Pealkirja värv */
}
```

### Fondi Muutmine
```css
.progress-main-title {
  font-family: 'Switzer', 'Arial', sans-serif;
}
```

### Animatsiooni Kiirus
```css
.progress-accordion-content {
  transition: max-height 0.3s ease; /* Muuda 0.3s */
}
```

## 📊 Funktsioonid

✅ Piiramatu arv samme/punkte  
✅ Accordion funktsionaalsus (üks korraga avatud)  
✅ Automaatne nummerdamine (01, 02, 03...)  
✅ Vaikimisi avatud samm (valikuline)  
✅ Sujuvad animatsioonid  
✅ Täielikult responsiivne  
✅ ACF hallatav  
✅ Gutenberg eelvaade  

## 🔍 Testimine

1. **Ava demo fail:** `demo-progress.html`
2. **Kliki sammudel:** Vaata accordioni tööd
3. **Testi mobiilis:** Muuda brauseri suurust
4. **Lisa WordPressis:** Lisa blokk ja testi adminpaneelil

## 💡 Näpunäited

- Kasuta lühikesi ja selgeid pealkirju
- Hoia sisu lühike ja asjakohane
- Vali ikoonid, mis sobivad teie brändiga
- Testi alati mobiilvaates
- Kasuta vaikimisi avatud funktsiooni olulisima sammu jaoks

## 🆘 Probleemide Lahendamine

### Blokk ei ilmu
1. Kontrolli, kas ACF Pro on aktiveeritud
2. Värskenda permalinke (Settings → Permalinks → Save)
3. Tühjenda cache

### Accordion ei tööta
1. Kontrolli, kas JavaScript fail laetakse
2. Vaata brauseri konsooli (F12)
3. Kontrolli, kas jQuery on laetud

### Stiilid ei ilmu
1. Kontrolli, kas CSS fail on olemas
2. Värskenda lehte (Ctrl+F5)
3. Tühjenda brauseri cache

## 📞 Tugi

Kui vajad abi:
1. Vaata `README.md` faili
2. Kontrolli `demo-progress.html` faili
3. Vaata brauseri konsooli (F12)

---

**Valmis!** Progress blokk on nüüd kasutusvalmis! 🎉
