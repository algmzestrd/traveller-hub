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



    $.post("getActivities.php",{}, function(data) 
    {

        if(data != "")
        {
            jsonObj = $.parseJSON(data);
            var numberOfPosts = jsonObj.length;
            var title;
            var description;
            var numberOfParticipants;
            var id;
            var user;
            var date;
            var i;
            var count = 1;
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
                
                function createChild()
                {
                    alert("Here " + i + " " + count + " " + numberOfPosts);
                    var string = "Title:" + " " + title + "\n";
                    string += "Description:" + " " + description + "\n";
                    string += "Posted By:" + " " + user + "\n";
                    string += "Who's In:" + " " + numberOfParticipants + "\n";
                    string += "Date:" + " " + date;
                    string += "\n";
                    var div = document.createElement('div');
                    var btn = document.createElement('button');
                    div.className = 'water';
                    div.innerHTML = string;
                    btn.id = id;
                    btn.className = 'Join';
                    btn.onclick = Join;
                    var text = document.createTextNode("Join Event!");
                    btn.appendChild(text);
                    btn.style.width = '70px';
                    btn.style.height = '10px';
                    div.appendChild(btn);
                    var edit = document.createElement('input');
                    edit.className = 'Edit';
                    edit.type = "submit";
                    edit.value = "Edit Post!";
                    edit.id = user+"edit";
                    edit.action = "post_editing_page.html";
                    edit.style.width = '70px';
                    edit.style.height = '10px';
                    var moreText = document.createTextNode("Edit Post!");
                    edit.appendChild(moreText);
                    div.appendChild(edit);
                    edit.onclick = Edit;
                    div.id = id;
                    div.style.boxShadow = '10px 10px 5px #888888';
                    div.style.background=  '#00FF99';
                    div.style.padding = '20px';
                    div.style.height =  '100%';
                    div.style.bottom = '-2px';
                    div.style.left = '5px';
                    div.style.right = '5px';
                    var j;
                    for( j = 0; j < numberOfParticipants; j++)
                    {
                        var newImg = document.createElement('img');
                        newImg.setAttribute("src","Materials/user.png");
                        newImg.setAttribute("height", "20");
                        newImg.setAttribute("width","20");
                        div.appendChild(newImg);
                    }
                    return div;
                }
                
                
                function on(element, type, func) 
                {
                    if (element.addEventListener) {
                    element.addEventListener(type, func, false);
                    } else if (element.attachEvent) {
                        element.attachEvent('on' + type, func);
                    } else {
                        element['on' + type] = func;
                    }
                }
                
                
                function getRowByHeight()
                {
                    var row = [this.$('row1'),this.$('row2'),this.$('row3'),this.$('row4')];
                    var height = [];
                    for(var i = 0;row[i];i++){
                        row[i].height = row[i].offsetHeight;
                        height.push(row[i]);
                    }
                    height.sort(function(a,b){
                    return a.height - b.height;
                    })
                    return height;
                }
                
                
                function getPageHeight()
                {
                    return document.documentElement.scrollHeight || document.body.scrollHeight ;
                }
                function getScrollTop()
                {
                   return document.documentElement.scrollTop || document.body.scrollTop;
                }
                function getClientHeigth()
                {
                    return document.documentElement.clientHeight || document.body.clientHeight;
                }
                
                
                function append()
                {
                    var i = 0,rows = this.getRowByHeight(),div,k;
                    for(;this.data[i];i++)
                    {
                        div = this.createChild();
                       
                        k = ((i+1)>4)?i%4:i;            
                        
                        rows[k].appendChild(div);
                    }
                }
                
                if(count <= numberOfPosts)
{
                $('#col' + count).append(createChild());
                count++;
                
}
                if(currentUser.split("@")[0] != user)
                {
                $("#" +user+"edit").hide();
                }
            }
        } 
        else{
            alert("There was an error loading the page.");
        }
    })
        .fail(function() {
            alert("Cannot communicate with server.");
        })

});