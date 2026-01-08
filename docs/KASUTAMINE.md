# 🎯 Jututoa Kasutamine - Samm-Sammult

## 🚀 Käivitamine

### Variant 1: Kiire Start (Windows)
```cmd
1. Ava File Explorer
2. Mine kausta: docs
3. Topeltkliki: start-server.bat
4. Ava brauser: http://localhost:8000/index.html
```

### Variant 2: Kiire Start (Linux/Mac)
```bash
1. Ava Terminal
2. cd /path/to/sharks2025/docs
3. ./start-server.sh
4. Ava brauser: http://localhost:8000/index.html
```

### Variant 3: Käsitsi
```bash
cd docs
php -S localhost:8000
```
Ava brauser: `http://localhost:8000/index.html`

---

## 📖 Kasutamine

### 1. Ava Dokumentatsioon
Ava brauser ja mine: `http://localhost:8000/index.html`

### 2. Kliki "💬 Jututuba" Tab'ile
Lehekülje ülaosas on 5 tab'i:
- 📖 Põhijuhend
- 🐧 Ubuntu Help
- 💡 Tips & Tricks
- ⚡ Cursor Hacks
- **💬 Jututuba** ← Kliki siia!

### 3. Lisa Kommentaar

#### Vorm:
```
┌─────────────────────────────────┐
│ ✍️ Lisa kommentaar              │
├─────────────────────────────────┤
│ Nimi:                           │
│ [Sinu nimi________________]     │
│                                 │
│ Kommentaar:                     │
│ [________________________]      │
│ [________________________]      │
│ [________________________]      │
│                    0/500 tähemärki│
│                                 │
│ [📤 Saada kommentaar]          │
└─────────────────────────────────┘
```

#### Täida väljad:
1. **Nimi**: Sisesta oma nimi (2-50 tähemärki)
2. **Kommentaar**: Kirjuta oma mõtted (3-500 tähemärki)
3. **Vajuta**: "📤 Saada kommentaar"

### 4. Vaata Kommentaare

Kommentaarid ilmuvad kohe vormi all:

```
┌─────────────────────────────────┐
│ 💭 Kommentaarid                 │
├─────────────────────────────────┤
│ ┌─────────────────────────────┐ │
│ │ 👤 Tanel    🕐 Just nüüd   │ │
│ │ Suurepärane juhend! Aitäh! │ │
│ └─────────────────────────────┘ │
│                                 │
│ ┌─────────────────────────────┐ │
│ │ 👤 Mari     🕐 5 min tagasi│ │
│ │ Kas keegi saab aidata?     │ │
│ └─────────────────────────────┘ │
└─────────────────────────────────┘
```

---

## 💡 Näpunäited

### ✅ Hea Kommentaar:
```
Nimi: Tanel
Kommentaar: 
Suurepärane juhend! Aitäs jagamast. 
Üks küsimus - kuidas ma saan lisada 
custom CSS-i ACF blokile?
```

### ❌ Halb Kommentaar:
```
Nimi: a
Kommentaar: ok
```
❌ Liiga lühike!

### ✅ Kasulik Nipp:
```
Nimi: Mari
Kommentaar:
💡 Pro tip: Kasutage Cursor'i 
Composer'it koos @-märgiga, et 
lisada konteksti. Näiteks: 
@functions.php @style.css
```

---

## 🎨 Funktsioonid

### Tähemärkide Loendur
- Näitab reaalajas, mitu tähemärki oled kirjutanud
- Maksimum: 500 tähemärki
- Värv muutub, kui lähed üle limiidi

### Automaatne Kuupäev
Kommentaaride juures kuvatakse:
- "Just nüüd" - alla 1 minuti
- "5 min tagasi" - alla 1 tunni
- "2 tundi tagasi" - alla 1 päeva
- "3 päeva tagasi" - alla 1 nädala
- "05.01.2025 14:30" - vanemad

### Reaalajas Uuendused
- Kommentaar ilmub kohe pärast saatmist
- Vorm tühjendatakse automaatselt
- Näidatakse edukat salvestamist

