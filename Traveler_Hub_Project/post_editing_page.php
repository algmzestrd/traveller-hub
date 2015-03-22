<?php
include('postingCode.php');
?>

<!doctype html>
<html>
    <head>
    <title>Travelers' Hub Post Editing</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel = "stylesheet" href="stylepages/color.css">
          <link rel = "stylesheet" href="stylepages/style.css">	
          <script src="scriptpages/form.js" type="text/javascript"></script>
    </head>
    <body>
<form action ="" method="post">
    <div class="form-group">
        <input name="title" type="text" class="form-control" id="title" placeholder="Title">
    </div>
    <div class="form-group">
        <input name="description" type="text" class="form-control" id="description" placeholder="Description">
    </div>
    <div class="form-group">
        <input name="participants" type="text" class="form-control" id="participants" placeholder="Number Of Participants">
    </div>
    <div class="form-group">
        <input name="date" type="date" class="form-control" id="date" placeholder="Date">
    </div>
    <button name="posting" type="submit" class="btn btn-default custom"><b style = "color: #000000">Submit</b></button>
    <br><br><span><?php echo $error; ?></span>
</form>

<!--<label for="comment">Categorize your post:</label>
<div style = "text-align: center; padding-top:5px">
<button onclick = "Location_Label(); Location_TextArea(); NumberPeople_Label(); NumberPeople_TextArea();" class = "btn btn-danger custom">An Activity</button>
</div>
<div style = "text-align: center; padding-top:5px">
<button onclick = "reset();" class = "btn btn-warning custom">A Review</button>
</div>
<div style = "text-align: center; padding-top:5px">
<button onclick = "reset();" class = "btn btn-info custom">A Question</button>
</div>
<div class="form-group" id="categories1"></div>
<div class="form-group" id="categories2"></div>
<div style = "text-align: center">-->
</div>
</body>
    
</html>