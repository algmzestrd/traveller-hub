<!doctype html>
<html>
    <head>
    <title>Local Information</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">
    <style type="text/css">
    div.container {
        margin: 15px;   
    }
    div.left, div.right {
        float: left;
        padding: 10px;    
    }
    div.left {
        background-color:orange;    
    }
    div.right {
        background-color: yellow;    
    }
    #panel, #flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
    }

    #panel {
    padding: 50px;
    display: none;
    }
    </style>
    <script> 
    $(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle();
    });
    });
    </script>
          
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script type="text/javascript">

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } 
}

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false";

    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

</script>

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
    
  

  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
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

      // Create a marker for each place.
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
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
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
map.setZoom(18);

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
  
  
    </head>

<?php

session_start();


if(!isset($_SESSION['user']))
{
    header("Location: loginPage.html");
}

header('Content-Type: text/html; charset=UTF-8');?>
  
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
<<<<<<< HEAD
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map-canvas" style="width:100%;height:450px;"></div>
=======

<div id="googleMap" style="width:100%;height:200px;"></div>
>>>>>>> be895388ca7889bf838a7b09786d4e122483f154

<button class = "btn btn-primary" style = "width:100%" onclick="currentLoc()">My Location</button>

<div id="flip">Click to see restaurant around</div>
<div id="panel">
  <ul>
      <li>Chinese</li>
      <li>France</li>
      <li>Italian</li>
  </ul>
</div>  

<p id="demo"></p>


<nav class="navbar navbar-pills" style = "height: 0px">
  <div class="container-fluid">
	<h4 style = "color: #FFFFFF"> Copy rights: Travelers' Hub 2015 </h4>
  </div><!-- /.container-fluid -->
</nav>        
        
        
        </div>
        <script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
}
</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
    </body>
    
    
</html>