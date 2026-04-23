<?php
session_start();

$pageTitle   = 'Kreu';
$pageScripts = ['/gym-php-v2/assets/js/kreu.js'];

$sections = [
    [
        'image' => '/gym-php-v2/assets/fotot/rrethnesh.png',
        'alt'   => 'GYM logo and some dumbbells',
        'title' => 'Më shumë rreth nesh',
        'text'  => 'Në gym-in tonë, shëndeti dhe forca shkojnë bashkë. Prej vitit 2018 kemi qenë zgjedhja e mijëra personave që kërkojnë rezultate të qëndrueshme. Trajnerë të certifikuar, ambient i pastër dhe programe të personalizuara.'
    ],
    [
        'image' => '/gym-php-v2/assets/fotot/ourmission.png',
        'alt'   => 'Some people training in gym and the text Our Mission',
        'title' => 'Misioni ynë',
        'text'  => 'Duke ofruar programe të personalizuara dhe trajnerë ekspertë, synojmë të jemi zgjedhja numër një në fitnes. Misioni ynë është t\'ju ndihmojmë të arrini qëllimet tuaja me siguri dhe kënaqësi.'
    ],
    [
        'image' => '/gym-php-v2/assets/fotot/pajisjemoderne.png',
        'alt'   => 'Gym modern equipment',
        'title' => 'Pajisje moderne',
        'text'  => 'Pajisjet moderne sigurojnë stërvitje më efikase, të sigurt dhe komode, duke ofruar teknologji të avancuar dhe rezultate më të mira në çdo ushtrim.'
    ],
];

$openingTitle = 'ORARI I HAPJES:';
$openingHours = 'E hënë - E shtunë 06:00 - 00:00';

$contactTitle = 'NA KONTAKTONI';
$contactText  = 'Për bashkëpunime dhe informata shtesë na kontaktoni:';
$contactLink  = '/gym-php-v2/pages/joinus.php';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<section id="kreu" class="container" aria-labelledby="kreu-title">
  <div class="hero">
    <h2 id="kreu-title">Rreth nesh</h2>
    <div class="tag">PERFORMANCË. VETËBESIM.</div>
  </div>

  <?php foreach ($sections as $section): ?>
    <div class="row">
      <img
        src="<?php echo htmlspecialchars($section['image']); ?>"
        alt="<?php echo htmlspecialchars($section['alt']); ?>"
      />

      <div class="card-text">
        <h3><?php echo htmlspecialchars($section['title']); ?></h3>
        <p><?php echo htmlspecialchars($section['text']); ?></p>
      </div>
    </div>
  <?php endforeach; ?>

  <div class="info-line">
    <h3><?php echo htmlspecialchars($openingTitle); ?></h3>
    <div class="hours"><?php echo htmlspecialchars($openingHours); ?></div>
  </div>

  <div style="margin-top: 25px; padding: 20px; background: #f5f5f5; border-radius: 5px;">
    <h3 style="color: #333; margin-bottom: 10px;">
      <?php echo htmlspecialchars($contactTitle); ?>
    </h3>

    <p style="color: #555; margin-bottom: 15px;">
      <?php echo htmlspecialchars($contactText); ?>
    </p>

    <a class="btn" href="<?php echo htmlspecialchars($contactLink); ?>">
      Na kontakto
    </a>
  </div>
</section>

<script>
$(document).ready(function() {
  const $rows = $('.row');

  $rows.css({
    'opacity': '0',
    'display': 'flex',
    'transform': 'translateY(20px)'
  });

  $rows.each(function(index) {
    const $row = $(this);

    setTimeout(function() {
      $row.css({
        'opacity': '1',
        'transform': 'translateY(0)',
        'transition': 'opacity 0.8s ease, transform 0.8s ease'
      });
    }, 300 * index);
  });

  $rows.hover(
    function() {
      $(this).css({
        'margin-left': '10px',
        'margin-right': '-10px',
        'transition': 'margin 0.2s ease'
      });
    },
    function() {
      $(this).css({
        'margin-left': '0px',
        'margin-right': '0px',
        'transition': 'margin 0.2s ease'
      });
    }
  );
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>