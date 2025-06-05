<?php
session_start();

$products = [
  ['name' => 'Headphone', 'price' => 1579.00, 'image' => 'images/headphones.jpeg', 'features' => ['Wireless', 'Noise Cancelling', '20h Battery Life']],
  ['name' => 'Television', 'price' => 35799.00, 'image' => 'images/tv.jpeg', 'features' => ['50 inch 4K Display', 'Smart TV', 'HDR Support']],
  ['name' => 'Iphone 13', 'price' => 44999.00, 'image' => 'images/iphone 13.jpeg', 'features' => ['128GB Storage', 'Dual Camera', 'A15 Bionic Chip']],
  ['name' => 'Iphone 15', 'price' => 72999.00, 'image' => 'images/iphone 15.jpeg', 'features' => ['Dynamic Island', '48MP Camera', 'USB-C Charging']],
  ['name' => 'Monitor', 'price' => 15799.00, 'image' => 'images/monitor.jpeg', 'features' => ['27-inch IPS', '144Hz Refresh Rate', 'Adjustable Stand']],
  ['name' => 'PlayStation 5', 'price' => 49999.00, 'image' => 'images/ps5.jpeg', 'features' => ['8K Support', 'Ultra-fast SSD', 'DualSense Controller']],
  ['name' => 'Boat Earbuds', 'price' => 1299.00, 'image' => 'images/earbudes.jpeg', 'features' => ['Bluetooth 5.0', 'Water Resistant', 'Up to 5h Playtime']],
  ['name' => 'Samsung S24', 'price' => 50999.00, 'image' => 'images/s24.jpeg', 'features' => ['200MP Camera', 'AMOLED 2X Display', 'Snapdragon Gen 3']],
  ['name' => 'MacBook Air M2', 'price' => 99999.00, 'image' => 'images/mac.webp', 'features' => ['M2 Chip', '13.6-inch Retina Display', '18h Battery']],
  ['name' => 'Smartwatch Pro', 'price' => 7999.00, 'image' => 'images/swp.webp', 'features' => ['Heart Rate Monitor', 'AMOLED Display', 'GPS Tracking']],
  ['name' => 'Canon DSLR 1500D', 'price' => 34999.00, 'image' => 'images/canon.jpg', 'features' => ['24.1MP', 'Wi-Fi Support', 'EF-S Lens Kit']],
  ['name' => 'Bluetooth Speaker', 'price' => 2299.00, 'image' => 'images/speaker.webp', 'features' => ['Portable', 'Deep Bass', '8h Battery']],
  ['name' => 'Gaming Keyboard', 'price' => 1999.00, 'image' => 'images/kb.webp', 'features' => ['RGB Backlight', 'Mechanical Keys', 'Anti-Ghosting']],
  ['name' => 'External Hard Drive', 'price' => 4599.00, 'image' => 'images/hd.jpeg', 'features' => ['1TB Storage', 'USB 3.0', 'Compact Design']],
  ['name' => 'Wireless Mouse', 'price' => 999.00, 'image' => 'images/mouse.jpeg', 'features' => ['2.4GHz', '1200 DPI', 'Ergonomic Design']],
  ['name' => 'iPad 10th Gen', 'price' => 34999.00, 'image' => 'images/ipad.jpeg', 'features' => ['10.9-inch Display', 'A14 Chip', 'USB-C Port']],
  ['name' => 'Smart Home Camera', 'price' => 2499.00, 'image' => 'images/hcamera.jpeg', 'features' => ['Night Vision', '1080p Recording', 'WiFi Connectivity']],
  ['name' => 'Laptop Stand', 'price' => 899.00, 'image' => 'images/stand.webp', 'features' => ['Adjustable Height', 'Aluminum Build', 'Portable']],
  ['name' => 'Portable Projector', 'price' => 12499.00, 'image' => 'images/projector.jpeg', 'features' => ['1080p HD', 'Wi-Fi & Bluetooth', 'Built-in Speaker']],
  ['name' => 'USB-C Hub', 'price' => 1399.00, 'image' => 'images/usb.jpeg', 'features' => ['6-in-1 Ports', 'Fast Data Transfer', 'Compact Design']],
  ['name' => 'Noise Smart Glasses', 'price' => 5999.00, 'image' => 'images/glasses.jpeg', 'features' => ['Open Ear Speakers', 'Touch Control', 'UV Protection']],
  ['name' => 'Fitness Tracker Band', 'price' => 2499.00, 'image' => 'images/band.jpeg', 'features' => ['Heart Rate', 'Sleep Monitor', 'Waterproof']],
  ['name' => 'E-Book Reader', 'price' => 7999.00, 'image' => 'images/book.jpeg', 'features' => ['6-inch Display', 'Adjustable Light', 'Weeks of Battery']],
  ['name' => 'Mechanical Pencil', 'price' => 399.00, 'image' => 'images/pencil.jpeg', 'features' => ['0.5mm Lead', 'Eraser Tip', 'Stylish Grip']],
  ['name' => 'Smart Plug', 'price' => 899.00, 'image' => 'images/plug.jpeg', 'features' => ['Wi-Fi Enabled', 'Voice Control', 'Timer Function']],
  ['name' => 'VR Headset', 'price' => 29999.00, 'image' => 'images/vr.jpeg', 'features' => ['Immersive 3D', 'Built-in Audio', 'Wide Compatibility']],
  ['name' => 'Noise Cancelling Mic', 'price' => 2499.00, 'image' => 'images/mic.jpeg', 'features' => ['USB Connection', 'Clear Audio', 'Adjustable Arm']],
  ['name' => 'Portable Power Bank', 'price' => 1499.00, 'image' => 'images/powerbank.webp', 'features' => ['10000mAh Capacity', 'Dual USB Output', 'Fast Charging']]
];

