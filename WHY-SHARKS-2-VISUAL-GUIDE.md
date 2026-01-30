# Why Sharks 2 Block - Visuaalne Juhend

## 🎨 Bloki Struktuur

```
┌─────────────────────────────────────────────────────────────┐
│                     BLOCK-WHY-SHARKS-2                      │
│  (Must taust, valge tekst, min-height: 100vh)              │
│                                                             │
│  ┌───────────────────────────────────────────────────────┐ │
│  │              CONTAINER (padding: 120px 58px)          │ │
│  │                                                       │ │
│  │  ┌─────────────────────────────────────────────────┐ │ │
│  │  │                    HEADER                       │ │ │
│  │  │  ┌──────────┐  ┌──────────────────────────┐   │ │ │
│  │  │  │ SECTION  │  │   HEADER CONTENT         │   │ │ │
│  │  │  │  TITLE   │  │  ┌────────────────────┐  │   │ │ │
│  │  │  │          │  │  │   MAIN HEADING     │  │   │ │ │
│  │  │  │ MIKS     │  │  │                    │  │   │ │ │
│  │  │  │ MEIE     │  │  │ Miks valida        │  │   │ │ │
│  │  │  │          │  │  │ Marketing Sharks?  │  │   │ │ │
│  │  │  │          │  │  └────────────────────┘  │   │ │ │
│  │  │  │          │  │  ┌────────────────────┐  │   │ │ │
│  │  │  │          │  │  │   DESCRIPTION      │  │   │ │ │
│  │  │  │          │  │  │                    │  │   │ │ │
│  │  │  │          │  │  │ Lorem Ipsum is...  │  │   │ │ │
│  │  │  │          │  │  └────────────────────┘  │   │ │ │
│  │  │  └──────────┘  └──────────────────────────┘   │ │ │
│  │  └─────────────────────────────────────────────┘ │ │
│  │                                                   │ │
│  │  ┌─────────────────────────────────────────────┐ │ │
│  │  │               FEATURES (4 cards)            │ │ │
│  │  │                                             │ │ │
│  │  │  ┌──────┐  ┌──────┐  ┌──────┐  ┌──────┐  │ │ │
│  │  │  │ (01) │  │ (02) │  │ (03) │  │ (04) │  │ │ │
│  │  │  │──────│  │──────│  │──────│  │──────│  │ │ │
│  │  │  │ [*]  │  │ [+]  │  │ [~]  │  │ [◊]  │  │ │ │
│  │  │  │      │  │      │  │      │  │      │  │ │ │
│  │  │  │ Text │  │ Text │  │ Text │  │ Text │  │ │ │
│  │  │  │ ...  │  │ ...  │  │ ...  │  │ ...  │  │ │ │
│  │  │  └──────┘  └──────┘  └──────┘  └──────┘  │ │ │
│  │  └─────────────────────────────────────────────┘ │ │
│  └───────────────────────────────────────────────────┘ │
└─────────────────────────────────────────────────────────┘
```

## 📐 Mõõdud ja Spacing

### Container
```
Padding: 120px (top/bottom) × 58px (left/right)
Max-width: 1440px
Gap: 62px (between header and features)
```

### Header Section
```
Display: Flex (horizontal)
Justify: space-between
Gap: 20px

├─ Section Title
│  Font: Manrope 700, 18px uppercase
│  Width: auto (flex-shrink: 0)
│
└─ Header Content
   Width: 652px
   Gap: 22px (vertical)
   
   ├─ Main Heading
   │  Font: Helvetica, 36px
   │  Letter-spacing: -1.8px
   │  Line-height: 1.1
   │
   └─ Description
      Font: Helvetica, 18px
      Line-height: 1.4
```

### Features Section
```
Display: Flex (horizontal)
Gap: 20px

Each Feature Card:
├─ Width: 316px
├─ Gap: 22px (vertical)
│
├─ Number (01)
│  Font: Switzer 500, 26px
│  Letter-spacing: -1.3px
│
├─ Divider
│  Height: 1px
│  Color: #BBBAB6
│
└─ Content
   Gap: 22px (vertical)
   
   ├─ Icon
   │  Size: 42px × 42px
   │  Color: White
   │
   └─ Text
      Font: Helvetica, 18px
      Line-height: 1.4
```

## 🎨 Värviskeem

```
┌─────────────────────────────────────┐
│  Background: #000000 (Must)         │
│  ┌───────────────────────────────┐  │
│  │  Text: #FFFFFF (Valge)        │  │
│  │  ─────────────────────────    │  │
│  │  Divider: #BBBAB6 (Hall)     │  │
│  └───────────────────────────────┘  │
└─────────────────────────────────────┘
```

## 📱 Responsive Breakpoints

