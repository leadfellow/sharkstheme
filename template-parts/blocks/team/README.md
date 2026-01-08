# Team Block

Meeskonna blokk, mis võimaldab luua ilusat meeskonnaliikmete esitlust kohandatava pealkirja, piltide, hover efektide ja kontaktandmetega.

## 🎯 Ülevaade

Team blokk sisaldab:
- **Kohandatav pealkiri** - tekst (must/hall), ikoonid (ring, rist, X, tärn, täht) ja reavahetused
- **Meeskonnaliikmed** - pildid, hover tekst, väike hover pilt, nurga ikoon
- **Kontaktandmed** - nimi, amet, telefon, e-mail
- **Paindlik paigutus** - määra rea number igale liikmele (rida 2 joondatakse paremale)

## 📋 Kuidas Kasutada

### 1. Lisa Blokk Lehele

1. Ava Gutenberg editor
2. Kliki **+** (Add block)
3. Otsi "Team"
4. Vali "Sharks Blocks" kategooriast

### 2. Kohanda Pealkirja

**Heading Parts (Pealkiri):**
- Lisa osi (tekst, ikoon, reavahetus)
- **Tekst**: Sisesta tekst (nt. "TUTVU AGENTUURI")
  - Vali värv: Must või Hall
- **Ikoon**: Vali ikoon
  - Ring (Circle)
  - Rist (Cross)
  - X
  - Tärn (Asterisk)
  - Täht (Star)
- **Reavahetus**: Lisa uus rida

**Näide:**
```
Osa 1: Tekst "TUTVU AGENTUURI " (Hall)
Osa 2: Reavahetus
Osa 3: Ikoon (Ring)
Osa 4: Tekst "TURUNDUSHAIDEGA" (Must)
Osa 5: Ikoon (Rist)
```

### 3. Lisa Meeskonnaliikmed

**Iga liikme kohta:**

#### Põhiandmed
- **Rea number**: Määra millisele reale liige kuulub (1, 2, 3...)
  - Rida 1: Vasakule joondatud
  - Rida 2: Paremale joondatud
  - Rida 3+: Vasakule joondatud
- **Pilt**: Laadi üles pilt (soovitatud: 428x428px ruut)
- **Nimi**: Meeskonnaliikme nimi (nt. "Diana Taluri")
- **Amet**: Ametikoht (nt. "E-äri strateeg")
- **Telefon**: Telefoninumber (valikuline, nt. "+372 5554 9000")
- **E-mail**: E-posti aadress (valikuline, nt. "diana@marketingsharks.ee")

#### Hover Efekt (Valikuline)
- **Hover tekst**: Tekst, mis ilmub pildi peale hõljutamisel
  - Kui tühi, siis hover efekti ei ole
  - Näide: "Tanel on üle 24 aasta tegutsenud IT valdkonnas..."
- **Nurga ikoon hover'il**: Vali ikoon, mis ilmub vasakus ülanurgas
  - **Ei näita** - ikoon puudub
  - **X (diagonaalid)** - klassikaline X
  - **Täht (Star)** - tähe kujuline ikoon
  - **Rist (Cross +)** - pluss märk
  - **Ring (Circle)** - ring
  - **Tärn (Asterisk)** - tärn
- **Väike hover pilt**: Väike pilt, mis ilmub paremas ülanurgas (soovitatud: 23x35px)

## 🎨 Disaini Näited

### Näide 1: Lihtne Meeskond (Ilma Hover'ita)

```
Pealkiri: "MEIE MEESKOND"

Rida 1:
- Diana Taluri (E-äri strateeg) - Pilt, telefon, e-mail
- Marian Metsar (Projektijuht) - Pilt, telefon, e-mail

Rida 2 (paremale joondatud):
- Daniel Gurevitš (Arendaja) - Pilt
- Tanel Jüris (Arendaja) - Pilt
```

### Näide 2: Täielik Hover Efektidega

```
Pealkiri: "TUTVU AGENTUURI TURUNDUSHAIDEGA"

Rida 1:
- Diana Taluri
  - Pilt: diana.jpg
  - Hover: EI
  - Telefon: +372 5554 9000
  - E-mail: diana@marketingsharks.ee

- Tanel Taluri
  - Pilt: tanel.jpg
  - Hover: JAH
    - Tekst: "Tanel on üle 24 aasta tegutsenud IT valdkonnas..."
    - Nurga ikoon: Täht (Star)
    - Väike pilt: tanel-small.jpg
  - Telefon: +372 5620 0079
  - E-mail: tanel@marketingsharks.ee

Rida 2 (paremale joondatud):
- Marian Metsar
- Daniel Gurevitš
```

