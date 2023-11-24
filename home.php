<?php 

include "db.php";

$db = new Database();

if (isset($_POST['knopje'])) {
    $db->insert($_POST['name'], $_POST['email']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="submit" name="knopje">
    </form>
</body>
</html>