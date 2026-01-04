# Modal Contact Form Guide

## Kuidas kasutada Contact Form 7 modaalis

### 1. Leia Contact Form 7 shortcode

1. Mine WordPressi adminisse
2. Ava **Contact → Contact Forms**
3. Leia vorm, mida soovid kasutada
4. Kopeeri shortcode (näiteks: `[contact-form-7 id="123" title="Contact form"]`)

### 2. Lisa shortcode modaali

#### CTA Blokk
1. Ava Gutenberg editoris **CTA** blokk
2. Vali **Primary Button Type** → **Modal**
3. Sisesta:
   - **Modal Title**: "Võta meiega ühendust"
   - **Modal Description**: "Täida vorm ja võtame sinuga ühendust 24 tunni jooksul"
   - **Modal Content**: `[contact-form-7 id="123" title="Contact form"]`

#### Hero Blokk
1. Ava Gutenberg editoris **Hero** blokk
2. Vali **CTA Button Type** → **Modal**
3. Sisesta:
   - **Modal Title**: "Küsi pakkumist"
   - **Modal Description**: "Täida vorm ja saadame sulle pakkumise"
   - **Modal Content**: `[contact-form-7 id="123" title="Contact form"]`

#### Frontpage Hero Banner
1. Ava Gutenberg editoris **Frontpage Hero Banner** blokk
2. Vali **CTA Button Type** või **Portfolio Button Type** → **Modal**
3. Sisesta:
   - **Modal Title**: "Võta ühendust"
   - **Modal Description**: "Täida vorm allpool"
   - **Modal Content**: `[contact-form-7 id="123" title="Contact form"]`

### 3. Muu sisu modaalis

Modaali sisu väljale saad lisada:
- **Contact Form 7 shortcode**: `[contact-form-7 id="123"]`
- **HTML sisu**: `<p>Tere! Võta meiega ühendust.</p>`
- **Tekst**: Lihtsalt kirjuta tekst
- **Kombinatsioon**: 
  ```
  <p>Täida vorm allpool ja võtame sinuga ühendust.</p>
  [contact-form-7 id="123"]
  ```

### 4. Modaali disain

Modaal kasutab **Inquiry elemendi** disaini:
- **Must taust** - täielik must overlay
- **Valge sisu ala** - puhas valge taust vormile
- **Minimalistlik** - lihtne ja puhas välimus
- **Inquiry stiilis vormid** - läbipaistvad väljad, alumine ääris
- **Ümmargune sulgemise nupp** - ülemine parempoolne nurk

Contact Form 7 vormid on automaatselt stiilitud inquiry stiilis.

### Näited

#### Lihtne kontaktivorm
```
[contact-form-7 id="123" title="Contact form"]
```

#### Vorm koos tekstiga
```
<h3>Küsi pakkumist</h3>
<p>Täida vorm allpool ja saadame sulle personaalse pakkumise 24 tunni jooksul.</p>
[contact-form-7 id="456" title="Quote form"]
```

#### Mitu vormi
```
<h3>Vali teenus</h3>
<p>Koduleht:</p>
[contact-form-7 id="123"]
<p>SEO teenus:</p>
[contact-form-7 id="456"]
```

## Tehnilised detailid

- Shortcode'd töödeldakse PHP `do_shortcode()` funktsiooniga
- Modaal avaneb automaatselt, kui kasutaja klikib nupul
- Modaali saab sulgeda:
  - ESC klahviga
  - Väljaspoole klikkides
  - Ümmarguse sulgemise nupuga (ülemine parempoolne nurk)
- Contact Form 7 AJAX töötab modaalis normaalselt
- Vormide saatmine ei sulge modaali automaatselt
- **Success/Error sõnumid**:
  - Success sõnum: roheline taust, roheline ääris
  - Error sõnum: punane taust, punane ääris
  - Modaal jääb avatuks, et kasutaja saaks sõnumit lugeda
  - Kasutaja saab modaali ise sulgeda pärast sõnumi lugemist
- Disain järgib Inquiry elemendi stiili:
  - Must taust (#000000)
  - Valge sisu ala (#FFFFFF)
  - Inquiry stiilis vormid (läbipaistvad väljad, alumine ääris)
  - Ümmargune sulgemise nupp (62x62px, must ääris)

## Troubleshooting

### Vorm ei ilmu modaalis
- Kontrolli, kas Contact Form 7 plugin on aktiveeritud
- Kontrolli, kas shortcode ID on õige
- Vaata brauseri konsooli võimalike vigade jaoks

### Vorm ei saada
- Kontrolli Contact Form 7 seadeid
- Kontrolli, kas e-posti seaded on õiged
- Vaata WordPressi debug logi
- Error sõnum ilmub modaali ja modaal jääb avatuks

### Success sõnum ei ilmu
- Kontrolli, kas Contact Form 7 AJAX on aktiveeritud
- Vaata brauseri konsooli võimalike vigade jaoks
- Success sõnum ilmub modaali rohelise taustaga

### Stiilid ei tööta
- Kontrolli, kas `assets/css/30-components/modal.css` on laetud
- Kontrolli, kas `assets/css/30-components/contact-form.css` on laetud
- Vaata brauseri konsooli CSS vigade jaoks

