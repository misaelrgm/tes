<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
