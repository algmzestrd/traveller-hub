<?php

session_start();

//Information for SQL Server. Stored in variables for clarity.
$server = "mysql.cs.iastate.edu";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

//Blank error message.
$error = '';

//If stuff has been submitted..
if(isset($_POST['submit'])) {

    //If either field is empty...
    if (empty($_POST['inputEmail']) || empty($_POST['inputPassword'])) {
        $error = "Email or password is invalid";
    } else {
        $email = $_POST['inputEmail'];
        $email = trim($email, "@.");
        $password = $_POST['inputPassword'];

        //Open connection to SQL Server.
        $connection = mysql_connect($server, $serverUser, $serverPassword);
        $database = mysql_select_db($serverDatabase, $connection);

        //SQL Query. Typed out here for clarity.
        $queryString = "SELECT User_ID, password
                        FROM User
                        WHERE User_ID";
        $queryString .= "=" . $email . "AND password=" . $password;


        $query = mysql_query($queryString);

        $rows = mysql_num_rows($query);

        if ($rows == 1) {
            $_SESSION['login_user'] = $email;
        } else {
            $error = "Email or password is invalid. User may not be registered";
        }

        mysql_close($connection);

    }
}
?>
