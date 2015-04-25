<!doctype html>
<html>
    <head>
    <title>Travelers' Hub Login</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">
          <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all" rel="stylesheet">
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

            <script src="typeahead.min.js"></script>
    </head>
<?php

    include("checkFirstLogin.php");


    if(!isset($_SESSION['user'])) {
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
    
                           <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    
    
                        <style type="text/css">
                

.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 300px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
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
        			<div class="bs-example">
                                            <form action="search_1.php" method="post"> 
                                                <div class="input-group">
                                                    <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search for Content ">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default" type="submit">
                                                                <i class="glyphicon glyphicon-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
                    <li>
					<form role="form" action="logout.php" style = "padding-top:12px">
					<button type="submit" class="btn btn-primary">Logout</button>
					</form>					
					</li>
      			</ul>
  			</div>
		</nav>


        				<div class="crop">
    						<img src="Materials/login_pic1.jpg" alt="Login Image" id = "slide" />
						</div>
<div class="row" style = "margin:40px">
  <div class="col-md-3">
    <a href="location.html" class="thumbnail">
      <h1 style = "text-align:center">Where to go?</h1>
      <img src="Materials/Where-to-go.png" alt="Pulpit Rock" style="width:500px;height:100%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="ChatRoom/chat.html" class="thumbnail">
      <h1 style = "text-align:center">Who to chat?</h1>
      <img src="Materials/Who-to-chat.png" alt="Moustiers Sainte Marie" style="width:500px;height:100%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="post_page.php" class="thumbnail">
      <h1 style = "text-align:center">What is happening?</h1>
      <img src="Materials/What-happen.png" alt="Cinque Terre" style="width:500px;height:100%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="InProgress.html" class="thumbnail">
      <h1 style = "text-align:center">How to ask for help?</h1>
      <img src="Materials/Ask-for-help.png" alt="Cinque Terre" style="width:500px;height:100%">
    </a>
  </div>
</div>
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
    <script>
        var user = "<?php echo $_SESSION['user']?>";
        var firstLogin = "<?php echo $_SESSION['first']?>";
        var name = "<?php echo $_SESSION['firstname']?>";
        $("#account").html(user + "'s Account");

        if(firstLogin == 1)
        {
            alert("Welcome to Traveler's Hub! It seems your profile is still blank... Click on " + user + "'s Account to update your personal information. Let the team know if you have any questions!");
        }
        else
        {
            $("#account").html(name + "'s Account");
        }
    </script>
</html>