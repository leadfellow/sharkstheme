# Experience Block - Kasutusjuhend

## 🎯 Ülevaade

Experience block on mõeldud ettevõtte kogemuse ja saavutuste esitlemiseks. Blokk koosneb:
- Kahest osast koosnev pealkiri (hall + must)
- Kuni 10 feature'i tärnide ikoonidega
- Must CTA nupp noolega
- Kaks pilti fade animatsiooniga

## 📸 Visuaal

```
┌──────────────────────────────────────────────────────────────┐
│                                                                │
│  VAATAMATA AASTATEPIKKUSELE KOGEMUSELE                        │
│  OLEME PAINDLIK JA VÄRSKE                                     │
│                                                                │
├────────────────────────────────────┬───────────────────────────┤
│                                    │                           │
│  ⭐ 95% klientidest soovitavad    │                           │
│     meid edasi                     │                           │
│                                    │      ┌─────────────┐      │
│  ⭐ oleme loonud üle 250           │      │             │      │
│     kodulehekülje ja e-poe        │      │   Image 1   │      │
│                                    │      │   Image 2   │      │
│  ⭐ turundame igapäevaselt         │      │  (fade ani) │      │
│     rohkem kui 50 klienti         │      │             │      │
│                                    │      └─────────────┘      │
│  ⭐ teekond meiega on lihtne       │                           │
│     ja kasumlik                    │                           │
│                                    │                           │
│  ⭐ teeme tööd hingega ja          │                           │
│     kvaliteediga                   │                           │
│                                    │                           │
│  ┌──────────────────────────────┐ │                           │
│  │  KÜSI PAKKIMUST           →  │ │                           │
│  └──────────────────────────────┘ │                           │
│                                    │                           │
└────────────────────────────────────┴───────────────────────────┘
```

## 🛠️ Kuidas kasutada

### 1. Bloki lisamine

1. Ava WordPress editor
2. Kliki `+` (Lisa blokk)
3. Otsi "Experience"
4. Kliki blokil

### 2. Väljad

#### Pealkiri
- **Headline (Gray Part)**: Hall tekst (nt. "Vaatamata aastatepikkusele kogemusele")
- **Headline (Black Part)**: Must tekst (nt. "oleme paindlik ja värske")

#### Features Tab
Iga feature on eraldi väli - lihtsalt täida tekstid:
1. **Feature 1**: Esimene rida, vasak
2. **Feature 2**: Esimene rida, keskmine
3. **Feature 3**: Esimene rida, parem
4. **Feature 4**: Teine rida, vasak
5. **Feature 5**: Teine rida, parem

**Soovitus**: Täida kõik 5 välja optimaalse väljanägemise jaoks

#### CTA & Images Tab
- **CTA Button Text**: Nupu tekst (nt. "küsi pakkimust")
- **CTA Button URL**: Link (nt. "#contact" või "https://...")
- **Image 1**: Esimene pilt (baaspilt)
- **Image 2**: Teine pilt (fade'ib esimese peale)

**Soovitatud suurus**: 800x800px või suurem

### 3. Täiendavad seaded

#### Anchor (ID)
- Sisesta ID sisemiste linkide jaoks
- Näide: `experience` → saad linkida `#experience`

#### Kuva mobiilis
- Vaikimisi: Jah
- Kui ei soovi mobiilis näidata, lülita välja

## 💡 Näpunäited

### Pealkirja loomine
✅ **Hea**:
- Gray: "Vaatamata aastatepikkusele kogemusele"
- Black: "oleme paindlik ja värske"

❌ **Vähem hea**:
- Liiga pikk tekst (üle 150 tähemärgi)
- Ainult üks osa täidetud

### Features
✅ **Hea**:
- Lühikesed, konkreetsed laused
- 5-7 feature'i
- Numbrid ja faktid (95%, 250+, jne)

❌ **Vähem hea**:
- Pikad lõigud
- Liiga palju feature'id (üle 10)
- Üldised väited

### CTA nupp
✅ **Hea**:
- "küsi pakkimust"
- "alusta koostööd"
- "broneeri konsultatsioon"

❌ **Vähem hea**:
- Liiga pikk tekst
- Mitme reaga tekst

### Pildid
✅ **Hea**:
- Kõrge kvaliteet (800x800px+)
- Ruudukujulised
- Seotud teemaga
- Optimeeritud (alla 500KB)

❌ **Vähem hea**:
- Madal kvaliteet
- Erineva suhte pildid
- Liiga suured failid (üle 2MB)

## 📱 Responsive käitumine

### Desktop (>1400px)
- Kaks veergu: sisu vasakul, pildid paremal
- Features 3 + 2 reas

### Tablet (900-1400px)
- Üks veerg: sisu üleval, pildid all
- Features 3 + 2 reas

### Mobile (<900px)
- Üks veerg
- Features üksteise all
- Väiksemad fondid

### Small Mobile (<600px)
- Kompaktne padding
- Väiksemad ikoonid ja nupud

## 🎨 Kohandamine

### Värvide muutmine
Ava `assets/css/30-components/experience.css`:

```css
/* Pealkiri hall osa */
.block-experience__headline-gray {
  color: #bbbab6; /* Muuda seda */
}

/* CTA nupp */
.block-experience__cta-button {
  background-color: black; /* Muuda seda */
}
```

### Fondi suurus
```css
.block-experience__headline {
  font-size: 82px; /* Desktop */
}

@media (max-width: 900px) {
  .block-experience__headline {
    font-size: 48px; /* Mobile */
  }
}
```

## 🐛 Probleemide lahendamine

### Blokk ei ilmu
1. Kontrolli, et ACF Pro on aktiveeritud
2. Mine Custom Fields → Field Groups
3. Kontrolli, et "Experience Block" on aktiivne

### Stiilid ei laadi
1. Kontrolli, et `experience.css` on olemas
2. Kontrolli, et `site.css` sisaldab importi
3. Tühjenda cache (Ctrl+F5)

### Pildid ei ilmu
1. Kontrolli, et pildid on üles laaditud
2. Kontrolli pildi suurust (soovitatud: 800x800px+)
3. Vaata, kas pildid on õiges formaadis (JPG, PNG, WebP)

### Features ei jaotuks õigesti
1. Kontrolli, et oled lisanud 5 feature'i
2. Kui rohkem, siis esimesed 3 lähevad esimesse ritta
3. Ülejäänud teise ritta

## 📞 Abi

Kui midagi ei tööta:
1. Vaata `README.md` faili
2. Vaata `EXPERIENCE-BLOCK-SUMMARY.md` faili
3. Kontrolli browser console'i (F12)

---

**Viimati uuendatud**: 2026-01-30
**Versioon**: 1.0
