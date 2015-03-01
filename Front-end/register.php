<?
session_start();

//Information for SQL Server. Stored in variables for clarity.
$server = "mysql.cs.iastate.edu";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$error = "";

$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];

$emailLength = strlen($email);
$passwordLength = strlen($password);




if ($uLength >= 5 && $uLength <= 15) {

$error = "";

}
else {

$error = $error . "Username must be between 10 and 20 characters" . "<BR>";

}

if ($passwordLength >= 4 && $passwordLength <= 8) {

$errorMessage = "";

}
else {

$errorMessage = $errorMessage . "Password must be between 8 and 16 characters" . "<BR>";

}

$connection = mysql_connect($server, $serverUser, $serverPassword);
$database = mysql_select_db($serverDatabase, $connection);

$queryString = "INSERT INTO User (User_ID , password,register_date,role)
                VALUES (";

$queryString .= $email . "," . $password . "," . date("m.d.y") . "," . "User";

$SQL = "SELECT * FROM login WHERE L1 = $uname";
$result = mysql_query($SQL);
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {

$errorMessage = "Username already taken";

} 
else {

}


$SQL = "INSERT INTO User (L1, L2) VALUES ($uname, $pword)";

$result = mysql_query($SQL);

mysql_close($db_handle);


session_start();
$_SESSION['login'] = "1";

header ("Location: login.php");