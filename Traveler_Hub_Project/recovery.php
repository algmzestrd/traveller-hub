<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 4/2/15
 * Time: 8:39 PM
 */

session_start();

$server = "10.25.71.66";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";
$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase, 3306);

$to      = $_POST['email'];
$code    = $_POST['code'];

$code = password_hash($code, PASSWORD_BCRYPT);

$to = mysqli_real_escape_string($connection, $to);

$queryString = "INSERT INTO Recovery (User_ID, Code) VALUES(" . "'" . $to . "'" . ", " . "'" . $code . "')";

$query = mysqli_query($connection, $queryString);

$queryString = "UPDATE User SET Recovery=1, Recovery_Password=" . "'" . $code . "' WHERE User_ID='" . $_POST['email'] . "'";

$query = mysqli_query($connection, $queryString);

$subject = 'Traveler Hub Password Reset Request';
$message = 'Hello, You have requested a temporary password. Please sign on using ' . $_POST['code'] . ' as your password.';

if(mail($_POST['email'], $subject, $message)) {
    echo "success";
}
else {
    echo "failure";
}