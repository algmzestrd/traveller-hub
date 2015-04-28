

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
    <label for = "username">User Name:</label>
    <input type="text" class = "form-control" name="username">
    <label for = "password">Current Password:</label>
    <input type="text" class = "form-control" name="password">
    <label for = "newpass">New Password:</label>
    <input type="text" class = "form-control" name="newpass">
    <label for = "confirmpass">Confirming Password:</label>
    <input type="text" class = "form-control" name="confirmpass">
    
    <div style = "padding-left:150px; padding-top:20px">
    <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>
       <div class="isu-QuickLinks">

  <ul class="isu-QuickLinks-right">
    <li>
      <a class="isu-Icon--facebook" href="http://www.facebook.com/IowaStateU" title="Facebook">
        <i class="fa fa-facebook-square"></i>
        <span class="wd-u-HiddenVisually"></span>
      </a>
    </li>
    <li>
      <a class="isu-Icon--twitter" href="http://twitter.com/IowaStateU" title="Twitter">
        <i class="fa fa-twitter-square"></i>
        <span class="wd-u-HiddenVisually"></span>
      </a>
    </li>
    <li>
      <a class="isu-Icon--youtube" href="http://www.youtube.com/user/iowastateu" title="YouTube">
        <i class="fa fa-youtube-square"></i>
        <span class="wd-u-HiddenVisually"></span>
      </a>
    </li>
  </ul>
</div>        
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </body>
</html>