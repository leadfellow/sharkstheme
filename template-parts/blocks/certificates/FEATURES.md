# Certificates Block - Funktsioonid

## 🎨 Visuaalsed Efektid

### 1. Ujuv Animatsioon (Floating)
Sertifikaadi kaardid "ujuvad" õrnalt vasakult paremale, luues dünaamilise ja elava efekti.

```css
Animation: 3s ease-in-out infinite
Movement: 0px → 12px → 0px (horizontal)
Delay: Staggered (0.1s per card)
```

### 2. Hover Efektid
Kui hiir liigub kaardi kohale:
- Kaart tõuseb 4px üles
- Vari muutub tugevamaks
- Pilt suureneb 5%
- Kursor muutub pointer'iks

### 3. Lightbox Modal
Kliki sertifikaadile, et avada suur versioon:
- **Fade-in animatsioon**: 0.3s
- **Scale efekt**: 0.9 → 1.0
- **Taust**: Must 90% + blur efekt
- **Maksimaalne suurus**: 90vh x 1200px

## 🎯 Interaktiivsus

### Lightbox Avamine
- **Hiire klikk**: Kliki pildile
- **Klaviatuur**: Enter või Space klahv
- **Accessibility**: ARIA atribuudid ja tabindex

### Lightbox Sulgemine
- **X nupp**: Ülemine parem nurk
- **Overlay**: Kliki tumedal taustal
- **Klaviatuur**: ESC klahv
- **Body scroll**: Lukustatud modaali ajal

## 🔧 Tehnilised Detailid

### JavaScript Funktsioonid
```javascript
window.CertificatesLightbox = {
    open: openLightbox,   // Ava lightbox
    close: closeLightbox  // Sulge lightbox
}
```

### CSS Klassid
- `.certificates-box` - Sertifikaadi konteiner
- `.certificates-box-image` - Pilt (clickable)
- `.certificates-lightbox` - Modal wrapper
- `.certificates-lightbox.is-active` - Aktiivne modal
- `.certificates-lightbox__overlay` - Tume taust
- `.certificates-lightbox__container` - Pildi konteiner
- `.certificates-lightbox__image` - Suur pilt
- `.certificates-lightbox__close` - Sulge nupp

### Animatsiooni Kontroll
```css
/* Muuda ujumise kiirust */
animation: certificateFloat 3s ease-in-out infinite;

/* Muuda ujumise kõrgust */
@keyframes certificateFloat {
    50% { transform: translateY(-8px); }
}

/* Muuda viivitust */
animation-delay: calc(index * 0.1s);
```

## 📱 Responsiivne Disain

### Desktop (>1024px)
- Sertifikaadid reas
- Lightbox 1200px max-width
- 48px sulge nupp

### Tablet (768px - 1024px)
- Sertifikaadid 2 veerus
- Lightbox 90% width

### Mobiil (<768px)
- Sertifikaadid 2 veerus
- Lightbox 95% width
- 40px sulge nupp

### Väike Mobiil (<480px)
- Sertifikaadid 1 veerg
- Lightbox 95% width
- Pilt max-height 80vh

## 🎭 Animatsiooni Järjekord

1. **Lehe laadimine**: Kaardid ilmuvad
2. **Floating algab**: Iga kaart 0.1s hiljem
3. **Hover**: Kaart tõuseb ja pilt suureneb
4. **Klikk**: Lightbox fade-in + scale
5. **Lightbox avatud**: Pilt täissuuruses
6. **Sulgemine**: Fade-out + scale tagasi

## 🔐 Accessibility

### Klaviatuuritugi
- **Tab**: Navigeeri piltide vahel
- **Enter/Space**: Ava lightbox
- **ESC**: Sulge lightbox

### ARIA Atribuudid
```html
<img role="button" 
     tabindex="0" 
     aria-label="Click to enlarge certificate">
```

### Screen Reader Support
- Alt tekstid piltidel
- ARIA label'id nuppudel
- Semantic HTML struktuur

## 🎨 Kohandamine

### Muuda Animatsiooni Kiirust
```css
.certificates-box {
    animation-duration: 4s; /* 3s → 4s */
}
```

### Muuda Ujumise Distantsi
```css
@keyframes certificateFloat {
    50% { transform: translateX(20px); } /* 12px → 20px */
}
```

### Muuda Lightbox Tausta
```css
.certificates-lightbox__overlay {
    background: rgba(0, 0, 0, 0.95); /* 0.9 → 0.95 */
    backdrop-filter: blur(12px); /* 8px → 12px */
}
```

### Keela Animatsioon
```css
.certificates-box {
    animation: none;
}
```

## 💡 Parimad Praktikad

1. **Pildi Suurus**: Kasuta optimeeritud pilte (WebP, max 500KB)
2. **Alt Tekstid**: Lisa alati kirjeldavad alt tekstid
3. **Laadimiskiirus**: Lazy load pildid, kui palju sertifikaate
4. **Accessibility**: Testi klaviatuuriga ja screen reader'iga
5. **Mobile**: Testi erinevatel ekraanisuurustel

## 🐛 Troubleshooting

### Animatsioon ei tööta?
- Kontrolli, et CSS fail on laetud
- Vaata, kas `animation` on üle kirjutatud

### Lightbox ei ava?
- Kontrolli, et JS fail on laetud
- Vaata browser console'i vigu
- Veendu, et pildil on klass `.certificates-box-image`

### Pilt ei ole clickable?
- Kontrolli, et JS on käivitunud
- Vaata, kas `cursor: pointer` on olemas
- Testi klaviatuuriga (Enter/Space)

## 📊 Performance

### CSS Animatsioonid
- Kasutab GPU acceleration (`transform`)
- Ei põhjusta reflow/repaint
- Optimeeritud 60fps jaoks

### JavaScript
- Event delegation
- Passive event listeners
- Debounced scroll events (kui vaja)

### Pildid
- Lazy loading (kui palju pilte)
- WebP formaat
- Responsive images (srcset)
