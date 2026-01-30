# Why Sharks 2 - Ikoonide Juhend

## Ülevaade

Why Sharks 2 blokk kasutab eelnevalt määratletud ikoonide komplekti, mida saab valida dropdown menüüst. Ei ole vaja SVG koodi kopeerida - lihtsalt vali sobiv ikoon!

## Saadaolevad Ikoonid

### 1. Star (Täht) ⭐
**Väärtus**: `star`

16-haruline täht muster - ideaalne kvaliteedi ja tipptaseme tähistamiseks.

**Kasutus**:
- Kvaliteet
- Tipptase
- Erilisus
- Premium teenus

---

### 2. Plus (Rist) ➕
**Väärtus**: `plus`

8-haruline rist - sobib lisandväärtuse ja täiendavate võimaluste jaoks.

**Kasutus**:
- Lisandväärtus
- Täiendavad teenused
- Plussid
- Boonused

---

### 3. Wave (Laine) 🌊
**Väärtus**: `wave`

Laineline muster - sümboliseerib paindlikkust ja dünaamikat.

**Kasutus**:
- Paindlikkus
- Dünaamika
- Kohanemisvõime
- Voolavus

---

### 4. Diamond (Teemant) 💎
**Väärtus**: `diamond`

4-haruline teemant - esindab väärtust ja ainulaadsust.

**Kasutus**:
- Väärtus
- Ainulaadsus
- Eksklusiivsus
- Kvaliteet

---

### 5. Circle (Ring) ⭕
**Väärtus**: `circle`

Kontsentriline ring - tähistab terviklikkust ja täielikkust.

**Kasutus**:
- Terviklikkus
- Täielikkus
- Tsükkel
- Jätkusuutlikkus

---

### 6. Square (Ruut) ◻️
**Väärtus**: `square`

Kontsentriline ruut - sümboliseerib stabiilsust ja usaldusväärsust.

**Kasutus**:
- Stabiilsus
- Usaldusväärsus
- Kindlus
- Struktuur

---

### 7. Triangle (Kolmnurk) 🔺
**Väärtus**: `triangle`

Kontsentriline kolmnurk - esindab kasvu ja progressi.

**Kasutus**:
- Kasv
- Progress
- Areng
- Ambitsioon

---

### 8. Heart (Süda) ❤️
**Väärtus**: `heart`

Süda kujund - väljendab hoolivust ja pühendumust.

**Kasutus**:
- Hoolivus
- Pühendumust
- Kirg
- Kliendikesksus

---

### 9. Check (Linnuke) ✓
**Väärtus**: `check`

Linnuke märk - kinnitab kvaliteeti ja garantiid.

**Kasutus**:
- Kinnitatud
- Garantii
- Kvaliteedikontroll
- Tehtud

---

### 10. Arrow (Nool) →
**Väärtus**: `arrow`

Nool paremale - näitab suunda ja progressi.

**Kasutus**:
- Suund
- Progress
- Edasi liikumine
- Tulevikku vaatamine

---

## Kuidas Kasutada

### WordPressis

1. **Ava Gutenberg redaktor**
2. **Lisa "Why Sharks 2" blokk**
3. **Klõpsa "Add Feature Card"**
4. **Vali ikoon dropdown menüüst**:
   - Klõpsa "Icon" väljal
   - Vali sobiv ikoon nimekirjast
   - Ikoon kuvatakse automaatselt eelvaates
5. **Sisesta feature tekst**
6. **Salvesta**

### PHP Koodis

Ikoonid on defineeritud `get_why_sharks_icon()` funktsioonis:

```php
// Kasutamine template-s
$icon = get_field('icon'); // Tagastab: 'star', 'plus', 'wave', jne
echo get_why_sharks_icon($icon); // Väljastab SVG koodi
```

### Vaikeväärtused

Kui ikooni ei valita, kasutatakse vaikimisi:
- Feature 1: **Star** (Täht)
- Feature 2: **Plus** (Rist)
- Feature 3: **Wave** (Laine)
- Feature 4: **Diamond** (Teemant)

---

## Ikoonide Soovitused

### Teenuste Jaoks

| Teenus | Soovitatud Ikoon | Põhjus |
|--------|------------------|--------|
| Kvaliteet | Star | Tipptase |
| Lisateenused | Plus | Lisandväärtus |
| Paindlikkus | Wave | Kohanemisvõime |
| Eksklusiivsus | Diamond | Ainulaadsus |
| Garantii | Check | Kinnitatud |
| Tulevikuvaade | Arrow | Progress |

