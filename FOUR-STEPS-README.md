# Four Steps Block - Master README

## 🎯 Ülevaade

**Four Steps** on täielikult kohandatav ACF Gutenberg blokk, mis võimaldab kuvada protsessi või tegevuskava 4 sammuna. Blokk sisaldab:

- ✅ Kohandatavat päist koos ikoonidega
- ✅ Musta kaarti numbri ja ikooniga
- ✅ Kirjeldust kaardi all
- ✅ Kuni 4 sammu paremal pool
- ✅ Sammude esiletõstmist ja äärte lisamist
- ✅ Täielikult responsive disaini

## 📚 Dokumentatsiooni Failid

### 1. **FOUR-STEPS-QUICK-REFERENCE.md** ⚡
**Kiire referents ja cheat sheet**
- ACF väljade tabel
- CSS klassid
- Värvid ja mõõdud
- Kiired käsud
- Troubleshooting
- **Kasuta:** Kui vajad kiiret infot

### 2. **FOUR-STEPS-KASUTUSJUHEND.md** 📖
**Eestikeelne kasutusjuhend lõppkasutajale**
- Samm-sammult juhised
- Näited ja parimad praktikad
- Kuidas lisada blokki
- Kuidas seadistada
- **Kasuta:** Kui oled esimest korda blokki kasutamas

### 3. **FOUR-STEPS-SUMMARY.md** 📋
**Täielik ingliskeelne dokumentatsioon**
- ACF väljade täielik kirjeldus
- Tehnilised detailid
- Block registration
- Disain ja stiilid
- Troubleshooting
- **Kasuta:** Kui vajad täielikku tehnilist infot

### 4. **FOUR-STEPS-INSTALLATION.md** 🔧
**Paigalduse kokkuvõte**
- Mis tehti?
- Loodud failid
- Muudetud failid
- Kuidas kasutada
- Järgmised sammud
- **Kasuta:** Kui soovid mõista, mis paigaldati

### 5. **FOUR-STEPS-STRUCTURE.md** 🏗️
**Struktuuri ülevaade**
- Visuaalne struktuur (ASCII art)
- HTML struktuur
- CSS klassid hierarhia
- ACF väljade struktuur
- Failide struktuur
- Data flow
- **Kasuta:** Kui vajad visuaalset ülevaadet

### 6. **FOUR-STEPS-README.md** 📘
**Master README (see fail)**
- Ülevaade kõigist failidest
- Kiire navigatsioon
- Mis faili millal kasutada
- **Kasuta:** Kui ei tea, kust alustada

## 🚀 Kiire Alustamine

### Uus Kasutaja?
1. Loe **FOUR-STEPS-KASUTUSJUHEND.md** (eesti keeles)
2. Ava **demo-four-steps.html** brauseris
3. Lisa blokk WordPress lehele
4. Kasuta **FOUR-STEPS-QUICK-REFERENCE.md** kui vajad kiiret abi

### Arendaja?
1. Loe **FOUR-STEPS-INSTALLATION.md** (mis paigaldati)
2. Vaata **FOUR-STEPS-STRUCTURE.md** (kuidas töötab)
3. Loe **FOUR-STEPS-SUMMARY.md** (täielik dokumentatsioon)
4. Kasuta **FOUR-STEPS-QUICK-REFERENCE.md** (kiire referents)

### Probleem?
1. Vaata **FOUR-STEPS-QUICK-REFERENCE.md** → Troubleshooting
2. Loe **FOUR-STEPS-SUMMARY.md** → Troubleshooting
3. Kontrolli **FOUR-STEPS-INSTALLATION.md** → Järgmised sammud

## 📁 Failide Struktuur

