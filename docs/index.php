<?php
date_default_timezone_set('Europe/Tallinn');
require_once 'auth.php';

// Kui juba autenditud, suuna tutorial.html-i
if (isAuthenticated()) {
    header('Location: tutorial.html');
    exit;
}

// Kontrolli katseid
$check = checkAttempts();
$errorMessage = '';
$remaining = $check['remaining'];

// Kui POST päring
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $result = login($_POST['password']);
    
    if ($result['success']) {
        header('Location: tutorial.html');
        exit;
    } else {
        $errorMessage = $result['message'];
        if (isset($result['remaining'])) {
            $remaining = $result['remaining'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔒 Sisselogimine - ACF Dokumentatsioon</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 50px 40px;
            max-width: 450px;
            width: 100%;
            animation: slideIn 0.5s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-icon {
            font-size: 64px;
            margin-bottom: 10px;
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 30px;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        input[type="password"] {
            width: 100%;
            padding: 15px 45px 15px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            font-family: inherit;
        }
        
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #999;
        }
        
        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .error-message {
            background: #fee;
            border: 2px solid #fcc;
            color: #c33;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .success-message {
            background: #efe;
            border: 2px solid #cfc;
            color: #3c3;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        
        .attempts-info {
            text-align: center;
            color: #666;
            font-size: 13px;
            margin-top: 15px;
        }
        
        .attempts-count {
            display: inline-flex;
            gap: 5px;
            margin-top: 5px;
        }
        
        .attempt-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ddd;
            transition: all 0.3s;
        }
        
        .attempt-dot.used {
            background: #f44;
        }
        
        .attempt-dot.available {
            background: #4f4;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 12px;
        }
        
        .hint {
            background: #f0f8ff;
            border-left: 4px solid #0066CC;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
        }
        
        @media (max-width: 480px) {
            .login-container {
                padding: 40px 25px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <div class="logo-icon">🔒</div>
            <h1>Dokumentatsioon</h1>
            <p class="subtitle">ACF Blokid: Figma → WordPress</p>
        </div>
        
        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                ❌ <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>
        
        <?php if (!$check['allowed']): ?>
            <div class="error-message">
                🔒 <?php echo htmlspecialchars($check['message']); ?>
            </div>
        <?php else: ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="password">Sisesta parool:</label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="••••••••"
                            required
                            autofocus
                            <?php echo !$check['allowed'] ? 'disabled' : ''; ?>
                        >
                        <span class="input-icon">🔑</span>
                    </div>
                </div>
                
                <button 
                    type="submit" 
                    class="submit-btn"
                    <?php echo !$check['allowed'] ? 'disabled' : ''; ?>
                >
                    🚀 Sisene
                </button>
                
                <div class="attempts-info">
                    Katseid järel: <strong><?php echo $remaining; ?></strong> / <?php echo MAX_ATTEMPTS; ?>
                    <div class="attempts-count">
                        <?php for ($i = 0; $i < MAX_ATTEMPTS; $i++): ?>
                            <div class="attempt-dot <?php echo $i < $remaining ? 'available' : 'used'; ?>"></div>
                        <?php endfor; ?>
                    </div>
                </div>
            </form>
            
            <div class="hint">
                💡 <strong>Vihje:</strong> Parool on eesti keeles ja seotud merega... 🦈
            </div>
        <?php endif; ?>
        
        <div class="footer">
            <p>🔐 Turvaline sisselogimine</p>
            <p>sharks2026 WordPress teema</p>
        </div>
    </div>
    
    <script>
        // Enter klahv vormil
        document.getElementById('password')?.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.target.form.submit();
            }
        });
        
        // Animatsioon sisselogimisel
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                const btn = this.querySelector('.submit-btn');
                btn.textContent = '⏳ Kontrollin...';
                btn.disabled = true;
            });
        }
    </script>
</body>
</html>

