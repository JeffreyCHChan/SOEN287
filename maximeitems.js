//Maxime Giroux 40157483

var x = 0;
var amountapple = 1;
var priceapple;
var amountbanana=1;
var pricebanana;
var amountraspberry=1;
var priceraspberry;



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

function increaseapple(){
    amountapple = parseInt(sessionStorage.getItem('refreshapple'),10)+1;
    document.getElementById("quantity").innerHTML=amountapple;
    parseInt(sessionStorage.setItem('refreshapple', amountapple), 10); 
}

function decreaseapple(){
    if(parseInt(sessionStorage.getItem('refreshapple'),10)>1){
        amountapple = parseInt(sessionStorage.getItem('refreshapple'),10)-1;
        document.getElementById("quantity").innerHTML=amountapple;
        parseInt(sessionStorage.setItem('refreshapple', amountapple), 10);
    }
}

function increasebanana(){
    amountbanana = parseInt(sessionStorage.getItem('refreshbanana'),10)+1;
    document.getElementById("quantity").innerHTML=amountbanana;
    parseInt(sessionStorage.setItem('refreshbanana', amountbanana), 10); 
}

function decreasebanana(){
    if(parseInt(sessionStorage.getItem('refreshbanana'),10)>1){
        amountbanana = parseInt(sessionStorage.getItem('refreshbanana'),10)-1;
        document.getElementById("quantity").innerHTML=amountbanana;
        parseInt(sessionStorage.setItem('refreshbanana', amountbanana), 10);
    }
}

function increaseraspberry(){
    amountraspberry = parseInt(sessionStorage.getItem('refreshraspberry'),10)+1;
    document.getElementById("quantity").innerHTML=amountraspberry;
    parseInt(sessionStorage.setItem('refreshraspberry', amountraspberry), 10); 
}

function decreaseraspberry(){
    if(parseInt(sessionStorage.getItem('refreshraspberry'),10)>1){
        amountraspberry = parseInt(sessionStorage.getItem('refreshraspberry'),10)-1;
        document.getElementById("quantity").innerHTML=amountraspberry;
        parseInt(sessionStorage.setItem('refreshraspberry', amountraspberry), 10);
    }
}

function bananacost(){
    pricebanana = parseInt(sessionStorage.getItem('refreshbanana'),10)*1.74;
    var n = pricebanana.toFixed(2);
    document.getElementById("fruitcost").innerHTML=("Price: $"+n);
}

function raspberrycost(){
    priceraspberry = parseInt(sessionStorage.getItem('refreshraspberry'),10)*3.99;
    var n = priceraspberry.toFixed(2);
    document.getElementById("fruitcost").innerHTML=("Price: $"+n);
}

function applecost(){
    priceapple = parseInt(sessionStorage.getItem('refreshapple'),10)*5.05;
    var n = priceapple.toFixed(2);
    document.getElementById("fruitcost").innerHTML=("Price: $"+n);
}

function savednumberapple(){
if(sessionStorage.getItem("hasCodeRunBeforeap")===null){
    sessionStorage.setItem('refreshapple', 1);
    sessionStorage.setItem("hasCodeRunBeforeap", true);
}
document.getElementById("quantity").innerHTML=(parseInt(sessionStorage.getItem('refreshapple'),10));
}

function savednumberbanana(){
    if(sessionStorage.getItem("hasCodeRunBeforeba")===null){
        sessionStorage.setItem('refreshbanana', 1);
        sessionStorage.setItem("hasCodeRunBeforeba", true);
    }
    document.getElementById("quantity").innerHTML=(parseInt(sessionStorage.getItem('refreshbanana'),10));
}

function savednumberraspberry(){
    if(sessionStorage.getItem("hasCodeRunBeforera")===null){
        sessionStorage.setItem('refreshraspberry', 1);
        sessionStorage.setItem("hasCodeRunBeforera", true);
    }
    document.getElementById("quantity").innerHTML=(parseInt(sessionStorage.getItem('refreshraspberry'),10));
}

function addtocart(){
    alert("This item has been added to your cart!")
}

    

