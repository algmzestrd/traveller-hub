<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 4/5/15
 * Time: 2:55 PM
 */

session_start();

$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$email = mysqli_real_escape_string($connection, $_SESSION['user']);

$queryString = "SELECT First_Login FROM User WHERE User_ID";
$queryString .= "=" . "'" . $email . "'";

$query = mysqli_query($connection, $queryString);

$result = $query->fetch_all(MYSQLI_NUM);

$_SESSION['first'] = $result[0][0];