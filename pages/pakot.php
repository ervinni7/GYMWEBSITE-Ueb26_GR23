<?php
session_start();

$pageTitle   = 'Pakot';
$pageScripts = ['/gym-php-v2/assets/js/pakot.js'];

/* Shtimi ne shporte me PHP */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id    = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            'id'       => $id,
            'title'    => $title,
            'price'    => $price,
            'image'    => $image,
            'quantity' => 1
        ];
    }

    $successMessage = "Produkti u shtua në shportë.";
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<section id="pricing" class="shop-section" data-aos="fade-up">
  <h1 data-aos="fade-up">Shop</h1>
  <p class="shop-subtitle" data-aos="fade-up">Zgjedh pakon që i përshtatet qëllimeve të tua</p>

  <?php if (!empty($successMessage)): ?>
    <p style="color: lime; text-align:center; margin-bottom:20px;">
      <?= $successMessage ?>
    </p>
  <?php endif; ?>

  <div class="pakot-grid">

    <div class="pako-card" data-aos="fade-up" data-aos-delay="0">
      <a href="/gym-php-v2/pages/pakodiaspora.php" class="pako-link">
        <img src="/gym-php-v2/assets/fotot/diaspora.png" alt="Pako mujore për diasporë">
      </a>
      <p class="pako-title">PAKO MUJORE PËR DIASPORË</p>
      <p class="pako-price">19.99 €</p>

      <form method="POST">
        <input type="hidden" name="id" value="diaspora">
        <input type="hidden" name="title" value="PAKO MUJORE PËR DIASPORË">
        <input type="hidden" name="price" value="19.99">
        <input type="hidden" name="image" value="/gym-php-v2/assets/fotot/diaspora.png">
        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>
    </div>

    <div class="pako-card" data-aos="fade-up" data-aos-delay="100">
      <a href="/gym-php-v2/pages/1vitantarsim.php" class="pako-link">
        <img src="/gym-php-v2/assets/fotot/1vitantarsim.png" alt="Oferta 1 vit / 2 persona">
      </a>
      <p class="pako-title">1 VIT ANËTARËSIM - 2 PERSONA</p>
      <p class="pako-price">150 €</p>

      <form method="POST">
        <input type="hidden" name="id" value="1vit-2persona">
        <input type="hidden" name="title" value="1 VIT ANËTARËSIM - 2 PERSONA">
        <input type="hidden" name="price" value="150">
        <input type="hidden" name="image" value="/gym-php-v2/assets/fotot/1vitantarsim.png">
        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>
    </div>

    <div class="pako-card" data-aos="fade-up" data-aos-delay="200">
      <a href="/gym-php-v2/pages/oferta3n1.php" class="pako-link">
        <img src="/gym-php-v2/assets/fotot/1vit3.png" alt="Oferta 3 në 1">
      </a>
      <p class="pako-title">OFERTA 3 NË 1</p>
      <p class="pako-price">180 €</p>

      <form method="POST">
        <input type="hidden" name="id" value="oferta3n1">
        <input type="hidden" name="title" value="OFERTA 3 NË 1">
        <input type="hidden" name="price" value="180">
        <input type="hidden" name="image" value="/gym-php-v2/assets/fotot/1vit3.png">
        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>
    </div>

    <div class="pako-card" data-aos="fade-up" data-aos-delay="300">
      <a href="/gym-php-v2/pages/allacsses.php" class="pako-link">
        <img src="/gym-php-v2/assets/fotot/allacsses.png" alt="All Club Access">
      </a>
      <p class="pako-title">ALL CLUB ACCESS - LIFETIME</p>
      <p class="pako-price">5 €</p>

      <form method="POST">
        <input type="hidden" name="id" value="all-access">
        <input type="hidden" name="title" value="ALL CLUB ACCESS - LIFETIME">
        <input type="hidden" name="price" value="5">
        <input type="hidden" name="image" value="/gym-php-v2/assets/fotot/allacsses.png">
        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>
    </div>

  </div>
</section>
<hr>

<script>
$(function() {
  $(".pako-card").on("mouseenter", function() {
    $(this).find("img").stop(true).animate({ width: "105%" }, 250);
  });

  $(".pako-card").on("mouseleave", function() {
    $(this).find("img").stop(true).animate({ width: "100%" }, 250);
  });

  $(".pako-buton").on("click", function() {
    const btn = $(this);
    btn.stop(true).text("Added ✓")
      .animate({ opacity: 0.4 }, 150).animate({ opacity: 1 }, 150)
      .animate({ opacity: 0.4 }, 150).animate({ opacity: 1 }, 150);

    setTimeout(() => btn.text("Add To Cart"), 2000);
  });
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>

/* Dirname tregon rrugen e folderit per cilin file na duhet */