### Desktop (>1400px)
```
┌────────────────────────────────────────────┐
│  [01]    [02]    [03]    [04]             │
│  ────    ────    ────    ────             │
│  [*]     [+]     [~]     [◊]              │
│  Text    Text    Text    Text             │
└────────────────────────────────────────────┘
4 kaarti reas (316px × 4 + 60px gaps = 1324px)
```

### Tablet (900-1400px)
```
┌────────────────────────────────────────────┐
│  [01]              [02]                    │
│  ────              ────                    │
│  [*]               [+]                     │
│  Text              Text                    │
│                                            │
│  [03]              [04]                    │
│  ────              ────                    │
│  [~]               [◊]                     │
│  Text              Text                    │
└────────────────────────────────────────────┘
2 kaarti reas (50% - 10px gap)
```

### Mobile (<900px)
```
┌──────────────────────┐
│  [01]                │
│  ────────────────    │
│  [*]                 │
│  Text                │
│                      │
│  [02]                │
│  ────────────────    │
│  [+]                 │
│  Text                │
│                      │
│  [03]                │
│  ────────────────    │
│  [~]                 │
│  Text                │
│                      │
│  [04]                │
│  ────────────────    │
│  [◊]                 │
│  Text                │
└──────────────────────┘
1 kaart reas (vertikaalne)
```

## 🖼️ Ikoonide Stiilid

### Ikoon 1 - Star Pattern (*)
```
   *
  ***
 *****
  ***
   *
```
Täht kujund - 16-haruline täht

### Ikoon 2 - Plus Pattern (+)
```
    +
  +++++
    +
```
Pluss kujund - 8-haruline rist

### Ikoon 3 - Wave Pattern (~)
```
 ∿∿∿∿
∿    ∿
```
Laine kujund - laineline muster

### Ikoon 4 - Diamond Pattern (◊)
```
   ◊
  ◊ ◊
   ◊
```
Teemant kujund - 4-haruline teemant

## 📊 Suuruste Tabel

| Element | Desktop | Tablet | Mobile |
|---------|---------|--------|--------|
| Container Padding | 120px 58px | 60px 30px | 40px 20px |
| Section Title | 18px | 18px | 16px |
| Main Heading | 36px | 28px | 24px |
| Description | 18px | 18px | 16px |
| Card Number | 26px | 26px | 22px |
| Feature Text | 18px | 18px | 16px |
| Icon Size | 42px | 42px | 42px |
| Card Width | 316px | 50% | 100% |
| Gap (vertical) | 62px | 40px | 40px |
| Gap (horizontal) | 20px | 20px | - |

## 🎯 Hierarhia

```
1. Section Title (MIKS MEIE)
   ↓
2. Main Heading (Miks valida Marketing Sharks?)
   ↓
3. Description (Lorem Ipsum...)
   ↓
4. Feature Cards
   ├─ Number (01, 02, 03, 04)
   ├─ Icon (Visual element)
   └─ Text (Description)
```

## 💡 Kasutamise Näpunäited

### Teksti Pikkused
- **Section Title**: 1-3 sõna (nt. "MIKS MEIE", "MEIST")
- **Main Heading**: 3-8 sõna (nt. "Miks valida Marketing Sharks?")
- **Description**: 1-3 lauset (max 200 tähemärki)
- **Feature Text**: 1-3 lauset (max 150 tähemärki per kaart)

### Ikoonide Valik
- Kasuta lihtsaid, selgeid ikoone
- Väldi liiga detailseid SVG-sid
- Hoia ikoonid visuaalselt sarnase kaaluga
- Kasuta ainult valget värvi (fill või stroke)

### Kaartide Arv
- **Optimaalne**: 4 kaarti (täidab täpselt ühe rea)
- **Minimaalne**: 2 kaarti
- **Maksimaalne**: 10 kaarti (ACF limit)

### Responsive Testimine
1. Desktop: Chrome DevTools (1440px)
2. Tablet: iPad (768px - 1024px)
3. Mobile: iPhone (375px - 414px)

## 🔍 Visuaalne Kontroll-list

- [ ] Must taust on nähtav
- [ ] Valge tekst on loetav
- [ ] Ikoonid on 42×42px
- [ ] Divider on nähtav (hall joon)
- [ ] Numbrid on õigesti vormindatud (01, 02...)
- [ ] Kaardid on võrdselt jaotatud
- [ ] Responsive töötab kõigil ekraanidel
- [ ] Fondi suurused on õiged
- [ ] Spacing on ühtlane
- [ ] Hover efektid puuduvad (static design)

## 📸 Screenshot Asukohad

Kui soovid teha screenshot-e:
1. Desktop: 1440px laius
2. Tablet: 900px laius
3. Mobile: 375px laius

Salvesta:
- `docs/screenshots/why-sharks-2-desktop.png`
- `docs/screenshots/why-sharks-2-tablet.png`
- `docs/screenshots/why-sharks-2-mobile.png`
