/**
 * Created by alberto on 3/30/15.
 */
$(document).ready(function(){

    var jsonObj = "";
    var currentUser = "";

    $.post("checkUser.php" ,{} , function(data)
        {
            currentUser = data;
        }
    );



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
              
                var edit = document.createElement('input');
                edit.className = 'Edit';
                edit.type = "submit";
                edit.value = "Edit Post!";
                edit.id = user+"edit";
                edit.action = "post_editing_page.html";
                var moreText = document.createTextNode("Edit Post!");
                edit.appendChild(moreText);
                div.appendChild(edit);
                edit.onclick = Edit;
                div.id = id;
                div.style.border = '2px solid red';
                div.style.backgroundColor = 'rgb(255, 255, 255)';
                var j;
                for( j = 0; j < numberOfParticipants; j++)
                {
                    var newImg = document.createElement('img');
                    newImg.setAttribute("src","Materials/user.png");
                    newImg.setAttribute("height", "20");
                    newImg.setAttribute("width","20");
                    div.appendChild(newImg);
                }
                $("#warp").append(div);
                if(currentUser.split("@")[0] != user)
                {
                $("#" +user+"edit").hide();
                }
            }
        } else{
            alert("There was an error loading the page.");
        }
    })
        .fail(function() {
            alert("Cannot communicate with server.");
        })

});