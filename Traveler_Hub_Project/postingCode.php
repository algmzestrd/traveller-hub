<?php

    session_start();

    if(!isset($_SESSION['user'])) {
    header("Location: loginPage.html");
}

    $server = "mysql.cs.iastate.edu:3306";
    $serverUser = "u30914";
    $serverPassword = "AfzMyGF4c7";
    $serverDatabase = "db30914";

    $response = '';

    $user = $_SESSION['user'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $limit = $_POST['limit'];
    $type = $_POST['type'];
    $time = $_POST['time'];
    $seconds = $_POST['seconds'];

    $object = new DateTime("now");
    $date = $object->format("m-d-Y");


    $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

    if ($type == "activity") {

    $queryString = "INSERT INTO Activity (Title, Content, User_ID, Activity_ID, Post_Time, Post_Date, Participant_Limit, Location, Seconds) VALUES (";
    $queryString .= "'" . $title . "'" . ", " . "'" . $description . "'" . ", " . "'" . $user . "'" . ", " . "'" . $id . "'" . ", " . "'" . $time . "'";
    $queryString .= ", " . "'" . $date . "'" . ", " . "'" . $limit . "'" . ", " . "'" . $location . "'" . ", " . "'" . $seconds . "')";

    $query = mysqli_query($connection, $queryString);

        if (!$query) {
        $response = "Please try again. No special characters or duplicate events!";
    }   else {
        $response = "success";
    }

    $queryString = "INSERT INTO Participate (User_ID, Join_Time, Join_Date) VALUES (";
    $queryString .= "'" . $user . "'" . ", " . "'" . $time . "'";
    $queryString .= ", " . "'" . $date . "')";

    $query = mysqli_query($connection, $queryString);
}
    else {
    $queryString = "INSERT INTO Post (Post_ID, Post_Time, Title, Content, User_ID, Post_Date, Post_Type, Seconds) VALUES (";
    $queryString .= "'" . $id . "'" . ", " . "'" . $time . "'" . ", " . "'" . $title . "'" . ", " . "'" . $description . "'" . ", " . "'" . $user . "'" . ", " . "'" . $date . "'";
    $queryString .= ", " . "'" . $type . "'" . ", " . "'" . $seconds . "')";

    $query = mysqli_query($connection, $queryString);

        if (!$query) {
        $response = "An error occurred. Please try again.";
    }
        else {
        $response = "success";
    }
}
    echo $response;

    mysqli_close($connection);





