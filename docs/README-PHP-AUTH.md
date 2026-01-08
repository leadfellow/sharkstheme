# 🔒 PHP Paroolikaitse - Dokumentatsioon

## Ülevaade

PHP-põhine paroolikaitse, mis töötab **kõigis** serverites (ka PHP built-in serveris)!

## ✅ Eelised Apache .htaccess-i ees

| Funktsioon | PHP Auth | Apache .htaccess |
|------------|----------|------------------|
| Töötab PHP serveris | ✅ Jah | ❌ Ei |
| Töötab Apache's | ✅ Jah | ✅ Jah |
| Töötab Nginx's | ✅ Jah | ❌ Ei (vajab eraldi conf) |
| Katsete piir | ✅ 3 katset | ❌ Ei |
| Automaatne lukustus | ✅ 5 minutit | ❌ Ei |
| Ilus sisselogimise vorm | ✅ Jah | ❌ Ei (brauser dialog) |
| Logout funktsioon | ✅ Jah | ❌ Ei |

## 🔐 Sisselogimise Andmed

```
Parool: tigekilu
```

## 📁 Failid

### Põhifailid:
- **`index.php`** - Sisselogimise gateway (ilus vorm)
- **`auth.php`** - Autentimise loogika (3 katset, lukustus)
- **`tutorial.php`** - Kaitstud tutorial (kontrollib autentimist)
- **`test-chat.php`** - Kaitstud testimise leht
- **`login-attempts.json`** - Sisselogimise katsed (luuakse automaatselt)

### Avalikud failid:
- **`tutorial.html`** - Tutorial sisu (ei ole otse kättesaadav)
- **`chat.php`** - API (töötab ilma autentimiseta)

## 🚀 Kasutamine

### 1. Käivita Server

```bash
cd docs
php -S localhost:8000
```

### 2. Ava Brauser

```
http://localhost:8000/
```

Või otse:
```
http://localhost:8000/index.php
```

### 3. Sisene

- Sisesta parool: **tigekilu**
- Vajuta "🚀 Sisene"

### 4. Kasuta Dokumentatsiooni

Pärast sisselogimist:
- Näed tutorial.php lehte
- Saad kasutada jututuba
- Saad testida (test-chat.php)

### 5. Logi Välja

Vajuta "🚪 Logi välja" nuppu (paremal üleval)

## 🔒 Turvalisus

### Funktsioonid:

#### 1. **3 Sisselogimise Katset**
- Kasutajal on 3 katset parooli sisestada
- Iga vale katse vähendab järelejäänud katseid
- Näidatakse visuaalselt (punased/rohelised punktid)

#### 2. **Automaatne Lukustus**
- Pärast 3 ebaõnnestunud katset
- Lukustus 5 minutiks
- IP-põhine (iga IP eraldi)

#### 3. **Session-põhine Autentimine**
- Kasutab PHP sessioone
- Turvaline (session ID)
- Automaatne aegumine

#### 4. **IP Jälgimine**
- Salvestab IP aadressi
- Brute-force kaitse
- Eraldi katsed IP-de kaupa

### Konfiguratsioon (auth.php):

```php
define('CORRECT_PASSWORD', 'tigekilu');  // Parool
define('MAX_ATTEMPTS', 3);                // Maksimaalselt katseid
define('LOCKOUT_TIME', 300);              // Lukustus aeg (sekundites)
```

## 📊 Andmestruktuur

### login-attempts.json

```json
{
  "127.0.0.1": {
    "count": 2,
    "first_attempt": 1704456789,
    "last_attempt": 1704456800,
    "locked_until": 1704457100
  },
  "192.168.1.100": {
    "count": 1,
    "first_attempt": 1704456750,
    "last_attempt": 1704456750
  }
}
```

Väljad:
- **count** - Ebaõnnestunud katsete arv
- **first_attempt** - Esimene katse (timestamp)
- **last_attempt** - Viimane katse (timestamp)
- **locked_until** - Lukustatud kuni (timestamp)

## 🎨 Sisselogimise Vorm

### Funktsioonid:
- ✅ Ilus gradient disain
- ✅ Animatsioonid (slide-in, shake)
- ✅ Responsive (mobiil, tablet, desktop)
- ✅ Katsete loendur (visuaalne)
- ✅ Vihje paroolile
- ✅ Enter klahv töötab
- ✅ Automaatne focus

### Värvid:
- Gradient: `#667eea` → `#764ba2`
- Viga: Punane (`#fee`, `#fcc`, `#c33`)
- Õnnestus: Roheline (`#efe`, `#cfc`, `#3c3`)

## 🔧 API

### auth.php Funktsioonid:

```php
// Kontrolli, kas kasutaja on autenditud
isAuthenticated(): bool

// Logi sisse
login($password): array

// Logi välja
logout(): void

// Kontrolli katseid
checkAttempts(): array

// Salvesta ebaõnnestunud katse
recordFailedAttempt(): int

// Lähtesta katsed (edukas sisselogimine)
resetAttempts(): void

// Hangi IP aadress
getClientIP(): string
```

### Näide:

