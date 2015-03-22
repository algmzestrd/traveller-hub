<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$uname = $_POST['inputEmail'];
$pword = $_POST['inputPassword'];

$uname = htmlspecialchars($uname);
$pword = htmlspecialchars($pword);


$uLength = strlen($uname);
$pLength = strlen($pword);

if ($uLength >= 5 && $uLength <= 15) {

$errorMessage = "";

}
else {

$errorMessage = $errorMessage . "Username must be between 10 and 20 characters" . "<BR>";

}

if ($pLength >= 4 && $pLength <= 8) {

$errorMessage = "";

}
else {

$errorMessage = $errorMessage . "Password must be between 8 and 16 characters" . "<BR>";

}

$user_name = "u30914";
$pass_word = "AfzMyGF4c7";
$database = "db30914";
$server = "mysql.cs.iastate.edu";

$db_handle = mysql_connect($server, $user_name, $pass_word);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

}


$SQL = "SELECT * FROM login WHERE UserID = $uname";
$result = mysql_query($SQL);
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {

$errorMessage = "Username already taken";

} 
else {

}


$SQL = "INSERT INTO User (UserID, password) VALUES ($uname, $pword)";

$result = mysql_query($SQL);

mysql_close($db_handle);


session_start();
$_SESSION['login'] = "1";

header ("Location: login.php");