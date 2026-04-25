<?php
session_start();

$pageTitle = 'Pako Diasporë';
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

    $successQuantity = $quantity;
}

require_once dirname(__DIR__) . '/headeri/header.php';
?>

<main class="product-page">
  <div class="product-container">
    
    <div class="product-image-box">
      <img src="/GYMWEBSITE-UEB26_GR23/assets/fotot/diaspora.png" alt="Pako mujore për Diasporë">
    </div>

    <div class="product-info-box">
      <h1>Pako Mujore për Diasporë</h1>
      <p class="product-price">19.99 €</p>
      <p class="product-desc">
        Pakoja ideale për ata që vijnë për një kohë të shkurtër në Kosovë dhe duan të qëndrojnë aktiv.
      </p>

      <ul class="product-list">
        <li>✅ Hyrje 24/7 në të gjitha lokacionet</li>
        <li>✅ Pa kontratë afatgjatë</li>
        <li>✅ Qasje në klasat bazike të grupit</li>
        <li>✅ Mundësi rinovimi pa pagesë regjistrimi</li>
      </ul>

      <form method="POST" class="product-actions">
        <input type="hidden" name="id" value="pakodiaspora">
        <input type="hidden" name="title" value="Pako Mujore për Diasporë">
        <input type="hidden" name="price" value="19.99">
        <input type="hidden" name="image" value="/GYMWEBSITE-UEB26_GR23/assets/fotot/diaspora.png">
        <input type="hidden" name="quantity" id="quantity-input" value="1">

        <div class="quantity">
          <button type="button" class="minus">-</button>
          <span class="number">1</span>
          <button type="button" class="plus">+</button>
        </div>

        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>

      <p class="product-note">
        Pako bëhet aktive nga momenti i pagesës dhe zgjat 30 ditë.
      </p>

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