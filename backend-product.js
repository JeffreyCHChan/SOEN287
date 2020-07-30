function deleteItem(rowId){
    var row = document.getElementById(rowId);
    var table = row.parentNode;
    while ( table && table.tagName != 'TABLE' )
        table = table.parentNode;
    if ( !table )
        return;
    table.deleteRow(row.rowIndex);
}
function backendProductConfirmation(){
    var section = document.getElementById("sectionSearch").value;
    var productName = document.getElementById("productName").value;
    var quantity = document.getElementById("quantity").value;
    var weight = document.getElementById("weight").value;
    var unitsOfMeasure = document.getElementById("units").value;
    var price =  document.getElementById("price").value;
    var productDescription = document.getElementById("productDescription").value;
    var productBrand = document.getElementById("productBrand").value;
    var countryOfOrigin = document.getElementById("origin").value;
    var productNumber = document.getElementById("productNumber").value;
    confirm("Is this the correct information? \nSection: "+section+"\nProduct Name: " + productName+"\nQuantity: "+quantity+"\nAverage Cost: "+ weight+"\nUnit of Measure: " +unitsOfMeasure+"\nPrice: $" +price + "\nProduct Description: "+ productDescription 
    +"\nProduct Brand: " +productBrand + "\nCountry of Origin: "+countryOfOrigin+"\nProduct Number: " + productNumber)
}

function editProduct(){
    var section = document.getElementById("sectionSearch");
    var productName;
    var quantity;
    var weight;
    var units;
    var price;
    var productDescription;
    var productBrand;
    var countryOfOrigin;
    var productNumber;
}

function addProduct(){
    var section = document.getElementById("sectionSearch");
    var productName;
    var quantity;
    var weight;
    var units;
    var price;
    var productDescription;
    var productBrand;
    var countryOfOrigin;
    var productNumber;
}