// Handle AJAX Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax_add'])) {
  $productName = $_POST['ajax_add'];
  foreach ($products as $product) {
    if ($product['name'] === $productName) {
      $found = false;
      if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

      foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $productName) {
          $item['quantity']++;
          $found = true;
          break;
        }
      }

      if (!$found) {
        $_SESSION['cart'][] = ['name' => $product['name'], 'price' => $product['price'], 'quantity' => 1];
      }

      echo json_encode(['success' => true, 'total' => array_sum(array_column($_SESSION['cart'], 'quantity'))]);
      exit;
    }
  }

  echo json_encode(['success' => false]);
  exit;
}

// Find product
$productName = isset($_GET['name']) ? $_GET['name'] : '';
$selectedProduct = null;

foreach ($products as $product) {
  if ($product['name'] === $productName) {
    $selectedProduct = $product;
    break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $selectedProduct ? $selectedProduct['name'] : 'Product Not Found' ?> - NexBuy</title>
  <style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #ffe0b2; margin: 0; padding: 0; color: #333; }
    header { background-color: #222; color: #fff; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
    header .logo { font-size: 1.5rem; font-weight: bold; }
    header nav a { color: #fff; text-decoration: none; margin-left: 1.5rem; }
    header nav a:hover { color: white; }
    .brand-name { color: orange; }

    .container {
      max-width: 1000px;
      margin: 2rem auto;
      background-color: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      display: flex;
      gap: 2rem;
    }

    .product-image img {
      width: 300px;
      height: auto;
      border-radius: 10px;
    }

    .product-details h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .product-details p.price {
      font-size: 1.5rem;
      color: #e69500;
      margin-bottom: 1rem;
    }

    .product-details ul {
      list-style-type: disc;
      padding-left: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .add-to-cart-btn {
      background-color: orange;
      color: black;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }

    .add-to-cart-btn:hover {
      background-color:darkorange;
    }

    .back-btn {
      display: inline-block;
      margin-top: 1rem;
      background-color:orange;
      color:black;
      text-decoration: none;
      padding: 0.6rem 1.2rem;
      border-radius: 5px;
      font-size: 0.95rem;
      transition: background-color 0.3s ease;
    }

    .back-btn:hover {
      background-color:darkorange;
    }

    footer {
      background-color: #fbe9e7;
      color: black;
      text-align: center;
      padding: 1rem 2rem;
      margin-top: 3rem;
    }
  </style>
</head>
<body>

<header>
  <div class="logo"><span class="brand-name">NexBuy</span></div>
  <nav>
    <a href="hp.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php" id="cart-link">Cart (<span id="cart-count"><?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0 ?></span>)</a>
    <a href="au.php">About Us</a>
    <a href="contact.php">Contact</a>
    <a href="profile.php">Profile</a>
  </nav>
</header>

<?php if ($selectedProduct): ?>
  <div class="container">
    <div class="product-image">
      <img src="<?= $selectedProduct['image'] ?>" alt="<?= htmlspecialchars($selectedProduct['name']) ?>">
    </div>
    <div class="product-details">
      <h2><?= htmlspecialchars($selectedProduct['name']) ?></h2>
      <p class="price">₹<?= number_format($selectedProduct['price'], 2) ?></p>
      <ul>
        <?php foreach ($selectedProduct['features'] as $feature): ?>
          <li><?= htmlspecialchars($feature) ?></li>
        <?php endforeach; ?>
      </ul>
      <button class="add-to-cart-btn" data-product="<?= htmlspecialchars($selectedProduct['name']) ?>">Add to Cart</button>
      <br>
      <a href="shop.php" class="back-btn">Back to Shop</a>
    </div>
  </div>
<?php else: ?>
  <div style="text-align: center; padding: 4rem;">
    <h2>Product not found.</h2>
    <p><a href="shop.php">Back to Shop</a></p>
  </div>
<?php endif; ?>

<footer>
  <p>&copy; 2025 NexBuy. All rights reserved.</p>
</footer>

<script>
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
  button.addEventListener('click', function () {
    const product = this.getAttribute('data-product');
    fetch('product.php?name=' + encodeURIComponent(product), {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: new URLSearchParams({ ajax_add: product })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        document.getElementById('cart-count').textContent = data.total;
        alert(`${product} added to cart!`);
      } else {
        alert('Failed to add product.');
      }
    })
    .catch(() => alert('Error occurred.'));
  });
});
</script>

</body>
</html>
