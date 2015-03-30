/**
 * Created by alberto on 3/9/15.
 */
function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

$(document).ready(function(){
    $("#submitPost").click(function(){
        if($("#submitPost").attr('name') == "submit")
        {
            $("#error").text("Please select a type of submission.");
            return false;
        }
        var title = $("#usr").val();
        var description = $("#comment").val();
        var location = "";
        var limit = "";
        var type = "";
        var ID = Math.floor(Math.random()*10001);
        if($("#submitPost").attr('name') == "activity") {
            location = $("#location").val();
            limit = $("#limit").val();
            if(!isNumeric(limit))
            {
                $("#error").text("Please enter a numeric limit.");
                return false;
            }
            type = "activity";
        }
        else
        {
            type = $("#submitPost").attr('name');
        }


// Checking for blank fields.
        if( title =='' || description ==''){
            $("#error").text("Please fill all fields");
            return false;
        }else {
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

            $.post("postingCode.php",{ title:title, description:description, id:ID, time:time, location:location, limit:limit, type:type}, function(data) {
                if(data =='success'){
                    location.reload();
                }else{
                    $("#error").text(data);
                }
            })
                .fail(function() {
                    alert("error");
                })
        }
        return false; });
});