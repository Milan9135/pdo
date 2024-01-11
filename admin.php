<?php 

include "db.php";

$db = new Database();

if (isset($_POST['knopje']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $salt = random_bytes(10);

    $saltedpassword = $password . $salt;
    
    $hash = password_hash($saltedpassword, PASSWORD_BCRYPT);

    $db->insert($_POST['username'], $_POST['email'], $hash, $salt);
}

$data = $db->select();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        a {
            margin: 3px;
        }

        #first {
            margin-top: 50px;
        }
    </style>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <nav id="navbar">
        <a href="http://localhost/PDO/y2/p2/pdo/">Home</a>
        <a href="registration.php">Register</a>
        <a href="login.php">Login</a>
    </nav>
    <h3 id="first">insert data into "users" below</h3>
    <form method="POST">
        <input type="text" name="username" placeholder="username" require>
        <input type="email" name="email" placeholder="email" require>
        <input type="password" name="password" placeholder="password" require>
        <input type="submit" name="knopje" value="submit">
    </form>
        <h1>Users:</h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>password</th>
            <th>salt</th>
            <th>actie</th>
        </tr>
<!--                met fetchall -->

            <?php  foreach($data as $user) { ?>
            <tr>
                <td><?php echo $user['id']?></td>
                <td><?php echo $user['username']?></td>
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['password']?></td>
                <td><?php echo $user['salt']?></td>
                <td>
                <?php echo("<a href='update.php?id=$user[0]&username=$user[1]&email=$user[2]'>edit</a>") ?>
                <?php echo("<a href='delete.php?id=$user[0]'>delete</a>") ?>
                </td>
            </tr>
            <?php  } ?>      

                <!-- met fetch (1 rij) 
            <tr>
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['username']?></td>
                <td><?php echo $data['email']?></td>
                <td><a href="">edit</a><a href="">delete</a></td>
            </tr>  
            -->
    </table>
</body>
</html>