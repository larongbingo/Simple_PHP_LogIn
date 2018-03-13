<?php
    include("db_config.php");

    $mysql_db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

    if($mysql_db->connect_error) {
        die("ERROR: " . $mysql_db->error);
    }

    // Credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query_result = $mysql_db->query("SELECT * FROM users WHERE account_username='$username'");

    $row = $query_result->fetch_assoc();

    // Hash the account
    $password_hash = md5(md5($password));

    if($password_hash != $row["account_password"]) {
        header("location: /?result=invalidCred");
        exit();
    }    

    session_start();

    // Store the username as a valid session
    $_SESSION["logged_in"]["username"] = $row["username"];

    $account_id = $row["id"];

    header("location: testing.php/?username='$username'&password='$password_hash'&id='$account_id'");
?>