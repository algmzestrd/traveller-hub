<?php

session_start();
  if(!isset($_SESSION['user'])) {
    header("Location: loginPage.html");
}

if($_SESSION)
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
        
    
        
                echo "<form action='search_1.php' method='POST'>
                <table border='1'>
<tr>
<th>Activity_ID</th>
<th>Content</th>
<th>Title</th>
<th>delete</th>
</tr>";
           while($row = mysql_fetch_array($query)){
              
            echo "<tr>";
  echo "<td>" . $row['Activity_ID'] . "</td>";
  echo "<td>" . $row['Content'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
echo '<td><button type="submit" name="deleteItem" value="'.$row['Content'].'" > Delete </button> </td>"';
  echo "</tr>";
  }
echo "</table>";
    echo"</form>";
    }

    if($count == 0){
         $query=mysql_query("SELECT * 
    FROM Post
    WHERE Content like '%$searchq%' 
    OR Title like '%$searchq%'") 
        or die("could not find in Activity");
    
        $count=mysql_num_rows($query);
        
         if($count > 0){
             
            echo "<table border='1'>
<tr>
<th>Activity_ID</th>
<th>Content</th>
<th>Title</th>
<th>delete</th>
</tr>";
           while($row = mysql_fetch_array($query)){
               
              echo "<tr>";
  echo "<td>" . $row['Activity_ID'] . "</td>";
  echo "<td>" . $row['Content'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
//echo "<td>"<!-- how could I add a button here? -->"</td>";
  echo "</tr>";
  }
echo "</table>";
           

        /*  
         while($row=mysql_fetch_array($query)){
           // $activityID=$row['Activity_ID'];
            $content=$row['Content'];
            $QuestionID=$row['Question_ID'];
            $post_time=$row['Post_Time'];
            $title=$row['Title'];
            $user=$row['User_ID'];
            $output .='<div>'.$QuestionID. ' '.$user. ' '.$title. ' '.$content. ' ' .$post_time. '</div>';
            
    }
    */
        
    }
    }
    if($count == 0){
        $output='No result found';
    }
    
}
 
if(isset($_POST['join']))
{   
    $id=" ";
    $time="";
    $count=0;
    $id=$_POST['join'];
    $time=date('h:i A');
    $user=$_SESSION['user'];
    $object =new DateTime("now");
    $date = $object->format("m-d-Y");
    $sql="SELECT * FROM Activity";
    $query=mysql_query($sql);
    while($row = mysql_fetch_array($query)){
        if($id == $row['Activity_ID'] && $user == $row['User_ID'])
            $count +=1;
        
    }
    if($count == 0){
    $sql="SELECT * FROM Participate ";
    $query=mysql_query($sql);
    while($row = mysql_fetch_array($query)){
        if($row['User_ID'] == $user && $row['Activity_ID'] == $id){
            $count +=1;
        }
        
    }
    if($count == 0){
   $sql = "INSERT INTO Participate (Activity_ID, User_ID, Join_Time, Join_Date) VALUES (";
    $sql .= "'" . $id . "'" . ", " . "'" . $user . "'" . ", " . "'" . $time . "'";
    $sql .= ", " . "'" . $date . "')";
    $query=mysql_query($sql);
    $sql="UPDATE Activity
SET Participants= Participants +'1'
where Activity_ID =" ."'" .$id. "'". ";";
    
       
    $query=mysql_query($sql);
            print("join successfully");
}
    else
        print("You have already joined");

    }
    else
        print("You are the event organiser = =");
    
}

 mysql_close();

?>

