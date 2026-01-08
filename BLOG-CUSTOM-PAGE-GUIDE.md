# Blogi Lehe Loomine Gutenberg Editoriga

## 🎯 Ülevaade

See juhend näitab, kuidas luua täielikult kohandatav blogi leht Gutenberg editoris, kus saad lisada:
- Oma header/hero sektsiooni
- Blog Posts bloki
- Täiendavaid blokke (CTA, testimonials jne)
- Footer on automaatselt kaasas

## 📋 Sammud

### 1. Loo Uus Leht

1. Mine **Pages > Add New**
2. Anna lehele nimi (nt "Blogi" või "Blog")
3. **ÄRA määra seda veel Posts page'ks!**

### 2. Disaini Oma Blogi Leht

Nüüd saad lisada blokke nagu tahad:

#### Näide 1: Lihtne Blogi

```
[Frontpage Hero Banner] - Pealkiri "Meie Blogi"
[Blog Posts] - Postituste grid
```

#### Näide 2: Täielik Blogi Leht

```
[Frontpage Hero Banner] - Hero "Meie Blogi"
[Content Highlighted] - Intro tekst
[Blog Posts] - Postituste grid
[CTA] - Newsletter signup
```

#### Näide 3: Kategooriate Landing

```
[Hero] - "Turunduse Blogi"
[Label Bar] - Kategooriad
[Blog Posts] - Ainult turunduse postitused
[Consultation] - Broneeri konsultatsioon
```

### 3. Lisa Blog Posts Blokk

1. Kliki **+** (Add block)
2. Otsi "Blog Posts"
3. Vali "Sharks Blocks" kategooriast
4. Blokk ilmub lehele

### 4. Kohanda Blog Posts Bloki Seadeid

Paremal paneelis näed seadeid:

#### Postituste arv lehel
- Vali 2-20 postitust
- Soovitame: 6 või 8
- Default: 6

