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
            $.post("postingCode.php",{ title:title, description:description, id:activityID}, function(data) {
                if(data =='success'){
                    window.location.replace("post_page.php");
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