<?php 

include "db.php";

$db = new Database();

$id = $_GET["id"];
$name = $_GET["name"];
$email = $_GET["email"];

if (isset($_GET['knopje'])) {
    $id = $_GET["id"];
    $name = $_GET["name"];
    $email = $_GET["email"];
    $db->update($id, $name, $email);
    header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update row</title>
</head>
<body>
    <h2>Edit the information</h2>
<form method="GET">
        <label for="id">id:</label>
        <?php echo("<input type='text' name='id' value='$id'>"); ?>
        <label for="name">name:</label>
        <?php echo("<input type='text' name='name' value='$name'>"); ?>
        <label for="email">email:</label>
        <?php echo("<input type='text' name='email' value='$email'>"); ?>
        <input type="submit" name="knopje" value="update">
    </form>
    <a href="home.php">back</a>
</body>
</html>