### Responsive Disain
- Töötab kõigil seadmetel
- Mobiilisõbralik
- Tablet-optimeeritud

---

## 🧪 Testimine

### Test 1: Lisa Kommentaar
1. Ava jututuba
2. Sisesta nimi: "Test User"
3. Sisesta kommentaar: "See on test"
4. Vajuta "Saada"
5. ✅ Kommentaar peaks ilmuma

### Test 2: Valideerimine
1. Proovi saata tühi nimi
2. ❌ Peaks näitama viga
3. Proovi saata liiga lühike kommentaar
4. ❌ Peaks näitama viga

### Test 3: Tähemärkide Loendur
1. Hakka kirjutama kommentaari
2. ✅ Loendur peaks uuenduma
3. Kirjuta üle 500 tähemärki
4. ❌ Vorm ei lase saata

### Automaatne Test
Ava: `http://localhost:8000/test-chat.html`

Seal saad:
- ✅ Testida API-t
- ✅ Testida valideerimist
- ✅ Vaadata kommentaare
- ✅ Lisada testiandmeid

---

## 📊 Statistika

### Salvestatud Andmed:
- **ID**: Unikaalne identifikaator
- **Nimi**: Kasutaja nimi
- **Kommentaar**: Kommentaari tekst
- **Timestamp**: Kuupäev ja kellaaeg
- **IP**: Kasutaja IP aadress (spam'i vältimiseks)

### Piirangud:
- Maksimaalselt **100 kommentaari**
- Vanemad kustutatakse automaatselt
- Nimi: **2-50** tähemärki
- Kommentaar: **3-500** tähemärki

---

## ❓ KKK

### Kas ma pean olema sisse logitud?
❌ Ei, jututuba on avalik. Lihtsalt sisesta nimi.

### Kas ma saan oma kommentaari muuta?
❌ Praegu mitte. See on tulevase arenduse plaanis.

### Kas ma saan kommentaare kustutada?
❌ Praegu mitte. Ainult admin saab (käsitsi).

### Kas teised näevad minu kommentaare?
✅ Jah, kõik kommentaarid on avalikud.

### Kas ma saan vastata teiste kommentaaridele?
❌ Praegu mitte. See on tulevase arenduse plaanis.

### Kui kaua kommentaarid säilivad?
✅ Viimased 100 kommentaari säilivad. Vanemad kustutatakse.

### Kas ma saan lisada linke/pilte?
❌ Praegu mitte. Ainult tekst.

### Kas ma saan kasutada emoji'sid?
✅ Jah! 😊 👍 🎉

---

## 🆘 Abi

### Probleem: "Viga kommentaaride laadimisel"
**Lahendus:**
1. Kontrolli, kas server töötab
2. Vaata brauseri console'i (F12)
3. Testi API: `http://localhost:8000/chat.php?action=load`

### Probleem: "Viga kommentaari salvestamisel"
**Lahendus:**
1. Kontrolli, kas PHP on installitud: `php -v`
2. Kontrolli kausta õigusi
3. Vaata PHP error log'i

### Probleem: Kommentaarid ei ilmu
**Lahendus:**
1. Värskenda lehte (F5)
2. Tühjenda cache (Ctrl+F5)
3. Kontrolli, kas JavaScript on lubatud

### Veel küsimusi?
- Vaata: `README-JUTUTUBA.md`
- Vaata: `STRUKTUURI-ÜLEVAADE.md`
- Testi: `http://localhost:8000/test-chat.html`

---

## 🎉 Valmis!

Nüüd oled valmis jututuba kasutama!

**Head kommenteerimist! 💬**

---

## 📚 Lisainfo

- **Täielik dokumentatsioon**: `README-JUTUTUBA.md`
- **Kiire alustamine**: `JUTUTUBA-QUICK-START.md`
- **Struktuur**: `STRUKTUURI-ÜLEVAADE.md`
- **Üldine ülevaade**: `README.md`

