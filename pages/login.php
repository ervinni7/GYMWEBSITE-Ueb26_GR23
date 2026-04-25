<?php
session_start();
require_once __DIR__ . '/classes/User.php';

// Nëse është tashmë i kyçur, dërgo te dashboard
if (isset($_SESSION['user_role'])) {
    header('Location: /gym-php-v2/pages/dashboard.php');
    exit;
}

$error    = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Ju lutemi plotësoni të gjitha fushat.';
    } else {
        $user = User::authenticate($username, $password);
        if ($user !== null) {
            // Ruaj në session
            foreach ($user->toSessionArray() as $key => $val) {
                $_SESSION[$key] = $val;
            }
            // Cookie — kujton emrin 30 ditë (Cookies kërkesë Faza I)
            setcookie('gym_last_user', $user->getName(), time() + 30 * 24 * 3600, '/');
            header('Location: /gym-php-v2/pages/dashboard.php');
            exit;
        } else {
            $error = 'Emri i përdoruesit ose fjalëkalimi është i gabuar.';
        }
    }
}

// Lexo cookie nëse ekziston
$lastUser = $_COOKIE['gym_last_user'] ?? '';
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - E's GYM</title>
  <link rel="icon" type="image/png" href="/gym-php-v2/assets/fotot/favicon.png">
  <link rel="stylesheet" href="/gym-php-v2/assets/css/skeleti.css">
  <style>
    body {
      background: #111;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
    }
    .login-wrap {
      background: #1a1a1a;
      border: 1px solid #ff8800;
      border-radius: 14px;
      padding: 42px 40px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 0 40px rgba(255,136,0,0.15);
    }
    .login-logo { text-align: center; margin-bottom: 6px; }
    .login-logo h1 { color: #ff8800; font-size: 32px; margin: 0; }
    .login-logo p  { color: #888; font-size: 14px; margin: 4px 0 24px; }
    .error-box {
      background: #2a1010; border: 1px solid #cc3333;
      color: #ff8b8b; padding: 11px 14px; border-radius: 7px;
      margin-bottom: 16px; font-size: 14px;
    }
    label { color: #bbb; font-size: 14px; display: block; margin-bottom: 6px; }
    .login-input {
      width: 100%; padding: 12px 14px;
      background: #222; border: 1px solid #444;
      border-radius: 7px; color: #fff; font-size: 15px;
      margin-bottom: 18px; box-sizing: border-box;
      transition: border-color 0.2s;
    }
    .login-input:focus { border-color: #ff8800; outline: none; }
    .login-btn {
      width: 100%; padding: 13px;
      background: #ff8800; color: #fff;
      border: none; border-radius: 7px;
      font-size: 16px; font-weight: bold;
      cursor: pointer; transition: background 0.2s;
    }
    .login-btn:hover { background: #e07000; }
    .hint {
      background: #1e1e1e; border-radius: 8px;
      padding: 14px; margin-top: 20px;
      font-size: 13px; color: #777;
      border: 1px solid #2a2a2a;
    }
    .hint span { color: #ff8800; }
  </style>
</head>
<body>

<div class="login-wrap">
  <div class="login-logo">
    <h1>E's GYM</h1>
    <p>🔐 Zona e Anëtarëve</p>
  </div>

  <?php if ($error): ?>
    <div class="error-box">⚠️ <?php echo htmlspecialchars($error); ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="username">Emri i përdoruesit</label>
    <input type="text" id="username" name="username" class="login-input"
           placeholder="admin ose member"
           value="<?php echo htmlspecialchars($username); ?>" required>

    <label for="password">Fjalëkalimi</label>
    <input type="password" id="password" name="password" class="login-input"
           placeholder="Shkruani fjalëkalimin" required>

    <button type="submit" class="login-btn">KYÇU →</button>
  </form>

  <div class="hint">
    <strong style="color:#aaa;">Demo kredencialet:</strong><br><br>
    👑 Admin &nbsp;: <span>admin</span> / <span>admin123</span><br>
    🏋️ Member: <span>member</span> / <span>member123</span>
  </div>
</div>

</body>
</html>
