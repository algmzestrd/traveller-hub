/**
 * Created by alberto on 3/9/15.
 */
$(document).ready(function(){
    $("#submitPost").click(function(){
        var title = $("#usr").val();
        var description = $("#comment").val();

// Checking for blank fields.
        if( title =='' || description ==''){
            $("#error").text("Please fill all fields");
            return false;
        }else {
            $.post("postingCode.php",{ title:title, description:description}, function(data) {
                if(data =='success'){
                    window.location.replace("main_page.php");
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