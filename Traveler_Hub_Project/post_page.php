<!doctype html>
<?php
session_start();
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="waterfall.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all" rel="stylesheet">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="typeahead.min.js"></script>
        
        <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    <script src="scriptpages/ddajaxsidepanel.js"></script>
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

            function Edit()
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
                $.post("post_updating.php",{ id:activityID, time:time}, function(data) {
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
      				<a class="navbar-brand" href="main_page.php">
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
		</nav>
		
		<div style = "text-align:center; padding-top: 30px">
		<a href="post_editing_page.html" rel="ajaxpanel"><button type="button" class="btn btn-primary">Post</button></a>
<div id="warp" class="warp">
    <div class="full" id="row1">
        <div class="water">
        </div>
        <div class="water">
           
        </div>
        <div class="water">
          
        </div>
        <div class="water">
           
        </div>
    </div>
    <div class="full" id="row2">
        <div class="water">
            
        </div>
        <div class="water">
           
        </div>
        <div class="water">
            
        </div>
        <div class="water">
            
        </div>
    </div>
    <div class="full" id="row3">
        <div class="water">
           
        </div>
        <div class="water">
            
        </div>
        <div class="water">
           
        </div>
        <div class="water">
            
        </div>
    </div>
    <div class="full last" id="row4">
        <div class="water">
            
        </div>
        <div class="water">
           
        </div>
        <div class="water">
            
        </div>
        <div class="water">
            
        </div>
    </div>
</div>
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
     

<nav class="navbar navbar-pills navbar-fixed-bottom" style = "height: 0px">
    <div class="container-fluid">
        <h4 style = "color: #FFFFFF"> Copy rights: Travelers' Hub 2015 </h4>
    </div><!-- /.container-fluid -->
</nav>
    </body>

</html>