<?
function checkPass($user, $password)
{
	
        $query = "SELECT User_ID, role, password
	          FROM User
		  WHERE User_ID=";
		  
        $query .= "'" . $user . "'";
        
	$result = mysql_query($query);
	
	$array = mysql_fetch_assoc($result);
	
	$hash = md5($password);
	
	if($hash == $array["password"])
	    $UserID = $array["User_ID"];
	else
	    $UserID = -1;


	return $UserID;

}
?>
