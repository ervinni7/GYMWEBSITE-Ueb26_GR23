<?php
session_start();

$pageTitle   = 'All Club Access - Lifetime';
$pageScripts = ['/GYMWEBSITE-UEB26_GR23/Pjesa_JS/pakot.js'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';
    $price = (float) ($_POST['price'] ?? 0);
    $image = $_POST['image'] ?? '';
    $quantity = (int) ($_POST['quantity'] ?? 1);

    if ($quantity < 1) {
        $quantity = 1;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'image' => $image,
            'quantity' => $quantity
        ];
    }
}

require_once dirname(__DIR__) . '/headeri/header.php';
?>

<main class="product-page">
  <div class="product-container">
    <div class="product-image-box">
      <img src="/GYMWEBSITE-UEB26_GR23/assets/fotot/allacsses.png" alt="All Club Access - Lifetime">
    </div>

    <div class="product-info-box">
      <h1>All Club Access - Lifetime</h1>
      <p class="product-price">5 €</p>
      <p class="product-desc">
        Marrë abonimin e përhershëm për hyrje në të gjitha palestrat E's GYM.
        Ideale për klientë afatgjatë që kërkojnë qasje të pakufizuar.
      </p>

      <ul class="product-list">
        <li>✅ Hyrje në të gjitha lokacionet - përgjithmonë</li>
        <li>✅ Nuk ka pagesë mujore apo vjetore</li>
        <li>✅ Aktivizohet menjëherë pas pagesës</li>
        <li>✅ Kartë anëtarësimi fizike dhe dixhitale</li>
      </ul>

      <form method="POST" class="product-actions">
        <input type="hidden" name="id" value="all-club-access-lifetime">
        <input type="hidden" name="title" value="All Club Access - Lifetime">
        <input type="hidden" name="price" value="5">
        <input type="hidden" name="image" value="/GYMWEBSITE-UEB26_GR23/assets/fotot/allacsses.png">
        <input type="hidden" name="quantity" id="quantity-input" value="1">

        <div class="quantity">
          <button type="button" class="minus">-</button>
          <span class="number">1</span>
          <button type="button" class="plus">+</button>
        </div>

        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>

      <p class="product-note">Kjo pako ka vlefshmëri të përhershme dhe nuk skadon kurrë.</p>
      <a href="/GYMWEBSITE-UEB26_GR23/pages/pakot.php" class="back-link">← Kthehu te të gjitha pakot</a>
    </div>
  </div>
</main>

<script>
const minusBtn = document.querySelector(".minus");
const plusBtn = document.querySelector(".plus");
const numberEl = document.querySelector(".number");
const quantityInput = document.querySelector("#quantity-input");

let count = 1;

plusBtn.addEventListener("click", function () {
  count++;
  numberEl.textContent = count;
  quantityInput.value = count;
});

minusBtn.addEventListener("click", function () {
  if (count > 1) {
    count--;
    numberEl.textContent = count;
    quantityInput.value = count;
  }
});
</script>

<?php if (isset($_POST['add_to_cart'])): ?>
<script>
Swal.fire({
  icon: "success",
  text: "Keni shtuar <?= (int) $_POST['quantity'] ?> pako me sukses ✅",
  showConfirmButton: false,
  timer: 2000
});
</script>
<?php endif; ?>

<?php require_once dirname(__DIR__) . '/headeri/footeri.php'; ?>