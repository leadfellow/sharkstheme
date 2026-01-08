# 🔒 Paroolikaitse - Kiire Ülevaade

## Sisselogimise Andmed

```
Kasutajanimi: admin
Parool:       tigekilu
```

## Kuidas Töötab?

Docs kaust on kaitstud Apache `.htaccess` failiga.

Kui avad dokumentatsiooni Apache/Nginx serveris, küsib brauser kasutajanime ja parooli.

## Testimine

### ✅ Töötab:
- Apache server
- Nginx server
- LocalWP
- XAMPP
- MAMP
- WAMP

### ❌ Ei tööta:
- PHP built-in server (`php -S localhost:8000`)
- Node.js server
- Python SimpleHTTPServer

## Parooli Muutmine

### Kiire viis:

1. Mine: https://www.web2generators.com/apache-tools/htpasswd-generator
2. Sisesta kasutajanimi: `admin`
3. Sisesta uus parool
4. Vali: `APR1-MD5`
5. Kopeeri genereeritud rida `.htpasswd` faili

### PHP skriptiga:

```bash
cd docs
php generate-password.php
```

Muuda skriptis parooli ja käivita uuesti.

## Paroolikaitse Väljalülitamine

```bash
cd docs
mv .htaccess .htaccess.backup
```

Taastamiseks:
```bash
mv .htaccess.backup .htaccess
```

## Täpsem Info

Vaata: `README-PAROOL.md`

---

**Valmis! 🔐**

