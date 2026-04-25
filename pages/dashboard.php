<?php
session_start();
require_once dirname(__DIR__) . '/classes/User.php';
require_once dirname(__DIR__) . '/classes/gymclasses.php';

// Mbrojtja — vetëm të kyçurit
if (!isset($_SESSION['user_role'])) {
    header('Location: /GYMWEBSITE-UEB26_GR23/login.php');
    exit;
}

$pageTitle = 'Dashboard';
$role       = $_SESSION['user_role'];
$name       = $_SESSION['user_name'];
$email      = $_SESSION['user_email'];
$membership = $_SESSION['user_membership'];

// Shembull arrays (Konceptet bazë PHP — numeric, associative, multidimensional)
$stats_admin = ['Anëtarë Aktivë' => 247, 'Klasa Sot' => 4, 'Lokacione' => 3, 'Trajnerë' => 12];

$tips = [
    'E Hënë'   => 'Hidratohuni mirë — pini të paktën 2L ujë në ditë.',
    'E Martë'  => 'Ngrohja para stërvitjes parandalon lëndimet.',
    'E Mërkurë'=> 'Gjumi i mjaftueshëm është pjesë e trajnimit.',
    'E Enjte'  => 'Mos harroni ushqimin pas stërvitjes brenda 30 min.',
    'E Premte' => 'Qëndrimi i drejtë në ushtrime është shumë i rëndësishëm.',
    'E Shtunë' => 'Pushimi është po aq i rëndësishëm sa stërvitja.',
    'E Diel'   => 'Vendosni qëllime të vogla dhe të matshme çdo javë.',
];
$days  = ['E Hënë','E Martë','E Mërkurë','E Enjte','E Premte','E Shtunë','E Diel'];
$today = $days[(int)date('N') - 1];
$tip   = $tips[$today];

// Klasat nga OOP GymClass
$classes = GymClass::getAll();

// Sort klasat sipas emrit (Sortimet — kërkesë Faza I)
usort($classes, fn($a, $b) => strcmp($a->getName(), $b->getName()));

require_once dirname(__DIR__) . '/headeri/header.php';
?>

