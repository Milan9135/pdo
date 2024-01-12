<?php 

include "db.php";

$db = new Database();

$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
$username = htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');

if (isset($_GET['knopje'])) {
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
    $db->update($id, $username, $email);
    header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update row</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h2>Edit the information</h2>
<form method="GET">
        <label for="id">id:</label>
        <?php echo("<input type='text' name='id' value='$id'>"); ?>
        <label for="name">name:</label>
        <?php echo("<input type='text' name='username' value='$username'>"); ?>
        <label for="email">email:</label>
        <?php echo("<input type='email' name='email' value='$email'>"); ?>
        <input type="submit" name="knopje" value="update">
    </form>
    <a href="home.php">back</a>
</body>
</html>