<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NexBuy - Home</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }

    header {
      background-color: #222;
      color: orange;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 1.5rem;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: white;
    }

    .profile-link {
      display: inline-block;
    }

    .profile-pic {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      border: 2px solid orange;
    }

    .brand-name {
      color: orange;
    }

    .hero {
      padding: 5rem 2rem;
      text-align: center;
      background: linear-gradient(135deg, #ffe0b2, #fff3e0);
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .hero .user-greeting {
      font-size: 1.5rem;
      margin-top: 0.5rem;
      color: #444;
    }

    .hero p {
      font-size: 1.2rem;
      color: #666;
      max-width: 600px;
      margin: 1rem auto 2rem;
    }

    .cta-button {
      background-color: orange;
      color: black;
      border: none;
      padding: 0.8rem 1.5rem;
      font-size: 1.1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .cta-button:hover {
      background-color: darkorange;
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2rem;
      padding: 3rem 2rem;
      background-color: #fff8e1;
    }

    .feature-box {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      max-width: 300px;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .feature-box:hover {
      transform: translateY(-5px);
    }

    .feature-box h3 {
      color: orange;
      margin-bottom: 1rem;
    }

    .feature-box p {
      color: #555;
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
    <div class="logo">NexBuy</div>
    <nav>
      <a href="cart.php">Cart</a>
      <a href="au.php">About Us</a>
      <a href="contact.php">Contact</a>
      <a href="profile.php" class="profile-link">Profile</a>
    </nav>
  </header>

  <section class="hero">
    <h1>Welcome to <span class="brand-name">NexBuy</span></h1>
    <div class="user-greeting">Hello, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> 👋</div>
    <p>Your one-stop shop for the latest and greatest in electronics and lifestyle products. Enjoy seamless shopping with style.</p>
    <button class="cta-button" onclick="window.location.href='shop.php'">Start Shopping</button>
  </section>

  <section class="features">
    <div class="feature-box">
      <h3>🚚 Fast Shipping</h3>
      <p>Get your orders delivered in record time with our express delivery options.</p>
    </div>
    <div class="feature-box">
      <h3>🔒 Secure Payment</h3>
      <p>Shop with confidence using our trusted and encrypted payment systems.</p>
    </div>
    <div class="feature-box">
      <h3>⏰🗓️ 24/7 Support</h3>
      <p>Need help? Our customer support team is here for you anytime, anywhere.</p>
    </div>
  </section>

  
  <footer>
    <p>&copy; <span id="year"></span> NexBuy. All rights reserved.</p>
  </footer>

  
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>

</body>
</html>
