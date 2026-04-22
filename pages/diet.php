<?php
session_start();
$pageTitle   = 'Dietat';
$pageScripts = ['/gym-php-v2/assets/js/diet.js'];
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section aria-label="Përmbledhje e dietave" class="intro-section">
  <h1>Përmbledhje Dietash</h1>
  <div class="intro-layout">
    <div class="intro-text">
      <p><e>Të hash një dietë të shëndetshme dhe të ekuilibruar është një pjesë e rëndësishme e ruajtjes së shëndetit të mirë dhe mund t'ju ndihmojë të ndiheni më mirë. Kjo do të thotë të hani një shumëllojshmëri ushqimesh në përmasat e duhura dhe të konsumoni sasinë e duhur të ushqimit dhe pijeve për të arritur dhe mbajtur një peshë të shëndetshme trupore.</e></p>
      <p><e>Adoptimi i një mënyre të shëndetshme të të ushqyerit është një investim afatgjatë në mirëqenie dhe energji ditore. Dieta nuk ka për qëllim privimin, por balancimin e sasisë së ushqimit sipas nevojave të trupit. Çdo trup është unik — disa kërkojnë më shumë kalori për rritje muskulare, të tjerë fokusohen në humbje peshe ose thjesht në mbajtjen e një forme të qëndrueshme. Duke kuptuar gjendjen fizike fillestare dhe qëllimin që synoni, ju mund të përcaktoni më lehtë stilin ushqimor dhe planin e dietës që i përshtatet më së miri ritmit tuaj të jetës. Në bazë të qëllimit tuaj - humbje peshe, shtim mase apo mirëmbajtje - ju mund të zgjidhni një nga dietat tona të strukturuara. Përdor kalkulatorin BMI në të majtë për të pasur një ide më të qartë rreth gjendjes tënde trupore.</e></p>

      <div class="highlights">
        <span class="chip">🍎 Ushqim i balancuar</span>
        <span class="chip">⚖️ Kontroll peshe</span>
        <span class="chip">💪 Shtim mase</span>
        <span class="chip">🔥 Humbje dhjami</span>
      </div>

      <div class="mini-stats">
        <div class="stat"><div class="num">6</div><div class="label">Dieta të strukturuara</div></div>
        <div class="stat"><div class="num">BMI</div><div class="label">Kalkulator i shpejtë</div></div>
        <div class="stat"><div class="num">1-2</div><div class="label">Min për zgjedhje</div></div>
      </div>

      <a class="cta-link" href="#diet-list">Zgjidh dietën tënde →</a>
    </div>

    <section class="tools-section" aria-label="Vegla fitnesi">
      <h2>Kalkulatori BMI</h2>
      <p>Përdor këtë kalkulator të thjeshtë për të llogaritur indeksin e masës trupore (BMI). Kjo nuk zëvendëson këshillën e mjekut, por të jep një ide të përgjithshme për trupin tënd.</p>
      <form id="bmi-form" class="bmi-form">
        <div class="form-row">
          <label for="height">Gjatësia (cm):</label>
          <input type="number" id="height" min="80" max="230" placeholder="Shkruani gjatësin...">
        </div>
        <div class="form-row">
          <label for="weight">Pesha (kg):</label>
          <input type="number" id="weight" min="30" max="250" placeholder="Shkruani peshën...">
        </div>
        <button type="submit">Llogarit BMI</button>
      </form>
      <p id="bmi-result" class="bmi-message"></p>
    </section>
  </div>
</section>

<div class="divider"></div>

<section id="diet-list">
  <h2>Dietat</h2>
  <div class="diet-item" data-target="bulking"><h3>Bulking💪</h3><p>Shtim mase muskulore • 8-12 javë</p></div>
  <div class="diet-item" data-target="cutting"><h3>Cutting🔥</h3><p>Humbje dhjami • 6-12 javë</p></div>
  <div class="diet-item" data-target="mirembajtje"><h3>Mirëmbajtje🧘</h3><p>Ruajtje peshe • Vazhdueshëm</p></div>
  <div class="diet-item" data-target="vegjetarian"><h3>Vegjetarian🥦</h3><p>Ushqim bimor • Vazhdueshëm</p></div>
  <div class="diet-item" data-target="highprotein"><h3>High-Protein🍗</h3><p>Proteinë e lartë • 5-10 javë</p></div>
  <div class="diet-item" data-target="lowcarb"><h3>Low-Carb🥗</h3><p>Karbo të ulëta • 6-10 javë</p></div>
</section>

