<?php
    include("db_config.php");

    $mysql_db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

    if($mysql_db->connect_error) {
        die("ERROR: " . $mysql_db->connect_error);
        exit();
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $password_hash = md5(md5($password));

    if($mysql_db->query("INSERT INTO users (account_username, account_password) VALUES ('$username', '$password_hash')") == TRUE) {
        header("location: /?result=newAccount");
        exit();
    }
    echo $mysql_db->error;

    header("location: /?result=errAtReg");
?>