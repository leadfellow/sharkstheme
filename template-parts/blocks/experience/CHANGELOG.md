# Experience Block - Muudatuste logi

## Versioon 1.1 (2026-01-30)

### ✨ Muudatused

**ACF Väljad - Repeater → Eraldi väljad**
- ❌ Eemaldatud: `features` (repeater field)
- ✅ Lisatud: 5 eraldi teksti välja
  - `feature_1` - Esimene rida, vasak
  - `feature_2` - Esimene rida, keskmine
  - `feature_3` - Esimene rida, parem
  - `feature_4` - Teine rida, vasak
  - `feature_5` - Teine rida, parem

**Tab'id organiseerimiseks**
- ✅ Lisatud: "Features" tab
- ✅ Lisatud: "CTA & Images" tab

### 🎯 Eelised

**Lihtsam kasutada**
- ✅ Ei pea klikkima "Add Feature"
- ✅ Kõik väljad kohe nähtaval
- ✅ Selge struktuur (3+2 rida)
- ✅ Eestikeelsed juhised igal väljal

**Parem UX**
- ✅ Väljad organiseeritud tab'idesse
- ✅ Nähtav, kuhu iga feature läheb (vasak/keskmine/parem)
- ✅ Ei saa kogemata lisada liiga palju feature'id

**Väiksem vea oht**
- ✅ Fikseeritud arv feature'id (5)
- ✅ Ei saa unustada "Add Feature" klikkida
- ✅ Automaatselt õige layout

### 📝 Tehnilised muudatused

**PHP Template** (`experience.php`)
```php
// Enne (repeater):
$features = get_field('features');
foreach ($features as $feature) {
    echo $feature['text'];
}

// Nüüd (eraldi väljad):
$feature_1 = get_field('feature_1');
$feature_2 = get_field('feature_2');
// ... jne
```

**ACF JSON** (`group_experience.json`)
```json
// Enne:
{
    "type": "repeater",
    "name": "features",
    "sub_fields": [...]
}

// Nüüd:
{
    "type": "text",
    "name": "feature_1",
    "label": "Feature 1 (Esimene rida, vasak)"
}
// ... + 4 muud välja
```

### 🔄 Migreerimine

Kui sul on juba olemasolevad Experience blokid:

1. **Ava iga blokk**
2. **Kopeeri feature tekstid** repeater'ist
3. **Kleebi tekstid** uutesse väljadesse:
   - Feature 1 → Feature 1 (Esimene rida, vasak)
   - Feature 2 → Feature 2 (Esimene rida, keskmine)
   - jne
4. **Salvesta**

**NB!** Vaikeväärtused tagavad, et blokk töötab ka ilma uuesti salvestamata.

### 📚 Uuendatud dokumentatsioon

- ✅ `README.md` - Uuendatud ACF väljad
- ✅ `KASUTUSJUHEND.md` - Uuendatud juhised
- ✅ `QUICK-REFERENCE.md` - Uuendatud väljad
- ✅ `EXPERIENCE-BLOCK-SUMMARY.md` - Uuendatud kokkuvõte

---

## Versioon 1.0 (2026-01-30)

### 🎉 Esialgne väljalase

- ✅ Experience bloki loomine
- ✅ Repeater väljadega features
- ✅ Responsive disain
- ✅ Pildi fade animatsioon
- ✅ Täielik dokumentatsioon

---

**Viimati uuendatud**: 2026-01-30
**Praegune versioon**: 1.1
