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
$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);
$object = new DateTime("now");
$date = $object->format("m-d-Y");
$role = "User";


        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $passwordLength = strlen($password);
                //Open connection to SQL Server.
                $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

                //SQL Query. Typed out here for clarity.
                $email = mysqli_real_escape_string($connection, $email);
                $queryString = "INSERT INTO User (User_ID , password, register_date, role) VALUES (";
                $queryString .= "'" . $email . "'" . ", " . "'" . $password . "'" . ", " . "'" . $date . "'" . ", " . "'" . $role . "'" . ")";

                $query = mysqli_query($connection, $queryString);

                if(!$query)
{
$error = "Email or password is already taken.";
}
else{
$error = "Registration successful!";
                 }
                mysqli_close($connection);


echo $error;





