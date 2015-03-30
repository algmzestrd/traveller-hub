/**
 * Created by alberto on 3/9/15.
 */
$(document).ready(function(){
    $("#submitPost").click(function(){
        var title = $("#usr").val();
        var description = $("#comment").val();
        var activityID = Math.floor(Math.random()*10001)

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

            $.post("postingCode.php",{ title:title, description:description, id:activityID, time:time}, function(data) {
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