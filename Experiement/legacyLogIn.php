<?php
include('loginCode.php');
include('register.php');
if($_SESSION['login_user'] ==  1){
//header("location: post_editing_page.html");
    $error = "Login Successful!";
}
?>
<!DOCTYPE HTML>
<!--suppress CheckImageSize -->
<meta charset="UTF-8">
<html>
<head>
    <title>Travelers' Hub Login</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href="stylepages/color.css">
    <link rel = "stylesheet" href="stylepages/style.css">
</head>
<script>

    var slideimages = []; // create new array to preload images
    slideimages[0] = new Image(); // create new instance of image object
    slideimages[0].src = "Materials/login_pic1.jpg"; // set image src property to image path, preloading image in the process
    slideimages[1] = new Image();
    slideimages[1].src = "Materials/login_pic2.jpg";
    slideimages[2] = new Image();
    slideimages[2].src = "Materials/login_pic3.jpg"

</script>
<script></script>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="Materials/login_picture.gif" height="45" width="60">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
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
            <li><a href="#">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </li>
            <li role = "presentation" class = "active"><iframe src="http://free.timeanddate.com/clock/i4k62t3m/n76/fcfff/tct/pct/pa9/tt0/tm1/ta1/tb4" frameborder="0" width="184" height="50" allowTransparency="true"></iframe></li>
        </ul>
    </div>
</nav>
<div id='SrchHero' class='siteSrchBar banner'>
    <div class='hero notranslate'>
        <div class='srchBoxHolder'>
            <div class='tbl'>
                <div class='cell'>
                    <div class='srchBox'>
                        <h1>Travelers' Hub</h1>
                        <form action ="" method="post">
                            <div class="form-group">
                                <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="inputPassword" type="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                            <button name="submit" type="submit" class="btn btn-default custom"><b style = "color: #000000">Login</b></button>
                            <button name="register" type="submit" class="btn btn-primary custom"><b style = "color: #FFFFFF">Register</b></button>
                            <br><br><span><?php echo $error; ?></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="crop">
            <img src="Materials/login_pic1.jpg" alt="Login Image" id = "slide" />
        </div>
    </div>
</div>

<nav class="navbar navbar-pills" style = "height: 0">
    <div class="container-fluid">
        <h4 style = "color: #FFFFFF"> Copyright: Travelers' Hub 2015 </h4>
    </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">

    //variable that will increment through the images
    var step = 0;

    function slideit(){
        //if browser does not support the image object, exit.
        if (!document.images)
            return;
        document.getElementById('slide').src = slideimages[step].src;
        if (step < 2)
            step++;
        else
            step=0;
        //call function "slideit()" every 2.5 seconds
// setTimeout("slideit()",0)
    }

    slideit()

</script>
</body>


</html>