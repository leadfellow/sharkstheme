# Portfolio1 Block

Laiendatav portfolio komponent kategooriate filtreerimise, MacBook mockup'ide ja enne/pärast statistikaga.

## Funktsioonid

### 1. Kategooriate filtreerimine
- Filtreerimise nupud ülaosas
- Esimene kategooria on tavaliselt "Kõik" või "Kõik Kodulehed"
- Töid saab filtreerida kategooriate järgi
- Sujuv üleminek filtreerimisel

### 2. Avatud/Suletud akordion
- Iga töö algab suletud olekus
- "loe lähemalt projektist" nupp avab/sulgeb detailid
- Ainult üks töö saab korraga avatud olla
- Sujuv animatsioon avamisel/sulgemisel
- Automaatne keerimine avatud sisuni

### 3. Vahelduvad taustad
- Paarisarvulised tööd: valge taust
- Paaritud tööd: hall taust (#f5f5f5)
- Automaatne vaheldus

### 4. MacBook Mockup
- Peamine pilt kuvatakse MacBook mockup'is
- Realistlik varjuga efekt
- Responsive disain

### 5. Enne/Pärast statistika
- Graafik all paremal
- "Enne" number (punakaspunane taust)
- "Pärast" number (rohekas taust)
- Statistika kirjeldus

## ACF Väljad

### Põhiväljad
- **Anchor (ID)**: Sisemiste linkide jaoks
- **Kuva mobiilis**: Määra mobiilse nähtavuse

### Kategooriad

**TÄHTIS:** "Kõik Kodulehed" nupp lisatakse automaatselt!

- **Kategooria nimi**: Kuvatav nimi (nt. "Eridisain", "Veebilehed")
- **Kategooria slug**: Unikaalne identifikaator (nt. "eridisain", "veebilehed")

**Märkus:** Esimene filtreerimise nupp on alati "Kõik Kodulehed" ja see lisatakse automaatselt. Sa pead lisama ainult spetsiifilised kategooriad.

### Portfolio tööd

#### Põhiinfo
- **Kategooria**: Kategooria slug (peab vastama üleval määratule)
- **Kategooria silt**: Kuvatav kategooria nimi
- **Pealkiri**: Töö pealkiri
- **Logo tüüp**: Vali ikoon (Ilma ikoonita, Ikoon 1, Ikoon 2, Custom SVG)
- **Custom Logo SVG kood**: SVG path kood (ainult kui Logo tüüp = Custom SVG)
- **Kirjeldus**: Lühike kirjeldus tööst
- **Nupu tekst**: CTA nupu tekst (vaikimisi: "Vaata lehte")
- **Nupu link**: Link, kuhu nupp viib

#### Pildid
- **Peamine pilt**: MacBook mockup pilt (soovitatav: 1200x800px)
- **Screenshot pilt**: Screenshot paremal pool (soovitatav: 800x600px)

#### Lähteülesanne
- **Lähteülesanne pealkiri**: Sektsiooni pealkiri (vaikimisi: "Lähteülesanne")
- **Lähteülesanne sissejuhatus**: Tekst enne listi
- **Lähteülesande punktid**: Numbriline list punktidega

#### Lahendus
- **Lahenduse pealkiri**: Sektsiooni pealkiri (vaikimisi: "Lahendus")
- **Lahenduse tekst**: Lahenduse kirjeldus

#### Statistika
- **Enne number**: Statistika "enne" väärtus
- **Pärast number**: Statistika "pärast" väärtus
- **Statistika silt**: Kirjeldus (nt. "Külastajat kuus")

## Kasutamine

1. Lisa "Portfolio1 (Expandable)" blokk lehele
2. Määra kategooriad (esimene on "Kõik")
3. Lisa portfolio tööd:
   - Vali kategooria
   - Lisa pealkiri ja kirjeldus
   - Laadi üles pildid
   - Lisa lähteülesanne ja lahendus
   - Lisa statistika (valikuline)

## Näide kategooriatest

```
Kategooria 1:
- Nimi: "Kõik Kodulehed"
- Slug: "koik"

Kategooria 2:
- Nimi: "Veebilehed"
- Slug: "veebilehed"

Kategooria 3:
- Nimi: "Eridisain"
- Slug: "eridisain"
```

## Näide tööst

```
Kategooria: eridisain
Kategooria silt: Eridisain
Pealkiri: Kalle beds
Kirjeldus: Persona pakub personali- ja palgaarvestust...
Nupu tekst: Vaata lehte
Nupu link: https://example.com

Lähteülesanne:
- Sissejuhatus: "Uuele lehele seadis klient 4 peamist ülesannet:"
- Punktid:
  1. Lorem Ipsum is simply dummy text...
  2. Lorem Ipsum is simply dummy text...
  3. ...

Lahendus:
- Tekst: Lorem Ipsum is simply dummy text...

Statistika:
- Enne: 150
- Pärast: 450
- Silt: Külastajat kuus
```

## Stiilid

### Värvid
- Must: #000000
- Valge: #ffffff
- Hall taust: #f5f5f5
- Teksti hall: #333333, #666666
- Enne taust: #ffe5e5 (punakaspunane)
- Pärast taust: #e5ffe5 (rohekas)

### Responsive
- Desktop: Täielik paigutus
- Tablet (< 1024px): Vertikaalne paigutus
- Mobile (< 768px): Kohandatud suurused ja vahemikud

## JavaScript funktsioonid

### Kategooriate filtreerimine
- Klikk filtreerimise nupul
- Sujuv fade-in/fade-out animatsioon
- Ainult valitud kategooria tööd kuvatakse

### Akordioni funktsioon
- Klikk "loe lähemalt" nupul
- Ainult üks töö avatud korraga
- Automaatne keerimine
- Sujuv max-height animatsioon

## Failid

```
template-parts/blocks/portfolio1/
├── portfolio1.php          # Põhimall
└── README.md              # Dokumentatsioon

assets/css/
└── portfolio1.css         # Stiilid

assets/js/
└── portfolio1.js          # JavaScript

acf-json/
└── group_portfolio1.json  # ACF väljad
```

## Märkused

- Tööde taust vaheldub automaatselt (valge/hall)
- Ainult üks akordion saab korraga avatud olla
- Filtreerimisel peidetakse mittevastavad tööd
- Mobiilis on kohandatud paigutus ja suurused
- Logo ikoonid: 3 valmis ikooni (Ikoon 1, Ikoon 2) või custom SVG
- Custom SVG tuleb lisada ilma `<svg>` tagideta, ainult `<path>` või `<g>` sisu
