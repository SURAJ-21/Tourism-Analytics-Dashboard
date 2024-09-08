<?php
// Establish database connection (replace dbname, username, password with actual values)
$connection = new mysqli('localhost', 'root', '', 'DBMS_mini_project');
// "localhost","root","","tourism"
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash password for security (you should use a stronger hashing algorithm)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement to insert user into database
$stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    // echo "User registered successfully.";
    header("Location: config\landing.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$connection->close();
?>
