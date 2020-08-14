//Nareg Mouradian 40044254

//More Description button implementation of the accordion feature
var descInfo = document.getElementsByClassName("itemMore");

    for( var i=0; i<descInfo.length; i++) {
        descInfo[i].onclick = function() {
            descInfo[0].classList.toggle("active");
           var content = this.nextElementSibling;
           
           if(content.style.maxHeight) {
               content.style.maxHeight = null;
           } else {
               content.style.maxHeight = content.scrollHeight + "px";

        }
      
    }
    
}