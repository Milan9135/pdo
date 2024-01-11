<?php

include 'db.php';

$db = new Database();

if (isset($_POST['knopje']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "Account created successfully";

    $password = $_POST['password'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $salt = random_bytes(10);

    $saltedpassword = $password . $salt;
    
    $hash = password_hash($saltedpassword, PASSWORD_BCRYPT);

    try {

    // check if input is correct
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        throw new exception("Email is not valid");
    }
    if ($password == "" || $username == "" || $email == "") {
        throw new exception("Fill in every question");
    }
    if (strlen($password) < 8) {
        throw new Exception("Password must be at least 8 characters long");
    }

        $db->insert($username, $email, $hash, $salt);
    }
    // catch error and make error message red
    catch (exception $e) {
            $message = $e->getMessage();
            ?> <style>
                #error {
                    color: red;
                }
            </style> <?php
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/formstyle.css">
    </head>
<body>
    <nav id="navbar">
        <a href="http://localhost/PDO/y2/p2/pdo/">Home</a>
        <a href="registration.php">Register</a>
        <a href="login.php">Login</a>
    </nav>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="knopje">Register</button>
    </form>
    <p id="error"></p>
    <script>
            // display error message OR confirm account creation
            document.getElementById('error').innerText = "<?php echo $message; ?>";
    </script>
</body>
</html>