/**
 * Created by alberto on 4/2/15.
 */
$.post("recovery.php",{email:"algomez@iastate.edu"}, function(data) {
    if(data =='success'){
        window.location.replace("main_page.php");
    } else if(data=='invalid'){
        //     $("form")[0].reset();
        $("#error").text("Incorrect Email or Password");
        return false;
    } else{
        alert(data);
    }
})
    .fail(function() {
        alert("error");
    })