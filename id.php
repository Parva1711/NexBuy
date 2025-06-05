<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NexBuy - Elevate Your Tech Life</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #ffe0b2;
      color: #333;
      overflow-x: hidden;
    }

    header {
      background-color: #222;
      color: #fff;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    header nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 1.5rem;
    }

    header nav a:hover {
      color: orange;
    }

    .brand-name {
      color: orange;
    }

    .hero {
      background: linear-gradient(135deg, #ff9800 20%, #ffe0b2 100%);
      text-align: center;
      padding: 100px 20px;
      animation: fadeIn 1.5s ease-in-out;
      color: #111;
    }

    .hero h1 {
      font-size: 3.2rem;
      margin-bottom: 0.8rem;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 2rem;
    }

    .hero a {
      background-color: black;
      color: orange;
      padding: 0.8rem 1.8rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s ease;
    }

    .hero a:hover {
      background-color: orange;
      color: black;
    }

    .features {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 2rem;
      padding: 70px 20px;
      background-color: #fff3e0;
    }

    .feature {
      background: #fff;
      border-radius: 10px;
      padding: 2rem;
      width: 280px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .feature:hover {
      transform: translateY(-10px);
    }

    .feature i {
      font-size: 2.5rem;
      color: orange;
      margin-bottom: 0.7rem;
    }

    .feature h3 {
      margin-bottom: 0.5rem;
      color: #e65100;
    }

    .feature p {
      font-size: 0.95rem;
      color: #555;
    }

    footer {
      background-color: #fbe9e7;
      color: black;
      text-align: center;
      padding: 1.5rem 2rem;
      margin-top: 3rem;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      .hero h1 { font-size: 2.2rem; }
      .feature { width: 90%; }
    }
  </style>

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/a2e0c6d5e9.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
  <div class="logo"><span class="brand-name">NexBuy</span></div>
  <nav>
    <a href="hp.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="login.php">Login</a>
    <a href="signup.php">Signup</a>
    <a href="contact.php">Contact</a>
  </nav>
</header>

<section class="hero">
  <h1>Redefining the Way You Shop</h1>
  <p>Smart gadgets, lightning deals, and seamless service — experience a smarter shopping world with NexBuy.</p>
  <a href="shop.php">Explore Products</a>
</section>

<section class="features">
  <div class="feature">
    <i class="fas fa-shipping-fast"></i>              
    <h3>🛍️ Best Deals</h3>
    <p>Enjoy discounts and special offers every day.</p>
  </div>
  <div class="feature">
    <i class="fas fa-crown"></i>
    <h3>🔒 Secure Payment</h3>
    <p>Shop confidently with safe and encrypted transactions.</p>
  </div>
  <div class="feature">
    <i class="fas fa-headset"></i>
    <h3>🚚 Fast Delivery</h3>
    <p>Quick shipping across the country to your doorstep.</p>
  </div>
</section>

<footer>
  <p>&copy; 2025 NexBuy. All rights reserved.</p>
</footer>

</body>
</html>