## 🎨 Hover Efekti Kirjeldus

Kui meeskonnaliikmel on hover tekst määratud:

1. **Tavaline olek**: Näitab pilti
2. **Hover olek** (hiir peale):
   - Pilt muutub mustaks taustaks
   - Ilmub valge tekst keskel
   - Ilmub valitud ikoon vasakus ülanurgas (kui valitud)
   - Ilmub väike pilt paremas ülanurgas (kui määratud)

### Saadaolevad Nurga Ikoonid

- **X (diagonaalid)** - Kaks diagonaalset joont (klassikaline)
- **Täht (Star)** - 16-haruline täht
- **Rist (Cross +)** - Pluss märk
- **Ring (Circle)** - Lihtne ring
- **Tärn (Asterisk)** - 8-haruline tärn
- **Ei näita** - Ikoon puudub

## 💡 Näpunäited

### Pildid
- **Põhipilt**: 428x428px (ruut) või 2:3 suhe
- **Väike hover pilt**: 23x35px või väike vertikaalne pilt
- Kasuta kvaliteetseid pilte (vähemalt 800x800px)
- Optimiseeri pilte enne üleslaadimist

### Hover Tekst
- Hoia tekst lühike ja informatiivne (2-4 lauset)
- Kirjelda inimese kogemust, oskusi või huvitavaid fakte
- Näide: "Tanel on üle 24 aasta tegutsenud IT valdkonnas. Tema eelnev kogemus IT kasutajatoes, müügitöös, projekti- ja ärijuhtimises aitab näha valdkonna tervikpilti."

### Rea Paigutus
- **Rida 1**: Tavaliselt 2 liiget (vasakule joondatud)
- **Rida 2**: 2 liiget (paremale joondatud - loob huvitava paigutuse)
- **Rida 3**: 1-2 liiget (vasakule joondatud)
- Saad luua erinevaid paigutusi numbrite abil

### Kontaktandmed
- Telefon ja e-mail on valikulised
- Kui mõlemad on tühjad, ei kuvata kontaktandmete sektsiooni
- Kasuta rahvusvahelist formaati: +372 XXXX XXXX

## 🔧 Tehnilised Detailid

### CSS Klassid
- `.block-team` - Põhikonteiner
- `.block-team__header` - Pealkirja sektsioon
- `.block-team__row` - Meeskonnaliikmete rida
- `.block-team__row--justify-end` - Paremale joondatud rida
- `.block-team__card` - Üksik meeskonnaliige
- `.block-team__image-container--hover` - Hover efektiga konteiner
- `.block-team__overlay-text` - Hover tekst

### Responsive
- **Desktop (>1024px)**: 2 kaarti reas, täissuurus
- **Tablet (768-1024px)**: 2 kaarti reas, väiksem
- **Mobile (<768px)**: 1 kaart reas, täislaiuses

### Värvid
- Taust: `#f7f7f5` (hele hall)
- Pealkiri must: `#000`
- Pealkiri hall: `#bbbab6`
- Amet: `#f237a6` (roosa)
- Hover taust: `#000` (must)
- Hover tekst: `#fff` (valge)

## ✅ Kontroll-list

- [ ] Pealkiri lisatud ja kohandatud
- [ ] Meeskonnaliikmed lisatud:
  - [ ] Pildid üles laaditud
  - [ ] Nimed ja ametid sisestatud
  - [ ] Kontaktandmed lisatud (valikuline)
  - [ ] Hover tekst lisatud (valikuline)
  - [ ] Rea numbrid määratud
- [ ] Blokk avaldatud
- [ ] Testitud:
  - [ ] Hover efektid töötavad
  - [ ] Kontaktandmed kuvatakse õigesti
  - [ ] Paigutus on korrektne
  - [ ] Mobiilis näeb hästi välja

## 🎉 Valmis!

Nüüd saad luua ilusaid meeskonna sektsioone! 🚀

**Näited:**
- Meie meeskond
- Tutvu meie turundushaidega
- Meie spetsialistid
- Kes me oleme
