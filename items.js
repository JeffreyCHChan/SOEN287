/*Philip Arvanitis 29041931*/

var descr = document.getElementsByClassName("more");


function expand() {
    descr[0].classList.toggle("active");
    var descriptionDisplay = descr[0].nextElementSibling;
    if (descriptionDisplay.style.maxHeight) {
        descriptionDisplay.style.maxHeight = null;
    } else {
        descriptionDisplay.style.maxHeight = descriptionDisplay.scrollHeight + "px";
    }
};

var quantity = document.getElementsByClassName("quantity");
var multi = document.getElementById("multi").value;
var name = document.getElementById("productName").innerHTML;


function cartCheck() {
    if (sessionStorage.getItem(this.name) !== null) {
        if (sessionStorage.getItem(this.name) != ""){
            multi = parseInt(sessionStorage.getItem(this.name), 10);
            document.getElementById("multi").value = multi
        }
    }

    if (multi > 0) {
        for (i = 0; i < quantity.length; i++) {
            quantity[i].classList.toggle("empty");
            totalValue();
        }
    }
}

function addCart() {
    var i;
    for (i = 0; i < quantity.length; i++) {
        quantity[i].classList.toggle("empty");
    }
    if (quantity[0].classList.contains("empty")) {
        multi++;
        document.getElementById("multi").value = multi;
        totalValue();
        sessionStorage.setItem(this.name, multi)
    }
}

function add() {
    multi++;
    document.getElementById("multi").value = multi;
    sessionStorage.setItem(this.name, multi)
    totalValue();

}

function minus() {
    if (multi > 0) {
        multi--;
        document.getElementById("multi").value = multi;
        sessionStorage.setItem(this.name, multi)
        totalValue();
    }
    if (multi == 0) {
        addCart();
        sessionStorage.removeItem(this.name);
    }
}

function totalValue() {
    var amount = document.getElementById("amount").innerHTML;
    var price = amount.match(/\d+\.\d+/);
    var cost = multi * price;
    document.getElementById("tCost").innerHTML = "Total Cost: $" + cost.toFixed(2);
}

