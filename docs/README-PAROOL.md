# 🔒 Dokumentatsiooni Paroolikaitse

## Ülevaade

Docs kaust on kaitstud Apache `.htaccess` ja `.htpasswd` failidega.

## Sisselogimise Andmed

```
Kasutajanimi: admin
Parool:       tigekilu
```

## Failid

- **`.htaccess`** - Apache konfiguratsioon (paroolikaitse)
- **`.htpasswd`** - Krüpteeritud paroolid (APR1-MD5 hash)
- **`generate-password.php`** - Parooli generaatori skript

## Kuidas See Töötab?

### 1. Apache Konfiguratsioon (.htaccess)

```apache
AuthType Basic
AuthName "Dokumentatsiooni Kaust - Sisene"
AuthUserFile /var/www/html/sharks-wp/wp-content/themes/sharks2025/docs/.htpasswd
Require valid-user
```

- **AuthType Basic** - Kasutab HTTP Basic Authentication
- **AuthName** - Tekst, mis kuvatakse sisselogimise dialoogis
- **AuthUserFile** - Täielik tee `.htpasswd` failini
- **Require valid-user** - Nõuab kehtivat kasutajat

### 2. Paroolide Fail (.htpasswd)

```
admin:$apr1$rnd12345$VqJ3kJhL8K9mN2pQ4rS6t0
```

Formaat: `kasutajanimi:hash`

Hash on APR1-MD5 formaat (Apache standard).

## Parooli Muutmine

### Variant 1: Käsitsi (Linux/Mac)

```bash
cd docs
htpasswd -b .htpasswd admin uus_parool
```

### Variant 2: PHP Skript

```bash
cd docs
php generate-password.php
```

Muuda skriptis:
```php
$username = 'admin';
$password = 'uus_parool';  // ← Muuda seda
```

### Variant 3: Online Generator

1. Mine: https://www.web2generators.com/apache-tools/htpasswd-generator
2. Sisesta kasutajanimi: `admin`
3. Sisesta parool: `uus_parool`
4. Vali: `APR1-MD5`
5. Kopeeri genereeritud rida `.htpasswd` faili

## Uue Kasutaja Lisamine

### .htpasswd faili:

```
admin:$apr1$rnd12345$VqJ3kJhL8K9mN2pQ4rS6t0
kasutaja2:$apr1$abc78910$XyZ1kJhL8K9mN2pQ4rS6t1
```

Iga kasutaja on eraldi real.

## Testimine

### 1. Apache/Nginx Server

```bash
# Käivita Apache
sudo service apache2 start

# Ava brauser
http://localhost/sharks-wp/wp-content/themes/sharks2025/docs/
```

Peaks küsima kasutajanime ja parooli.

### 2. PHP Built-in Server

⚠️ **TÄHELEPANU:** PHP built-in server EI TOETA `.htaccess` faile!

Kui kasutad `php -S localhost:8000`, siis paroolikaitse EI TÖÖTA.

Lahendus: Kasuta Apache või Nginx serverit.

### 3. LocalWP / XAMPP / MAMP

Need kasutavad Apache't, seega paroolikaitse töötab automaatselt.

## Troubleshooting

### Probleem: "Internal Server Error"

**Põhjus:** Vale tee `.htpasswd` failis

**Lahendus:** Kontrolli `.htaccess` failis `AuthUserFile` teed:

```bash
# Leia õige tee
pwd
# Väljund: /var/www/html/sharks-wp/wp-content/themes/sharks2025/docs

# Uuenda .htaccess failis:
AuthUserFile /var/www/html/sharks-wp/wp-content/themes/sharks2025/docs/.htpasswd
```

### Probleem: Parool ei tööta

**Lahendus:**

1. Kontrolli `.htpasswd` faili sisu:
```bash
cat .htpasswd
```

2. Genereeri uus parool:
```bash
htpasswd -b .htpasswd admin tigekilu
```

3. Kontrolli, kas fail on loetav:
```bash
ls -la .htpasswd
# Peaks olema: -rw-r--r--
```

### Probleem: Paroolikaitse ei tööta PHP serveriga

**Lahendus:** PHP built-in server ei toeta `.htaccess` faile.

Kasuta Apache't:
```bash
# Ubuntu/Debian
sudo apt install apache2
sudo service apache2 start

# Või kasuta LocalWP, XAMPP, MAMP
```

### Probleem: "403 Forbidden"

**Põhjus:** Vale kasutajanimi või parool

**Lahendus:** Kontrolli sisselogimise andmeid:
- Kasutajanimi: `admin`
- Parool: `tigekilu`

## Turvalisus

### ✅ Hea:
- ✅ Paroolid on krüpteeritud (APR1-MD5)
- ✅ `.htpasswd` fail on kaitstud (pole otse kättesaadav)
- ✅ HTTP Basic Authentication on standardne

### ⚠️ Soovitused:
- ⚠️ Kasuta HTTPS-i (HTTP Basic Auth saadab parooli base64 encoded)
- ⚠️ Muuda vaikeparool (`tigekilu`) tugevamaks
- ⚠️ Ära jaga parooli avalikult
- ⚠️ Lisa `.htpasswd` `.gitignore` faili (juba tehtud)

### 🔒 Parema Turvalisuse Jaoks:

1. **Kasuta tugevamat parooli:**
```
Halb:     tigekilu
Hea:      T1g3k1lu!2025
Parem:    xK9#mL2$pQ7@vR4
```

2. **Kasuta HTTPS-i:**
```apache
# .htaccess failis
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

3. **Piira IP aadresse:**
```apache
# .htaccess failis
Order Deny,Allow
Deny from all
Allow from 192.168.1.100
Allow from 10.0.0.0/8
```

## Paroolikaitse Eemaldamine

Kui soovid paroolikaitse eemaldada:

```bash
cd docs
rm .htaccess .htpasswd
```

Või kommenteeri `.htaccess` fail välja:

```apache
# AuthType Basic
# AuthName "Dokumentatsiooni Kaust - Sisene"
# AuthUserFile /var/www/html/sharks-wp/wp-content/themes/sharks2025/docs/.htpasswd
# Require valid-user
```

## Alternatiivid

### 1. WordPress Plugin

Kasuta WordPress pluginat:
- Password Protected
- WP Password
- Simple Login

### 2. Nginx Konfiguratsioon

```nginx
location /docs {
    auth_basic "Dokumentatsiooni Kaust";
    auth_basic_user_file /var/www/html/sharks-wp/wp-content/themes/sharks2025/docs/.htpasswd;
}
```

### 3. PHP Session-põhine

Loo `login.php` fail ja kasuta PHP sessioone.

## Kokkuvõte

- ✅ Paroolikaitse on seadistatud
- ✅ Kasutajanimi: `admin`
- ✅ Parool: `tigekilu`
- ✅ Töötab Apache/Nginx serverites
- ❌ Ei tööta PHP built-in serveris

## Lisainfo

- Apache dokumentatsioon: https://httpd.apache.org/docs/2.4/howto/auth.html
- htpasswd generator: https://www.web2generators.com/apache-tools/htpasswd-generator
- APR1-MD5 info: https://httpd.apache.org/docs/2.4/misc/password_encryptions.html

---

**Loodud:** 2025-01-05  
**Projekt:** sharks2025 WordPress teema

