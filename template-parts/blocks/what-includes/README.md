# What Includes Block

Funktsionaalsuste loetelu komponent koos pealkirja ja numbritega, mis automaatselt jaguneb kaheks tulbaks seadistatud numbri juures.

## 📋 Ülevaade

Komponent koosneb:
- ✅ **Pealkiri** (suur, uppercase)
- ✅ **Loetelu** (nummerdatud elemendid)
- ✅ **Automaatne tulbajagamine** (määra number, kus tekib uus tulp)

Ideaalne kasutamiseks:
- Toote/teenuse funktsionaalsuste loetelu
- E-poe võimaluste kirjeldus
- Paketi sisalduse näitamine

## 🎨 Kasutamine WordPress'is

### 1. Lisa blokk
Gutenberg editoris otsi **"What Includes"**

### 2. Seadista väljad

#### Heading (Pealkiri)
```
Mida sisaldab klassikaline WordPressi WooCommerce 
e-poe lahendus?
```

#### Background Color (Taustavärv)
- Vaikimisi: `#f7f7f5`
- Võid muuta suvalise värviga

#### Column Split At (Tulbajaotus)
- Number, millal tekib teine tulp
- Näiteks: `9` tähendab, et esimesed 9 elementi lähevad esimesse tulpa
- Ülejäänud elemendid lähevad teise tulpa
- Vaikimisi: `9`

#### Items (Loetelu elemendid)
Lisa repeater field'i abil iga funktsionaalsus:
- **Text** - funktsionaalsuse kirjeldus

**Näide:**
1. Erinevaid maksemeetodeid
2. Erinevaid transpordimeetodeid
3. Toodete ja kategooriate täishaldus piiramatult
4. Hinnavariatsioone
5. Soodushinna võimalust
6. Kasutajate kontosid
7. Allahindlus kuponge
8. Toodete variatsioone
9. Laohaldust
10. Maksude seadistamist
... jne

## 📊 Näide: WooCommerce funktsioonid

**Heading:**
```
Mida sisaldab klassikaline WordPressi WooCommerce 
e-poe lahendus?
```

**Background Color:** `#f7f7f5`

**Column Split At:** `9`

**Items:**
1. Erinevaid maksemeetodeid
2. Erinevaid transpordimeetodeid
3. Toodete ja kategooriate täishaldus piiramatult
4. Hinnavariatsioone
5. Soodushinna võimalust
6. Kasutajate kontosid
7. Allahindlus kuponge
8. Toodete variatsioone
9. Laohaldust
10. Maksude seadistamist
11. API kanalit andmete liidestuseks
12. Füüsiliste kui ka digitaalsete toodete tuge
13. E-kirjade teavitussüsteemi
14. Arvega maksmise võimalust
15. Seotud tooted ja ristturunduse võimalust
16. Väga head SEO (otsingumootori nähtavuse) valmidust
17. Lühikoode toodete ja kategooriate kuvamiseks vabal valikul
18. Väga suurel hulgal lisamooduleid

**Tulemus:**
- Esimesed 9 elementi (1-9) kuvatakse vasakus tulbas
- Järgmised 9 elementi (10-18) kuvatakse paremas tulbas

## 🎯 ACF Väljad

### Block Level:
| Väli | Tüüp | Vaikeväärtus | Kirjeldus |
|------|------|--------------|-----------|
| `heading` | Textarea | "Mida sisaldab..." | Pealkiri (võib sisaldada reavahetusi) |
| `background_color` | Color Picker | #f7f7f5 | Sektsiooni taustavärv |
| `column_split_at` | Number | 9 | Number, millal tekib teine tulp |
| `items` | Repeater | [] | Loetelu elemendid |
| `items.text` | Text | "" | Elemendi tekst |

## 🎨 Disaini detailid

### Mõõtmed:
- Container padding: `120px 58px` (desktop)
- Min-height: `100vh`
- Gap between columns: `60px`
- Gap between items: `20px`

### Heading:
- Font: Switzer, 82px, uppercase
- Letter-spacing: -4.1px
- Line-height: 1.1
- Font-weight: 500
- Margin-bottom: 60px

### Number:
- Font: Switzer, 26px, uppercase
- Letter-spacing: -1.3px
- Color: `#bbbab6` (hall)
- Width: 60px (fixed)
- Format: `(01)`, `(02)`, jne

### Text:
- Font: Helvetica, 18px
- Line-height: 1.4
- Color: `#000000` (must)

### Border:
- Bottom border: `1px solid #bbbab6`
- Applied to each item

## 📱 Responsive

- **Desktop (>1200px)**: 2 tulpa kõrvuti
- **Tablet (768px-1200px)**: 2 tulpa kõrvuti, väiksemad suurused
- **Mobile (<768px)**: 1 tulp, vertikaalne paigutus
  - Heading: 42px
  - Number: 20px
  - Text: 16px

## 🔧 Tehnilised detailid

- **Komponent**: `template-parts/blocks/what-includes/what-includes.php`
- **CSS**: `assets/css/30-components/what-includes.css`
- **Registreerimine**: `inc/blocks.php`
- **Block ID**: `acf/what-includes`

### PHP loogika:
1. Võtab kõik `items` (repeater field)
2. Jaotab need kaheks massiiviks `column_split_at` numbri põhjal
3. Esimene tulp: elemendid 1 kuni `column_split_at`
4. Teine tulp: elemendid `column_split_at + 1` kuni lõpp
5. Numbrid formateeritakse automaatselt: `(01)`, `(02)`, jne

## 💡 Kasutusjuhud

1. **E-poe funktsioonid**: WooCommerce võimaluste loetelu
2. **Teenuse sisaldus**: Mida paketi hind sisaldab
3. **Toote omadused**: Detailne omaduste loetelu
4. **Plaani funktsioonid**: SaaS plaani võimaluste kirjeldus

## 🎯 Paindlikkus

### Column Split näited:
- `column_split_at: 5` → 5 elementi vasakul, ülejäänud paremal
- `column_split_at: 10` → 10 elementi vasakul, ülejääänud paremal
- `column_split_at: 999` → kõik elemendid ühes tulbas (vasakul)

### Background Color näited:
- `#f7f7f5` - helehall (vaikimisi)
- `#FFFFFF` - valge
- `#000000` - must
- Mis tahes hex värv

## 📖 Figma Disain

Disain põhineb klassikalisel WooCommerce funktsionaalsuste loetelu kujundusel:
- 2-tulbaline grid
- Suur uppercase pealkiri
- Nummerdatud loetelu
- Minimalistlik must-hall värvipalett
- Border-id elementide vahel

---

**Loodud:** 2025-12-12  
**Komponendi nimi:** What Includes  
**ACF Grupp:** group_what_includes_block  
**Block ID:** acf/what-includes

