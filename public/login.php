<?php
// Establish database connection (replace dbname, username, password with actual values)
$connection = new mysqli('localhost', 'root', '', 'DBMS_mini_project');

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute SQL statement to retrieve user from database
$stmt = $connection->prepare("SELECT username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($dbUsername, $dbPassword);
$stmt->fetch();

// Verify password
if ($dbUsername && password_verify($password, $dbPassword)) {
    // echo "Login successful.";
    header("Location: ..\src\handler\landing.php");
} else {

    header("Location:index.html");
}

$stmt->close();
$connection->close();
?>
