# 📁 Jututoa Struktuuri Ülevaade

## Failide Struktuur

```
docs/
├── 📄 index.html                    # Peamine dokumentatsioon + Jututuba
├── 🔧 chat.php                      # Backend API (kommentaaride salvestamine)
├── 💾 chat-data.json                # Andmefail (luuakse automaatselt)
├── 📖 README.md                     # Üldine ülevaade
├── 📖 README-JUTUTUBA.md            # Täielik jututoa dokumentatsioon
├── 📖 JUTUTUBA-QUICK-START.md       # Kiire alustamine
├── 🧪 test-chat.html                # Testimise tööriist
├── 🚀 start-server.sh               # Linux/Mac käivitusskript
├── 🚀 start-server.bat              # Windows käivitusskript
└── 🚫 .gitignore                    # Git ignore (chat-data.json)
```

## Andmevoog

```
┌─────────────────┐
│  index.html     │
│  (Jututuba tab) │
└────────┬────────┘
         │
         │ 1. Kasutaja sisestab kommentaari
         │
         ▼
┌─────────────────┐
│  JavaScript     │
│  (AJAX POST)    │
└────────┬────────┘
         │
         │ 2. Saadab andmed
         │
         ▼
┌─────────────────┐
│   chat.php      │
│   - Valideerimine
│   - HTML escape
│   - Salvestamine
└────────┬────────┘
         │
         │ 3. Salvestab JSON faili
         │
         ▼
┌─────────────────┐
│ chat-data.json  │
│ [kommentaarid]  │
└────────┬────────┘
         │
         │ 4. Tagastab vastuse
         │
         ▼
┌─────────────────┐
│  JavaScript     │
│  - Kuvab kommentaari
│  - Uuendab listi
└─────────────────┘
```

## Komponendid

### 1️⃣ Frontend (index.html)

#### HTML Struktuur:
```html
<div id="chat-room" class="tab-content">
  ├── Juhised
  ├── Vorm (nimi + kommentaar)
  ├── Sõnumite ala
  └── Kommentaaride nimekiri
</div>
```

#### JavaScript Funktsioonid:
- `submitComment(event)` - Kommentaari saatmine
- `loadComments()` - Kommentaaride laadimine
- `formatDate(timestamp)` - Kuupäeva vormindamine
- Tähemärkide loendur

#### CSS Klassid:
- `.chat-form` - Vormi stiil
- `.chat-input` - Sisendvälja stiil
- `.chat-textarea` - Tekstiala stiil
- `.chat-submit` - Nupu stiil
- `.comment-card` - Kommentaari kaardi stiil
- `.comment-header` - Kommentaari päis
- `.comment-author` - Autori nimi
- `.comment-time` - Aeg
- `.comment-text` - Kommentaari tekst

### 2️⃣ Backend (chat.php)

#### Funktsioonid:
```php
getComments()              // Kommentaaride lugemine
saveComment($name, $comment) // Kommentaari salvestamine
```

#### API Endpoints:

**POST /chat.php**
- Sisend: `name`, `comment`
- Väljund: JSON `{success, message, comments}`

**GET /chat.php?action=load**
- Väljund: JSON `{success, comments}`

#### Valideerimine:
- Nimi: 2-50 tähemärki
- Kommentaar: 3-500 tähemärki
- HTML escape
- IP salvestamine

### 3️⃣ Andmefail (chat-data.json)

```json
[
  {
    "id": "unique_id",
    "name": "Kasutaja Nimi",
    "comment": "Kommentaari tekst",
    "timestamp": "2025-01-05 14:30:00",
    "ip": "127.0.0.1"
  }
]
```

## Turvalisus

### ✅ Rakendatud:
- ✅ HTML escape (`htmlspecialchars`)
- ✅ Pikkuse valideerimine
- ✅ IP salvestamine
- ✅ Ainult viimased 100 kommentaari
- ✅ POST/GET eraldamine

### 🔜 Tulevikus:
- Rate limiting
- CAPTCHA
- Moderaatori paneeli
- Kasutajate autentimine

## Töövoog

### Kommentaari Lisamine:
```
1. Kasutaja sisestab nime ja kommentaari
2. JavaScript valideerib sisendi
3. AJAX POST päring → chat.php
4. PHP valideerib ja salvestab
5. Tagastab JSON vastuse
6. JavaScript kuvab kommentaari
7. Vorm tühjendatakse
```

### Kommentaaride Laadimine:
```
1. Kasutaja avab Jututuba tab'i
2. JavaScript teeb GET päringu
3. PHP loeb chat-data.json
4. Tagastab JSON vastuse
5. JavaScript renderdab kommentaarid
6. Kuvatakse kuupäevad ("5 min tagasi")
```

## Testimine

### Automaatne Test:
```bash
cd docs
php -S localhost:8000
# Ava: http://localhost:8000/test-chat.html
```

### Käsitsi Test:
```bash
cd docs
php -S localhost:8000
# Ava: http://localhost:8000/index.html
# Kliki: 💬 Jututuba
```

### API Test (cURL):
```bash
# Kommentaaride laadimine
curl http://localhost:8000/chat.php?action=load

# Kommentaari lisamine
curl -X POST http://localhost:8000/chat.php \
  -d "name=Test User" \
  -d "comment=Test comment"
```

## Probleemide Lahendamine

### ❌ "Viga kommentaaride laadimisel"
**Lahendus:**
1. Kontrolli, kas PHP on installitud: `php -v`
2. Kontrolli, kas chat.php on kättesaadav
3. Vaata brauseri console'i (F12)

### ❌ "Viga kommentaari salvestamisel"
**Lahendus:**
1. Kontrolli kausta õigusi: `ls -la docs/`
2. Anna kirjutamisõigused: `chmod 755 docs`
3. Vaata PHP error log'i

### ❌ Port 8000 on hõivatud
**Lahendus:**
```bash
# Kasuta teist porti
php -S localhost:8080
```

## Laiendamised

### Võimalikud täiendused:
- 📧 E-posti teavitused
- 👍 Like/Unlike funktsioon
- 💬 Vastuste lisamine (threaded)
- 🔍 Otsingu funktsioon
- 👤 Kasutajate profiilid
- 🖼️ Avatari tugi
- 📝 Markdown tugi
- 🔔 Real-time uuendused (WebSocket)

## Kokkuvõte

Jututuba on lihtne, kuid funktsionaalne kommentaarisüsteem, mis:
- ✅ Töötab ilma andmebaasita
- ✅ On lihtne seadistada
- ✅ On turvaline
- ✅ On responsive
- ✅ Kasutab AJAX-i
- ✅ On hästi dokumenteeritud

**Valmis kasutamiseks! 🚀**

