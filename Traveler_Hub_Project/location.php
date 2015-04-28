<!DOCTYPE html>

   <?php

    session_start();


    if(!isset($_SESSION['user'])) {
    header("Location: loginPage.html");
}
header('Content-Type: text/html; charset=UTF-8');
   
?>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Local Information</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href="stylepages/color.css">
    <link rel = "stylesheet" href="stylepages/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>  
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all" rel="stylesheet">
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
      
    <style>
    
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>

var myCenter=new google.maps.LatLng(51.508742,-0.120850);
var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });;
var map;

function initialize() {

  var markers = [];
  
  var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

 map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);

 if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function (position) {
         initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
         map.setCenter(initialLocation);
     });
 }
  
 marker.setMap(map);
    
  

 var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
 map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

 var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));


 google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
}

function currentLoc()
{
if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function (position) {
         myCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
         marker.setPosition(myCenter);
         marker.setAnimation(google.maps.Animation.BOUNCE)
         map.setCenter(myCenter)
     });
 }
map.setZoom(15);

}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <style>
      #target {
        width: 345px;
      }
    </style>
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
  		</div>
  </nav>
  
  
    <input id="pac-input" class="controls" type="text" placeholder="search">
    <div id="map-canvas" style="width:100%;height:650px;"></div>
    
    <button class = "btn btn-primary" style = "width:100%" onclick="currentLoc()">My Location</button>
  <div class="col-md-3">
    <a href="restaurant.html" target="_blank" class="thumbnail">
      <h1 style = "text-align:center">Restaurant</h1>
      <img src="Materials/Who-to-chat.png" alt="Moustiers Sainte Marie" style="width:5px;height:10%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="Sightsees.html" target="_blank" class="thumbnail">
      <h1 style = "text-align:center">Sightsees</h1>
      <img src="Materials/Who-to-chat.png" alt="Moustiers Sainte Marie" style="width:5px;height:10%">
    </a>
  </div>
  <div class="col-md-3">
    <a href="store.html" target="_blank" class="thumbnail">
      <h1 style = "text-align:center">Mall</h1>
      <img src="Materials/Who-to-chat.png" alt="Moustiers Sainte Marie" style="width:5px;height:10%">
    </a>
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
<p id="demo"></p>


<nav class="navbar navbar-pills" style = "height: 0px">
  <div class="container-fluid">
	<h4 style = "color: #FFFFFF"> Copy rights: Travelers' Hub 2015 </h4>
  </div><!-- /.container-fluid -->
</nav>        
        
        
        </div>
  </body>

<!--NOTE-->
   <script>
        var user = "<?php echo $_SESSION['user']?>";
        var name = "<?php echo $_SESSION['firstname']?>";
        $("#account").html(user + "'s Account");

        if(name =="")
        {
            
        }
        else
        {
            $("#account").html(name + "'s Account");
        }
    </script>
</html>