

<!doctype html>
<html>
    <head>
    <title>Profile Page</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">
          <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all" rel="stylesheet">
        
    </head>
  
    <body>


<form action="profile_update.php" method="post" style = "margin-left:auto; margin-right:auto;width:500px; padding:20px">
    <label for = "name">First Name:</label>
    <input type="text" class = "form-control" name="firstname">
    <label for = "last">Last Name:</label>
    <input type="text" class = "form-control" name="lastname">
    <label for = "gender">Gender:</label>
    <div class = "radio">
    <label><input type="radio" name="sex" value="M">Male</label><br>
    <label><input type="radio" name="sex" value="F">Female</label>
    </div>
    <label for = "age">Age:</label>
    <input type="text" class = "form-control" name="age">
    <div style = "padding-left:150px; padding-top:20px">
    <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>
         
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </body>
</html>