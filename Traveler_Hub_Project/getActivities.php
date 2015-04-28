<?php

session_start();

if(!isset($_SESSION['user'])) {
    header("Location: index.html");
}

$server = "10.25.71.66";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";
$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase, 3306);
$queryString = "SELECT * FROM Activity ORDER BY Seconds DESC";

$query = mysqli_query($connection, $queryString);

echo json_encode($query->fetch_all(MYSQLI_NUM));





