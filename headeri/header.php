<?php if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($pageScripts)) $pageScripts = [];
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle)." - E's GYM" : "E's GYM"; ?></title>
  <link rel="icon" type="image/png" href="/GYMWEBSITE-UEB26/assets/fotot/favicon.png">

  <!-- CSS -->
  <link rel="stylesheet" href="/GYMWEBSITE-UEB26/pjesa_css/kontakti.css">
  <link rel="stylesheet" href="/GYMWEBSITE-UEB26/pjesa_css/test.css">
  <link rel="stylesheet" href="/GYMWEBSITE-UEB26/pjesa_css/skeleti.css">
  <link rel="stylesheet" href="/GYMWEBSITE-UEB26/pjesa_css/footeri.css">
  <link rel="stylesheet" href="/GYMWEBSITE-UEB26/pjesa_css/diet.css">
  <link rel="stylesheet" href="/GYMWEBSITE-UEB26/pjesa_css/kreu.css">



  <!-- AOS animacione -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- jQuery + SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<header>
  <div class="brand">
    <a href="/GYMWEBSITE-UEB26/pages/kreu.php"><h1>E's GYM</h1></a>
  </div>

  <div class="nav-wrap">
    <table class="nav-table">
      <tr>
        <td><a href="/GYMWEBSITE-UEB26/pages/kreu.php"     class="<?php echo $currentPage=='kreu.php'     ? 'active-nav':'' ?>">Kreu</a></td>
        <td><a href="/GYMWEBSITE-UEB26/pages/pakot.php"    class="<?php echo $currentPage=='pakot.php'    ? 'active-nav':'' ?>">Pakot</a></td>
        <td><a href="/GYMWEBSITE-UEB26/pages/diet.php"     class="<?php echo $currentPage=='diet.php'     ? 'active-nav':'' ?>">Dietat</a></td>
        <td><a href="/GYMWEBSITE-UEB26/pages/kontakti.php" class="<?php echo $currentPage=='kontakti.php' ? 'active-nav':'' ?>">Kontakti</a></td>
        <?php if (isset($_SESSION['user_role'])): ?>
          <td><a href="/GYMWEBSITE-UEB26/pages/dashboard.php" style="color:#ff8800;" class="<?php echo $currentPage=='dashboard.php' ? 'active-nav':'' ?>">👤 <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></td>
          <td><a href="/GYMWEBSITE-UEB26/logout.php" style="color:#cc3333; font-weight:bold;">Dil</a></td>
        <?php else: ?>
          <td><a href="/GYMWEBSITE-UEB26/login.php" style="color:#ff8800;" class="<?php echo $currentPage=='login.php' ? 'active-nav':'' ?>">🔐 Login</a></td>
        <?php endif; ?>
      </tr>
    </table>
  </div>
</header>