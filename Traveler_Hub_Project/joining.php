<?php
session_start();
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$id = $_POST['id'];
$user = $_SESSION['user'];

$queryString = "INSERT INTO Participate (Activity_ID, User_ID) VALUES (";
$queryString .= "'" . $id . "'" . ", " . "'" . $user . "'" .")";

$query = mysqli_query($connection, $queryString);

$queryString = "SELECT Participants FROM Activity WHERE Activity_ID=";
$queryString .= "'" . $id . "'";

$query = mysqli_query($connection, $queryString);



echo "done";