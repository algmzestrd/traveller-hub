<?php
msql_connect("", "","") or die("could not connect");
mysql_select_db("") or die("could not connect db");
$output="";
if(isset($_POST['search'])){
    $searchq=$_POST['search'];
    $searchq=preg_replace("#[^0-9a-z]#i"," ",searchq);
    $query=mysql_query("SELECT * FROM Activity WHERE content like '%$searchq%'") 
        or die("could not find search");
    $count=mysql_num_rows($query);
    if($count == 0){
        $output='No result find';
    }
    else{
        while($row=myseql_fetch_arry($query)){
            $activityID=$row['activityID'];
            $content=$row['content'];
            $output .='<div>'.$activityID. ' '.$content.'</div>';
            
        }
    }
}
    
print("$output");

?>