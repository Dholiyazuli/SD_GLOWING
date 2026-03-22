<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Your Cart - Glowing</title>

<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background: #f5f7f6;
  margin: 0;
}

/* HEADER */
.cart-header {
  background: white;
  padding: 20px;
  text-align: center;
  font-size: 22px;
  font-weight: 600;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

/* CONTAINER */
.cart-container {
  width: 85%;
  margin: auto;
  padding: 30px 0;
}

/* CART ITEM */
.cart-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: white;
  padding: 15px;
  margin-bottom: 15px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: 0.3s;
}

.cart-item:hover {
  transform: translateY(-3px);
}

/* IMAGE */
.product-img {
  width: 90px;
  height: 90px;
  border-radius: 10px;
  object-fit: cover;
}

/* DETAILS */
.cart-details {
  flex: 1;
  margin-left: 20px;
}

.cart-details h3 {
  margin: 0;
  font-size: 18px;
}

/* QTY */
.qty-box {
  display: flex;
  align-items: center;
  margin-top: 10px;
}

.qty-btn {
  background: #1b5e20;
  color: white;
  border: none;
  padding: 5px 12px;
  cursor: pointer;
  border-radius: 5px;
}

.qty-btn:hover {
  background: #2e7d32;
}

.qty {
  width: 40px;
  text-align: center;
  margin: 0 10px;
}

/* RIGHT SIDE */
.cart-right {
  text-align: right;
}

.remove-btn {
  background: #ff4d4d;
  border: none;
  padding: 6px 10px;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

/* SUMMARY */
.cart-summary {
  background: white;
  padding: 20px;
  border-radius: 12px;
  margin-top: 30px;
  text-align: right;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.checkout-btn {
  background: #1b5e20;
  color: white;
  border: none;
  padding: 12px 25px;
  font-size: 16px;
  border-radius: 8px;
  cursor: pointer;
  margin-top: 10px;
}

.checkout-btn:hover {
  background: #2e7d32;
}

/* EMPTY */
.empty {
  text-align: center;
  margin-top: 50px;
  font-size: 18px;
}
</style>

</head>
<body>

<div class="cart-header">🛒 Your Cart</div>

<div class="cart-container">

<?php if(count($cart) > 0): ?>

  <?php foreach($cart as $item): ?>
    <div class="cart-item">

      <img src="<?= $item['image'] ?>" class="product-img">

      <div class="cart-details">
        <h3><?= $item['name'] ?></h3>
        <p>₹ <span class="price"><?= $item['price'] ?></span></p>

        <div class="qty-box">
          <button class="qty-btn minus">-</button>
          <input type="text" value="<?= $item['qty'] ?>" class="qty">
          <button class="qty-btn plus">+</button>
        </div>
      </div>

      <div class="cart-right">
        <p>Total: ₹ <span class="total"><?= $item['price'] * $item['qty'] ?></span></p>
        <button class="remove-btn">Remove</button>
      </div>

    </div>
  <?php endforeach; ?>

  <div class="cart-summary">
    <h3>Grand Total: ₹ <span id="grandTotal">0</span></h3>
    <button class="checkout-btn">Proceed to Checkout</button>
  </div>

<?php else: ?>
  <div class="empty">Your cart is empty 😢</div>
<?php endif; ?>

</div>

<script>
function updateCart() {
  let grandTotal = 0;

  document.querySelectorAll(".cart-item").forEach(item => {
    let price = parseInt(item.querySelector(".price").innerText);
    let qty = parseInt(item.querySelector(".qty").value);

    let total = price * qty;
    item.querySelector(".total").innerText = total;

    grandTotal += total;
  });

  document.getElementById("grandTotal").innerText = grandTotal;
}

// PLUS
document.querySelectorAll(".plus").forEach(btn => {
  btn.addEventListener("click", function() {
    let qty = this.parentElement.querySelector(".qty");
    qty.value = parseInt(qty.value) + 1;
    updateCart();
  });
});

// MINUS
document.querySelectorAll(".minus").forEach(btn => {
  btn.addEventListener("click", function() {
    let qty = this.parentElement.querySelector(".qty");
    if (qty.value > 1) {
      qty.value = parseInt(qty.value) - 1;
      updateCart();
    }
  });
});

// REMOVE
document.querySelectorAll(".remove-btn").forEach(btn => {
  btn.addEventListener("click", function() {
    this.closest(".cart-item").remove();
    updateCart();
  });
});

updateCart();
</script>

</body>
</html>