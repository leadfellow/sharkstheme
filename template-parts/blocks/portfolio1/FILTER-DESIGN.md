# Portfolio1 Filtreerimise disain

## Ülevaade

Filtreerimise nupud on disainitud minimalistlikult ja elegantsel viisil, järgides kaasaegseid UI/UX põhimõtteid.

---

## Disaini elemendid

### 1. Nuppude paigutus

```
┌─────────────────────────────────────────────────────┐
│  Kõik Kodulehed • Eridisain • Valmisdisain          │
│  ═══════════════                                    │
└─────────────────────────────────────────────────────┘
     (aktiivne)      (mitteaktiivne) (mitteaktiivne)
```

**Omadused:**
- Horisontaalne paigutus
- Keskele joondatud
- Hall joon all (border-bottom)
- Punktiiriga eraldatud

---

## Nuppude stiil

### Vaikimisi olek

```css
Taust: läbipaistev
Border: puudub
Tekst: hall (#666666)
Font size: 20px
Font weight: 600
Padding: 16px 32px
```

**Visuaal:**
```
┌──────────────┐
│  Eridisain   │  ← Hall tekst
└──────────────┘
```

### Hover olek

```css
Tekst: must (#000000)
Üleminek: 0.3s ease
```

**Visuaal:**
```
┌──────────────┐
│  Eridisain   │  ← Must tekst
└──────────────┘
```

### Aktiivne olek

```css
Tekst: must (#000000)
Font weight: 700
Border bottom: 3px solid #0066ff
```

**Visuaal:**
```
┌──────────────┐
│  Eridisain   │  ← Must, jäme tekst
└──────────────┘
  ═══════════     ← Sinine joon
```

---

## Eraldajad

### Punktiir nuppude vahel

```css
Content: '•'
Position: absolute
Right: -4px
Color: #cccccc
Font size: 12px
```

**Visuaal:**
```
Kõik Kodulehed • Eridisain • Valmisdisain
               ↑           ↑
            punktiir    punktiir
```

**Märkus:** Viimase nupu järel punktiiri ei ole.

---

## Värvid

### Teksti värvid

| Olek | Värv | Hex |
|------|------|-----|
| Vaikimisi | Hall | #666666 |
| Hover | Must | #000000 |
| Aktiivne | Must | #000000 |

### Aktsendi värvid

| Element | Värv | Hex |
|---------|------|-----|
| Aktiivne border | Sinine | #0066ff |
| Eraldaja punktiir | Helehall | #cccccc |
| Alumine joon | Helehall | #e0e0e0 |

---

## Mõõtmed

### Desktop (> 768px)

```
Font size: 20px
Font weight: 600 (vaikimisi), 700 (aktiivne)
Padding: 16px 32px
Border bottom: 3px (aktiivne)
Gap: 0 (punktiiriga eraldatud)
```

### Mobile (< 768px)

```
Font size: 16px
Font weight: 600 (vaikimisi), 700 (aktiivne)
Padding: 12px 20px
Border bottom: 3px (aktiivne)
Horizontal scroll: enabled
```

---

## Animatsioonid

### Hover animatsioon

```css
Transition: all 0.3s ease
```

**Efekt:**
- Teksti värv muutub hallilt mustaks
- Sujuv üleminek

### Aktiivse nupu animatsioon

```css
Transition: all 0.3s ease
```

**Efekt:**
- Sinine joon ilmub alt
- Tekst muutub jämedamaks
- Sujuv üleminek

---

## "Kõik Kodulehed" nupp

### Automaatne lisamine

**PHP kood:**
```php
<button 
    class="portfolio1-filter-btn active" 
    data-category="all"
>
    Kõik Kodulehed
</button>
```

**Omadused:**
- Lisatakse automaatselt
- Alati esimene nupp
- Vaikimisi aktiivne
- Näitab kõiki töid

**Tekst:**
- Vaikimisi: "Kõik Kodulehed"
- Võib kohandada PHP mallis

---

## Responsive disain

### Desktop (> 1024px)

```
┌─────────────────────────────────────────────────────┐
│  Kõik Kodulehed • Eridisain • Valmisdisain          │
│  ═══════════════                                    │
└─────────────────────────────────────────────────────┘
```

- Kõik nupud nähtavad
- Keskele joondatud
- Täislaius

### Tablet (768px - 1024px)

```
┌─────────────────────────────────────────────────────┐
│  Kõik Kodulehed • Eridisain • Valmisdisain          │
│  ═══════════════                                    │
└─────────────────────────────────────────────────────┘
```

- Kõik nupud nähtavad
- Keskele joondatud
- Kohandatud padding

### Mobile (< 768px)

```
┌─────────────────────────────────────────────────────┐
│ ← Kõik Kodulehed • Eridisain • Valmisdisain →       │
│   ═══════════════                                   │
└─────────────────────────────────────────────────────┘
```

- Horizontal scroll
- Väiksem font
- Väiksem padding
- Scrollbar peidetud
- Smooth scrolling

---

## CSS kood

### Põhistiilid

```css
.portfolio1-filter {
    display: flex;
    gap: 0;
    justify-content: center;
    align-items: center;
    margin-bottom: 60px;
    flex-wrap: wrap;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 0;
}

.portfolio1-filter-btn {
    padding: 16px 32px;
    background: transparent;
    border: none;
    border-bottom: 3px solid transparent;
    border-radius: 0;
    font-family: inherit;
    font-size: 20px;
    font-weight: 600;
    color: #666666;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: none;
    position: relative;
    margin-bottom: -2px;
}
```

