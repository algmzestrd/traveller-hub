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


$isEmailTakenQuery = "SELECT User_ID
                        FROM User
                        WHERE User_ID";
$isEmailTakenQuery .= "=" . $email;

$checkEmailQuery = mysql_query($isEmailTakenQuery);

$rows = mysql_num_rows($checkEmailQuery);

if ($rows > 0) {

$errorMessage = "Email address is already registered.";

} 
else {

    $queryString = "INSERT INTO User (User_ID , password,register_date,role)
                VALUES (";
    $queryString .= $email . "," . $password . "," . date("m.d.y") . "," . "User";

    $query = mysql_query($queryString);
}

mysql_close($connection);


session_start();
$_SESSION['login'] = "1";

header ("Location: login.php");