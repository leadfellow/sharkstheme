# Portfolio1 Kasutusjuhend

## Kiire alustamine

1. **Lisa blokk lehele**
   - Ava Gutenberg editor
   - Kliki "+" nuppu
   - Otsi "Portfolio1" või "Portfolio1 (Expandable)"
   - Lisa blokk lehele

2. **Määra kategooriad**
   - Lisa esimene kategooria (nt. "Kõik Kodulehed")
   - Lisa täiendavad kategooriad (nt. "Veebilehed", "Eridisain")
   - Iga kategoorial peab olema:
     - **Nimi**: Kuvatav tekst (nt. "Veebilehed")
     - **Slug**: Unikaalne ID (nt. "veebilehed")

3. **Lisa portfolio tööd**
   - Kliki "Lisa töö"
   - Täida kõik väljad

## Töö lisamine samm-sammult

### 1. Põhiinfo

**Kategooria** (kohustuslik)
- Sisesta kategooria slug (nt. "veebilehed")
- Peab vastama üleval määratud kategooria slug'ile

**Kategooria silt** (kohustuslik)
- Kuvatav kategooria nimi (nt. "Eridisain")

**Pealkiri** (kohustuslik)
- Töö pealkiri (nt. "Kalle beds")

**Logo SVG kood** (valikuline)
- Lisa ainult SVG path kood
- Näide: `<path d="M59.043 2.95701..." fill="black" />`
- ⚠️ Ära lisa `<svg>` tage, ainult sisu!

**Kirjeldus** (kohustuslik)
- Lühike kirjeldus tööst
- Kuvatakse päises koos pealkirjaga

**Nupu tekst** (valikuline)
- Vaikimisi: "Vaata lehte"
- Võid muuta (nt. "Külasta lehte", "Vaata projekti")

