<!doctype html>
<html>
    <head>
    <title>Travelers' Hub Login</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">
    </head>
<?php

session_start();

if(!isset($_SESSION['user']))
{
    header("Location: loginPage.html");
}

header('Content-Type: text/html; charset=UTF-8');
?>
<script>

var slideimages = new Array() // create new array to preload images
slideimages[0] = new Image() // create new instance of image object
slideimages[0].src = "Materials/login_pic1.jpg" // set image src property to image path, preloading image in the process
slideimages[1] = new Image()
slideimages[1].src = "Materials/login_pic2.jpg"
slideimages[2] = new Image()
slideimages[2].src = "Materials/login_pic3.jpg"

</script>

    
<style>
    .crop {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.crop img {
    width: 100%;
    height: 100%;
    margin: -520px -300px 0px 0px;
}

a:hover {
    text-decoration: none;
}
</style>
  
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
                    <form action="logout.php">
                        <input type="submit" value="Logout">
                    </form>
      			</ul>
  			</div>
		</nav>


        				<div class="crop">
    						<img src="Materials/login_pic1.jpg" alt="Login Image" id = "slide" />
						</div>
<div class="row" style = "margin:40px">
  <div class="col-md-3">
    <a href="location.php" class="thumbnail">
      <h1 style = "text-align:center">Where to go?</h1>
      <img src="Materials/login_pic3.jpg" alt="Pulpit Rock" style="width:100%;height:100%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="ChatRoom/chat.html" class="thumbnail">
      <h1 style = "text-align:center">Who to chat?</h1>
      <img src="Materials/login_pic3.jpg" alt="Moustiers Sainte Marie" style="width:100%;height:100%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="cinqueterre.jpg" class="thumbnail">
      <h1 style = "text-align:center">What is happening?</h1>
      <img src="Materials/login_pic3.jpg" alt="Cinque Terre" style="width:100%;height:100%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="cinqueterre.jpg" class="thumbnail">
      <h1 style = "text-align:center">How to ask for help?</h1>
      <img src="Materials/login_pic3.jpg" alt="Cinque Terre" style="width:100%;height:100%">
    </a>
  </div>
</div>

       
<nav class="navbar navbar-pills" style = "height: 0px">
  <div class="container-fluid">
	<h4 style = "color: #FFFFFF"> Copy rights: Travelers' Hub 2015 </h4>
  </div><!-- /.container-fluid -->
</nav>        
        
        
        </div>
        
<script type="text/javascript">

//variable that will increment through the images
var step=0

function slideit(){
 //if browser does not support the image object, exit.
 if (!document.images)
  return
 document.getElementById('slide').src = slideimages[step].src
 if (step<2)
  step++
 else
  step=0
 //call function "slideit()" every 2.5 seconds
 setTimeout("slideit()",2500)
}

slideit()

</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
    
    
</html>