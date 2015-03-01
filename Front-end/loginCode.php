<?php

session_start();

$server = "mysql.cs.iastate.edu";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$error = '';
if($isset($_POST['submit'])) {
    if (empty($_POST['inputEmail']) || empty($_POST['inputPassword'])) {
        $error = "Email or password is invalid";
    } else {
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $connection = mysql_connect($server, $serverUser, $serverPassword);

        $queryString = "SELECT User_ID, password,
          FROM User
          WHERE User_ID=$email AND password=$password";

        $query = mysql_query($queryString);

        $rows = mysql_num_rows($query);

        if ($rows == 1) {
            $_SESSION['login_user'] = $email;
        } else {
            $error = "Email or password is invalid. User may not be registered";
        }

        mysql_close($query);

        $connection = mysql_connect($server, $serverUser, $serverPassword);
        $database = mysql_select_db($serverDatabase, $connection);
    }
}
?>
