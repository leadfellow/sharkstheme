<?php
/**
 * PHP Autentimise Süsteem
 * 
 * Funktsioonid:
 * - 3 sisselogimise katset
 * - Automaatne lukustus 5 minutiks
 * - Session-põhine autentimine
 * - Turvaline (brute-force kaitse)
 */

session_start();

// Konfiguratsioon
define('CORRECT_PASSWORD', 'tigekilu');
define('MAX_ATTEMPTS', 3);
define('LOCKOUT_TIME', 300); // 5 minutit sekundites

// Funktsioon IP aadressi saamiseks
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }
}

// Funktsioon katsete kontrollimiseks
function checkAttempts() {
    $ip = getClientIP();
    $attemptsFile = __DIR__ . '/login-attempts.json';
    
    // Loe katsed
    $attempts = [];
    if (file_exists($attemptsFile)) {
        $data = file_get_contents($attemptsFile);
        $attempts = json_decode($data, true) ?: [];
    }
    
    // Kontrolli, kas IP on lukustatud
    if (isset($attempts[$ip])) {
        $ipData = $attempts[$ip];
        
        // Kontrolli, kas lukustus on veel aktiivne
        if (isset($ipData['locked_until']) && time() < $ipData['locked_until']) {
            $remainingTime = $ipData['locked_until'] - time();
            $minutes = ceil($remainingTime / 60);
            return [
                'allowed' => false,
                'message' => "Liiga palju katseid! Proovi uuesti {$minutes} minuti pärast.",
                'remaining' => MAX_ATTEMPTS
            ];
        }
        
        // Kui lukustus on möödas, lähtesta
        if (isset($ipData['locked_until']) && time() >= $ipData['locked_until']) {
            unset($attempts[$ip]);
            file_put_contents($attemptsFile, json_encode($attempts, JSON_PRETTY_PRINT));
        }
    }
    
    // Tagasta järelejäänud katsed
    $remaining = MAX_ATTEMPTS;
    if (isset($attempts[$ip]['count'])) {
        $remaining = MAX_ATTEMPTS - $attempts[$ip]['count'];
    }
    
    return [
        'allowed' => true,
        'remaining' => max(0, $remaining)
    ];
}

// Funktsioon ebaõnnestunud katse salvestamiseks
function recordFailedAttempt() {
    $ip = getClientIP();
    $attemptsFile = __DIR__ . '/login-attempts.json';
    
    // Loe katsed
    $attempts = [];
    if (file_exists($attemptsFile)) {
        $data = file_get_contents($attemptsFile);
        $attempts = json_decode($data, true) ?: [];
    }
    
    // Uuenda katseid
    if (!isset($attempts[$ip])) {
        $attempts[$ip] = ['count' => 0, 'first_attempt' => time()];
    }
    
    $attempts[$ip]['count']++;
    $attempts[$ip]['last_attempt'] = time();
    
    // Kui maksimaalne arv katseid on ületatud, lukusta
    if ($attempts[$ip]['count'] >= MAX_ATTEMPTS) {
        $attempts[$ip]['locked_until'] = time() + LOCKOUT_TIME;
    }
    
    // Salvesta
    file_put_contents($attemptsFile, json_encode($attempts, JSON_PRETTY_PRINT));
    
    $remaining = MAX_ATTEMPTS - $attempts[$ip]['count'];
    return max(0, $remaining);
}

// Funktsioon katsete lähtestamiseks (edukas sisselogimine)
function resetAttempts() {
    $ip = getClientIP();
    $attemptsFile = __DIR__ . '/login-attempts.json';
    
    if (file_exists($attemptsFile)) {
        $data = file_get_contents($attemptsFile);
        $attempts = json_decode($data, true) ?: [];
        
        if (isset($attempts[$ip])) {
            unset($attempts[$ip]);
            file_put_contents($attemptsFile, json_encode($attempts, JSON_PRETTY_PRINT));
        }
    }
}

// Funktsioon autentimise kontrollimiseks
function isAuthenticated() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}

// Funktsioon sisselogimiseks
function login($password) {
    // Kontrolli katseid
    $check = checkAttempts();
    if (!$check['allowed']) {
        return [
            'success' => false,
            'message' => $check['message']
        ];
    }
    
    // Kontrolli parooli
    if ($password === CORRECT_PASSWORD) {
        $_SESSION['authenticated'] = true;
        $_SESSION['login_time'] = time();
        $_SESSION['ip'] = getClientIP();
        resetAttempts();
        
        return [
            'success' => true,
            'message' => 'Sisselogimine õnnestus!'
        ];
    } else {
        $remaining = recordFailedAttempt();
        
        if ($remaining > 0) {
            return [
                'success' => false,
                'message' => "Vale parool! Sul on veel {$remaining} katset.",
                'remaining' => $remaining
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Liiga palju katseid! Konto on lukustatud 5 minutiks.',
                'remaining' => 0
            ];
        }
    }
}

// Funktsioon väljalogimiseks
function logout() {
    $_SESSION = [];
    session_destroy();
}

// POST päringu töötlemine
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'login' && isset($_POST['password'])) {
            $result = login($_POST['password']);
            
            if (isset($_POST['ajax']) && $_POST['ajax'] === '1') {
                header('Content-Type: application/json');
                echo json_encode($result);
                exit;
            }
            
            // Kui edukas, suuna tutorial.html-i
            if ($result['success']) {
                header('Location: tutorial.html');
                exit;
            }
        } elseif ($_POST['action'] === 'logout') {
            logout();
            header('Location: index.php');
            exit;
        }
    }
}
?>

