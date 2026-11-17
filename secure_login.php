<?php
declare(strict_types=1);
mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "secure_review"
);
if ($conn->connect_errno) {
    error_log("Database connection failed");
    http_response_code(500);
    exit("A server error occurred.");
}
$conn->set_charset("utf8mb4");
session_set_cookie_params([
    "httponly" => true,
    "secure" => !empty($_SERVER["HTTPS"]),
    "samesite" => "Strict"
]);
session_start();
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim(
     (string)($_POST["username"] ?? "")
    );
    $password = (string)($_POST["password"] ?? "");
    if ($username === "" || $password === "") {
       $message = "Please enter your username and password.";
    } else {
       $stmt = $conn->prepare(
          "SELECT id, username, password_hash
          FROM users
          WHERE username = ?"
       );
       if (!$stmt) {
          error_log("Database query preparation failed");
          http_response_code(500);
          exit("A server error occurred.");
       }
       $stmt->bind_param("s", $username);
       $stmt->execute();
       $result = $stmt->get_result();
       $user = $result->fetch_assoc();
       $stmt->close();
       if (
            $user &&
            password_verify(
              $password,
              $user["password_hash"]
            )
       ) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = (int)$user["id"];
            $_SESSION["username"] = $user["username"];
            $message = "Login successful.";
       } else {
            $message = "Invalid username or password.";
       }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Login System</title>
</head>
<body>
    <h1>Secure Login System</h1>
    <form method="POST" action="">
       <label>Username:</label>
       <input
            type="text"
            name="username"
            autocomplete="username"
            required
       >
       <br><br>
       <label>Password:</label>
       <input
            type="password"
            name="password"
            autocomplete="current-password"
            required
       >
       <br><br>
       <button type="submit">
            Login
       </button>
    </form>
    <p>
       <?= htmlspecialchars(
            $message,
            ENT_QUOTES | ENT_SUBSTITUTE,
            "UTF-8"
       ) ?>
    </p>
</body>
</html>
