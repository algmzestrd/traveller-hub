<?php
$server = "mysql.cs.iastate.edu:3306";
$serverUser = "u30914";
$serverPassword = "AfzMyGF4c7";
$serverDatabase = "db30914";

$connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

$queryString = "SELECT Title, Content, Participants FROM Activity";

$query = mysqli_query($connection, $queryString);

$numberOfActivities = mysql_num_rows($query);
?>
<!doctype html>
<html>
    <head>
    <title>Travelers' Hub Posts List</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" type="text/css" href="stylepages/color.css">
          <link rel = "stylesheet" type="text/css" href="stylepages/style.css">
          <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
		  <link rel="stylesheet" type="text/css" href="scriptpages/ddajaxsidepanel.css" />
		  <link rel = "stylesheet" type="text/css" href="stylepages/waterfall_style.css">
    </head>
    <body>
		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="#">
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
      				<li><a href="#">My Account</a></li>
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
      			</ul>
  			</div>
		</nav>
		
		<div style = "text-align:center; padding-top: 30px">
		<a href="post_editing_page.html" rel="ajaxpanel"><button type="button" class="btn btn-primary">Post</button></a>
		</div>
		
		<!-- Start waterfull here -->
		
		<div id="warp" class="warp">
    <div class="full" id="row1">
        <div class="water">
            <a href="javascript:void(0)"><img src="Materials/01.JPG" alt=""></a>
            
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
           
        </div>
        <div class="water">
            <img src="Materials/09.JPG" alt="">
            
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
            
        </div>
    </div>
    <div class="full" id="row2">
        <div class="water">
            <img src="Materials/03.jpg" alt="">
           
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
            
        </div>
        <div class="water">
            <img src="Materials/10.JPG" alt="">
            
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
           
        </div>
    </div>
    <div class="full" id="row3">
        <div class="water">
            <img src="Materials/05.JPG" alt="">
            
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
           
        </div>
        <div class="water">
            <img src="Materials/11.JPG" alt="">
           
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
            
        </div>
    </div>
    <div class="full last" id="row4">
        <div class="water">
            <img src="Materials/07.JPG" alt="">
            
        </div>
        <div class="water">
            <img src="Materials/08.JPG" alt="">
            
        </div>
        <div class="water">
            <p><?php
                if($numberOfActivities >= 1)
                {}
                else{}



                ?></p>
            
        </div>
        <div class="water">
            <img src="Materials/13.JPG" alt="">
           
        </div>
    </div>
</div>
		
		
		
		<!-- End waterfull here -->
		
		<script type="text/javascript" src="scriptpages/waterfull.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="scriptpages/ddajaxsidepanel.js"></script>
    </body>
    
</html>