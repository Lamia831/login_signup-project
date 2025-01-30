<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "user_db";

// Connect to database
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user data
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful! Welcome, " . $row['fullname'];
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
