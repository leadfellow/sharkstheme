# Deployment Guide - Sharks 2025 Theme

## Pre-Deployment Checklist

Enne tootmisserverisse üleslaadimist kontrolli järgmist:

### 1. ACF Field Groups

✅ Kõik ACF field group'id on `acf-json/` kaustas
✅ Field group'id on testitud ja töötavad

### 2. Sisuhaldus

✅ Avaleht on loodud ja seadistatud
✅ Kõik ACF blokid on testitud
✅ Menüüd on loodud (primary, footer-1, footer-2, footer-3)
✅ Logo on lisatud
✅ Favicon on lisatud

### 3. Testimine

✅ Desktop vaade töötab (1920px, 1440px, 1280px)
✅ Tablet vaade töötab (768px, 1024px)
✅ Mobile vaade töötab (375px, 414px)
✅ Mobile menüü avanes/sulgub korrektselt
✅ Kõik lingid töötavad
✅ Kontaktvorm saadab e-kirju
✅ Pildid laadivad kiiresti
✅ Pole PHP vigu/hoiatusi
✅ Pole JavaScript vigu (kontrolli konsoolist)

### 4. Optimiseerimine

✅ Pildid on optimeeritud (WebP formaat, kui võimalik)
✅ CSS on minimeeritud (production versioonis)
✅ Pole kasutamata CSS-i
✅ Pole konsoolivigu

## Deployment Steps

### Meetod 1: FTP Upload

1. **Paki teema kokku**
   ```bash
   zip -r sharks2025.zip . -x "*.git*" -x "node_modules/*" -x ".DS_Store"
   ```

2. **Ühenda FTP kaudu**
   - Server: your-server.com
   - Username: your-username
   - Password: your-password

3. **Laadi üles**
   - Destineerimine: `/wp-content/themes/sharks2025/`
   - Laadi üles kõik failid

4. **WordPressis**
   - Logi sisse WP admin'i
   - Mine **Appearance → Themes**
   - Aktiveeri **Sharks 2025**

### Meetod 2: Git Deployment

```bash
# Serveris
cd /var/www/html/wp-content/themes/
git clone your-repo-url sharks2025
cd sharks2025

# Seadista õigused
chmod -R 755 .
chown -R www-data:www-data .
```

### Meetod 3: WP-CLI

```bash
# Kohalikus masinas
wp theme install sharks2025.zip --activate

# Või
wp theme enable sharks2025
wp theme activate sharks2025
```

## Post-Deployment

### 1. Plugin'id

Veendu, et järgmised plugin'id on installitud ja aktiveeritud:

```bash
wp plugin install advanced-custom-fields-pro --activate
wp plugin install contact-form-7 --activate
```

### 2. ACF Sync

1. Mine **Custom Fields → Sync**
2. Sync'i kõik field group'id `acf-json/` kaustast

### 3. Permalinks

1. Mine **Settings → Permalinks**
2. Vali "Post name"
3. Salvesta

### 4. Cache

Tühjenda cache (kui on):
- Server cache
- WordPress cache plugin
- CDN cache
- Browser cache

### 5. Testing

Testi production keskkonnas:
- ✅ Avaleht laadib
- ✅ Menüüd töötavad
- ✅ ACF blokid kuvatakse
- ✅ Vormid töötavad
- ✅ Mobile vaade OK

## Production Optimizations

### 1. CSS Minification

Kui kasutad build tool'i:

```bash
npm install cssnano postcss-cli --save-dev

# package.json
{
  "scripts": {
    "build:css": "postcss assets/css/site.css -o assets/css/site.min.css"
  }
}
```

### 2. Image Optimization

Install Imagick või kasuta plugin:
- ShortPixel Image Optimizer
- EWWW Image Optimizer

### 3. Caching

Soovitatud plugin'id:
- WP Super Cache
- W3 Total Cache
- Redis Object Cache

### 4. CDN Setup

Kui kasutad CDN-i (Cloudflare, StackPath):
1. Lisa CDN URL
2. Seadista cache rules
3. Optimeeri pildilaadimist

### 5. Security

```php
// wp-config.php
define('DISALLOW_FILE_EDIT', true);
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
```

## Rollback Plan

Kui midagi läheb valesti:

### 1. Quick Rollback

```bash
# Aktiveeri vana teema
wp theme activate twentytwentyfour
```

### 2. Git Rollback

```bash
git log --oneline  # leia viimane töötav commit
git reset --hard COMMIT_HASH
```

### 3. Backup Restore

Kui sul on backup:
1. Deaktiveeri teema
2. Kustuta `sharks2025/` kaust
3. Taasta backup'ist

## Monitoring

### Jälgi neid näitajaid:

1. **Performance**
   - Page load time (< 3s)
   - Time to First Byte (< 600ms)
   - First Contentful Paint (< 1.8s)

2. **Errors**
   - PHP errors (log file)
   - JavaScript errors (console)
   - 404 errors

3. **User Experience**
   - Bounce rate
   - Page views
   - Form submissions
   - Mobile vs Desktop traffic

## Support Contacts

**Theme Issues:**
- Email: support@yourcompany.com
- Phone: +372 123 4567

**Server Issues:**
- Hosting Support: hosting@provider.com

**Emergency:**
- On-call Developer: +372 987 6543

---

**Deployment Date:** _____________  
**Deployed By:** _____________  
**Production URL:** _____________  
**Staging URL:** _____________

