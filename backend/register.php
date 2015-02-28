$uname = $_POST['username'];
$pword = $_POST['password'];

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

$user_name = "";
$pass_word = "";
$database = "User";
$server = "127.0.0.1";

$db_handle = mysql_connect($server, $user_name, $pass_word);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

}


$SQL = "SELECT * FROM login WHERE L1 = $uname";
$result = mysql_query($SQL);
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {

$errorMessage = "Username already taken";

} 
else {

}


$SQL = "INSERT INTO login (L1, L2) VALUES ($uname, $pword)";

$result = mysql_query($SQL);

mysql_close($db_handle);


session_start();
$_SESSION['login'] = "1";

header ("Location: login.php");