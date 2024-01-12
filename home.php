<?php 

session_start();

echo "<br>";

if (isset($_SESSION['loggedin'])) {
    $username = $_SESSION['username'];
    echo("<h1>You are logged in $username</h1>");
} else {
    echo("<h1>You are not logged in</h1>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/formstyle.css">
</head>
<body>
    <nav id="navbar">
        <a href="http://localhost/PDO/y2/p2/pdo/">Home</a>
        <a href="registration.php">Register</a>
        <a href="login.php">Login</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>