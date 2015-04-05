<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 4/5/15
 * Time: 3:06 PM
 */

session_start();

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];

$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$email = $_SESSION['user'];

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$email = mysqli_real_escape_string($connection, $email);

$queryString = "UPDATE Profile SET First_Name=" . "'" . $firstName . "', Last_Name='" . $lastName . "' WHERE User_ID='" . $email . "'" ;

$query = mysqli_query($connection, $queryString);

header("Location: main_page.php");
