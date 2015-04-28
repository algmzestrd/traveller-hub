<!DOCTYPE html>
<html>
<head>
<title>Profile Page</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">
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

<script type="text/javascript">

var loadedobjects=""
var rootdomain="http://"+window.location.hostname

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) 
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
page_request.open('GET', url, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}

window.onload = function() {
  ajaxpage('profile_update_page1.php', 'rightcolumn');
};

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

<style type="text/css">
#leftcolumn{
float:left;
width:17%;
height: 100%;
padding: 3%;
}

#leftcolumn a{
padding: 30px 0 1px 0;
display: block;
width: 100%;
text-decoration: none;
color: black;
border-bottom: 1px solid #89BA4E;
}

#leftcolumn a:hover{
background-color: #89BA4E;
color: #FFFFFF
}

#rightcolumn{
float:left;
width:75%;
height: 100%;
margin-left: 10px;
padding: 3%;
}

* html #rightcolumn{
height: 100%;
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

<div id="leftcolumn">
<a href="javascript:ajaxpage('profile_update_page1.php', 'rightcolumn');">Basic Information</a>
<a href="javascript:ajaxpage('profile_update_page2.php', 'rightcolumn');">Security Setting</a>
<a href="javascript:ajaxpage('profile_update_page3.php', 'rightcolumn');">Additional Information</a>

</div>

<div id="rightcolumn"></div>
<div style="clear: left; margin-bottom: 1em"></div>

<nav class="navbar navbar-pills navbar-fixed-bottom" style = "height: 0px">
  <div class="container-fluid">
	<h4 style = "color: #FFFFFF"> Copy rights: Travelers' Hub 2015 </h4>
  </div><!-- /.container-fluid -->
</nav> 

</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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