<section id="diet-details">
  <h2>Detajet e dietave</h2>

  <div id="diet-bulking" class="diet-card">
    <h3>Bulking — Shtim muskujsh</h3>
    <table class="diet-detail">
      <tr><th>Qëllimi</th><td>Shtim mase muskulore me surplus kalorik</td></tr>
      <tr><th>Kalori</th><td>+300-500 kcal mbi nevojën ditore</td></tr>
      <tr><th>Proteinë</th><td>1.6-2.2 g/kg peshë trupore</td></tr>
      <tr><th>Karbohidrate</th><td>Të larta (para dhe pas stërvitjes)</td></tr>
      <tr><th>Yndyrna</th><td>20-30% e kalorive totale</td></tr>
      <tr><th>Rekomandim stërvitje</th><td>4-5 ditë peshë, fokus progresiv overload</td></tr>
    </table>
    <h4>Shembull dite</h4>
    <ul>
      <li>Mëngjes: Tërshërë + qumësht + banane + arra</li>
      <li>Drekë: Pulë e pjekur + oriz + sallatë</li>
      <li>Snack: Kos + fruta të thata</li>
      <li>Pas stërvitjes: Shaker proteine + banane</li>
      <li>Darkë: Salmon + patate të pjekura + perime</li>
    </ul>
  </div>

  <div id="diet-cutting" class="diet-card">
    <h3>Cutting — Humbje dhjamë</h3>
    <table class="diet-detail">
      <tr><th>Qëllimi</th><td>Reduktim dhjami duke ruajtur sa më shumë muskul</td></tr>
      <tr><th>Kalori</th><td>-300-500 kcal nën nevojën ditore</td></tr>
      <tr><th>Proteinë</th><td>2.0-2.5 g/kg peshë trupore</td></tr>
      <tr><th>Karbohidrate</th><td>Mesatare, të fokusuar rreth stërvitjes</td></tr>
      <tr><th>Yndyrna</th><td>20-25% e kalorive</td></tr>
      <tr><th>Këshilla</th><td>Monitoro peshën 1x në javë, mos e ul shumë shpejt</td></tr>
    </table>
    <h4>Shembull dite</h4>
    <ul>
      <li>Mëngjes: Kos grek + manaferra + pak bajame</li>
      <li>Drekë: Fileto pule + sallatë jeshile + quinoa</li>
      <li>Snack: Mollë + gjysmë grushti arra</li>
      <li>Pas stërvitjes: Shaker proteine</li>
      <li>Darkë: Peshk i pjekur + perime të ziera</li>
    </ul>
  </div>

  <div id="diet-maintenance" class="diet-card">
    <h3>Mirëmbajtje — Ruajtje peshe</h3>
    <table class="diet-detail">
      <tr><th>Qëllimi</th><td>Mbajtja e peshës aktuale dhe energjisë ditore</td></tr>
      <tr><th>Kalori</th><td>Rreth nevojës ditore</td></tr>
      <tr><th>Proteinë</th><td>1.6-2.0 g/kg</td></tr>
      <tr><th>Karbohidrate</th><td>Të balancuara sipas aktivitetit</td></tr>
      <tr><th>Yndyrna</th><td>25-30% e kalorive</td></tr>
      <tr><th>Fleksibilitet</th><td>Mund të përfshihen "cheat meals" të kontrolluara</td></tr>
    </table>
    <h4>Shembull jave</h4>
    <ul>
      <li>2 vakte me peshk</li><li>2 vakte me mish pule/gjeli</li>
      <li>1 vakt me mish të kuq të ligët</li><li>Perime çdo ditë + fruta 1-2x në ditë</li>
    </ul>
  </div>

  <div id="diet-veg" class="diet-card">
    <h3>Vegjetarian — Ushqim bimor</h3>
    <table class="diet-detail">
      <tr><th>Qëllimi</th><td>Reduktim mase trupore dhe stil më i shëndetshëm</td></tr>
      <tr><th>Kalori</th><td>Sipas qëllimit (deficit ose mirëmbajtje)</td></tr>
      <tr><th>Proteinë</th><td>1.6-2.2 g/kg nga burime bimore</td></tr>
      <tr><th>Burime proteine</th><td>Thjerrëza, qiqra, tofu, fasule, qumësht soje</td></tr>
      <tr><th>Karbohidrate</th><td>Të larta nga drithëra dhe fruta</td></tr>
      <tr><th>Yndyrna</th><td>Arra, fara chia, vaj ulliri</td></tr>
    </table>
    <h4>Shembull dite</h4>
    <ul>
      <li>Mëngjes: Tërshërë me qumësht soje + fruta</li><li>Drekë: Oriz integral + thjerrëza + sallatë</li>
      <li>Snack: Fara + arra miks</li><li>Darkë: Tofu i pjekur + perime në zgarë</li>
    </ul>
  </div>

