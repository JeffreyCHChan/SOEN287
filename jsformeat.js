    var quantity=document.getElementById("quantity");
    var price;
    var name=document.title;
    var unit=document.getElementById("unit").innerHTML.match(/\d{1,}.\d\d/);
    function Storeupdate(){
    if (typeof(Storage) !== "undefined") {
                 // Store
        sessionStorage.setItem("quan",(quantity.value));
        sessionStorage.setItem("title",name)

    } else {
        document.getElementById("pricetag").innerHTML = "Sorry, your browser does not support Web Storage...";
                    }
                     }


    if(sessionStorage.getItem("quan")!=null&& name==sessionStorage.getItem("title")){
    quantity.value=sessionStorage.getItem("quan");
    price=(quantity.value*unit).toFixed(2);
     document.getElementById("pricetag").innerHTML="price: "+price+" $";
    }


    quantity.onclick=function(){
    price=(quantity.value*unit).toFixed(2);
    document.getElementById("pricetag").innerHTML="price: "+price+" $";
    Storeupdate()

    }

    document.getElementById("button").onclick=function(){
    alert("The item has been added to your cart");}

    var btn= document.getElementById("downbtn");

   btn.onclick=function(){

   var x = document.getElementById("moreDescription");
  if (x.style.display === "none") {
    x.style.display = "block";

  } else {
    x.style.display = "none";

  }

    }

 function addbtn(){
   quantity.value=Number(quantity.value)+1;
   price=(quantity.value*unit).toFixed(2);
       document.getElementById("pricetag").innerHTML="price: "+price+" $";
       Storeupdate()

   }
   function minusbtn(){
   if(quantity.value<=1){
   quantity.value=1;
   }
      else quantity.value=Number(quantity.value)-1;


      price=(quantity.value*unit).toFixed(2);
          document.getElementById("pricetag").innerHTML="price: "+price+" $";
          Storeupdate()

      }