# 💬 Jututuba - Dokumentatsioon

## Ülevaade

Jututuba on lihtne kommentaarisüsteem, mis on integreeritud `index.html` dokumentatsiooni. See võimaldab kasutajatel jagada tippe, küsida küsimusi ja suhelda teiste arendajatega.

## Failid

- **index.html** - Peamine dokumentatsioon koos jututoa tab'iga
- **chat.php** - Backend API kommentaaride salvestamiseks ja laadimiseks
- **chat-data.json** - Kommentaaride andmefail (luuakse automaatselt)

## Funktsioonid

### ✅ Põhifunktsioonid
- Kommentaaride lisamine (nimi + kommentaar)
- Kommentaaride kuvamine reaalajas
- Tähemärkide loendur (max 500 tähemärki)
- Automaatne kuupäeva vormindamine ("Just nüüd", "5 min tagasi", jne)
- Responsive disain
- AJAX-põhine (lehte ei laadita uuesti)

### 🔒 Turvalisus
- HTML escape kõigile sisendväljadele
- Pikkuse valideerimine (nimi max 50, kommentaar max 500 tähemärki)
- IP aadressi salvestamine (spam'i vältimiseks)
- Ainult viimased 100 kommentaari säilitatakse

## Seadistamine

### 1. PHP tugi
Veendu, et serveril on PHP tugi (versioon 7.4+)

### 2. Õigused
Anna kirjutamisõigused `docs` kaustale, et PHP saaks luua `chat-data.json` faili:

```bash
chmod 755 docs
chmod 644 docs/chat-data.json  # kui fail on juba olemas
```

### 3. Testimine

#### Lokaalne testimine (PHP built-in server):
```bash
cd docs
php -S localhost:8000
```

Seejärel ava brauser: `http://localhost:8000/index.html`

#### Apache/Nginx
Lihtsalt kopeeri failid serveri kausta ja ava `index.html` brauseris.

## Kasutamine

1. Ava dokumentatsioon brauseris
2. Kliki "💬 Jututuba" tab'il
3. Sisesta oma nimi ja kommentaar
4. Vajuta "📤 Saada kommentaar"
5. Kommentaar ilmub kohe nimekirja

## API Endpoints

### POST /docs/chat.php
Uue kommentaari lisamine

**Parameetrid:**
- `name` (string, required) - Kasutaja nimi (2-50 tähemärki)
- `comment` (string, required) - Kommentaar (3-500 tähemärki)

**Vastus:**
```json
{
  "success": true,
  "message": "Kommentaar lisatud!",
  "comments": [...]
}
```

### GET /docs/chat.php?action=load
Kommentaaride laadimine

**Vastus:**
```json
{
  "success": true,
  "comments": [
    {
      "id": "unique_id",
      "name": "Kasutaja Nimi",
      "comment": "Kommentaari tekst",
      "timestamp": "2025-01-05 14:30:00",
      "ip": "127.0.0.1"
    }
  ]
}
```

## Andmestruktuur (chat-data.json)

```json
[
  {
    "id": "65a1b2c3d4e5f",
    "name": "Tanel",
    "comment": "Suurepärane juhend! Aitäh!",
    "timestamp": "2025-01-05 14:30:00",
    "ip": "127.0.0.1"
  }
]
```

## Täiendused ja parandused

### Võimalikud täiendused tulevikus:
- [ ] Kommentaaride kustutamine (admin)
- [ ] Vastuste lisamine (threaded comments)
- [ ] Like/Unlike funktsioon
- [ ] Markdown tugi
- [ ] Spam filter (rate limiting)
- [ ] Moderaatori paneeli
- [ ] E-posti teavitused
- [ ] Kasutaja avatari tugi

### Teadaolevad piirangud:
- Maksimaalselt 100 kommentaari (vanemad kustutatakse automaatselt)
- Pole kasutajate autentimist
- Pole kommentaaride muutmise võimalust
- Pole otsingu funktsiooni

## Troubleshooting

### Kommentaarid ei salvesta
1. Kontrolli PHP versiooni: `php -v`
2. Kontrolli kausta õigusi: `ls -la docs/`
3. Vaata PHP error log'i: `tail -f /var/log/apache2/error.log`

### "Viga kommentaaride laadimisel"
1. Veendu, et `chat.php` on kättesaadav
2. Kontrolli brauseri console'i (F12) võimalike JavaScript vigade jaoks
3. Testi API otse: `curl http://localhost:8000/chat.php?action=load`

### Tähemärkide loendur ei tööta
1. Veendu, et JavaScript on lubatud
2. Kontrolli brauseri console'i vigade jaoks

## Turvalisus

### Soovitused tootmiskeskkonnas:
1. Lisa rate limiting (nt max 5 kommentaari 10 minuti jooksul)
2. Lisa CAPTCHA spam'i vältimiseks
3. Kasuta HTTPS-i
4. Lisa IP-põhine blokeerimine
5. Regulaarselt varunda `chat-data.json` faili
6. Kaaluge andmebaasi kasutamist (MySQL/PostgreSQL) JSON faili asemel

## Litsents

See on osa sharks2025 teema dokumentatsioonist.

## Autor

Loodud: 2025-01-05