```
sharks2025/
│
├── 📄 FOUR-STEPS-README.md              ← Master README (see fail)
├── 📄 FOUR-STEPS-QUICK-REFERENCE.md     ← Kiire referents
├── 📄 FOUR-STEPS-KASUTUSJUHEND.md       ← Kasutusjuhend (ET)
├── 📄 FOUR-STEPS-SUMMARY.md             ← Täielik dokumentatsioon (EN)
├── 📄 FOUR-STEPS-INSTALLATION.md        ← Paigalduse kokkuvõte
├── 📄 FOUR-STEPS-STRUCTURE.md           ← Struktuuri ülevaade
├── 📄 demo-four-steps.html              ← Demo fail
│
├── template-parts/blocks/four-steps/
│   ├── four-steps.php                   ← PHP Template
│   └── README.md                        ← Quick reference
│
├── assets/css/30-components/
│   └── four-steps.css                   ← Stiilid
│
├── acf-json/
│   └── group_four_steps.json            ← ACF konfiguratsioon
│
└── inc/
    └── blocks.php                       ← Block registration
```

## 🎯 Failide Kasutus

| Fail | Millal Kasutada | Keel | Pikkus |
|------|-----------------|------|--------|
| **FOUR-STEPS-README.md** | Ei tea, kust alustada | ET | Lühike |
| **FOUR-STEPS-QUICK-REFERENCE.md** | Vajan kiiret infot | ET/EN | Lühike |
| **FOUR-STEPS-KASUTUSJUHEND.md** | Esimene kord kasutamas | ET | Keskmine |
| **FOUR-STEPS-SUMMARY.md** | Vajan täielikku infot | EN | Pikk |
| **FOUR-STEPS-INSTALLATION.md** | Tahan teada, mis paigaldati | ET | Keskmine |
| **FOUR-STEPS-STRUCTURE.md** | Vajan visuaalset ülevaadet | ET/EN | Keskmine |
| **demo-four-steps.html** | Tahan näha, kuidas välja näeb | - | Demo |

## 🔍 Kiire Otsimine

### Vajan...
- **ACF väljade nimekirja** → FOUR-STEPS-QUICK-REFERENCE.md
- **CSS klasside nimekirja** → FOUR-STEPS-QUICK-REFERENCE.md
- **HTML struktuuri** → FOUR-STEPS-STRUCTURE.md
- **Paigalduse infot** → FOUR-STEPS-INSTALLATION.md
- **Kasutusjuhendit** → FOUR-STEPS-KASUTUSJUHEND.md
- **Tehnilisi detaile** → FOUR-STEPS-SUMMARY.md
- **Näidet** → demo-four-steps.html
- **Troubleshooting** → FOUR-STEPS-QUICK-REFERENCE.md või FOUR-STEPS-SUMMARY.md

## 📊 Dokumentatsiooni Võrdlus

| Aspekt | Quick Ref | Kasutusjuhend | Summary | Installation | Structure |
|--------|-----------|---------------|---------|--------------|-----------|
| Kiirus | ⚡⚡⚡ | ⚡⚡ | ⚡ | ⚡⚡ | ⚡⚡ |
| Detailsus | ⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| Kasutajasõbralikkus | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ |
| Tehnilisus | ⭐⭐ | ⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| Näited | ⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐ | ⭐⭐⭐ |

## 🎓 Õppimise Tee

### Tase 1: Algaja
1. Loe **FOUR-STEPS-KASUTUSJUHEND.md** (15 min)
2. Ava **demo-four-steps.html** (5 min)
3. Lisa blokk lehele ja katsetad (10 min)
4. Kasuta **FOUR-STEPS-QUICK-REFERENCE.md** kui abi vaja (5 min)

**Aeg:** ~35 minutit

### Tase 2: Kasutaja
1. Loe **FOUR-STEPS-INSTALLATION.md** (10 min)
2. Vaata **FOUR-STEPS-STRUCTURE.md** (15 min)
3. Katsetad erinevaid seadistusi (20 min)

**Aeg:** ~45 minutit

### Tase 3: Arendaja
1. Loe **FOUR-STEPS-SUMMARY.md** (30 min)
2. Uurid koodi (30 min)
3. Kohandad blokki (60 min)

**Aeg:** ~2 tundi