**Nupu link** (valikuline)
- Täielik URL (nt. https://example.com)
- Avaneb uues aknas

### 2. Pildid

**Peamine pilt** (kohustuslik)
- MacBook mockup'is kuvatav pilt
- Soovitatav suurus: 1200x800px
- Formaat: JPG või PNG
- Optimeeritud veebile

**Screenshot pilt** (valikuline)
- Kuvatakse paremal pool detailide sektsioonis
- Soovitatav suurus: 800x600px
- Formaat: JPG või PNG

### 3. Lähteülesanne

**Lähteülesanne pealkiri** (valikuline)
- Vaikimisi: "Lähteülesanne"
- Võid muuta (nt. "Kliendi soovid", "Eesmärgid")

**Lähteülesanne sissejuhatus** (valikuline)
- Tekst enne listi
- Näide: "Uuele lehele seadis klient 4 peamist ülesannet:"

**Lähteülesande punktid** (valikuline)
- Lisa punktid ükshaaval
- Kuvatakse numbrilise listina
- Näide:
  1. Uue brändi identiteedi loomine
  2. Kasutajasõbraliku liidese disain
  3. Mobiilne responsiivsus

### 4. Lahendus

**Lahenduse pealkiri** (valikuline)
- Vaikimisi: "Lahendus"
- Võid muuta (nt. "Meie lahendus", "Tulemus")

**Lahenduse tekst** (valikuline)
- Pikk kirjeldus lahendusest
- Võib olla mitu lõiku
- Kuvatakse vasakul pool detailide sektsioonis

### 5. Statistika (Enne/Pärast)

**Enne number** (valikuline)
- Statistika enne projekti (nt. "150")
- Kuvatakse punakaspunasel taustal

**Pärast number** (valikuline)
- Statistika pärast projekti (nt. "450")
- Kuvatakse rohekasel taustal

**Statistika silt** (valikuline)
- Kirjeldus (nt. "Külastajat kuus", "Konversioonid")
- Kuvatakse graafiku all

## Näidisandmed

### Kategooriad

```
Kategooria 1:
- Nimi: Kõik Kodulehed
- Slug: koik

Kategooria 2:
- Nimi: Veebilehed
- Slug: veebilehed

Kategooria 3:
- Nimi: Eridisain
- Slug: eridisain

Kategooria 4:
- Nimi: E-poed
- Slug: e-poed
```

### Töö näide

```
=== PÕHIINFO ===
Kategooria: eridisain
Kategooria silt: Eridisain
Pealkiri: Kalle beds
Logo SVG: <path d="M59.043 2.95701C57.4099..." fill="black" />
Kirjeldus: Persona pakub personali- ja palgaarvestust, töö- ja puhkusekraafikuid ühtses pilvepõhises tarkvaras.
Nupu tekst: Vaata lehte
Nupu link: https://example.com

=== PILDID ===
Peamine pilt: macbook-screenshot.jpg (1200x800px)
Screenshot pilt: detail-screenshot.jpg (800x600px)

=== LÄHTEÜLESANNE ===
Pealkiri: Lähteülesanne
Sissejuhatus: Uuele lehele seadis klient 4 peamist ülesannet:
Punktid:
1. Uue brändi identiteedi loomine
2. Kasutajasõbraliku liidese disain
3. Mobiilne responsiivsus
4. SEO optimeerimine

=== LAHENDUS ===
Pealkiri: Lahendus
Tekst: Lõime kaasaegse ja kasutajasõbraliku veebilehe, mis vastab kõikidele kliendi nõuetele. Disain on täielikult responsiivne ja optimeeritud kõikidele seadmetele.

=== STATISTIKA ===
Enne: 150
Pärast: 450
Silt: Külastajat kuus
```

## Kuidas see töötab?

### Kategooriate filtreerimine

1. Kasutaja klikib kategooria nupul
2. Kuvatakse ainult selle kategooria tööd
3. Esimene kategooria näitab kõiki töid
4. Sujuv fade animatsioon

### Akordioni funktsioon

1. Alguses on kõik tööd suletud
2. Kasutaja klikib "loe lähemalt projektist"
3. Töö avaneb ja näitab detaile
4. Teised avatud tööd sulguvad automaatselt
5. Leht kerib automaatselt avatud sisuni

### Vahelduvad taustad

- 1. töö: valge taust
- 2. töö: hall taust
- 3. töö: valge taust
- 4. töö: hall taust
- jne...

## Soovitused

### Pildid

✅ **Hea:**
- Optimeeritud veebile (alla 500KB)
- Õige suurus (1200x800px MacBook'ile)
- Kvaliteetne ja terav
- Sobiv formaat (JPG või PNG)

❌ **Halb:**
- Liiga suur fail (üle 2MB)
- Vale suurus või proportsioonid
- Hägune või madal kvaliteet
- Vale formaat (BMP, TIFF)

### Tekstid

✅ **Hea:**
- Lühike ja konkreetne
- Selge ja arusaadav
- Professionaalne stiil
- Õigekirjaliselt korrektne

❌ **Halb:**
- Liiga pikk ja üksikasjalik
- Ebaselge või segane
- Mitteametlik stiil
- Õigekirjavead

### Logo SVG

✅ **Hea:**
```html
<path d="M59.043 2.95701C57.4099..." fill="black" />
```

❌ **Halb:**
```html
<svg viewBox="0 0 62 62">
  <path d="M59.043 2.95701C57.4099..." fill="black" />
</svg>
```

## Tõrkeotsing

### Tööd ei kuvata

1. Kontrolli, et kategooria slug vastab
2. Kontrolli, et pealkiri ja kirjeldus on täidetud
3. Kontrolli, et peamine pilt on üles laetud

### Filtreerimine ei tööta

1. Kontrolli, et kategooria slug on õigesti sisestatud
2. Kontrolli, et slug on unikaalne
3. Tühjenda brauseri vahemälu

### Akordion ei avane

1. Kontrolli, et JavaScript on laetud
2. Vaata brauseri konsooli vigade osas
3. Tühjenda brauseri vahemälu

### Pildid ei kuvata

1. Kontrolli, et pildid on õigesti üles laetud
2. Kontrolli pildi suurust (mitte liiga suur)
3. Kontrolli pildi formaati (JPG või PNG)

## Lisaabi

Kui vajad abi:
1. Vaata README.md faili täpsema dokumentatsiooni jaoks
2. Kontrolli ACF väljade seadeid
3. Vaata brauseri konsooli vigade osas
4. Tühjenda brauseri vahemälu ja proovi uuesti

## Näpunäited

💡 **Kasuta esimest kategooriat "Kõik" jaoks**
- See näitab kõiki töid
- Hea kasutajakogemus

💡 **Lisa statistika ainult oluliste projektide juurde**
- Mitte kõik tööd ei vaja statistikat
- Kasuta ainult kui on mõõdetavad tulemused

💡 **Optimeeri pildid enne üleslaadimist**
- Kasuta TinyPNG või sarnast teenust
- Väiksemad failid = kiirem laadimine

💡 **Hoia tekstid lühikesed**
- Kirjeldus: 1-2 lauset
- Lahendus: 2-3 lõiku
- Lähteülesanne: 3-5 punkti

💡 **Testi mobiilis**
- Kontrolli, kuidas tööd mobiilis välja näevad
- Veendu, et tekstid on loetavad
- Kontrolli, et pildid laadivad kiiresti
