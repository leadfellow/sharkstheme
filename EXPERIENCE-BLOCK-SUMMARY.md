# Experience Block - Installation Summary

## ✅ Loodud failid

### 1. Block Template
**Asukoht**: `template-parts/blocks/experience/experience.php`
- PHP template, mis renderdab bloki sisu
- Kasutab ACF välju
- Sisaldab vaikeväärtusi

### 2. CSS Stiilid
**Asukoht**: `assets/css/30-components/experience.css`
- Täielik responsive disain
- Animatsioonid (pildid fade in/out)
- Mobile-optimized

### 3. ACF Konfiguratsioon
**Asukoht**: `acf-json/group_experience.json`
- Kõik ACF väljad
- Eesti keelsed juhised
- Vaikeväärtused

### 4. Dokumentatsioon
**Asukoht**: `template-parts/blocks/experience/README.md`
- Kasutusjuhend
- Väljad ja nende kirjeldused
- Layout skeem

## ✅ Muudetud failid

### 1. Block Registration
**Fail**: `inc/blocks.php`
- Lisatud Experience bloki registreerimine
- Icon: `star-filled`
- Kategooria: `sharks-blocks`

### 2. CSS Import
**Fail**: `assets/css/site.css`
- Lisatud `@import url('./30-components/experience.css');`
- Asukoht: pärast four-steps.css

## 📋 ACF Väljad

### Põhiseaded
1. **Anchor (ID)** - Sisemiste linkide jaoks
2. **Show on Mobile** - Mobiili nähtavus
3. **Headline (Gray Part)** - Pealkiri (hall osa)
4. **Headline (Black Part)** - Pealkiri (must osa)

### Features Tab
5. **Feature 1** - Esimene omadus (esimene rida, vasak)
6. **Feature 2** - Teine omadus (esimene rida, keskmine)
7. **Feature 3** - Kolmas omadus (esimene rida, parem)
8. **Feature 4** - Neljas omadus (teine rida, vasak)
9. **Feature 5** - Viies omadus (teine rida, parem)

### CTA & Images Tab
10. **CTA Button Text** - Nupu tekst
11. **CTA Button URL** - Nupu link
12. **Image 1** - Esimene pilt
13. **Image 2** - Teine pilt (fade animatsiooniga)

## 🎨 Disain

### Värvid
- Taust: Valge (`white`)
- Tekst: Must (`black`)
- Aktsent: Hall (`#bbbab6`)
- CTA nupp: Must taust, valge tekst

### Fondid
- **Switzer**: Pealkirjad ja CTA
- **Helvetica**: Põhitekst

### Layout
- Max laius: 1440px
- Padding: 120px 58px (desktop)
- Gap: 62px

### Responsive Breakpoints
- Desktop: >1400px
- Tablet: 900-1400px
- Mobile: 600-900px
- Small Mobile: <600px

## 🚀 Kasutamine

1. **WordPress Adminpanelis**:
   - Ava leht/postitus
   - Lisa uus blokk
   - Otsi "Experience"
   - Täida väljad (organiseeritud tab'idesse)

2. **Tab'id**:
   - **Põhiseaded**: Anchor ja mobiili nähtavus
   - **Pealkiri**: Hall ja must osa
   - **Features**: 5 eraldi välja feature tekstidele
   - **CTA & Images**: Nupp ja pildid

3. **Soovitatud sisu**:
   - Täida kõik 5 feature välja (automaatselt jaotuvad 3+2 ridadesse)
   - Kaks pilti (428x428px või suurem)
   - Lühike CTA tekst (max 100 tähemärki)

4. **Vaikeväärtused**:
   - Kui jätad väljad tühjaks, kuvatakse demo sisu
   - Placeholder pildid Unsplash'ist

## 🔧 Tehnilised detailid

### Block Registration
```php
'name'            => 'experience',
'title'           => 'Experience',
'category'        => 'sharks-blocks',
'icon'            => 'star-filled',
'mode'            => 'preview'
```

### CSS Klassid
- `.block-experience` - Peamine wrapper
- `.block-experience__headline` - Pealkiri
- `.block-experience__features` - Features konteiner
- `.block-experience__cta-button` - CTA nupp
- `.block-experience__right-section` - Pildid

### Animatsioon
```css
@keyframes fadeInOut {
  0%, 100% { opacity: 0; }
  50% { opacity: 1; }
}
```

## ✨ Eripärad

1. **Automaatne ridade jaotus**: Features jagunevad automaatselt ridadeks (3+2)
2. **Pildi animatsioon**: Teine pilt fade'ib esimese peale (4s tsükkel)
3. **Täielik responsive**: Kohandub kõikidele ekraanisuurustele
4. **BEM metodoloogia**: CSS klassid järgivad BEM nimetamist

## 📝 Järgmised sammud

1. **Aktiveeri ACF väljad**:
   - Mine WordPress adminpaneeli
   - Custom Fields → Field Groups
   - Kontrolli, et "Experience Block" on aktiivne

2. **Testi blokki**:
   - Loo uus leht
   - Lisa Experience blokk
   - Täida väljad
   - Vaata eelvaadet

3. **Kohanda vajadusel**:
   - Muuda värve `experience.css` failis
   - Muuda layout'i PHP template'is
   - Lisa uusi ACF välju JSON failis

## 🎯 Vaikeväärtused

**Headline**:
- Gray: "Vaatamata aastatepikkusele kogemusele"
- Black: "oleme paindlik ja värske"

**Features**:
1. 95% klientidest soovitavad meid edasi
2. oleme loonud üle 250 kodulehekülje ja e-poe
3. turundame igapäevaselt rohkem kui 50 klienti
4. teekond meiega on lihtne ja kasumlik
5. teeme tööd hingega ja kvaliteediga

**CTA**: "küsi pakkimust"

---

**Loodud**: 2026-01-30
**Versioon**: 1.0
**Staatus**: ✅ Valmis kasutamiseks
