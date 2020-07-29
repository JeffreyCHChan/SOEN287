//Nareg Mouradian 40044254
var content = document.getElementsByClassName("description");
var button = document.getElementsByClassName("more");

button.onclick = function(){

    if(content.className == "open"){
        content.className = "";
    } else{
        content.className = "open";
    }
};
