<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    echo "<script>alert('Please log in first.'); window.location.href='login.php';</script>";
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NexBuy - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffe0b2;
            color: black;
            margin: 0;
            padding: 0;
        }

        header {
            background: black;
            color: orange;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5em;
          
        }

        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
          
        }
        
        .profile-card {
            max-width: 500px;
            margin: 3em auto;
            background: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(255, 165, 0, 0.6);
            text-align: center;
        }

        .profile-card img {
            border-radius: 50%;
            border: 3px solid orange;
            width: 100px;
            height: 100px;
            margin-bottom: 1em;
        }

        .profile-card h2 {
            margin-bottom: 0.5em;
            color: #333;
        }

        .profile-card p {
            font-size: 1.1em;
            color: #555;
        }

        .logout-btn {
            display: inline-block;
            margin-top: 1.5em;
            padding: 0.6em 1.4em;
            background-color: orange;
            color: black;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: darkorange;
        }

        footer {
            text-align: center;
            padding: 1em;
            background: #fbe9e7;
            margin-top: 4em;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">NexBuy</div>
    <nav>
        <a href="hp.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="cart.php">Cart</a>
        <a href="au.php">About Us</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<div class="profile-card">
    <img src="images/profile.png" alt="Profile Picture" />
    <h2><?php echo htmlspecialchars($username); ?></h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<footer>
    <p>&copy; <span id="year"></span> NexBuy. All rights reserved.</p>
</footer>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

</body>
</html>
