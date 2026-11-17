<?php
$password = "ChangeThisDemoPassword!";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Password: " . htmlspecialchars($password) . "<br>";
echo "Password Hash: " . htmlspecialchars($hash);
?>
