/**
 * Created by alberto on 4/2/15.
 */
$.post("recovery.php",{email:"algomez@iastate.edu"}, function(data) {
    if(data =='success'){
        alert("Success");
    } else if(data=='failure'){
        alert("Failure");
    } else{
        alert(data);
    }
})
    .fail(function() {
        alert("error");
    })