# Certificates Block

Kompetentside ja sertifikaatide blokk, mis kuvab ettevõtte kompetentse ja sertifikaate kahe-veerulises paigutuses.

## Funktsioonid

- **Pealkiri ja ikoon**: Kohandatav pealkiri koos 10 erineva ikooniga
- **Kompetentside grid**: Automaatne kaheveeruline paigutus
- **Numeratsioon**: Automaatne nummerdamine (01), (02), jne
- **Sertifikaadid**: Pildipõhised sertifikaadid horisontaalses reas
- **Õrn liikumine**: Sertifikaadid "ujuvad" õrnalt üles-alla
- **Lightbox**: Kliki pildile, et näha suuremat versiooni
- **Hover efektid**: Kaardid tõusevad hover'il
- **Täielikult responsiivne**: Kohandub kõikidele ekraanisuurustele

## ACF Väljad

### Pealkiri
- **Tüüp**: Text
- **Vaikeväärtus**: "Marketing Sharksi kompetents ja asutajate sertifikaadid:"
- **Nõutud**: Jah

### Ikoon (päises)
- **Tüüp**: Select
- **Valikud**: 
  - Star (Täht)
  - Plus (Rist) - vaikeväärtus
  - Wave (Laine)
  - Diamond (Teemant)
  - Circle (Ring)
  - Square (Ruut)
  - Triangle (Kolmnurk)
  - Heart (Süda)
  - Check (Linnuke)
  - Arrow (Nool)
- **Nõutud**: Ei

### Kompetentsid
- **Tüüp**: Repeater
- **Maksimaalne arv**: 20
- **Väljad**:
  - **Kirjeldus** (Textarea): Kompetentsi kirjeldus

### Sertifikaadid
- **Tüüp**: Repeater
- **Maksimaalne arv**: 10
- **Väljad**:
  - **Sertifikaadi pilt** (Image): Sertifikaadi pilt või logo

## Kasutamine

1. Lisa blokk lehele Gutenbergi redaktoris
2. Vali "Certificates" blokk "Sharks Blocks" kategooriast
3. Täida väljad:
   - Sisesta pealkiri
   - Vali ikoon rippmenüüst (10 erinevat ikooni)
   - Lisa kompetentside kirjeldused
   - Lisa sertifikaatide pildid

## Disain

### Värvid
- **Taust**: `#f7f7f5` (hele hall)
- **Tekst**: `#000000` (must)
- **Numbrid**: `#bbbab6` (hall)
- **Eraldaja**: `#bbbab6` (hall joon)
- **Sertifikaatide taust**: `#ffffff` (valge)

### Tüpograafia
- **Pealkiri**: 36px, Helvetica, letter-spacing: -1.8px
- **Numbrid**: 26px, Switzer Medium, letter-spacing: -1.3px
- **Kirjeldus**: 18px, Helvetica, line-height: 1.4

### Vahed
- **Container padding**: 100px 58px
- **Grid gap**: 20px
- **Item padding-bottom**: 20px
- **Certificates gap**: 23px

## Responsiivne Disain

### Tablet (max-width: 1024px)
- Container padding: 60px 40px
- Pealkiri: 28px
- Ikoon: 50x50px
- Üks veerg kompetentsidele

### Mobiil (max-width: 768px)
- Container padding: 40px 24px
- Pealkiri: 24px
- Numbrid: 20px
- Kirjeldus: 16px
- Sertifikaadid: 2 veerus

### Väike mobiil (max-width: 480px)
- Container padding: 32px 20px
- Pealkiri: 20px
- Numbrid: 18px
- Kirjeldus: 14px
- Sertifikaadid: 1 veerg

## Näide

```
Marketing Sharksi kompetents ja asutajate sertifikaadid: [IKOON]

(01) E-äri strateegia ja analüüs          | (06) Sotsiaalmeedia haldamine
(02) Digiprojektide juhtimine             | (07) SEO kompetents
(03) Bränding                             | (08) Sisuloome
(04) UX ja UI                             | (09) Sotsiaalmeedia strateegia
(05) Tarkvaraarendus                      | (10) Äri digitaliseerimine

[CERT1] [CERT2] [CERT3] [CERT4] [CERT5]
```

## Failid

- **Template**: `template-parts/blocks/certificates/certificates.php`
- **Stiilid**: `assets/css/30-components/certificates.css`
- **JavaScript**: `assets/js/certificates.js`
- **ACF Config**: `acf-json/group_certificates.json`
- **Registreerimine**: `inc/blocks.php`

## Märkused

- Kompetentsid jagatakse automaatselt kahte veergu
- Numeratsioon lisatakse automaatselt
- Sertifikaadid kuvatakse horisontaalses reas
- Sertifikaadid "ujuvad" õrnalt (3s animatsioon)
- Kliki sertifikaadile, et avada lightbox
- Lightbox sulgub:
  - X nupuga
  - Klikkides taustale
  - ESC klahviga
- Kõik elemendid on valikulised (v.a. pealkiri)
- Täielikult kohandatav läbi ACF väljade

## Animatsioonid

### Ujuv efekt (Floating)
- **Kestus**: 3 sekundit
- **Liikumine**: 12px vasakult paremale
- **Viivitus**: Iga kaart 0.1s hiljem

### Hover efektid
- **Kaardid**: Tõusevad 4px üles
- **Pildid**: Suurendavad 5%
- **Vari**: Muutub tugevamaks

### Lightbox
- **Fade-in**: 0.3s
- **Scale**: 0.9 → 1.0
- **Taust**: Must 90% läbipaistvusega + blur
