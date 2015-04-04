<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 4/2/15
 * Time: 8:39 PM
 */

session_start();

$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";
$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$to      = $_POST['email'];
$code    = $_POST['code'];

$to = mysqli_real_escape_string($connection, $to);

$queryString = "INSERT INTO Recovery (User_ID, Code) VALUES(" . "'" . $to . "'" . ", " . "'" . $code . "')";

$query = mysqli_query($connection, $queryString);


$subject = 'Traveler Hub Password Reset Request';
$message = 'Hello, You have requested a new password.';

if(mail($to, $subject, "hello"))
{
    echo "success";
}
else
{
    echo "failure";
}