### Väärtuste Jaoks

| Väärtus | Soovitatud Ikoon | Põhjus |
|---------|------------------|--------|
| Hoolivus | Heart | Emotsionaalne side |
| Usaldusväärsus | Square | Stabiilsus |
| Kasv | Triangle | Areng |
| Terviklikkus | Circle | Täielikkus |

### Protsesside Jaoks

| Protsess | Soovitatud Ikoon | Põhjus |
|----------|------------------|--------|
| Valmis | Check | Kinnitatud |
| Järgmine samm | Arrow | Suund |
| Jätkuv | Circle | Tsükkel |
| Arendamine | Triangle | Kasv |

---

## Näited

### Näide 1: Kvaliteedi Fookus

```
Feature 1: Star
"Tipptasemel disain ja arendus"

Feature 2: Check
"Kvaliteedikontroll igas etapis"

Feature 3: Diamond
"Ainulaadsed lahendused igale kliendile"

Feature 4: Heart
"Pühendunud meeskond sinu teenistuses"
```

### Näide 2: Teenuste Fookus

```
Feature 1: Plus
"Täielik teenuste pakett"

Feature 2: Wave
"Paindlikud lahendused"

Feature 3: Arrow
"Pidev areng ja uuendused"

Feature 4: Circle
"Pikaajaline tugi ja hooldus"
```

### Näide 3: Protsessi Fookus

```
Feature 1: Arrow
"Selge plaan algusest lõpuni"

Feature 2: Triangle
"Pidev kasv ja areng"

Feature 3: Check
"Garanteeritud tulemused"

Feature 4: Square
"Stabiilne ja usaldusväärne"
```

---

## Tehnilised Detailid

### SVG Spetsifikatsioonid

Kõik ikoonid:
- **Suurus**: 42×42px
- **ViewBox**: 0 0 42 42
- **Värv**: Valge (#FFFFFF)
- **Fill/Stroke**: 2-3px
- **Optimeeritud**: Jah

### Ikoonide Asukoht

Ikoonid on defineeritud PHP funktsioonis:
```
template-parts/blocks/why-sharks-2/why-sharks-2.php
```

Funktsioon: `get_why_sharks_icon($icon_name)`

### Uute Ikoonide Lisamine

Kui soovid lisada uusi ikoone:

1. **Lisa SVG kood** `get_why_sharks_icon()` funktsiooni:
```php
'new_icon' => '<svg width="42" height="42">...</svg>',
```

2. **Uuenda ACF JSON** faili:
```json
"choices": {
    "new_icon": "New Icon (Uus Ikoon)",
    ...
}
```

3. **Sünkrooni ACF väljad** WordPressis

---

## Troubleshooting

### Probleem: Ikoon ei kuvata

**Lahendus**:
1. Kontrolli, kas ikoon on valitud ACF väljal
2. Kontrolli, kas ikooni nimi on õige (`star`, `plus`, jne)
3. Kontrolli, kas `get_why_sharks_icon()` funktsioon eksisteerib

### Probleem: Vale ikoon kuvatakse

**Lahendus**:
1. Kontrolli ACF välja väärtust
2. Tühjenda vahemälu
3. Värskenda lehte (F5)

### Probleem: Dropdown ei näita ikoone

**Lahendus**:
1. Sünkrooni ACF väljad: ACF → Tools → Sync
2. Kontrolli ACF JSON faili `choices` välja
3. Värskenda lehte

---

## Kokkuvõte

Why Sharks 2 blokk pakub 10 erinevat ikooni, mis on lihtsalt valitavad dropdown menüüst. Ei ole vaja SVG koodi kopeerida või kleepida - lihtsalt vali sobiv ikoon ja see kuvatakse automaatselt!

**Eelised**:
- ✅ Lihtne kasutada
- ✅ Ei vaja SVG teadmisi
- ✅ Ühtne disain
- ✅ Kiire valik
- ✅ Visuaalne eelvaade

**Ikoonid**:
1. Star (Täht)
2. Plus (Rist)
3. Wave (Laine)
4. Diamond (Teemant)
5. Circle (Ring)
6. Square (Ruut)
7. Triangle (Kolmnurk)
8. Heart (Süda)
9. Check (Linnuke)
10. Arrow (Nool)

---

**Versioon**: 2.0.0  
**Kuupäev**: 2026-01-30  
**Uuendus**: Ikoonivalik dropdown menüüst
