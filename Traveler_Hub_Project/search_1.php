<?php
mysql_connect("mysql.cs.iastate.edu","u30914","AfzMyGF4c7") or die("could not connect");
mysql_select_db("db30914") or die("could not connect db");
$output="";
$searchq=" ";
if(isset($_POST['typeahead'])){
    $searchq=$_POST['typeahead'];
   // $searchq=preg_replace("#[^0-9a-z]#i","***",$searchq);
    $query=mysql_query("SELECT * 
    FROM Activity
    WHERE Content like '%$searchq%' 
    OR Title like '%$searchq%'") 
        or die("could not find in Activity");
    
    $count=mysql_num_rows($query);
    if($count > 0){
         while($row=mysql_fetch_array($query)){
           // $activityID=$row['Activity_ID'];
            $content=$row['Content'];
            $activityID=$row['Activity_ID'];
            $post_time=$row['Post_Time'];
            $participants=$row['Participants'];
            $title=$row['Title'];
            $user=$row['User_ID'];
            $output .='<div>'.$activityID. ' '.$user. ' '.$title. ' '.$content. ' ' .$post_time.' '.$participants. '</div>';
    }
        
    }
    else if($count == 0){
         $query=mysql_query("SELECT * 
    FROM Post
    WHERE Content like '%$searchq%' 
    OR Title like '%$searchq%'") 
        or die("could not find in Activity");
    
        $count=mysql_num_rows($query);
        
         if($count > 0){
         while($row=mysql_fetch_array($query)){
           // $activityID=$row['Activity_ID'];
            $content=$row['Content'];
            $QuestionID=$row['Question_ID'];
            $post_time=$row['Post_Time'];
            $title=$row['Title'];
            $user=$row['User_ID'];
            $output .='<div>'.$QuestionID. ' '.$user. ' '.$title. ' '.$content. ' ' .$post_time. '</div>';
    }
        
    }
    }
    if($count == 0){
        $output='No result found';
    }
    
}
 


print("$output");

