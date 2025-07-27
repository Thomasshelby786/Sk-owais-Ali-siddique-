
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search - Godfather Panel</title>
    <style>
        body { background: #111; color: #fff; font-family: Arial; text-align: center; margin-top: 50px; }
        input[type="text"] { padding: 10px; width: 300px; }
        input[type="submit"] { padding: 10px 20px; background: #0f0; color: #000; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #ff0; }
    </style>
</head>
<body>
    <h2>Search Users 🔍</h2>
    <form method="GET">
        <input type="text" name="q" placeholder="Enter username..." required>
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['q'])) {
        $search = $_GET['q'];
        $sql = "SELECT * FROM users WHERE username LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Results:</h3>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>👤 " . htmlspecialchars($row['username']) . "</p>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
    }
    ?>
</body>
</html>
