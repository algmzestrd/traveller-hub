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
        $location = $_POST['location'];
        $limit = $_POST['limit'];
        $type = $_POST['type'];
        $user = $_SESSION['user'];
        $time = $_POST['time'];
        $object = new DateTime("now");
        $date = $object->format("m-d-Y");

        //Open connection to SQL Server.
        $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);
if($type == "activity") {
    //SQL Query. Typed out here for clarity.
    $queryString = "INSERT INTO Activity (Title, Content, User_ID, Activity_ID, Participants, Post_Time, Post_Date, Participant_Limit, Location) VALUES (";
    $queryString .= "'" . $title . "'" . ", " . "'" . $description . "'" . ", " . "'" . $user . "'" . ", " . "'" . $id . "'" . ", " . "'" . 1 . "'" . ", " . "'" . $time . "'";
    $queryString .= ", " . "'" . $date . "'" . ", " . "'" . $limit . "'" . ", " . "'" . $location . "')";


    $query = mysqli_query($connection, $queryString);

    if (!$query) {
        $error = var_dump($queryString);
        //$error = "Please try again. No special characters or duplicate events!";
    } else {
        $error = "success";
    }

    $queryString = "INSERT INTO Participate (Activity_ID, User_ID, Join_Time, Join_Date) VALUES (";
    $queryString .= "'" . $id . "'" . ", " . "'" . $user . "'" . ", " . "'" . $time . "'";
    $queryString .= ", " . "'" . $date . "')";

    $query = mysqli_query($connection, $queryString);
}
else{
    $queryString = "INSERT INTO Post (Post_ID, Post_Time, Title, Content, User_ID, Post_Date, Post_Type) VALUES (";
    $queryString .= "'" . $id . "'" . ", " . "'" . $time . "'" . ", " . "'" . $title . "'" . ", " . "'" . $content . "'" . ", " . "'" . $user . "'" . ", " . "'" . $date . "'";
    $queryString .= ", " . "'" . $type . "')";


    $query = mysqli_query($connection, $queryString);

    if (!$query) {
        $error = var_dump($queryString);
        //$error = "Please try again. No special characters or duplicate events!";
    } else {
        $error = "success";
    }

}

        echo $error;

        mysqli_close($connection);





