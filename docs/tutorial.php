<?php
require_once 'auth.php';

// Kontrolli autentimist
if (!isAuthenticated()) {
    header('Location: index.php');
    exit;
}

// Kui autenditud, näita tutorial.html sisu
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACF Blokid: Figma → WordPress Juhend</title>
    <style>
        /* Logout nupp */
        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .logout-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(220, 53, 69, 0.4);
        }
        
        .logout-btn:active {
            transform: translateY(0);
        }
        
        @media (max-width: 768px) {
            .logout-btn {
                top: 10px;
                right: 10px;
                padding: 8px 16px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Logout nupp -->
    <form method="POST" action="auth.php" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="logout-btn">
            🚪 Logi välja
        </button>
    </form>

    <?php
    // Lae tutorial.html sisu
    $tutorialContent = file_get_contents(__DIR__ . '/tutorial.html');
    
    // Eemalda DOCTYPE, html, head ja body tagid, kuna need on juba üleval
    $tutorialContent = preg_replace('/<\!DOCTYPE.*?>/is', '', $tutorialContent);
    $tutorialContent = preg_replace('/<html.*?>/is', '', $tutorialContent);
    $tutorialContent = preg_replace('/<\/html>/is', '', $tutorialContent);
    $tutorialContent = preg_replace('/<head>.*?<\/head>/is', '', $tutorialContent);
    $tutorialContent = preg_replace('/<body.*?>/is', '', $tutorialContent);
    $tutorialContent = preg_replace('/<\/body>/is', '', $tutorialContent);
    
    // Lae tutorial.html head sisu eraldi
    $headContent = '';
    if (preg_match('/<head>(.*?)<\/head>/is', file_get_contents(__DIR__ . '/tutorial.html'), $matches)) {
        $headContent = $matches[1];
        // Eemalda title, charset ja viewport, kuna need on juba üleval
        $headContent = preg_replace('/<title>.*?<\/title>/is', '', $headContent);
        $headContent = preg_replace('/<meta.*?charset.*?>/is', '', $headContent);
        $headContent = preg_replace('/<meta.*?viewport.*?>/is', '', $headContent);
        echo $headContent;
    }
    
    echo $tutorialContent;
    ?>
</body>
</html>

