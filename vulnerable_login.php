<?php
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "secure_review"
);
if ($conn->connect_error) {
    die("Database error: " . $conn->connect_error);
}
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$sql = "SELECT * FROM users
       WHERE username = '$username'
       AND password_hash = '$password'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    echo "Welcome " . $username;
} else {
    echo "Invalid login";
}
?>
