<?php
session_start();

$pageTitle   = 'Oferta 3 në 1';
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
      <img src="/GYMWEBSITE-UEB26_GR23/assets/fotot/1vit3.png" alt="Oferta 3 në 1">
    </div>

    <div class="product-info-box">
      <h1>Oferta 3 në 1</h1>
      <p class="product-price">180 €</p>
      <p class="product-desc">
        Paketa ideale për 3 persona për një vit të plotë trajnimi.
        Çmimi më ekonomik për grupe familjare ose miq që duan të ushtrojnë së bashku.
      </p>

      <ul class="product-list">
        <li>✅ Anëtarësim për 3 persona për 12 muaj</li>
        <li>✅ Hyrje në të gjitha lokacionet gjatë orarit të punës</li>
        <li>✅ 3 karta anëtarësimi të veçanta</li>
        <li>✅ Akses në klasat bazike të grupit</li>
        <li>✅ Zbritje për shërbime ekstra dhe suplemente</li>
      </ul>

      <form method="POST" class="product-actions">
        <input type="hidden" name="id" value="oferta-3-ne-1">
        <input type="hidden" name="title" value="Oferta 3 në 1">
        <input type="hidden" name="price" value="180">
        <input type="hidden" name="image" value="/GYMWEBSITE-UEB26_GR23/assets/fotot/1vit3.png">
        <input type="hidden" name="quantity" id="quantity-input" value="1">

        <div class="quantity">
          <button type="button" class="minus">-</button>
          <span class="number">1</span>
          <button type="button" class="plus">+</button>
        </div>

        <button type="submit" name="add_to_cart" class="pako-buton">Add To Cart</button>
      </form>

      <p class="product-note">
        Pako bëhet aktive nga momenti i pagesës dhe vlen 12 muaj për të tre personat.
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