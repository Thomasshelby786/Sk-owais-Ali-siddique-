<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Godfather Panel</title>
    <style>
        body { font-family: Arial; background: #1a1a1a; color: white; text-align: center; margin-top: 100px; }
        input { padding: 10px; margin: 10px; width: 200px; }
        .btn { background: #0f0; color: #000; cursor: pointer; }
        .btn:hover { background: #ff0; }
    </style>
</head>
<body>
    <h2>Login to Godfather Panel</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="👤 Username" required><br>
        <input type="password" name="password" placeholder="🔒 Password" required><br>
        <input type="submit" value="Login" class="btn">
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
