<?php

session_start();

if(!isset($_SESSION['user']))
{
    header("Location: loginPage.html");
}
//Information for SQL Server. Stored in variables for clarity.
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

//Blank error message.
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    //Open connection to SQL Server.
    $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

    //SQL Query. Typed out here for clarity.
    $email = mysqli_real_escape_string($connection, $email);
    $queryString = "SELECT User_ID, password FROM User WHERE User_ID";
    $queryString .= "=" . "'" . $email . "'" . " " . "AND password=" . "'" . $password . "'";

    $query = mysqli_query($connection, $queryString);

    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
        $response = "success";
        $_SESSION['user'] = $email;
    } else {
        $response = "invalid";
    }

    echo $response;

    mysqli_close($connection);



