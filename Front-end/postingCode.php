<?php

session_start();
//Information for SQL Server. Stored in variables for clarity.
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

//Blank error message.
$error = '';

//If stuff has been submitted..
if(isset($_POST['posting'])) {
    //If either field is empty...
    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['participants']) || empty($_POST['date'])) {
        $error = "Please complete all fields!";
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $participants = $_POST['participants'];
        $date = $_POST['date'];

        //Open connection to SQL Server.
        $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

        //SQL Query. Typed out here for clarity.
        $queryString = "INSERT INTO Activity (Title , Content, Post_Time, Limit) VALUES (";
        $queryString .= "'" . $title . "'" . ", " . "'" . $description . "'" . ", " . "'" . $participants . "'" . ", " . "'" . $date . "'" . ")";

        $query = mysqli_query($connection, $queryString);

        if(!$query)
        {
            $error = "Please try again. No special characters!";
        }
        else{
            $error = "Posting successful!";
        }
        mysqli_close($connection);

    }

    }

