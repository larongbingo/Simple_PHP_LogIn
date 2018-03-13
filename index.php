<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
</head>
<body>
    <form action="login_API.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
        <br>
        <input type="submit" value="Log In">
    </form>

    <?php 
        if(isset($_GET["result"])) {
            if($_GET["result"] == "invalidCred") {
                echo("Wrong username or password");
            }
            else if($_GET["result"] == "newAccount") {
                echo("Successfully created the account, please log in to continue");
            }

            echo("<br>");
        }
    ?>

    <a href="register.php">Register</a>
</body>
</html>