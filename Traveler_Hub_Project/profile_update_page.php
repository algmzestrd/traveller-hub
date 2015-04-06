

<!doctype html>
<html>
    <head>
    <title>Profile Page</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">
    </head>
  
    <body>
		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="main_page.html">
      				<img alt="Brand" src="Materials/login_picture.gif" height="45" width="60">
      				</a>
    			</div>

        		<div class="col-sm-3 col-md-3 pull-right">
        			<form class="navbar-form" role="search">
        			<div class="input-group">


            			<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            			<div class="input-group-btn">
                			<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            			</div>
        			</div>
        			</form>
        		</div>
      			<ul class="nav navbar-nav navbar-left">

      				<li><img alt="Brand" src="Materials/user.png" height="30" width="30" style = "margin-top: 12px"></li>
      				<li><a href="profile_update_page.php" id="account">My Account</a></li>
        			<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More<span class="caret"></span></a>
          				<ul class="dropdown-menu" role="menu">
            				<li><a href="#">Hotel History</a></li>
            				<li><a href="#">Hotel News</a></li>
            				<li><a href="#">Ask Front Desk</a></li>
            				<li class="divider"></li>
            				<li><a href="#">About Us</a></li>
          				</ul>
        			</li>

        			<li role = "presentation" class = "active"><iframe src="http://free.timeanddate.com/clock/i4k62t3m/n76/fcfff/tct/pct/pa9/tt0/tm1/ta1/tb4" frameborder="0" width="184" height="50" allowTransparency="true"></iframe></li>
                    <form action="logout.php">
                        <input type="submit" value="Logout">
                    </form>
      			</ul>
  			</div>
		</nav>


<form action="profile_update.php" method="post">
    <br>
    First Name: <br>
    <input type="text" name="firstname">
    <br>
    Last Name: <br>
    <input type="text" name="lastname">
    <br>
    Gender: <br>
    <input type="radio" name="sex" value="M">Male
    <br><input type="radio" name="sex" value="F">Female
    <br>
    Age: <br>
    <input type="text" name="age">
    <br><br>
    <input type="submit" value="Submit">
</form>

       
<nav class="navbar navbar-pills" style = "height: 0px">
  <div class="container-fluid">
	<h4 style = "color: #FFFFFF"> Copy rights: Travelers' Hub 2015 </h4>
  </div><!-- /.container-fluid -->
</nav>        
        
        
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </body>
    <script>
        var user = "<?php session_start(); echo $_SESSION['user']?>";
        var firstLogin = "<?php echo $_SESSION['first']?>";
        var name = "<?php echo $_SESSION['firstname']?>";
        $("#account").html(user + "'s Account");

        if(firstLogin == 1)
        {
            $("#account").html(user + "'s Account");
        }
        else
        {
            $("#account").html(name + "'s Account");
        }
    </script>
</html>