<style>
  body { background: #111; }
  .dash { max-width: 1100px; margin: 36px auto; padding: 0 20px; }

  /* Hero kartë */
  .dash-hero {
    background: linear-gradient(135deg, #1a1a1a, #2b1600);
    border: 1px solid #ff8800; border-radius: 14px;
    padding: 30px 32px; margin-bottom: 26px;
    display: flex; align-items: center; gap: 22px;
  }
  .dash-avatar {
    width: 74px; height: 74px; background: #ff8800;
    border-radius: 50%; display: flex; align-items: center;
    justify-content: center; font-size: 34px; flex-shrink: 0;
  }
  .dash-hero h2 { color: #fff; font-size: 24px; margin: 0 0 6px; }
  .dash-hero p  { color: #aaa; font-size: 14px; margin: 3px 0; }
  .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; margin-left: 8px; vertical-align: middle; }
  .badge.admin  { background: #9b59b6; color: #fff; }
  .badge.member { background: #ff8800; color: #fff; }

  /* Grid me karta */
  .dash-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px,1fr)); gap: 18px; margin-bottom: 24px; }
  .dash-card {
    background: #1a1a1a; border: 1px solid #2a2a2a;
    border-radius: 12px; padding: 22px;
    transition: border-color 0.2s;
  }
  .dash-card:hover { border-color: #ff8800; }
  .dash-card h3 { color: #ff8800; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 14px; }
  .dash-card p, .dash-card li { color: #ccc; font-size: 14px; line-height: 1.7; }
  .dash-card ul { padding-left: 18px; }
  .dash-card a { text-decoration: none; display: block; color: inherit; }

  /* Admin stats */
  .admin-panel { background: #14091e; border: 1px solid #9b59b6; border-radius: 12px; padding: 22px; margin-bottom: 24px; }
  .admin-panel h3 { color: #c39bd3; margin: 0 0 16px; font-size: 16px; }
  .stats-row { display: flex; gap: 14px; flex-wrap: wrap; }
  .stat-box  { flex: 1; min-width: 120px; background: #1e0e2e; border-radius: 10px; padding: 16px; text-align: center; }
  .stat-box .num { font-size: 30px; font-weight: bold; color: #c39bd3; }
  .stat-box .lbl { font-size: 12px; color: #aaa; margin-top: 4px; }

  /* Tabela klasave */
  .classes-table { width: 100%; border-collapse: collapse; }
  .classes-table th { background: #ff8800; color: #fff; padding: 11px 14px; text-align: left; font-size: 13px; text-transform: uppercase; }
  .classes-table td { padding: 11px 14px; border-bottom: 1px solid #222; color: #ccc; font-size: 14px; }
  .classes-table tr:last-child td { border-bottom: none; }
  .classes-table tr:hover td { background: #1f1f1f; }
  .tag-premium { background: #9b59b6; color: #fff; font-size: 11px; padding: 2px 8px; border-radius: 10px; }
  .tag-standard { color: #4caf50; font-size: 13px; }

  /* Nav shortcuts */
  .shortcut { text-align: center; cursor: pointer; }
  .shortcut .icon { font-size: 34px; margin-bottom: 8px; }

  /* Logout */
  .logout-btn {
    display: inline-block; margin: 20px 0 40px;
    background: #c0392b; color: #fff;
    padding: 10px 26px; border-radius: 7px;
    text-decoration: none; font-weight: bold;
    transition: background 0.2s;
  }
  .logout-btn:hover { background: #a93226; }
</style>

<div class="dash">

  <!-- HERO -->
  <div class="dash-hero">
    <div class="dash-avatar"><?php echo $role === 'admin' ? '👑' : '🏋️'; ?></div>
    <div>
      <h2>
        Mirë se vini, <?php echo htmlspecialchars($name); ?>!
        <span class="badge <?php echo $role; ?>"><?php echo strtoupper($role); ?></span>
      </h2>
      <p>📧 <?php echo htmlspecialchars($email); ?></p>
      <p>🏷️ Pako aktive: <strong style="color:#ff8800;"><?php echo htmlspecialchars($membership); ?></strong></p>
      <p style="color:#555;font-size:13px;">📅 <?php echo date('d.m.Y — H:i'); ?></p>
    </div>
  </div>

  <?php if ($role === 'admin'): ?>
  <!-- PANEL ADMIN — vetëm admini e sheh -->
  <div class="admin-panel">
    <h3>👑 Paneli i Administratorit</h3>
    <div class="stats-row">
      <?php foreach ($stats_admin as $label => $num): ?>
        <div class="stat-box">
          <div class="num"><?php echo $num; ?></div>
          <div class="lbl"><?php echo $label; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- KARTAT -->
  <div class="dash-grid">

    <!-- Anëtarësimi -->
    <div class="dash-card">
      <h3>🏷️ Anëtarësimi im</h3>
      <p><strong style="color:#fff;"><?php echo htmlspecialchars($membership); ?></strong></p>
      <ul style="margin-top:10px;">
        <?php if ($role === 'admin'): ?>
          <li>✅ Qasje e plotë në të gjitha lokacionet</li>
          <li>✅ Menaxhim i klasave dhe anëtarëve</li>
          <li>✅ Raporte dhe statistika</li>
        <?php else: ?>
          <li>✅ Hyrje gjatë orarit të punës</li>
          <li>✅ Qasje në klasat bazike</li>
          <li>✅ Zbritje 10% në suplemente</li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- Orari -->
    <div class="dash-card">
      <h3>🕐 Orari i Palestrës</h3>
      <ul style="list-style:none;padding:0;">
        <li>🟢 E Hënë – E Premte: <strong style="color:#fff;">06:00 – 22:00</strong></li>
        <li>🟡 E Shtunë: <strong style="color:#fff;">08:00 – 20:00</strong></li>
        <li>🟠 E Diel: <strong style="color:#fff;">10:00 – 18:00</strong></li>
      </ul>
    </div>

    <!-- Këshilla e ditës — nga associative array $tips -->
    <div class="dash-card">
      <h3>💡 Këshilla e Ditës — <?php echo $today; ?></h3>
      <p style="font-style:italic;color:#e0e0e0;">"<?php echo htmlspecialchars($tip); ?>"</p>
    </div>

  </div>

  <!-- KLASAT — nga OOP GymClass::getAll(), të sortuara -->
  <div class="dash-card" style="margin-bottom:24px;">
    <h3>📅 Klasat e Disponueshme</h3>
    <table class="classes-table">
      <thead>
        <tr>
          <th>Klasa</th>
          <th>Trajneri</th>
          <th>Orari</th>
          <th>Max</th>
          <th>Lloji</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($classes as $c): ?>
        <tr>
          <td><strong><?php echo htmlspecialchars($c->getName()); ?></strong></td>
          <td><?php echo htmlspecialchars($c->getTrainer()); ?></td>
          <td><?php echo htmlspecialchars($c->getSchedule()); ?></td>
          <td><?php echo $c->getMaxMembers(); ?></td>
          <td>
            <?php if ($c instanceof PremiumClass): ?>
              <span class="tag-premium">⭐ Premium</span>
            <?php else: ?>
              <span class="tag-standard">✅ Standard</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- SHORTCUTS -->
  <div class="dash-grid">
    <div class="dash-card shortcut">
      <a href="/GYMWEBSITE-UEB26_GR23/pages/pakot.php">
        <div class="icon">🛒</div>
        <h3 style="text-align:center;">Pakot</h3>
        <p style="text-align:center;">Eksploroni ofertat tona</p>
      </a>
    </div>
    <div class="dash-card shortcut">
      <a href="/GYMWEBSITE-UEB26_GR23/pages/diet.php">
        <div class="icon">🥗</div>
        <h3 style="text-align:center;">Dietat</h3>
        <p style="text-align:center;">6 dieta të strukturuara</p>
      </a>
    </div>
    <div class="dash-card shortcut">
      <a href="/GYMWEBSITE-UEB26_GR23/pages/joinus.php">
        <div class="icon">📩</div>
        <h3 style="text-align:center;">Kontakti</h3>
        <p style="text-align:center;">Na dërgoni mesazh</p>
      </a>
    </div>
  </div>

  <a href="/GYMWEBSITE-UEB26_GR23/logout.php" class="logout-btn">🚪 Dil nga llogaria</a>

</div>

<?php require_once dirname(__DIR__) . '/headeri/footeri.php'; ?>
