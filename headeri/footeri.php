<?php
$baseUrl = '/GYMWEBSITE-UEB26_GR23';
$navLinks = [
    'Kreu'     => $baseUrl . '/pages/kreu.php',
    'Pakot'    => $baseUrl . '/pages/pakot.php',
    'Dietat'   => $baseUrl . '/pages/diet.php',
    'Kontakti' => $baseUrl . '/pages/kontakti.php',
];
$contactLinks = [
    ['label' => '📍Rruga B',           'url' => 'https://maps.app.goo.gl/YuvtAF32VmugpQxi7'],
    ['label' => '📍Fakulteti Teknik',  'url' => 'https://maps.app.goo.gl/W6J1yRDZF6Tv7hzC6'],
    ['label' => '📍Albi Mall',         'url' => 'https://maps.app.goo.gl/a7gVofsRGvKQXsvb7'],
    ['label' => '📞 +383 45 123 456', 'url' => 'tel:+38345123456'],
];
?>
<footer class="footeri">
  <div class="email-bar">
    <div class="email-content">
      <h3>📩 MOS I HUMBISNI OFERTAT!</h3>
      <p>Regjistrohuni me email për të marrë njoftime për pakot dhe zbritjet e reja.</p>
    </div>
    <form class="email-input" id="footer-newsletter-form">
      <input type="email" id="footer-newsletter-email" placeholder="Shkruani emailin tuaj..." required>
      <button type="submit">REGJISTROHU</button>
    </form>
  </div>

  <div class="footer-content">
    <div class="footer-col logo-col">
      <a href="<?= $baseUrl ?>/pages/kreu.php">
        <img src="<?= $baseUrl ?>/assets/fotot/logo3.png" alt="Logo">
      </a>
    </div>

    <div class="footer-col orar">
      <h3>ORARI:</h3>
      <p><span class="dita">Hënë - E Premte:</span><br><span class="ora">06:00 - 22:00</span></p>
      <p><span class="dita">E Shtunë:</span><br><span class="ora">08:00 - 20:00</span></p>
      <p><span class="dita">E Diel:</span><br><span class="ora">10:00 - 18:00</span></p>
    </div>

    <div class="footer-col">
      <h3>NAVIGIMI:</h3>
      <ul>
        <?php foreach ($navLinks as $label => $url): ?>
          <li><a href="<?= htmlspecialchars($url) ?>"><?= htmlspecialchars($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="footer-col">
      <h3>NA KONTAKTONI:</h3>
      <ul>
        <?php foreach ($contactLinks as $item): ?>
          <li>
            <a href="<?= htmlspecialchars($item['url']) ?>" <?= str_starts_with($item['url'], 'http') ? 'target="_blank"' : '' ?>>
              <?= htmlspecialchars($item['label']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="copyright-bar">
    <p>© 2025 E's GYM. Të gjitha të drejtat e rezervuara.</p>
  </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ once: true, duration: 1000, offset: 100, easing: 'ease-out-cubic' });
</script>

<script>
document.getElementById('footer-newsletter-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const email = document.getElementById('footer-newsletter-email').value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailRegex.test(email)) {
    Swal.fire({
      title: 'Faleminderit!',
      text: 'U regjistruat me sukses për ofertat tona!',
      icon: 'success',
      background: '#1a1a1a',
      color: '#fff',
      confirmButtonColor: '#ff8800',
      iconColor: '#ff8800'
    });
    this.querySelector('input').value = '';
  } else {
    Swal.fire({
      title: 'Gabim!',
      text: 'Ju lutemi shkruani një email të vlefshëm (p.sh. emri@mail.com)',
      icon: 'error',
      background: '#1a1a1a',
      color: '#fff',
      confirmButtonColor: '#ff8800',
      confirmButtonText: 'Provo Përsëri'
    });
  }
});
</script>

<?php
if (!empty($pageScripts)) {
    foreach ($pageScripts as $src) {
        echo '<script src="' . htmlspecialchars($src) . '"></script>' . "\n";
    }
}
?>
</body>
</html>