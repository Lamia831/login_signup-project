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
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful! <a href='login.php'>Login here</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