## 💡 Soovitused

### Lõppkasutajale
- **Alusta:** FOUR-STEPS-KASUTUSJUHEND.md
- **Hoia käepärast:** FOUR-STEPS-QUICK-REFERENCE.md
- **Demo:** demo-four-steps.html

### Arendajale
- **Alusta:** FOUR-STEPS-INSTALLATION.md
- **Süvene:** FOUR-STEPS-SUMMARY.md
- **Hoia käepärast:** FOUR-STEPS-QUICK-REFERENCE.md
- **Visuaal:** FOUR-STEPS-STRUCTURE.md

### Projektijuhile
- **Ülevaade:** FOUR-STEPS-README.md (see fail)
- **Paigaldus:** FOUR-STEPS-INSTALLATION.md
- **Kasutus:** FOUR-STEPS-KASUTUSJUHEND.md

## 🔗 Kiired Lingid

### Failid
- [PHP Template](template-parts/blocks/four-steps/four-steps.php)
- [CSS Stiilid](assets/css/30-components/four-steps.css)
- [ACF Config](acf-json/group_four_steps.json)
- [Block Registration](inc/blocks.php)
- [Demo](demo-four-steps.html)

### WordPress
- **Block Slug:** `acf/four-steps`
- **Category:** `sharks-blocks`
- **Icon:** `editor-ol-rtl`

## ✅ Checklist

### Dokumentatsiooni Lugemine
- [ ] Loed FOUR-STEPS-README.md (see fail)
- [ ] Valisid õige dokumentatsiooni faili
- [ ] Avasid demo faili
- [ ] Mõistad bloki struktuuri

### Bloki Kasutamine
- [ ] ACF Pro aktiveeritud
- [ ] Blokk sünkroniseeritud
- [ ] Blokk lisatud lehele
- [ ] Seadistused tehtud
- [ ] Eelvaade kontrollitud
- [ ] Avaldatud

## 🎯 Eesmärgid

### Dokumentatsiooni Eesmärgid
1. ✅ Anda kiire ülevaade blokist
2. ✅ Aidata kasutajatel blokki kasutada
3. ✅ Anda arendajatele tehnilist infot
4. ✅ Pakkuda troubleshooting abi
5. ✅ Olla visuaalselt atraktiivne

### Bloki Eesmärgid
1. ✅ Kuvada protsessi 4 sammuna
2. ✅ Olla täielikult kohandatav
3. ✅ Olla responsive
4. ✅ Olla kasutajasõbralik
5. ✅ Olla hästi dokumenteeritud

## 📞 Tugi

Kui vajad abi:

1. **Kiire abi:** FOUR-STEPS-QUICK-REFERENCE.md → Troubleshooting
2. **Kasutusabi:** FOUR-STEPS-KASUTUSJUHEND.md
3. **Tehniline abi:** FOUR-STEPS-SUMMARY.md → Troubleshooting
4. **Demo:** demo-four-steps.html

## 🎉 Kokkuvõte

**Four Steps Block** on täielikult dokumenteeritud ja valmis kasutamiseks. Vali õige dokumentatsiooni fail oma vajaduste järgi ja alusta!

### Kiire Valik
- **Ei tea, kust alustada?** → See fail (FOUR-STEPS-README.md)
- **Vajan kiiret abi?** → FOUR-STEPS-QUICK-REFERENCE.md
- **Esimest korda kasutamas?** → FOUR-STEPS-KASUTUSJUHEND.md
- **Vajan täielikku infot?** → FOUR-STEPS-SUMMARY.md

---

**Loodud:** 2026-01-29  
**Versioon:** 1.0.0  
**Status:** ✅ Valmis kasutamiseks  
**Autor:** Marketing Sharks

---

**💡 Näpunäide:** Salvesta see fail järjehoidjatesse ja kasuta seda navigeerimiseks teiste dokumentatsiooni failide vahel!

**🚀 Alusta siit:** FOUR-STEPS-KASUTUSJUHEND.md
