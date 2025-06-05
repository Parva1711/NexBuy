<?php
session_start();

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputUser = test_input($_POST["username"] ?? '');
    $inputPass = test_input($_POST["password"] ?? '');

    if (empty($inputUser) || empty($inputPass)) {
        echo "<script>alert('Username and password are required.'); window.location.href='login.php';</script>";
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'nexbuy');

    if ($conn->connect_error) {
        echo "<script>alert('Connection failed.'); window.location.href='login.php';</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT username, email, password FROM signup WHERE username = ?");
    $stmt->bind_param("s", $inputUser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($inputPass, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("Location: hp.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Username not found.'); window.location.href='login.php';</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
