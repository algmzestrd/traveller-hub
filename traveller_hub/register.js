/**
 * Created by alberto on 3/9/15.
 */
$(document).ready(function(){
    $("#registerButton").click(function(){
        var email = $("#inputEmail").val();
        var password = $("#inputPassword").val();

        $('input[type="email"]').css("border", "1px solid black");
        $('input[type="email"]').css("box-shadow", "0 0 3px black");
        $('input[type="password"]').css("border", "1px solid black");
        $('input[type="password"]').css("box-shadow", "0 0 3px black");
// Checking for blank fields.
        if( email =='' || password ==''){
            if(email == '') {
                $('input[type="email"]').css("border", "2px solid red");
                $('input[type="email"]').css("box-shadow", "0 0 3px red");
            }
            if(password == '') {
                $('input[type="password"]').css("border", "2px solid red");
                $('input[type="password"]').css("box-shadow", "0 0 3px red");
            }
            $("#error").text("Please fill all fields");
            return false;
        }else {
            $.post("register.php",{ inputEmail:email, inputPassword:password}, function(data) {
                if(data =='Email or password is already taken.'){
                    $("#error").text(data);
                    return false;
                } else if(data=='Registration successful!'){
                    //     $("form")[0].reset();
                    $("#error").text(data);
                    return false;
                } else{
                    alert(data);
                }
            })
                .fail(function() {
                    alert("error");
                })
        }
        return false; });
});