# Blog Lehe Seadistamine

## 📋 Sammud

### 1. Loo Blogi Leht WordPressis

1. Mine **Pages > Add New**
2. Anna lehele nimi (nt "Blogi" või "Blog")
3. **Ära lisa ühtegi sisu** - leht jääb tühjaks
4. Salvesta leht

### 2. Määra Leht Postituste Leheks

1. Mine **Settings > Reading**
2. Vali "A static page" (not "Your latest posts")
3. **Posts page** - vali äsja loodud blogi leht
4. Salvesta muudatused

### 3. Kohanda Blogi Lehe Seadeid (Valikuline)

1. Mine tagasi blogi lehele (Pages > All Pages > Blogi)
2. Leia "Blog Page Settings" sektsioon (ACF väljad)
3. Kohanda:
   - **Hover värv** - Vali värv hover efektidele
   - **Näita kategooriate filtrit** - Lülita sisse/välja

### 4. Loo Postitusi ja Kategooriaid

1. **Loo kategooriad**:
   - Mine **Posts > Categories**
   - Lisa kategooriad (nt "Turundus", "Veebiarendus", "Graafiline disain")

2. **Loo postitusi**:
   - Mine **Posts > Add New**
   - Kirjuta postitus
   - Lisa **Featured Image** (oluline!)
   - Vali **Category**
   - Salvesta

### 5. Vaata Tulemust

1. Mine blogi lehele (nt `yoursite.com/blogi`)
2. Peaksid nägema:
   - Kategooriate filter ülaosas
   - Postitused 2-veerulisel grid'il
   - Hover efektid
   - Pagination all

## 🎨 Blogi Lehe Funktsioonid

### Automaatsed Funktsioonid

- ✅ Kategooriate filter (AJAX)
- ✅ Pagination (lehekülgede numbrid)
- ✅ Hover efektid
- ✅ Responsive disain
- ✅ Featured images
- ✅ Fallback pildid (kui featured image puudub)

### Kohandatavad Seaded

**Blogi lehel (ACF väljad)**:
- Hover värv
- Kategooriate filtri näitamine

**WordPress Settings > Reading**:
- Postituste arv lehel (default: 10)

## 📁 Kasutatud Failid

```
home.php                              # Blogi lehe template
acf-json/group_blog_page_settings.json # ACF seaded blogi lehele
assets/css/30-components/blog-posts.css # Stiilid
```

## 🔧 Kui Midagi Ei Tööta

### Probleem: Näen vana disaini

**Lahendus**:
1. Kontrolli, et `home.php` fail on teemas
2. Tühjenda cache (kui kasutad caching pluginat)
3. Refresh lehte (Ctrl+F5)

### Probleem: ACF väljad ei ilmu

**Lahendus**:
1. Kontrolli, et ACF Pro on aktiveeritud
2. Mine **Custom Fields > Tools > Sync**
3. Synci "Blog Page Settings" field group

### Probleem: Kategooriad ei filtreeri

**Lahendus**:
1. Kontrolli, et postitustel on kategooriad määratud
2. Kontrolli, et kategooriatel on postitusi
3. Vaata browser console'is erroreid

### Probleem: Pildid ei ilmu

**Lahendus**:
1. Lisa postitustele Featured Images
2. Kui ei ole pilte, näidatakse Unsplash fallback pilte

## 💡 Näpunäited

1. **Featured Images**: Lisa alati featured image postitustele - see teeb blogi palju ilusama
2. **Kategooriad**: Kasuta järjepidevaid kategooriaid, et filter töötaks hästi
3. **Postituste arv**: Muuda Settings > Reading > "Blog pages show at most" (soovitame 6 või 8)
4. **Hover värv**: Vali värv, mis sobib su brändi värvigammaga

## 🎯 Alternatiiv: Blokk Tavalises Lehes

Kui sa ei taha kasutada "Posts page" süsteemi, saad kasutada **Blog Posts blokki** tavalises lehes:

1. Loo tavaline leht
2. Lisa "Blog Posts" blokk (Sharks Blocks)
3. Kohanda seadeid bloki paneelis:
   - Postituste arv
   - Hover värv
   - Laadimise tüüp (Pagination vs Infinite Scroll)
   - Kategooriate filter

**Erinevus**:
- `home.php` = Automaatne blogi leht (WordPress standard)
- Blog Posts blokk = Manuaalne blokk (rohkem kontrolli)

## ✅ Kontroll-list

- [ ] Blogi leht loodud
- [ ] Leht määratud Posts page'ks (Settings > Reading)
- [ ] ACF väljad kohandatud (hover värv)
- [ ] Kategooriad loodud
- [ ] Vähemalt 3-4 postitust loodud
- [ ] Featured images lisatud
- [ ] Blogi leht vaadatud ja testitud
- [ ] Kategooriate filter testitud
- [ ] Pagination testitud (kui üle 6 postitust)

## 🚀 Valmis!

Sinu blogi leht peaks nüüd kasutama kaunist uut disaini! 🎉
