<?php 

include "db.php";

$db = new Database();

$id = $_GET["id"];

if (isset($_GET['knopje'])) {
    $id = $_GET["id"];
    $db->delete($id);
    header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete row</title>
</head>
<body>
<form method="GET">
        <h2>Choose a row to delete</h2>
        <label for="id">id:</label>
        <?php echo("<input type='text' name='id' value='$id'>"); ?>
        <input type="submit" name="knopje">
    </form>
    <a href="home.php">back</a>
</body>
</html>