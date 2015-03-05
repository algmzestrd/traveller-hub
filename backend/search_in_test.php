<?php

session_start();
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";
$connection = msqli_connect($server, $serverUser, $serverPassword, $serverDatabase) or die("Could not connect.");
$output="";
if(isset($_POST['search'])){
    $search=$_POST['search'];
    $search=preg_replace("#[^0-9a-z]#i"," ",search);
    $query = mysqli_query($connection, "SELECT * FROM Activity WHERE content like '%$search%'")
        or die("Could not find search.");
    $count=mysql_num_rows($query);
    if($count == 0){
        $output='No result found.';
    }
    else{
        while($row=mysqli_fetch_arry($query)){
            $activityID=$row['activityID'];
            $content=$row['content'];
            $output .='<div>'.$activityID. ' '.$content.'</div>';
            
        }
    }
}
    
print_r("$output");
