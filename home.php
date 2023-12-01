<?php 

include "db.php";

$db = new Database();

if (isset($_POST['knopje'])) {
    $db->insert($_POST['name'], $_POST['email']);
}

$data = $db->select(2);

print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
        a {
            margin: 3px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="submit" name="knopje">
    </form>
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>actie</th>
        </tr>
<!--                met fetchall

            <?php // foreach($data as $user) { ?>
            <tr>
                <td><?php echo $user['id']?></td>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['email']?></td>
                <td><a href="">edit</a><a href="">delete</a></td>
            </tr>
            <?php // } ?>      
-->
                <!-- met fetch (1 rij)
            <tr>
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['name']?></td>
                <td><?php echo $data['email']?></td>
                <td><a href="">edit</a><a href="">delete</a></td>
            </tr>  
    </table>
</body>
</html>