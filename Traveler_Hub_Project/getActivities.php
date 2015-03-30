<?php
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$queryString = "SELECT * FROM Activity ORDER BY Seconds DESC";

$query = mysqli_query($connection, $queryString);

echo json_encode($query->fetch_all(MYSQLI_NUM));



