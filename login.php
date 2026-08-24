<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connection.php';
session_start();

print "<h1>This is a heading</h1>"; 
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['full_name'] = $user['username'];
    header("Location: welcome.php");
    exit();
} else {
    echo "Invalid username or password. <a href='index.php'>Try again</a>";
}

$conn->close();
?>