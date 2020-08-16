//Jeffrey Chak-Him Chan 40152579

function hiddenSwitch(){
    var x = document.getElementById("moreDescription"); //creating a instance variable looking for the id moreDescription
    if (x.style.display === "block") {
     x.style.display = "none";//if the variable carries the attribute of display is "none" then we set it to block which reveals the code
    } else {
    x.style.display = "block"; //else then set the attribute to none which hides it
    }
}
var names = document.getElementById("productName").innerHTML; 
function milkAdd(){
    var mQuantity = document.getElementById("quantity").value; //takes the value from the input
    //var cap = document.
    //if(){} //maybe check if it is less than the current inventory
    mQuantity++;
    document.getElementById("quantity").value = mQuantity;
    sessionStorage.setItem(this.names, mQuantity);
}

function cokeAdd(){
    var cQuantity = document.getElementById("quantity").value; //takes the value from the input
    //var cap = document.
    //if(){} //maybe check if it is less than the current inventory
    cQuantity++;
    document.getElementById("quantity").value = cQuantity;
    sessionStorage.setItem(this.names, cQuantity);
}

function sodaAdd(){
    var sQuantity = document.getElementById("quantity").value; //takes the value from the input
    //var cap = document.
    //if(){} //maybe check if it is less than the current inventory
    sQuantity++;
    document.getElementById("quantity").value = sQuantity;
    sessionStorage.setItem(this.names, sQuantity);
}
function milkSubtract(){
    var mquantity = document.getElementById("quantity").value; //takes the value from the input
    if(mquantity>1){
    mquantity--;
    document.getElementById("quantity").value = mquantity;
    sessionStorage.setItem(this.names, mquantity);
    }
    else{
        document.getElementById("quantity").value = mquantity;
        sessionStorage.setItem(this.names, mquantity);
    }
}
function cokeSubtract(){
    var cQuantity = document.getElementById("quantity").value; //takes the value from the input
    if(cQuantity>1){
    cQuantity--;
    document.getElementById("quantity").value = cQuantity;
    sessionStorage.setItem(this.names, cQuantity);
    }
    else{
        document.getElementById("quantity").value = cQuantity;
        sessionStorage.setItem(this.names, cQuantity);
    }
}

function sodaSubtract(){
    var sQuantity = document.getElementById("quantity").value; //takes the value from the input
    if(sQuantity>1){
    sQuantity--;
    document.getElementById("quantity").value = sQuantity;
    sessionStorage.setItem(this.names, sQuantity);
    }
    else{
        document.getElementById("quantity").value = quantity;
        sessionStorage.setItem(this.names, quantity);
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
    sessionStorage.setItem(this.names, quantity);
}

function milkCost(){
    var milkQuantity = document.getElementById("quantity").value;
    var milkPrice = document.getElementById("price").innerHTML;
    var msubTotal = milkQuantity * (parseFloat(milkPrice)); 
    document.getElementById("sub-total").innerHTML = ("<span class=sub-total><b>Sub-Total: </b></span> $"+msubTotal.toFixed(2));//toFixed limits the digits after the decimals
}

function sodaCost(){
    var sodaQuantity = document.getElementById("quantity").value;
    var sodaPrice = document.getElementById("price").innerHTML;
    var ssubTotal = sodaQuantity * (parseFloat(sodaPrice)); 
    document.getElementById("sub-total").innerHTML = ("<span class=sub-total><b>Sub-Total: </b></span> $"+ssubTotal.toFixed(2));//toFixed limits the digits after the decimals
}

function cokeCost(){
    var cokeQuantity = document.getElementById("quantity").value;
    var cokePrice = document.getElementById("price").innerHTML;
    var csubTotal = cokeQuantity * (parseFloat(cokePrice)); 
    document.getElementById("sub-total").innerHTML = ("<span class=sub-total><b>Sub-Total: </b></span> $"+csubTotal.toFixed(2));//toFixed limits the digits after the decimals
}

function milkQuantityCheck(){
    var milkQuantity = document.getElementById("quantity").value;
    if (sessionStorage.getItem(this.names) !== null) {
        if (sessionStorage.getItem(this.names) != ""){
            milkQuantity = parseInt(sessionStorage.getItem(this.names), 10); //sessionStorage only stores it until as the tab is closed, 10 is the base number system
            document.getElementById("quantity").value = milkQuantity;
        }
    }
    milkCost();
}

function sodaQuantityCheck(){
    var sodaQuantity = document.getElementById("quantity").value;
    if (sessionStorage.getItem(this.names) !== null) {
        if (sessionStorage.getItem(this.names) != ""){
            sodaQuantity = parseInt(sessionStorage.getItem(this.names), 10); //sessionStorage only stores it until as the tab is closed, 10 is the base number system
            document.getElementById("quantity").value = sodaQuantity;
        }
    }
    sodaCost();
}

function cokeQuantityCheck(){

    var cokeQuantity = document.getElementById("quantity").value;
    if (sessionStorage.getItem(this.names) !== null) {
        if (sessionStorage.getItem(this.names) != ""){
            cokeQuantity = parseInt(sessionStorage.getItem(this.names), 10); //sessionStorage only stores it until as the tab is closed, 10 is the base number system
            document.getElementById("quantity").value = cokeQuantity;
        }
    }
    cokeCost();
}