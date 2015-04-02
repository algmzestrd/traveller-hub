<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: loginPage.html");
}
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$id = $_POST['id'];
$user = $_SESSION['user'];
$time = $_POST['time'];
$object = new DateTime("now");
$date = $object->format("m-d-Y");

$queryString = "INSERT INTO Participate (Activity_ID, User_ID, Join_Time, Join_Date) VALUES (";
$queryString .= "'" . $id . "'" . ", " . "'" . $user . "'" . ", " . "'" . $time . "'";
$queryString .= ", " . "'" . $date . "')";

$query = mysqli_query($connection, $queryString);

if(mysqli_error($connection) == "") {

    $queryString = "SELECT Participants FROM Activity WHERE Activity_ID=";
    $queryString .= "'" . $id . "'";

    $query = mysqli_query($connection, $queryString);

    $result = $query->fetch_all(MYSQLI_NUM);

    $participants = $result[0][0];
    $participants += 1;

    $queryString = "UPDATE Activity SET Participants=";
    $queryString .= "'" . $participants . "' ";
    $queryString .= "WHERE Activity_ID=";
    $queryString .= "'" . $id . "'";
    $query = mysqli_query($connection, $queryString);
}

echo "done";

