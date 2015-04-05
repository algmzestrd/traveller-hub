<!doctype html>
<?php
session_start();
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="scriptpages/ddajaxsidepanel.js"></script>
        <script type="text/javascript" src="waterfall.js"></script>
        <script>
            function Join()
            {
                var activityID = this.id;
                var date = new Date();
                var curr_hour = date.getHours();
                var curr_min = date.getMinutes();
                if(curr_min < 10)
                {
                    curr_min = "0" + curr_min;
                }
                if(curr_hour > 12)
                {
                    curr_hour = curr_hour - 12;
                    curr_min = curr_min + "PM";

                }
                else {
                    if(curr_hour != 0 && curr_hour != 12)
                    {
                        curr_min = curr_min + "AM";
                    }
                    else if(curr_hour == 12)
                    {
                        curr_min = curr_min + "PM";
                    }
                    else
                    {
                        curr_hour = 12;
                        curr_min = curr_min + "AM";
                    }
                }
                var time = curr_hour + ":" + curr_min;
                $.post("joining.php",{ id:activityID, time:time}, function(data) {
                    if(data =='done'){
                        location.reload();
                    }else{
                        alert(data);
                    }
                })
                        .fail(function() {
                            alert("Could not communicate with server.");
                        })
            };
        </script>
    <title>Travelers' Hub Posts List</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" type="text/css" href="stylepages/color.css">
          <link rel = "stylesheet" type="text/css" href="stylepages/style.css">
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
      				<li><a href="#" id="account">My Account</a></li>
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
		
		<div style = "text-align:center; padding-top: 30px">
		<a href="post_editing_page.html" rel="ajaxpanel"><button type="button" class="btn btn-primary">Post</button></a>
		</div>
		
		<!-- Start waterfall here -->

		<div id="warp" class="warp">
        </div>
        <script>
            var user = "<?php echo $_SESSION['user']?>";
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


		<!-- End waterfull here -->
    </body>

</html>