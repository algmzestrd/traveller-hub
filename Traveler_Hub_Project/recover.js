/**
 * Created by alberto on 4/2/15.
 */

function Recover() {

    $("#registerButton").hide();
    $("#inputPassword").hide();
    $("#submitButton").html("<b>Submit</b>");
    $("#recover").hide();
    $("#error").text("Please enter the email address associated with the account and submit.");
    $("#submitButton").unbind("click").click(Mail);

}



function Mail() {

    var recoveryCode = Math.floor(Math.random()*10001);
    var inputEmail = $("#inputEmail").val();

    if(inputEmail == '')
    {
        $("#error").text("Please enter an email address");
        return false;
    }

    $.post("recovery.php", {email:inputEmail, code:recoveryCode}, function (data) {
        if (data == 'success') {
            alert("Thank you. If an account is associated with this email, you will receive instructions at that email shortly.");
            window.location.href = window.location.href;
        } else if (data == 'failure') {
            alert("There was an error while completing your request. Please try again.");
            window.location.href = window.location.href;
        } else {
            alert(data);
            window.location.href = window.location.href;
        }
    })
        .fail(function () {
            $("error").html(data);
//            window.location.href = window.location.href;
        })
}