```php
require_once 'auth.php';

// Kontrolli autentimist
if (!isAuthenticated()) {
    header('Location: index.php');
    exit;
}

// Kasutaja on autenditud, näita sisu
echo "Tere tulemast!";
```

## 🧪 Testimine

### Test 1: Õige Parool
```
1. Ava: http://localhost:8000/
2. Sisesta: tigekilu
3. ✅ Peaks suunama tutorial.php-le
```

### Test 2: Vale Parool
```
1. Ava: http://localhost:8000/
2. Sisesta: valeparool
3. ❌ Peaks näitama: "Vale parool! Sul on veel 2 katset."
```

### Test 3: 3 Valet Katset
```
1. Sisesta 3x vale parool
2. ❌ Peaks näitama: "Liiga palju katseid! Konto on lukustatud 5 minutiks."
3. ⏳ Oota 5 minutit või kustuta login-attempts.json
```

### Test 4: Logout
```
1. Logi sisse
2. Vajuta "Logi välja"
3. ✅ Peaks suunama index.php-le
```

## 🛠️ Parooli Muutmine

### auth.php failis:

```php
define('CORRECT_PASSWORD', 'uus_parool');  // ← Muuda seda
```

### Soovitused:
- Kasuta tugevat parooli (min 8 tähemärki)
- Kasuta suurtähti, väiketähti, numbreid
- Ära kasuta lihtsaid sõnu (nt "password", "123456")

## 📋 Troubleshooting

### Probleem: "Liiga palju katseid"

**Lahendus 1:** Oota 5 minutit

**Lahendus 2:** Kustuta login-attempts.json
```bash
rm docs/login-attempts.json
```

**Lahendus 3:** Muuda lukustuse aega (auth.php)
```php
define('LOCKOUT_TIME', 60);  // 1 minut
```

### Probleem: Session ei tööta

**Lahendus:** Kontrolli PHP session seadeid
```bash
php -i | grep session
```

Veendu, et:
- `session.save_path` on kirjutatav
- `session.auto_start` on `Off`

### Probleem: Parool ei tööta

**Lahendus:** Kontrolli auth.php failis:
```php
define('CORRECT_PASSWORD', 'tigekilu');  // Kas see on õige?
```

### Probleem: Ei suuna tutorial.php-le

**Lahendus:** Kontrolli, kas tutorial.html on olemas:
```bash
ls -la docs/tutorial.html
```

## 🔄 Workflow

```
┌─────────────┐
│  index.php  │ ← Kasutaja avab
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Kas autend? │
└──────┬──────┘
       │
   ┌───┴───┐
   │       │
  Ei      Jah
   │       │
   ▼       ▼
┌─────┐ ┌──────────┐
│Vorm │ │tutorial  │
└──┬──┘ │   .php   │
   │    └──────────┘
   ▼
┌─────────┐
│ Sisesta │
│ parool  │
└────┬────┘
     │
     ▼
┌──────────┐
│ auth.php │
│ kontrollib
└────┬─────┘
     │
  ┌──┴──┐
  │     │
 Õige  Vale
  │     │
  ▼     ▼
┌────┐ ┌─────┐
│OK! │ │Viga!│
└─┬──┘ └──┬──┘
  │       │
  ▼       ▼
tutorial  Vorm
  .php    (uuesti)
```

## 🚀 Täiendused Tulevikus

- [ ] Kasutajate andmebaas (mitme kasutajaga)
- [ ] "Unusta parool" funktsioon
- [ ] 2FA (Two-Factor Authentication)
- [ ] Session timeout (automaatne logout)
- [ ] Admin paneeli
- [ ] Sisselogimise ajalugu
- [ ] E-posti teavitused
- [ ] CAPTCHA

## 📚 Võrdlus Teiste Lahendustega

### PHP Auth vs Apache .htaccess

**PHP Auth:**
- ✅ Töötab kõikjal
- ✅ Katsete piir
- ✅ Ilus UI
- ✅ Logout
- ❌ Vajab PHP-d

**Apache .htaccess:**
- ✅ Lihtne seadistada
- ✅ Ei vaja PHP-d
- ❌ Ei tööta PHP serveris
- ❌ Pole katsete piirangut
- ❌ Kole UI

### PHP Auth vs WordPress Login

**PHP Auth:**
- ✅ Lihtne
- ✅ Kiire
- ✅ Ei vaja andmebaasi
- ❌ Ainult üks kasutaja

**WordPress Login:**
- ✅ Mitme kasutajaga
- ✅ Rollid ja õigused
- ✅ Palju pluginaid
- ❌ Vajab WordPressi
- ❌ Aeglasem

## 🎉 Kokkuvõte

PHP paroolikaitse on:
- ✅ Lihtne seadistada
- ✅ Töötab kõigis serverites
- ✅ Turvaline (3 katset, lukustus)
- ✅ Ilus UI
- ✅ Logout funktsioon
- ✅ Hästi dokumenteeritud

**Valmis kasutamiseks! 🚀**

---

**Loodud:** 2025-01-05  
**Projekt:** sharks2025 WordPress teema  
**Parool:** tigekilu

