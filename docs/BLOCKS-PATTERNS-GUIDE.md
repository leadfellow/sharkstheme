# 🧱 ACF Blokid ja Patterns - Juhend

## 🔍 ESIMENE SAMM: Kontrolli ACF Pro

### 1. Mine WordPress Admin paneelis:
```
Dashboard (pealeht)
```

**Vaata ülevalt notice't:**
- ✅ **Roheline notice:** "ACF Pro on aktiveeritud (version X.X.X)"
  → Kõik OK, blokid peaksid töötama!
  
- ❌ **Punane notice:** "ACF Pro pole aktiveeritud!"
  → ACF Pro peab olema aktiveeritud!

---

## 📦 ACF Pro Aktiveerimise Kontroll

### Kui punane notice:

**1. Kontrolli, kas ACF Pro on installitud:**
```
Plugins → Installed Plugins
Otsi: "Advanced Custom Fields PRO"
```

- ✅ Kui leiad → Vajuta **Activate**
- ❌ Kui ei leia → Pead installima ACF Pro

### 2. ACF Pro installimine:

**Variant A: Kui on license key**
```
Plugins → Add New → Upload Plugin
Lae üles: advanced-custom-fields-pro.zip
Vajuta: Install Now → Activate
```

**Variant B: Kui pole license key't**
- Mine: https://www.advancedcustomfields.com/
- Osta license (umbes $49/aastas)
- Lae alla plugin ZIP
- Installi nagu Variant A

---

## 🧱 ACF BLOKIDE LEIDMINE

### Kus on ACF blokid? (Mitte Patterns!)

**1. Mine lehele või posti:**
```
Pages → Edit (või Add New)
```

**2. Gutenberg editoris vajuta `+` (Add Block) nupp:**
- Üleval vasakul nurgas
- Või vajuta `/` (slash) lehel

**3. Vaata kategooriaid:**
```
Sharks Blocks ← SIIN ON MEIE BLOKID!
  ├── Hero
  ├── Services
  ├── Pricing
  ├── CTA
  └── Contact Form
```

### Kui ei näe "Sharks Blocks" kategooriat:

**Variant 1: Otsi nimega**
- Vajuta `+` nupp
- Kirjuta search: "hero" või "sharks"
- Peaksid nägema meie blokke

**Variant 2: Scroll alla**
- Vajuta `+` nupp
- Scroll kategoriate all täiesti alla
- "Sharks Blocks" kategooria võib olla nimekirja lõpus

**Variant 3: Cache probleem**
- Logi välja WordPressist
- Logi uuesti sisse
- Hard refresh: `Ctrl + Shift + R`

---

## 🎨 BLOCK PATTERNS LEIDMINE

### Kus on Patterns? (Eelkonfigureeritud kombinatsioonid)

**1. Mine lehele või posti:**
```
Pages → Edit (või Add New)
```

**2. Ava Patterns:**

**Meetod A: Patterns Explorer nupp**
- Üleval toolbar'is vajuta Patterns ikoon (ruudukestega ikoon)
- Või vajuta: `⌘ /` (Mac) või `Ctrl + /` (Windows)

**Meetod B: Block Inserter**
- Vajuta `+` nupp
- Vali tab "Patterns"
- Vaata kategooriaid

**3. Vaata meie kategooriaid:**
```
Landing Pages
  ├── Hero + Services Section
  ├── Complete Landing Page
  └── Pricing + CTA

Sections
  ├── Services + Contact Form
  ├── Centered Hero
  └── Dark CTA Section
```

### Kui ei näe "Landing Pages" ega "Sections":

**Variant 1: Otsi nimega**
- Patterns Explorer'is otsi: "sharks" või "hero"
- Peaksid nägema meie patterns'e

**Variant 2: Kontrolli Patterns filter't**
- Patterns Explorer'is on ülaosas filter
- Veendu, et "All" on valitud, mitte "My patterns"

---

## 🚨 TROUBLESHOOTING

### Probleem 1: "ACF Pro pole aktiveeritud" notice

**Lahendus:**
```
1. Plugins → Installed Plugins
2. Otsi: "Advanced Custom Fields PRO"
3. Vajuta: Activate
4. Refresh lehte: Ctrl + Shift + R
```

