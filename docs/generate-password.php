<?php
/**
 * Parooli generaator .htpasswd faili jaoks
 * 
 * Kasutamine:
 * php generate-password.php
 */

$username = 'admin';
$password = 'tigekilu';

// APR1-MD5 hash (Apache htpasswd formaat)
function apr1_md5($password) {
    $salt = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
    $len = strlen($password);
    $text = $password . '$apr1$' . $salt;
    $bin = pack("H32", md5($password . $salt . $password));
    
    for($i = $len; $i > 0; $i -= 16) {
        $text .= substr($bin, 0, min(16, $i));
    }
    
    for($i = $len; $i > 0; $i >>= 1) {
        $text .= ($i & 1) ? chr(0) : $password[0];
    }
    
    $bin = pack("H32", md5($text));
    
    for($i = 0; $i < 1000; $i++) {
        $new = ($i & 1) ? $password : $bin;
        if($i % 3) $new .= $salt;
        if($i % 7) $new .= $password;
        $new .= ($i & 1) ? $bin : $password;
        $bin = pack("H32", md5($new));
    }
    
    $tmp = '';
    for ($i = 0; $i < 5; $i++) {
        $k = $i + 6;
        $j = $i + 12;
        if($j == 16) $j = 5;
        $tmp = $bin[$i] . $bin[$k] . $bin[$j] . $tmp;
    }
    $tmp = chr(0) . chr(0) . $bin[11] . $tmp;
    $tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
        "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
    
    return '$apr1$' . $salt . '$' . $tmp;
}

// Genereeri hash
$hash = apr1_md5($password);

// Väljasta
echo "\n";
echo "═══════════════════════════════════════════════\n";
echo "  .htpasswd Parooli Generaator\n";
echo "═══════════════════════════════════════════════\n";
echo "\n";
echo "Kasutajanimi: {$username}\n";
echo "Parool:       {$password}\n";
echo "\n";
echo "Hash:         {$hash}\n";
echo "\n";
echo "═══════════════════════════════════════════════\n";
echo "\n";
echo "Kopeeri see rida .htpasswd faili:\n";
echo "\n";
echo "{$username}:{$hash}\n";
echo "\n";
echo "═══════════════════════════════════════════════\n";
echo "\n";

// Salvesta automaatselt .htpasswd faili
$htpasswd_content = "{$username}:{$hash}\n";
file_put_contents(__DIR__ . '/.htpasswd', $htpasswd_content);

echo "✅ .htpasswd fail on uuendatud!\n";
echo "\n";
echo "Testimiseks:\n";
echo "1. Käivita server: php -S localhost:8000\n";
echo "2. Ava brauser: http://localhost:8000/index.html\n";
echo "3. Sisesta kasutajanimi: admin\n";
echo "4. Sisesta parool: tigekilu\n";
echo "\n";
?>

