# 🚀 Quick Start Guide - Sharks 2025

## Kiire Alustamine (5 minutit)

### 1️⃣ Kontrolli eeldusi

✅ WordPress 6.0+  
✅ PHP 7.4+  
✅ **ACF Pro plugin installitud ja aktiveeritud** (KOHUSTUSLIK!)

---

### 2️⃣ Aktiveeri teema

```
Appearance → Themes → Sharks 2025 → Activate
```

---

### 3️⃣ Sync ACF Field Groups (OLULINE!)

Kui see on esimene kord:

1. Mine **Custom Fields → Sync**
2. Näed 5 field groupi:
   - Hero Block
   - Services Block
   - Pricing Block
   - CTA Block
   - Contact Form Block
3. Vali **kõik** ja vajuta **Sync Selected**

✅ Nüüd on ACF blokid valmis kasutamiseks!

---

### 4️⃣ Loo avaleht (1 minuti variant)

#### Meetod 1: Kasuta Pattern'it (KÕIGE KIIREM!)

1. **Loo uus leht**: Pages → Add New
2. **Pealkirjaks**: "Home" või "Avaleht"
3. **Lisa pattern**: 
   - Vajuta **+** (Add Block)
   - Vali **Patterns** tab
   - Vali **Landing Pages**
   - Kliki **"Complete Landing Page"**
4. **Muuda sisu**: Asenda teksti ja pildid oma sisuga
5. **Salvesta**: Publish!

#### Meetod 2: Manuaalselt (rohkem kontrolli)

1. Loo uus leht "Home"
2. Lisa järgmised blokid:

```
+ → Sharks Blocks → Hero
    Headline: "Welcome to Sharks 2025"
    Subheadline: "Your trusted partner"
    Primary CTA: "Get Started" → #contact
    Lisa pilt

+ → Sharks Blocks → Services
    Section Title: "Our Services"
    Lisa 3-6 teenust

+ → Sharks Blocks → Pricing
    Section Title: "Choose Your Plan"
    Lisa 2-3 hinnapakett

+ → Sharks Blocks → CTA
    Title: "Ready to Get Started?"
    Primary Button: "Start Free Trial"

+ → Sharks Blocks → Contact Form
    Title: "Get In Touch"
    Lisa CF7 shortcode
```

3. Salvesta

---

### 5️⃣ Sea avaleheks

```
Settings → Reading
→ Your homepage displays: "A static page"
→ Homepage: Vali "Home"
→ Save Changes
```

✅ **VALMIS!** Külasta oma saiti! 🎉

---

## 🎨 Kiired Kohandused

### Logo

```
Appearance → Customize → Site Identity → Logo
```

### Värvid

**UUENDUS:** Nüüd saad värve muuta admin'is!

```
WordPress Admin → Sharks Settings → Design Tokens
→ Muuda Color, Typography, Spacing token'eid
→ Salvesta
```

Või redigeeri `assets/css/00-settings/variables.css`:

```css
--color-primary: #0066CC;    /* Muuda oma värvi */
--color-secondary: #00A3E0;
--color-accent: #FF6B35;
```

### Menüüd

```
Appearance → Menus
→ Loo "Primary Menu" (header)
→ Loo "Footer Menu 1, 2, 3"
```

---

## 📱 Gutenberg Patterns

### Kuidas kasutada?

Lehe editoris:

1. **Vajuta +** (Add Block)
2. **Vali Patterns tab**
3. **Vaata kategooriaid:**
   - **Landing Pages** - täislahendused
   - **Sections** - üksikud sektsioonid
4. **Kliki patternil** - lisatakse lehele!

### Saadaval patterns:

**Landing Pages:**
- Complete Landing Page (kogu avaleht korraga!)
- Hero + Services Section

**Sections:**
- Pricing + CTA
- Services + Contact Form
- Centered Hero
- Dark CTA Section

---

## 🎯 Block Styles

### Kuidas kasutada?

1. **Kliki blokile**
2. **Paremas külgpanelis** (või toolbar'is) vaata **Styles**
3. **Vali stiil** - näiteks Hero Block → "Gradient Background"

### Saadaval stiilid:

**Hero Block:** Default, Centered, Dark, Gradient  
**Services Block:** Default, Alternate, Minimal  
**Pricing Block:** Default, Compact, Highlighted  
**CTA Block:** Default, Accent, Gradient, Dark, Light  
**Contact Form:** Default, Boxed, Side by Side

---

## 🐛 Troubleshooting

### Ei näe ACF blokke Gutenbergis?

**Probleem:** ACF field groups ei ole sync'itud

**Lahendus:**
```
1. Mine Custom Fields → Sync
2. Sync kõik field groupid
3. Refresh lehte (Ctrl/Cmd + Shift + R)
```

### Ei näe Patterns'eid?

**Kontrolli:**
- ✅ ACF blokid on olemas (vt ülal)
- ✅ Teema on aktiveeritud
- ✅ Refresh lehte

### Block Styles ei ilmu?

**Lahendus:**
```
1. Clear browser cache
2. Hard refresh (Ctrl/Cmd + Shift + R)
3. Kontrolli, et teema CSS on laetud
```

### Patterns tühjade andmetega?

**See on OK!** Patterns kasutavad placeholder sisu. Sina asendad selle oma sisuga.

---

## 📚 Lisamaterjalid

**Detailsed juhised:**
- `SETUP-GUIDE.md` - Põhjalik seadistamine
- `GUTENBERG-GUIDE.md` - Patterns ja Styles juhend
- `FIGMA-IMPORT-GUIDE.md` - Figma design tokens import
- `README.md` - Teema dokumentatsioon
- `DEPLOYMENT.md` - Production deploy

**Abi vajadusel:**
- Kontrolli ACF dokumentatsiooni
- Vaata WordPress.org tuge
- Loe SETUP-GUIDE.md faili

---

## ✅ Checklist

Kontrolli, et kõik on tehtud:

- [ ] ACF Pro installitud ja aktiveeritud
- [ ] Teema aktiveeritud
- [ ] ACF field groups sync'itud (Custom Fields → Sync)
- [ ] Avaleht loodud (kasuta pattern'it!)
- [ ] Avaleht seadistatud (Settings → Reading)
- [ ] Logo lisatud
- [ ] Menüüd loodud
- [ ] Testisin mobile vaates
- [ ] Kõik töötab! 🎉

---

## 🚀 Järgmised sammud

1. **Lisa sisu** - täida lehti sisuga
2. **Lisa pilte** - optimeeri WebP formaati
3. **Loo Contact Form 7** vorm (kui vaja)
4. **Kohanda värve** - Sharks Settings admin paneel
5. **Testi mobile'is** - responsive design
6. **Deploy production'i** - vt DEPLOYMENT.md

---

**Vajad rohkem abi?** Loe SETUP-GUIDE.md ja GUTENBERG-GUIDE.md! 📖

