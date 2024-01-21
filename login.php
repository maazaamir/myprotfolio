<?php
// Make sure to replace these values with your actual database credentials
$host = 'your_database_host';
$user = 'your_database_user';
$password = 'your_database_password';
$database = 'your_database_name';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
        // You may redirect the user to another page here
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
