# 📚 Dokumentatsiooni Kaust

## Failid

### 📖 Peamine dokumentatsioon
- **tutorial.html** - ACF Blokid: Figma → WordPress juhend koos jututoa funktsiooniga
- **tutorial.php** - Kaitstud tutorial (kontrollib autentimist)

### 💬 Jututuba
- **chat.php** - Backend API kommentaaride jaoks
- **chat-data.json** - Kommentaaride andmefail (luuakse automaatselt)
- **README-JUTUTUBA.md** - Täielik jututoa dokumentatsioon
- **JUTUTUBA-QUICK-START.md** - Kiire alustamise juhend

### 🔒 Paroolikaitse (PHP)
- **index.php** - Sisselogimise gateway (ilus vorm)
- **auth.php** - PHP paroolikaitse (3 katset, 5 min lukustus)
- **login-attempts.json** - Sisselogimise katsed (luuakse automaatselt)
- **README-PHP-AUTH.md** - PHP paroolikaitse dokumentatsioon

### 🔒 Paroolikaitse (Apache) - Vana
- **.htaccess** - Apache paroolikaitse konfiguratsioon (ei tööta PHP serveris)
- **.htpasswd** - Krüpteeritud paroolid
- **README-PAROOL.md** - Apache paroolikaitse dokumentatsioon

### 🧪 Testimine
- **test-chat.php** - Jututoa testimise tööriist (kaitstud)
- **test-chat.html** - Jututoa testimise tööriist (vana, avalik)

### 🚀 Käivitamine
- **start-server.sh** - Linux/Mac käivitusskript
- **start-server.bat** - Windows käivitusskript

## 🔐 Sisselogimise Andmed

```
Parool: tigekilu
```

✅ **Uus:** PHP-põhine paroolikaitse töötab **kõigis** serverites!
- ✅ 3 katset
- ✅ Automaatne lukustus (5 min)
- ✅ Ilus sisselogimise vorm

## Kiire Alustamine

### Windows:
```cmd
cd docs
start-server.bat
```

### Linux/Mac:
```bash
cd docs
./start-server.sh
```

### Käsitsi:
```bash
cd docs
php -S localhost:8000
```

Seejärel ava: **http://localhost:8000/**

Sisesta parool: **tigekilu**

## Funktsioonid

### ✅ Dokumentatsioon
- 📖 Põhijuhend - ACF blokide loomine
- 🐧 Ubuntu Help - Ubuntu spetsiifilised juhised
- 💡 Tips & Tricks - Kasulikud nipid
- ⚡ Cursor Hacks - Cursor optimeerimised
- 💬 **Jututuba** - Kommentaaride süsteem

### ✅ Jututuba
- Kommentaaride lisamine
- Reaalajas uuendused
- Tähemärkide loendur
- Automaatne kuupäeva vormindamine
- Turvaline (HTML escape, valideerimine)
- Responsive disain

## Nõuded

- PHP 7.4 või uuem
- Kirjutamisõigused `docs` kaustale

## Troubleshooting

### PHP ei ole installitud?
```bash
# Ubuntu/Debian
sudo apt install php

# Windows
# Laadi alla: https://windows.php.net/download/
```

### Õiguste probleem?
```bash
chmod 755 docs
chmod 644 docs/chat-data.json
```

### Port 8000 on hõivatud?
```bash
# Kasuta teist porti
php -S localhost:8080
```

## Tugi

Vaata täielikku dokumentatsiooni:
- `README-PHP-AUTH.md` - PHP paroolikaitse dokumentatsioon
- `README-JUTUTUBA.md` - Jututoa dokumentatsioon
- `JUTUTUBA-QUICK-START.md` - Kiire alustamine

## Autor

Loodud: 2025-01-05  
Projekt: sharks2025 WordPress teema

