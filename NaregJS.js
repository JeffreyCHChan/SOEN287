//Nareg Mouradian 40044254
var content = document.getElementById("content");
var button = document.getElementById("more-description");

button.onclick = function(){

    if(content.className == "open"){
        content.className = "";
    } else{
        content.className = "open";
    }
};
