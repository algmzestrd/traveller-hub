<?php
    $key=$_GET['key'];
    $array = array();
    $array_1=array();
    $con=mysql_connect("mysql.cs.iastate.edu","u30914","AfzMyGF4c7");
    $db=mysql_select_db("db30914",$con);
    $query=mysql_query("select * from Activity where  Content LIKE '%{$key}%' ");
    
if(mysql_num_rows($query) > 1){
    while($row=mysql_fetch_assoc($query))
    {
        $array[]=$row['Content'];
    }
    
}
else
{
    $query=mysql_query("select * from Activity where  Title LIKE '%{$key}%' ");
      while($row=mysql_fetch_assoc($query))
    {
        $array[]=$row['Title'];
    }
}

    echo json_encode($array);
   

?>