#### Hover värv
- Kliki värvi valija
- Vali värv, mis sobib su brändi värvigammaga
- Default: roosa (#f237a6)

#### Laadimise tüüp
- **Pagination**: Lehekülgede numbrid all
- **Infinite Scroll**: "Laadi veel" nupp
- Vali see, mis sobib paremini

#### Näita kategooriate filtrit
- Lülita sisse/välja
- Kui sisse, näitab kategooriate navigatsiooni ülaosas
- Default: Sisse

### 5. Lisa Täiendavaid Blokke (Valikuline)

**Enne Blog Posts blokki**:
- Hero/Banner
- Intro tekst
- Label Bar (kategooriad)

**Pärast Blog Posts blokki**:
- CTA (newsletter)
- Testimonials
- Consultation
- Contact Form

### 6. Salvesta ja Avalda

1. Kliki **Publish** või **Update**
2. Mine lehele vaatama
3. Testi:
   - Kategooriate filtrit
   - Pagination/Load More
   - Hover efekte

## 🎨 Disaini Näited

### Näide A: Minimalistlik

```
┌─────────────────────────────────────┐
│   MEIE BLOGI                        │
│   [Frontpage Hero Banner]           │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   [Blog Posts - 6 postitust]        │
│   - Pagination                      │
│   - Kategooriate filter ON          │
└─────────────────────────────────────┘
```

### Näide B: Turunduse Blogi

```
┌─────────────────────────────────────┐
│   TURUNDUSE BLOGI                   │
│   [Hero]                            │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   Õpi tundma turunduse trende       │
│   [Content Highlighted]             │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   Turundus X SEO X Sotsiaalmeedia   │
│   [Label Bar]                       │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   [Blog Posts - 8 postitust]        │
│   - Infinite Scroll                 │
│   - Kategooriate filter ON          │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   Telli meie uudiskiri              │
│   [CTA]                             │
└─────────────────────────────────────┘
```

### Näide C: Täielik Landing

```
┌─────────────────────────────────────┐
│   HUNGRY FOR YOUR SUCCESS           │
│   [Frontpage Hero Banner]           │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   Miks lugeda meie blogi?           │
│   [Why That - 3 põhjust]            │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   [Blog Posts - 6 postitust]        │
│   - Pagination                      │
│   - Kategooriate filter ON          │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   "Suurepärane sisu!"               │
│   [Testimonials]                    │
└─────────────────────────────────────┘
┌─────────────────────────────────────┐
│   Broneeri tasuta konsultatsioon    │
│   [Consultation]                    │
└─────────────────────────────────────┘
```

## 🔧 Täpsemad Seaded

### Pagination vs Infinite Scroll

**Pagination (Soovitatud)**:
- ✅ SEO sõbralik
- ✅ Kasutajad näevad, mitu lehte on
- ✅ Saab hüpata otse lehele
- ❌ Vajab klikkimist

**Infinite Scroll**:
- ✅ Smooth kasutajakogemus
- ✅ Ei pea klikkima
- ✅ Mobiilis parem
- ❌ Vähem SEO sõbralik

### Kategooriate Filter

**Kui sisse lülitatud**:
- Näitab kõiki kategooriaid ülaosas
- AJAX filtreerimine (kiire)
- "Kõik postitused" valik
- Aktiivne kategooria on märgitud

**Kui välja lülitatud**:
- Näitab ainult postitusi
- Puhtam disain
- Vähem valikuid

## 💡 Näpunäited

### 1. Hover Värv
- Vali värv, mis sobib su brändi värvigammaga
- Testi erinevaid värve demo-s (`demo-blog-posts.html`)
- Hea kontrast on oluline

### 2. Postituste Arv
- **6 postitust**: Ideaalne tasakaal
- **8 postitust**: Rohkem sisu
- **4 postitust**: Minimalistlik
- Paarisarvud töötavad paremini (2 veerus)

### 3. Hero/Banner
- Lisa alati mingi hero või banner üles
- Selgita, mis on blogi eesmärk
- Lisa CTA (nt "Telli uudiskiri")

### 4. Täiendavad Blokid
- **Enne**: Kontekst (miks lugeda)
- **Pärast**: Tegevus (mida edasi teha)
- Ära lisa liiga palju - hoia fookus postitustel

## 🚀 Alternatiiv: Posts Page Süsteem

Kui sa ei vaja täielikku kontrolli ja tahad lihtsamat lahendust:

1. Loo tühi leht
2. Mine **Settings > Reading**
3. Määra see leht kui "Posts page"
4. WordPress kasutab automaatselt `home.php` template'i
5. Kohanda seadeid ACF väljadega lehel

📖 **Juhend**: Vaata `BLOG-SETUP-GUIDE.md`

## ✅ Kontroll-list

- [ ] Leht loodud
- [ ] Hero/Banner lisatud
- [ ] Blog Posts blokk lisatud
- [ ] Bloki seaded kohandatud:
  - [ ] Postituste arv
  - [ ] Hover värv
  - [ ] Laadimise tüüp
  - [ ] Kategooriate filter
- [ ] Täiendavad blokid lisatud (valikuline)
- [ ] Leht avaldatud
- [ ] Testitud:
  - [ ] Kategooriate filter
  - [ ] Pagination/Load More
  - [ ] Hover efektid
  - [ ] Mobiilis

## 🎯 Millal Kasutada?

### Kasuta Gutenberg Lehte Kui:
- ✅ Tahad täielikku kontrolli disaini üle
- ✅ Vajad täiendavaid blokke (hero, CTA jne)
- ✅ Tahad erinevaid blogi lehti (nt kategooriate kaupa)
- ✅ Tahad A/B testida erinevaid layoute

### Kasuta Posts Page Süsteemi Kui:
- ✅ Tahad lihtsat lahendust
- ✅ Ei vaja täiendavaid blokke
- ✅ Tahad WordPressi standardset käitumist
- ✅ Ei taha ise lehte disainida

## 🎉 Valmis!

Nüüd saad luua ilusaid, kohandatud blogi lehti Gutenberg editoriga! 🚀

**Järgmised sammud**:
1. Loo oma blogi leht
2. Lisa Blog Posts blokk
3. Kohanda seadeid
4. Lisa täiendavaid blokke
5. Avalda ja naudi! ✨