### Eraldaja

```css
.portfolio1-filter-btn:not(:last-child)::after {
    content: '•';
    position: absolute;
    right: -4px;
    top: 50%;
    transform: translateY(-50%);
    color: #cccccc;
    font-size: 12px;
}
```

### Hover

```css
.portfolio1-filter-btn:hover {
    color: #000000;
}
```

### Aktiivne

```css
.portfolio1-filter-btn.active {
    color: #000000;
    border-bottom-color: #0066ff;
    font-weight: 700;
}
```

### Mobile

```css
@media (max-width: 768px) {
    .portfolio1-filter {
        margin-bottom: 40px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .portfolio1-filter::-webkit-scrollbar {
        display: none;
    }

    .portfolio1-filter-btn {
        padding: 12px 20px;
        font-size: 16px;
        white-space: nowrap;
    }

    .portfolio1-filter-btn:not(:last-child)::after {
        font-size: 10px;
    }
}
```

---

## JavaScript funktsioonid

### Filtreerimine

```javascript
function filterItems(container, category) {
    const items = container.querySelectorAll('.portfolio1-item');
    
    items.forEach(item => {
        const itemCategory = item.getAttribute('data-category');
        
        if (category === 'all') {
            // Näita kõiki
            item.classList.remove('hidden');
            setTimeout(() => {
                item.style.opacity = '1';
            }, 10);
        } else if (itemCategory === category) {
            // Näita vastavaid
            item.classList.remove('hidden');
            setTimeout(() => {
                item.style.opacity = '1';
            }, 10);
        } else {
            // Peida mittevastavad
            item.style.opacity = '0';
            setTimeout(() => {
                item.classList.add('hidden');
            }, 300);
        }
    });
}
```

### Aktiivse nupu vahetamine

```javascript
button.addEventListener('click', function() {
    const category = this.getAttribute('data-category');
    const container = this.closest('.portfolio1-block');
    
    // Eemalda active klass kõikidelt
    filterButtons.forEach(btn => {
        if (btn.closest('.portfolio1-block') === container) {
            btn.classList.remove('active');
        }
    });
    
    // Lisa active klass sellele
    this.classList.add('active');
    
    // Filtreeri tööd
    filterItems(container, category);
});
```

---

## Accessibility

### Keyboard navigation

```
Tab: Liiguta järgmisele nupule
Shift+Tab: Liiguta eelmisele nupule
Enter/Space: Aktiveeri nupp
```

### Screen readers

```html
<button 
    class="portfolio1-filter-btn active" 
    data-category="all"
    aria-label="Filtreeri kõik tööd"
    aria-pressed="true"
>
    Kõik Kodulehed
</button>
```

### Focus state

```css
.portfolio1-filter-btn:focus {
    outline: 2px solid #0066ff;
    outline-offset: 2px;
}
```

---

## Näpunäited

### 💡 Teksti kohandamine

"Kõik Kodulehed" teksti saab muuta PHP mallis:

```php
<button 
    class="portfolio1-filter-btn active" 
    data-category="all"
>
    Kõik <!-- Muuda seda -->
</button>
```

### 💡 Värvi kohandamine

Aktiivse nupu värvi saab muuta CSS-is:

```css
.portfolio1-filter-btn.active {
    border-bottom-color: #0066ff; /* Muuda seda */
}
```

### 💡 Fondi kohandamine

Fondi suurust ja kaalu saab muuta CSS-is:

```css
.portfolio1-filter-btn {
    font-size: 20px; /* Muuda seda */
    font-weight: 600; /* Muuda seda */
}
```

---

## Tõrkeotsing

### Nupud ei kuva õigesti

**Probleem:** Nupud on üksteise peal või vale paigutus.

**Lahendus:**
1. Kontrolli, et CSS on laetud
2. Tühjenda brauseri vahemälu
3. Kontrolli, et flex paigutus on õige

### Aktiivne nupp ei muutu

**Probleem:** Klikates nupul ei muutu see aktiivseks.

**Lahendus:**
1. Kontrolli, et JavaScript on laetud
2. Vaata brauseri konsooli vigade osas
3. Kontrolli, et event listener on õigesti seatud

### Mobile scroll ei tööta

**Probleem:** Mobiilis ei saa nuppude vahel scrollida.

**Lahendus:**
1. Kontrolli, et overflow-x: auto on seatud
2. Kontrolli, et white-space: nowrap on seatud
3. Tühjenda brauseri vahemälu

---

## Kokkuvõte

Filtreerimise disain on:

✅ **Minimalistlik** - Ilma border'ita, puhas välimus
✅ **Elegantne** - Sinine allakriipsutus aktiivsele nupule
✅ **Selge** - Punktiiriga eraldatud nupud
✅ **Responsive** - Horizontal scroll mobiilis
✅ **Accessible** - Keyboard navigation ja screen reader tugi
✅ **Animeeritud** - Sujuvad üleminekud
✅ **Automaatne** - "Kõik Kodulehed" lisatakse automaatselt

---

**Viimati uuendatud:** 2026-02-11  
**Versioon:** 1.0.2
