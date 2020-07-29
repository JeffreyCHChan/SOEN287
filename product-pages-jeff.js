function hiddenSwitch(){
    var x = document.getElementById("moreDescription"); //creating a instance variable looking for the id moreDescription
    if (x.style.display === "block") {
     x.style.display = "none";//if the variable carries the attribute of display is "none" then we set it to block which reveals the code
    } else {
    x.style.display = "block"; //else then set the attribute to none which hides it
    }
}
function add(){
    var quantity = document.getElementById("quantity").value; //takes the value from the input
    //var cap = document.
    //if(){} //maybe check if it is less than the current inventory
    quantity++;
    document.getElementById("quantity").value = quantity;
    sessionStorage.setItem(this.name, quantity);
}

function subtract(){
    var quantity = document.getElementById("quantity").value; //takes the value from the input
    if(quantity>1){
    quantity--;
    document.getElementById("quantity").value = quantity;
    }
    else{
        document.getElementById("quantity").value = quantity;
        sessionStorage.setItem(this.name, quantity);
    }
}
function popUp(){
    alert("Added to cart");
}
function addToCart(){ 
    var node = document.getElementById(""); //change myList to the id of the shopping cart
    var textnode = document.createElement("li");         // Create a node
    var quantity = document.getElementById("quantity").value; //takes the value from the input
    var productName = document.getElementById("productName").innerHTML //takes the text value
    var productNumber = document.getElementById("productNumber").innerHTML
    var price = document.getElementById("price").innerHTML
    textnode.innerHTML = "Item: "+ productName+  " &nbsp;Price: "+parseFloat(price)+"$,   &nbsp; Id:"+productNumber+",  &nbsp; Quantity: " + quantity //parse double to get the price maybe
    node.appendChild(textnode);                              // Append the text to <li>
    document.getElementById("myList").appendChild(node); //change myList to the id of the shopping cart
    sessionStorage.setItem(this.name, quantity);
}

function cost(){
    var quantity = document.getElementById("quantity").value;
    var price = document.getElementById("price").innerHTML;
    var subTotal = quantity * (parseFloat(price)); 
    document.getElementById("sub-total").innerHTML = ("<span class=sub-total><b>Sub-Total: </b></span> $"+subTotal.toFixed(2));//toFixed limits the digits after the decimals
}

function quantityCheck(){
    if (sessionStorage.getItem(this.name) !== null) {
        if (sessionStorage.getItem(this.name) != ""){
            quantity = parseInt(sessionStorage.getItem(this.name), 10); //sessionStorage only stores it until as the tab is closed, 10 is the base number system
            document.getElementById("quantity").value = quantity;
        }
    }
    cost();
}
