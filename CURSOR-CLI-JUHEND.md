# Cursor CLI kasutamise juhend

## 1. Mis on Cursor CLI?

Cursor CLI võimaldab kasutada Cursor AI agenti otse terminalist, ilma graafilise kasutajaliideseta. See on kasulik:
- Serverikeskkondades (nt WSL, remote serverid)
- Automatiseeritud töövoogudes
- Kui eelistad terminali-põhist tööd

---

## 2. Cursor CLI paigaldamine

### Windowsis (PowerShell)
```powershell
# Cursor CLI tuleb koos Cursor IDE-ga
# Kontrolli, kas cursor käsk on saadaval:
cursor --version
```

### WSL/Linux keskkonnas
```bash
# Kui Cursor on Windowsis installitud, saad WSL-ist kasutada:
cursor.cmd --version

# Või lisa alias .bashrc faili:
echo 'alias cursor="cursor.cmd"' >> ~/.bashrc
source ~/.bashrc
```

---

## 3. Projekti avamine CLI kaudu

```bash
# Mine projekti kausta
cd /var/www/html/sharks-wp/wp-content/themes/sharks2025

# Ava Cursor selles kaustas
cursor .
```

---

## 4. Kuidas agendile ülesandeid anda

### Põhimõtted:

1. **Ole konkreetne ja detailne** - Kuna CLI keskkonnas pole visuaalset konteksti, kirjelda täpselt:
   - Millist faili soovid muuta
   - Mis on praegune olukord
   - Mis on soovitud tulemus

2. **Kasuta @ viiteid failidele**
   ```
   @style.css - viitab konkreetsele failile
   @inc/ - viitab kaustale
   ```

3. **Ülesande struktuur** - Hea ülesande formaat:
   ```
   ÜLESANNE: [Lühike kirjeldus]
   
   KONTEKST:
   - Mis on praegune olukord
   - Miks seda vaja on
   
   NÕUDED:
   - Konkreetne nõue 1
   - Konkreetne nõue 2
   
   FAILID:
   - @failinimi.php - mida seal teha
   ```

---

## 5. Mida agent teeb

### Agendi töövoog:

1. **Loeb ja analüüsib** - Kasutab `Read` tööriista failide lugemiseks
2. **Otsib** - Kasutab `Grep` ja `Glob` koodi otsimiseks
3. **Muudab** - Kasutab `StrReplace` või `Write` failide muutmiseks
4. **Testib** - Kontrollib linterite vigu
5. **Raporteerib** - Annab tagasisidet tehtud muudatustest

### Agendi võimekused:
- Failide lugemine ja kirjutamine
- Koodi otsimine ja analüüs
- Terminali käskude käivitamine
- Veebilehitseja kasutamine testimiseks
- Ülesannete planeerimine ja jälgimine

---

## 6. Praktilised näited ülesannete andmiseks

### Näide 1: Lihtne muudatus
```
Muuda header.php failis logo laiust 200px pealt 250px peale
```

### Näide 2: Keerukam ülesanne
```
ÜLESANNE: Lisa uus custom post type "Tooted"

NÕUDED:
- Post type nimi: "tooted"
- Toetab: title, editor, thumbnail
- Nähtav admin menüüs
- Has archive: true

FAIL: @inc/custom-post-types.php
```

### Näide 3: Bugfix
```
PROBLEEM: Mobiilivaates menüü ei sulgu pärast lingi klikkimist

OODATUD KÄITUMINE: Menüü peaks sulguma automaatselt

FAILID: Tõenäoliselt @js/navigation.js või @inc/header.php
```

### Näide 4: Uue funktsionaalsuse lisamine
```
ÜLESANNE: Lisa AJAX-põhine otsing

KIRJELDUS:
Kasutaja sisestab otsingusõna ja tulemused ilmuvad
reaalajas ilma lehte uuendamata.

NÕUDED:
- Minimaalne tähemärkide arv: 3
- Debounce: 300ms
- Näita loading indikaatorit
- Kuva "Tulemusi ei leitud" kui tühi

FAILID:
- @js/search.js - JS loogika
- @inc/ajax-handlers.php - PHP handler
- @style.css - stiilid
```

---

## 7. Soovitused efektiivseks koostööks

| Tee nii ✓ | Ära tee nii ✗ |
|-----------|---------------|
| "Muuda @style.css failis .header klassi font-size 18px peale" | "Muuda fondi suuremaks" |
| "Lisa functions.php faili uus filter mis..." | "Lisa mingi filter" |
| Kirjelda oodatavat tulemust | Eelda, et agent teab konteksti |
| Maini seotud failid | Jäta failid mainimata |
| Anna konkreetsed väärtused (värvid, suurused) | "Tee ilusamaks" |

---

## 8. Erinevused GUI vs CLI vahel

| Aspekt | GUI (graafiline) | CLI |
|--------|------------------|-----|
| Failide nägemine | Näed avatud faile | Pead mainima faile |
| Kontekst | Automaatne | Pead kirjeldama |
| Kiirus | Visuaalne navigeerimine | Käsupõhine |
| Sobib | Avastamiseks | Konkreetseteks ülesanneteks |

---

## 9. Kasulikud käsud

```bash
# Ava projekt Cursoris
cursor .

# Ava konkreetne fail
cursor failinimi.php

# Ava mitu faili
cursor fail1.php fail2.php

# Näita Cursor versiooni
cursor --version

# Näita abi
cursor --help
```

---

## 10. Veaotsing

### Probleem: cursor käsku ei leita
```bash
# Lisa Cursor PATH-i või kasuta täispikka teed
# Windows: C:\Users\[kasutaja]\AppData\Local\Programs\cursor\Cursor.exe
# Või kasuta alias'it
```

### Probleem: Agent ei leia faile
```
# Kasuta täispikka teed või @ viiteid
# Kontrolli, et oled õiges kaustas
```

### Probleem: Muudatused ei rakendu
```
# Kontrolli, et fail on salvestatud
# Vaata, kas on linter vigu
# Küsi agendilt kinnitust muudatuste kohta
```

---

## 11. Projekti struktuur (sharks2025 teema)

Selle projekti puhul on kasulik teada:
```
sharks2025/
├── style.css          # Peamine stiilileht
├── functions.php      # Teema funktsioonid
├── header.php         # Päis
├── footer.php         # Jalus
├── index.php          # Peamine template
├── inc/               # PHP include failid
├── js/                # JavaScript failid
├── css/               # Täiendavad CSS failid
├── template-parts/    # Template osad
└── assets/            # Pildid, fondid jne
```

---

## 12. Kiire alustamise checklist

- [ ] Cursor on installitud
- [ ] `cursor --version` töötab
- [ ] Oled projekti kaustas
- [ ] Tead projekti struktuuri
- [ ] Oled valmis konkreetseid ülesandeid andma

---

*Viimati uuendatud: Veebruar 2026*
