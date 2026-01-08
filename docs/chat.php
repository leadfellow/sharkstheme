<?php
date_default_timezone_set('Europe/Tallinn');

// Jututoa andmete salvestamine
$dataFile = __DIR__ . '/chat-data.json';

// Funktsioon andmete lugemiseks
function getComments() {
    global $dataFile;
    if (!file_exists($dataFile)) {
        return [];
    }
    $data = file_get_contents($dataFile);
    return json_decode($data, true) ?: [];
}

// Funktsioon andmete salvestamiseks
function saveComment($name, $comment) {
    global $dataFile;
    $comments = getComments();
    
    $newComment = [
        'id' => uniqid(),
        'name' => htmlspecialchars(trim($name), ENT_QUOTES, 'UTF-8'),
        'comment' => htmlspecialchars(trim($comment), ENT_QUOTES, 'UTF-8'),
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    array_unshift($comments, $newComment);
    
    // Hoiame ainult viimased 100 kommentaari
    $comments = array_slice($comments, 0, 100);
    
    file_put_contents($dataFile, json_encode($comments, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    return true;
}

// POST päringu töötlemine
$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    $name = $_POST['name'] ?? '';
    $comment = $_POST['comment'] ?? '';
    
    // Valideerimine
    if (empty($name) || strlen($name) < 2) {
        $response['message'] = 'Nimi peab olema vähemalt 2 tähemärki pikk';
        echo json_encode($response);
        exit;
    }
    
    if (empty($comment) || strlen($comment) < 3) {
        $response['message'] = 'Kommentaar peab olema vähemalt 3 tähemärki pikk';
        echo json_encode($response);
        exit;
    }
    
    if (strlen($name) > 50) {
        $response['message'] = 'Nimi on liiga pikk (max 50 tähemärki)';
        echo json_encode($response);
        exit;
    }
    
    if (strlen($comment) > 500) {
        $response['message'] = 'Kommentaar on liiga pikk (max 500 tähemärki)';
        echo json_encode($response);
        exit;
    }
    
    // Salvestamine
    if (saveComment($name, $comment)) {
        $response['success'] = true;
        $response['message'] = 'Kommentaar lisatud!';
        $response['comments'] = getComments();
    } else {
        $response['message'] = 'Viga kommentaari salvestamisel';
    }
    
    echo json_encode($response);
    exit;
}

// GET päringu töötlemine (kommentaaride laadimine)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'load') {
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'comments' => getComments()]);
    exit;
}
?>

