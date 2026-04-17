<?php
session_start();
$pageTitle   = 'Kontakti';
$pageScripts = ['/gym-php-v2/assets/js/joinus.js'];
require_once dirname(__DIR__) . '/includes/header.php';
?>

<main style="text-align: center;">
  <section class="kontakt-main">
    <div class="kontakt-overlay"></div>
    <div class="kontakt-container">
      <div class="kontakt-text" data-aos="fade-right">
        <h1>Fillo Ndryshimin <br> <span style="color:orange">SOT!</span></h1>
        <p>Trajnerë personalë, pajisje moderne dhe ambient motivues.</p>
      </div>

      <div class="kontakt-form" data-aos="fade-left">
        <h3>Na Dërgoni Mesazh 📩</h3>
        <form action="">
          <input type="text" placeholder="Emri juaj" class="kontakt-input" required>
          <input type="email" placeholder="Email-i juaj" class="kontakt-input" required>
          <input type="tel" placeholder="Numri i Telefonit" class="kontakt-input" required>
          <textarea placeholder="Mesazhi juaj..." rows="3" class="kontakt-input"></textarea>
          <button type="submit" class="kontakt-btn">DËRGO MESAZHIN</button>
        </form>
      </div>
    </div>
  </section>
</main>

<section class="map-section">
  <div class="map-card" data-aos="fade-up">
    <div class="map-header">
      <h3 id="nagjeni">NA GJENI TEK:</h3>
      <button id="btn-udhezime" class="btn-directions">
        📍 Merr Udhëzime
      </button>
    </div>

    <div id="mapi-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.5928503259615!2d21.167150700000004!3d42.648790700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec1b6ecb2c1%3A0x7f0893730efce187!2sFaculty%20of%20Technology!5e0!3m2!1sen!2s!4v1765804472914!5m2!1sen!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div id="udhezimet-text" style="display: none;">
      <div class="steps-container">
        <h4>Si të arrini tek E's GYM?</h4>

        <div class="step">
          <span class="icon">🚌</span>
          <p><strong>Me Autobus:</strong> Merrni linjën 4 ose 3. Zbrisni tek stacioni "Bregu i Diellit" ose "Fakulteti Teknik". Palestra është 2 minuta larg në këmbë.</p>
        </div>

        <div class="step">
          <span class="icon">🚗</span>
          <p><strong>Me Veturë:</strong> Nga qendra, ndiqni rrugën "Agim Ramadani" drejt Fakultetit Teknik. Kemi parking falas prapa ndërtesës.</p>
        </div>

        <div class="step">
          <span class="icon">🚶</span>
          <p><strong>Në Këmbë:</strong> Nëse jeni tek "Rruga B", ecni drejt rreth rrotullimit kryesor dhe ngjituni lart drejt pishinave.</p>
        </div>

        <br>
        <a href="https://maps.google.com" target="_blank" class="google-link">Hape direkt në Google Maps ➜</a>
      </div>
    </div>
  </div>
</section>

<div style="text-align: center; margin: 50px 0;" data-aos="fade-right">
  <button id="faq-toggle-btn" class="faq-main-btn">
    ❓ Keni pyetje? Klikoni këtu
  </button>
</div>

<section class="faq" id="faq-section" data-aos="fade-up" data-aos-delay="100">
  <div class="faq-container">
    <div class="faq-item">
      <div class="faq-pyetje">
        <h3>Sa kushton muaji?</h3>
        <span class="faq-plusi">+</span>
      </div>
      <div class="faq-pergjigjje">
        <p>Muaji kushton 20 Euro. Kemi edhe oferta speciale për studentë dhe pako vjetore me zbritje.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-pyetje">
        <h3>A keni trajner personal?</h3>
        <span class="faq-plusi">+</span>
      </div>
      <div class="faq-pergjigjje">
        <p>Po, kemi trajnerë profesionistë që mund t'i angazhoni ekstra për stërvitje private dhe plane diete.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-pyetje">
        <h3>Kur është hapur palestra?</h3>
        <span class="faq-plusi">+</span>
      </div>
      <div class="faq-pergjigjje">
        <p>Jemi hapur çdo ditë: Hënë-Premte (06:00-22:00) dhe në fundjavë me orar të shkurtuar.</p>
      </div>
    </div>
  </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>