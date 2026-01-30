# Experience Block - Quick Reference

## 🚀 Kiire alustamine

1. Lisa blokk: `+` → Otsi "Experience"
2. Täida 2 pealkirja osa (hall + must)
3. Mine "Features" tab'i ja täida 5 feature teksti
4. Mine "CTA & Images" tab'i
5. Määra CTA tekst ja link
6. Lae üles 2 pilti
7. Avalda!

## 📋 Väljad (lühidalt)

| Väli | Tüüp | Kohustuslik | Vaikeväärtus |
|------|------|-------------|--------------|
| Headline Gray | Text | ✅ | "Vaatamata aastatepikkusele..." |
| Headline Black | Text | ✅ | "oleme paindlik ja värske" |
| Feature 1 | Text | ❌ | "95% klientidest..." |
| Feature 2 | Text | ❌ | "oleme loonud üle 250..." |
| Feature 3 | Text | ❌ | "turundame igapäevaselt..." |
| Feature 4 | Text | ❌ | "teekond meiega..." |
| Feature 5 | Text | ❌ | "teeme tööd hingega..." |
| CTA Text | Text | ✅ | "küsi pakkimust" |
| CTA URL | URL | ❌ | "#" |
| Image 1 | Image | ❌ | Placeholder |
| Image 2 | Image | ❌ | Placeholder |

## 🎨 Stiilid

- **Taust**: Valge
- **Tekst**: Must / Hall (#bbbab6)
- **Font**: Switzer (82px) / Helvetica (18px)
- **Max laius**: 1440px
- **Padding**: 120px 58px

## 📱 Breakpoints

- Desktop: >1400px
- Tablet: 900-1400px
- Mobile: 600-900px
- Small: <600px

## 📁 Failid

```
template-parts/blocks/experience/
├── experience.php          # Template
├── README.md               # Täielik dokumentatsioon
├── KASUTUSJUHEND.md       # Eestikeelne juhend
└── QUICK-REFERENCE.md     # See fail

assets/css/30-components/
└── experience.css          # Stiilid

acf-json/
└── group_experience.json   # ACF konfiguratsioon

inc/
└── blocks.php              # Registreerimine
```

## ⚡ Kiired näpunäited

✅ **DO**:
- Täida kõik 5 feature välja
- Pildid 800x800px+
- Lühikesed laused (max 150 tähemärki)
- Konkreetsed numbrid ja faktid

❌ **DON'T**:
- Jäta feature väljad tühjaks
- Liiga pikad tekstid
- Väikesed pildid
- Üldised väited

## 🔧 Kiired parandused

**Blokk ei ilmu?**
→ Kontrolli ACF Pro aktiveerimist

**Stiilid puudu?**
→ Tühjenda cache (Ctrl+F5)

**Pildid ei laadi?**
→ Kontrolli pildi suurust ja formaati

## 📞 Rohkem infot

- Täielik juhend: `README.md`
- Eesti juhend: `KASUTUSJUHEND.md`
- Tehniline info: `EXPERIENCE-BLOCK-SUMMARY.md`
