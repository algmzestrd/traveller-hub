<?php

session_start();
//Information for SQL Server. Stored in variables for clarity.
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

//Blank error message.
$error = '';
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        //Open connection to SQL Server.
        $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

        //SQL Query. Typed out here for clarity.
        $queryString = "INSERT INTO Activity (Title, Content VALUES (";
        $queryString .= "'" . $title . "'" . ", " . "'" . $description . "'" . ")";

        $query = mysqli_query($connection, $queryString);

        if(!$query)
        {
            $error = "Please try again. No special characters or duplicate events!";
        }
        else{
            $error = "success";
        }

        echo $error;

        mysqli_close($connection);





