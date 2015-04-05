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
$age = $_POST['age'];
$sex = $_POST['sex'];

$_SESSION['firstname'] = $firstName;
$_SESSION['lastname'] = $lastName;
$_SESSION['age'] = $age;
$_SESSION['gender'] = $sex;

$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$email = $_SESSION['user'];

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$email = mysqli_real_escape_string($connection, $email);

$queryString = "UPDATE Profile SET First_Name=" . "'" . $firstName . "', Last_Name='" . $lastName . "', Age='" . $age . "', Gender='" . $sex . "' WHERE User_ID='" . $email . "'" ;

$query = mysqli_query($connection, $queryString);

$queryString = "UPDATE User SET First_Login=";
$queryString .= "'" . 0 . "' ";
$queryString .= "WHERE User_ID=";
$queryString .= "'" . $email . "'";
$query = mysqli_query($connection, $queryString);

header("Location: main_page.php");
