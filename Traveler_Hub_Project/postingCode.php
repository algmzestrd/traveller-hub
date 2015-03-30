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
        $id = $_POST['id'];
        $user = $_SESSION['user'];
        $time = $_POST['time'];
        $object = new DateTime("now");
        $date = $object->format("m-d-Y");

        //Open connection to SQL Server.
        $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

        //SQL Query. Typed out here for clarity.
        $queryString = "INSERT INTO Activity (Title, Content, User_ID, Activity_ID, Participants, Post_Time, Post_Date) VALUES (";
        $queryString .= "'" . $title . "'" . ", " . "'" . $description . "'" . ", " . "'" . $user . "'" . ", " . "'" . $id . "'" . ", " . "'" . 1 . "'". ", " . "'" . $time . "'";
        $queryString .= ", " . "'" . $date . "'" . ")";


        $query = mysqli_query($connection, $queryString);

        if(!$query)
        {
            $error = var_dump($queryString);
            //$error = "Please try again. No special characters or duplicate events!";
        }
        else{
            $error = "success";
        }

        $queryString = "INSERT INTO Participate (Activity_ID, User_ID, Join_Time, Join_Date) VALUES (";
        $queryString .= "'" . $id . "'" . ", " . "'" . $user . "'" . ", " . "'" . $time . "'";
        $queryString .= ", " . "'" . $date . "')";

        $query = mysqli_query($connection, $queryString);

        echo $error;

        mysqli_close($connection);





