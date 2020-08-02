    var quantity=document.getElementById("quantity");
    var price;
    var unit=document.getElementById("unit").innerHTML.match(/\d{1,}.\d\d/);

    quantity.onclick=function(){
    price=(quantity.value*unit).toFixed(2);
    document.getElementById("pricetag").innerHTML="price: "+price+" $";

    }

    document.getElementById("button").onclick=function(){
    alert("The item has been added to your cart");}

    var btn= document.getElementById("downbtn");

   btn.onclick=function(){

   var x = document.getElementById("moreDescription");
  if (x.style.display === "none") {
    x.style.display = "block";
   btn.value = "↑"
  } else {
    x.style.display = "none";
    btn.value="↓"
  }

    }