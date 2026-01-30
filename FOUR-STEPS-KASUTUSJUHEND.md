# Four Steps (Neli Sammu) - Kasutusjuhend

## Kiire Ülevaade

**Four Steps** blokk võimaldab kuvada protsessi või tegevuskava 4 sammuna. Blokk on täielikult kohandatav ja sisaldab:

- ✅ Pealkiri koos ikoonidega vasakul ja paremal
- ✅ Must kast numbri ja ikooniga
- ✅ Kirjeldus musta kasti all
- ✅ Kuni 4 sammu paremal pool
- ✅ Sammud saab esiletõsta (valge taust)
- ✅ Sammude alla saab lisada ääre
- ✅ Täielikult responsive (töötab kõikidel seadmetel)

## Kuidas Kasutada

### 1. Bloki Lisamine

1. Ava lehekülg WordPress Gutenberg editoris
2. Kliki **"+"** nuppu uue bloki lisamiseks
3. Otsi **"Four Steps"** või **"Neli sammu"**
4. Vali blokk kategooriast **"Sharks Blocks"**

### 2. Päise Seadistamine

#### Vasakpoolne Ikoon
- Vali ikoon rippmenüüst:
  - **X (Rist)** - Ristikujuline ikoon
  - **Asterisk (Tärn)** - Tärnkujuline ikoon
  - **Star (Täht)** - Täht-kujuline ikoon

#### Pealkiri
- Sisesta pealkiri (nt. "Neli sammu eduni")
- Pealkiri kuvatakse suure fondiga keskel

#### Parempoolne Ikoon
- Vali ikoon rippmenüüst (samad valikud kui vasakul)

### 3. Musta Kasti Seadistamine

#### Taustaikon
- Vali ikoon, mis kuvatakse musta kasti taustal:
  - **Asterisk Stroke** - Suur tärnkujuline ikoon kontuuriga (vaikimisi)
  - **X (Rist)** - Ristikujuline ikoon
  - **Star (Täht)** - Täht-kujuline ikoon

#### Number
- Sisesta number, mis kuvatakse musta kasti keskel (nt. "02")
- Number kuvatakse valge fondiga
- Max 3 tähemärki

#### Kirjeldus
- Sisesta kirjeldus, mis kuvatakse musta kasti all
- Näide: "Formuleerime eesmärgid. Töötame välja edasise tegevuskava ja optimaalse turundusstrateegia."

### 4. Sammude Lisamine

#### Sammu Lisamine
1. Kliki **"Lisa samm"** nuppu
2. Sisesta sammu tekst (nt. "Strateegiline analüüs")
3. Vali lisavalikud:
   - **Is Highlighted** - Märgi, kui soovid sammule valget tausta
   - **Has Border** - Märgi, kui soovid sammu alla äära

#### Sammude Järjestus
- Sammud nummerdatakse automaatselt: (01), (02), (03), (04)
- Sammude järjekorda saad muuta lohistades

#### Sammude Kustutamine
- Kliki sammu paremal pool olevat "X" nuppu

## Näited

### Näide 1: Tavaline Protsess

```
Pealkiri: "Neli sammu eduni"
Vasakpoolne ikoon: X (Rist)
Parempoolne ikoon: Asterisk (Tärn)

Must kast:
- Taustaikon: Asterisk Stroke
- Number: "02"
- Kirjeldus: "Formuleerime eesmärgid..."

Sammud:
1. "Strateegiline analüüs" (tavaline)
2. "Lahenduste kavandamine" (esiletõstetud - valge taust)
3. "Praktiline teostus" (äär all)
4. "Tulemuste analüüs" (äär all)
```

### Näide 2: Lihtne Nimekiri

```
Pealkiri: "Meie töövoog"
Ikoonid: Star (mõlemal pool)

Must kast:
- Number: "01"
- Kirjeldus: "Alustame analüüsist"

Sammud:
1. "Kohtumine" (äär all)
2. "Planeerimine" (äär all)
3. "Arendus" (äär all)
4. "Tulemused" (tavaline)
```

## Kohandamine

### Anchor (Sisemised Lingid)

Kui soovid luua lingi sellele blokile:

1. Sisesta **Anchor (ID)** väljale nimi (nt. "sammud")
2. Kasuta ainult väiketähti, numbreid ja kriipse
3. Nüüd saad linkida: `#sammud`

Näide HTML-is:
```html
<a href="#sammud">Mine sammude juurde</a>
```

### Värvid

Blokk kasutab teema vaikevärve:
- Taust: Hele hall (#f7f7f5)
- Must kast: Must (#000000)
- Esiletõstetud samm: Valge (#ffffff)
- Tekst: Must (#000000)

### Responsive Disain

Blokk kohaneb automaatselt:
- **Desktop (>1200px):** Kaks veergu (must kast vasakul, sammud paremal)
- **Tablet (768px-1200px):** Üks veerg (must kast üleval, sammud all)
- **Mobile (<768px):** Väiksemad fondid ja ikoonid
- **Small Mobile (<480px):** Minimaalsed suurused

## Kasulikud Näpunäited

### ✅ Hea Praktika

1. **Kasuta lühikesi pealkirju** - Max 3-4 sõna
2. **Sammu tekstid lühikesed** - Max 3-4 sõna
3. **Esiletõsta ainult üht sammu** - Liiga palju esiletõstmist hajutab tähelepanu
4. **Kasuta ääri visuaalseks eraldamiseks** - Aitab struktuuri luua

### ❌ Väldi

1. **Pikki pealkirju** - Need ei mahu ekraanile
2. **Rohkem kui 4 sammu** - Blokk on optimeeritud 4 sammu jaoks
3. **Kõigi sammude esiletõstmist** - Kaotab efekti
4. **Väga pikki kirjeldusi** - Hoia lühike ja kokkuvõtlik

## Tehnilised Detailid

### Failid
- **PHP:** `template-parts/blocks/four-steps/four-steps.php`
- **CSS:** `assets/css/30-components/four-steps.css`
- **ACF:** `acf-json/group_four_steps.json`
- **Demo:** `demo-four-steps.html`

### Block Name
- **Slug:** `acf/four-steps`
- **Kategooria:** Sharks Blocks

## Probleemide Lahendamine

### Blokk ei kuvata
1. Kontrolli, et ACF Pro on aktiveeritud
2. Mine **ACF → Tools → Sync**
3. Sünkroniseeri "Four Steps Block"

### Stiilid ei laadi
1. Tühjenda vahemälu (Ctrl + F5)
2. Kontrolli, et teema on aktiveeritud
3. Kontrolli, et `four-steps.css` on olemas

### Ikoonid ei kuvata
1. Kontrolli, et ikoon on valitud ACF väljal
2. Proovi teist ikooni
3. Värskenda lehte

## Tugi

Kui vajad abi:
1. Vaata **FOUR-STEPS-SUMMARY.md** faili täpsema info jaoks
2. Ava **demo-four-steps.html** brauseris näidise vaatamiseks
3. Kontrolli **inc/blocks.php** faili bloki registreerimise kohta

---

**Loodud:** 2026-01-29  
**Versioon:** 1.0.0  
**Autor:** Marketing Sharks
