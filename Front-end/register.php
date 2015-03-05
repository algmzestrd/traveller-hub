<?php

//Information for SQL Server. Stored in variables for clarity.
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";
$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

//Blank error message.
$error = '';


//If stuff has been submitted..
if(isset($_POST['register'])) {
    //If either field is empty...
    if (empty($_POST['inputEmail']) || empty($_POST['inputPassword'])) {
        $error = "Missing Email or Password.";
        $_SESSION['login_user'] = 0;
    } else {
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $passwordLength = strlen($password);

        if ($passwordLength >= 4 && $passwordLength <= 8) {
                //Open connection to SQL Server.
                $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

                //SQL Query. Typed out here for clarity.
                $email = mysqli_real_escape_string($connection, $email);
                $queryString = "INSERT INTO User (User_ID , password, register_date, role) VALUES (";
                $queryString .= "'" . $email . "'" . ", " . "'" . $password . "'" . ", " . "'" . date("y.m.d G:i:s") . "'" . ", " . "'" ."User" . "'" . ")";
          //      var_dump($queryString);

                $query = mysqli_query($connection, $queryString);

                if(!$query)
{
$error = "Email or password is already taken.";
}
else{
$error = "Registration successful!";
                 }
                mysqli_close($connection);

        }
        else {

            $errorMessage = $errorMessage . "Password must be between 8 and 16 characters" . "<BR>";

        }



    }
}
