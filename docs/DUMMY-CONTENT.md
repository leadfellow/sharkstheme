# 🎨 Dummy Content - ACF Blocks

Kõik ACF blokid näitavad nüüd placeholder teksti, kui väljad on tühjad!

**Versioon:** 1.0.7

---

## 📦 BLOKID KOOS DUMMY TEKSTIGA

### 1️⃣ Hero Block

**Default väljad:**
```
Headline: "Transform Your Business with Innovative Solutions"
Subheadline: "We help companies achieve their goals through cutting-edge 
              technology and expert guidance. Join hundreds of satisfied 
              clients worldwide."
Primary CTA: "Get Started" → #contact
Secondary CTA: "Learn More" → #services
```

**Näide:**
- Kui lisad Hero bloki ilma midagi sisestamata, näed kohe professionaalset placeholder teksti
- Pilt/media võib olla tühi (optional)

---

### 2️⃣ Services Block

**Default väljad:**
```
Section Title: "Our Services"
Section Text: "Comprehensive solutions tailored to your business needs"
```

**Dummy Services (3 kaarti):**

**Service 1: Web Development**
- Description: "Custom websites and web applications built with modern technologies and best practices."
- Link: "Learn More" → #

**Service 2: Digital Marketing**
- Description: "Strategic marketing campaigns that drive traffic, engagement, and conversions."
- Link: "Learn More" → #

**Service 3: Consulting**
- Description: "Expert guidance to help your business grow and adapt to changing markets."
- Link: "Learn More" → #

**Näide:**
- Kui lisad Services bloki, näed kohe 3x3 grid'i koos placeholder teenustega
- Saad ACF-s lisada/muuta/kustutada teenuseid
- Ikoonid on optional

---

### 3️⃣ Pricing Block

**Default väljad:**
```
Section Title: "Choose Your Plan"
Section Text: "Flexible pricing options for businesses of all sizes"
```

**Dummy Pricing Plans (3 paketti):**

**Plan 1: Starter** ($29/month)
- Description: "Perfect for small projects and startups"
- Features:
  - ✅ 5 Projects
  - ✅ 10 GB Storage
  - ✅ Email Support
  - ❌ Advanced Analytics (disabled)
  - ❌ Priority Support (disabled)
- Button: "Get Started" → #

**Plan 2: Professional** ($79/month) ⭐ FEATURED
- Description: "For growing businesses and teams"
- Features:
  - ✅ Unlimited Projects
  - ✅ 100 GB Storage
  - ✅ Priority Email Support
  - ✅ Advanced Analytics
  - ❌ 24/7 Phone Support (disabled)
- Button: "Get Started" → #

**Plan 3: Enterprise** ($199/month)
- Description: "For large organizations"
- Features:
  - ✅ Unlimited Everything
  - ✅ Unlimited Storage
  - ✅ Dedicated Account Manager
  - ✅ Custom Analytics
  - ✅ 24/7 Priority Support
- Button: "Contact Sales" → #

**Näide:**
- Featured plan on keskel ja eristub visuaalselt
- Disabled features on halli tekstiga ja läbijoonitud
- Saad ACF-s lisada/muuta/kustutada planne ja feature'eid

---

### 4️⃣ CTA Block

**Default väljad:**
```
Title: "Ready to Take Your Business to the Next Level?"
Text: "Join thousands of satisfied clients who have transformed their 
       business with our solutions. Get started today and see results 
       in days, not months."
Primary Button: "Start Free Trial" → #contact
Secondary Button: "Schedule a Demo" → #demo
Style Variant: default (võid valida: default, gradient, accent, dark)
```

**Näide:**
- Suur, nähtav CTA sektsioon
- 2 nuppu (primary + secondary)
- Style variants muudavad värviskeemi

---

### 5️⃣ Contact Form Block

**Default väljad:**
```
Title: "Get In Touch"
Text: "Have a question or want to work together? We'd love to hear 
       from you. Send us a message and we'll respond within 24 hours."
Show Contact Info: ✅ Yes (default)
```

**Dummy Contact Info:**
```
Email: hello@example.com
Phone: +1 (555) 123-4567
Address: 123 Business Street, Suite 100, City, State 12345
```

**CF7 Shortcode:**
- Kui tühi, näitab: "Please add a Contact Form 7 shortcode in the block settings."
- Kui täidetud, näitab Contact Form 7 vormi

**Näide:**
- Kaheastmeline layout (contact info + form)
- Contact info koos ikoonidega (mail, phone, location)
- Kui "Show Contact Info" on false, näitab ainult vormi

---

## 🎯 KUIDAS KASUTADA?

### Kiirstart:

1. **Lisa block:**
   ```
   Pages → Edit
   Vajuta + (Add Block)
   Vali: Sharks Blocks → [block name]
   ```

2. **Vaata placeholder teksti:**
   - Block ilmub kohe koos dummy tekstiga
   - Näed, kuidas block välja näeb

3. **Muuda teksti:**
   - Paremal sidebar'is ACF väljad
   - Sisesta oma tekstid
   - Placeholder tekstid asenduvad

4. **Tühjenda tagasi:**
   - Kui kustutad teksti väljast
   - Placeholder ilmub tagasi

---

## 💡 PLACEHOLDERITE EESMÄRK

### Miks dummy tekst?

✅ **Näed kohe, kuidas block välja näeb**
- Ei pea täitma kõiki välju enne preview'd
- Visuaalne feedback kohe

✅ **Parem developer experience**
- Kiire testimine
- Ei pea otsima "Lorem ipsum" tekste

✅ **Kliendile selgem**
- Näidisandmed aitavad mõista struktuuri
- Lihtsam asendada enda tekstiga

✅ **Demo-friendly**
- Saad kohe näidata, kuidas blokid töötavad
- Professionaalne välimus ilma sisuta

---

## 📸 NÄIDIS WORKFLOW

### Kiire landing page:

```
1. Lisa Hero block
   → Näed kohe "Transform Your Business..." teksti
   → Muuda oma headline'iks

2. Lisa Services block
   → Näed 3 dummy teenust
   → Muuda või lisa enda teenuseid

3. Lisa Pricing block
   → Näed 3 pricing plan'i
   → Muuda hindu ja feature'eid

4. Lisa CTA block
   → Näed "Ready to Take..." teksti
   → Muuda oma CTA tekstiks

5. Lisa Contact Form block
   → Näed dummy contact info
   → Muuda enda kontakt info
   → Lisa CF7 shortcode

VALMIS! 🎉
```

---

## 🔄 UPDATE

**Kui tahad placeholder tekste muuta:**

1. Ava `template-parts/blocks/[block-name]/[block-name].php`
2. Leia default väärtused (nt: `?: 'Default text here'`)
3. Muuda teksti
4. Salvesta
5. Refresh lehte

**Näide:**
```php
// template-parts/blocks/hero/hero.php
$headline = get_field('headline') ?: 'SINU TEKST SIIA';
```

---

## ✅ CHECKLIST

Testimiseks:

- [ ] Hero block - näitab placeholder headline + subheadline + nupud
- [ ] Services block - näitab 3 dummy teenust grid'is
- [ ] Pricing block - näitab 3 pricing plan'i (keskmine featured)
- [ ] CTA block - näitab CTA teksti + 2 nuppu
- [ ] Contact Form block - näitab dummy contact info + placeholder tekst

---

**Kõik blokid on valmis ja näitavad professionaalset placeholder sisu! 🚀**

**Versioon: 1.0.7**
**Viimati uuendatud: 2025-10-28**

