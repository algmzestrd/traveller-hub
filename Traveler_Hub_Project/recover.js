/**
 * Created by alberto on 4/2/15.
 */
function Mail() {

    var recoveryCode = Math.floor(Math.random()*10001);

    $.post("recovery.php", {email: "algomez@iastate.edu", code:recoveryCode}, function (data) {
        if (data == 'success') {
            alert("Success");
        } else if (data == 'failure') {
            alert("Failure");
        } else {
            alert(data);
        }
    })
        .fail(function () {
            alert("error");
        })
}