### Probleem 2: Ei näe ühtegi Sharks blokki

**Kontrolli järjest:**
1. ✅ ACF Pro on aktiveeritud? (vaata dashboard notice't)
2. ✅ Teema on aktiveeritud? (Appearance → Themes → Sharks 2025 Active)
3. ✅ Cache cleared? (Logi välja ja uuesti sisse)
4. ✅ Otsisid õiges kohas? (Block Inserter `+` nupp, mitte Patterns)

### Probleem 3: Blokid on nähtavad, aga ei tööta

**Kontrolli:**
1. ✅ ACF Field Groups on importitud? (Custom Fields → Field Groups)
2. ✅ `acf-json/` kaustas on failid? (Peaksid olema 5 JSON faili)
3. ✅ PHP erroreid? (Vaata WP Debug või error log'i)

### Probleem 4: Patterns on tühjad või ei laadi

**Lahendus:**
```
1. Veendu, et ACF blokid töötavad enne
2. Patterns kasutavad ACF blokke sisus
3. Kui blokid ei tööta → patterns ei tööta
```

---

## 📍 KUHU VAADATA?

### ACF Blokid (individuaalsed):
```
Location: Block Inserter → + nupp
Category: "Sharks Blocks"
Kasutusjuhud: 
  - Lisa üks Hero block
  - Lisa üks Services block
  - Ehita lehte blokk-haaval
```

### Block Patterns (kombinatsioonid):
```
Location: Patterns Explorer → ⌘ / või Patterns nupp
Categories: "Landing Pages" & "Sections"
Kasutusjuhud:
  - Valmis landing page layout
  - Kiire prototüüp
  - Hero + Services korraga
```

---

## ✅ ÕIGE WORKFLOW:

### Kui ehitad lehte nullist:
```
1. Ava Pages → Add New
2. Vajuta + (Add Block)
3. Vali "Sharks Blocks" → Hero
4. Täida Hero väljad
5. Vajuta + (Lisa järgmine block)
6. Vali "Sharks Blocks" → Services
7. jne...
```

### Kui kasutad valmis layout'i:
```
1. Ava Pages → Add New
2. Vajuta ⌘ / (Patterns Explorer)
3. Vali "Landing Pages" → "Complete Landing Page"
4. Pattern lisab kõik blokid korraga
5. Muuda tekste ja pilte
```

---

## 🎯 KIIRKONTROLL:

Tee nii:

1. **Mine:** Pages → Add New
2. **Vajuta:** `+` (Add Block)
3. **Scroll alla:** Peaks nägema "Sharks Blocks" kategooriat
4. **Kliki:** "Sharks Blocks"
5. **Vali:** "Hero"
6. **Peaks ilmuma:** Hero block koos ACF väljadega

Kui samm 3 ei näita "Sharks Blocks" → ACF Pro pole aktiveeritud!

---

## 📸 Screenshot Asukohad:

```
Block Inserter asukoht:
┌─────────────────────────────────┐
│ [+] Add block          [⋮] Menu │ ← Vajuta seda + nuppu
├─────────────────────────────────┤
│                                 │
│  Page content...                │
│                                 │
└─────────────────────────────────┘

Patterns asukoht:
┌─────────────────────────────────┐
│ [+] [⌘/] [🔧] [👁]       [⋮] Menu │ ← Vajuta ⌘/ või [🔧] Patterns ikoon
├─────────────────────────────────┤
│                                 │
│  Page content...                │
│                                 │
└─────────────────────────────────┘
```

---

## 🆘 IKKAGI EI TÖÖTA?

**Saada mulle järgmine info:**

1. **ACF Pro status:**
   - Dashboard notice: roheline või punane?
   - ACF version number?

2. **Block Inserter screenshot:**
   - Vajuta `+` nupp
   - Tee screenshot kõigist kategooriatest
   - Kas näed "Sharks Blocks"?

3. **Plugins list:**
   - Plugins → Installed Plugins
   - Kas "Advanced Custom Fields PRO" on Active?

4. **Console errors:**
   - F12 → Console tab
   - Kopeeri kõik punased errorid

---

**Version: 1.0.5**
**Last Updated: 2025-10-28**

