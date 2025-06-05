<?php
session_start();

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = test_input($_POST["username"] ?? '');
    $email = test_input($_POST["email"] ?? '');
    $password = test_input($_POST["password"] ?? '');

    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.location.href='signup.php';</script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.location.href='signup.php';</script>";
        exit();
    } 

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "nexbuy");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check for existing username or email
    $check = $conn->prepare("SELECT id FROM signup WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username or email already exists.'); window.location.href='signup.php';</script>";
        $check->close();
        $conn->close();
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO signup (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        echo "<script>alert('Signup successful!'); window.location.href='hp.php';</script>";
    } else {
        echo "<script>alert('Error: Could not register.'); window.location.href='signup.php';</script>";
    }

    $stmt->close();
    $check->close();
    $conn->close();
}
?>
