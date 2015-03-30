var i = 0; /* Set Global Variable i */
function increment(){
i += 1; /* Function for automatic increment of field's "Name" attribute. */
}

function Location_Label(){
    document.getElementById("submitPost").setAttribute("name","activity");
document.getElementById('categories1').innerHTML = '';
var y = document.createElement("LABEL");
var t = document.createTextNode("Location");
y.setAttribute("for", "location");
y.appendChild(t);
document.getElementById("categories1").appendChild(y);
}

function Location_TextArea(){
var y = document.createElement("TEXTAREA");
y.setAttribute("type", "text");
    y.setAttribute("id", "location");
y.setAttribute("placeholder", "Enter the Activity Location");
y.setAttribute("Name", "textelement_" + i);
y.setAttribute("class", "form-control");
document.getElementById("categories1").appendChild(y);
}

function NumberPeople_Label(){
document.getElementById('categories2').innerHTML = '';
var y = document.createElement("LABEL");
var t = document.createTextNode("Limit of the Number of Participants");
y.setAttribute("for", "limit");
y.appendChild(t);
document.getElementById("categories2").appendChild(y);
}

function NumberPeople_TextArea(){
var y = document.createElement("TEXTAREA");
y.setAttribute("type", "text");
    y.setAttribute("id", "limit");
y.setAttribute("placeholder", "Specify the Limit of the Number of Participants");
y.setAttribute("Name", "textelement_" + i);
y.setAttribute("class", "form-control");
document.getElementById("categories2").appendChild(y);
}

/* -------------------------------------------------------------------- */


function reset(){
document.getElementById('categories1').innerHTML = '';
document.getElementById('categories2').innerHTML = '';
}

function setQuestion(){
    document.getElementById("submitPost").setAttribute("name","question");
}

function setReview(){
    document.getElementById("submitPost").setAttribute("name","review");
}