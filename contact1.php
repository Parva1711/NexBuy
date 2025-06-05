<?php

$host = "localhost";        
$username = "root";              
$password = "";                  
$dbnamme   = "nexbuy";            

$conn = new mysqli($host, $username, $password, $dbnamme);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize POST data
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$message = htmlspecialchars(trim($_POST['message']));

// Validate inputs
if (empty($name) || empty($email) || empty($message)) {
    die("All fields are required.");
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Execute and check
if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
