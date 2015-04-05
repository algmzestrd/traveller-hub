/**
 * Created by alberto on 3/30/15.
 */
$(document).ready(function(){

    var jsonObj = "";
    var currentUser = '<?php echo $_SESSION["user"]; ?>';
    alert(currentUser);



    $.post("getActivities.php",{}, function(data) {
        if(data != ""){
            jsonObj = $.parseJSON(data);

            var numberOfPosts = jsonObj.length;
            var title;
            var description;
            var numberOfParticipants;
            var id;
            var user;
            var date;
            var i;




            for(i = 0; i < numberOfPosts; i++)
            {
                title = jsonObj[i][1];
                description = jsonObj[i][2];
                numberOfParticipants = jsonObj[i][5];
                id = jsonObj[i][0];
                user = jsonObj[i][3];
                user = user.split("@");
                user = user[0];
                date = jsonObj[i][4];



                var string = "Title:" + " " + title + "\n";
                string += "Description:" + " " + description + "\n";
                string += "Posted By:" + " " + user + "\n";
                string += "Who's In:" + " " + numberOfParticipants + "\n";
                string += "Date:" + " " + date;
                string += "\n";
                var div = document.createElement('div');
                var btn = document.createElement('button');
                btn.id = id;
                btn.className = 'Join';
                btn.onclick = Join;
                var text = document.createTextNode("Join Event!");
                btn.appendChild(text);
                div.className = 'water';
                div.innerHTML = string;
                div.appendChild(btn);
                if(currentUser == jsonObj[i][3])
                {
                    var edit = document.createElement('button');
                    edit.className = 'Edit';
                    edit.id = id;
                    text = document.createTextNode("Edit Post!");
                    edit.appendChild(text);
                    div.appendChild(edit);
                }
                div.id = id;

                $("#warp").append(div);
            }
        } else{
            alert("There was an error loading the page.");
        }
    })
        .fail(function() {
            alert("Cannot communicate with server.");
        })

});