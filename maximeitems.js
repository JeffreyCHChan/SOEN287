
var x = 0;
var amount = 1;
var price;

function bananaDescription(){
    if(x==0){
        document.getElementById("description").innerHTML=("Sweet bananas that have made their way from Mexico <br> <b>Origin:</b> Mexico <br> Product number: 4011");
        return x=1;
    }
    else{
        document.getElementById("description").innerHTML=("");
        return x =0;
    }
}

function raspberryDescription(){
    if(x==0){
        document.getElementById("description").innerHTML=("Raspberries that have been harvested organically to protect our environment.<br><b>Origin: </b>Mexico <br>Product number: 94054");
        return x=1;
    }
    else{
        document.getElementById("description").innerHTML=("");
        return x =0;
    }
}

function appleDescription(){
    if(x==0){
        document.getElementById("description").innerHTML=("Red and juicy McIntosh apples brought to you by local Canadian farmers.<br><b>Origin:</b> Canada <br>Product number: 4152");
        return x=1;
    }
    else{
        document.getElementById("description").innerHTML=("");
        return x =0;
    }
}

function increase(){
    amount = amount+1;
    document.getElementById("quantity").innerHTML=amount;
}

function decrease(){
    if(amount>1){
        amount = amount-1;
        document.getElementById("quantity").innerHTML=amount;
    }
}

function bananacost(){
    price = amount*1.74;
    var n = price.toFixed(2);
    document.getElementById("fruitcost").innerHTML=("Price: $"+n);
}

function raspberrycost(){
    price = amount*3.99;
    var n = price.toFixed(2);
    document.getElementById("fruitcost").innerHTML=("Price: $"+n);
}

function applecost(){
    price = amount*5.05;
    var n = price.toFixed(2);
    document.getElementById("fruitcost").innerHTML=("Price: $"+n);
}

window.onbeforeunload=function(){
    sessionStorage.setItem('quantity', amount);
}

window.onload = function(){
    amount=sessionStorage.getItem('quantity');
}
