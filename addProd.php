
<?php
function  c_element($e_name, $parent){
    global $xml;
    $node=$xml->createElement($e_name);
    $parent->appendChild($node);
    return $node;

}
function c_value($value, $parent){
    global $xml;
    $value=$xml->createTextNode($value);
    $parent ->appendChild($value);
    return $value;

}

$section = $_POST['product'];
$productName = $_POST['productName'];
$quantity= $_POST['quantity'];
$weight = $_POST['weight'];
$units= $_POST['units'];
$price = $_POST['price'];
$productDescription= $_POST['description']; 
$productBrand= $_POST['productBrand'];
$countryOfOrigin= $_POST['countryOfOrigin'];
$productNumber= $_POST['productNumber'];


$xml = new DomDocument('1.0', 'utf-8');

$xml->load("prodList.xml");
$root=$xml->getElementsByTagName("productList")->item(0); //first element




echo print_r($_POST);

//items themself

$pSection=c_element("$section",$root);//$_POST['product']
c_value("Type",$pSection);


$pName=c_element("productName", $pSection);
c_value("$productName", $pName);//appends to the section

$pQuantity=c_element("quantity", $pName);
c_value("$quantity",$pQuantity);//appends to the item name

$pWeight=c_element("weight", $pName);
c_value("$weight",$pWeight);//appends to the item name

$pUnits=c_element("units", $pName);
c_value("$units",$pUnits);//appends to the item name

$pPrice=c_element("price", $pName);
c_value("$price",$pPrice);//appends to the item name

$pProductDescription=c_element("weight", $pName);
c_value("$productDescription",$pProductDescription);//appends to the item name

$pProductBrand=c_element("brand", $pName);
c_value("$productBrand",$pProductBrand);//appends to the item name

$pCountryOfOrigin=c_element("countryOfOrigin", $pName);
c_value("$countryOfOrigin",$pCountryOfOrigin);//appends to the item name

$pProductNumber=c_element("productNumber", $pName);
c_value("$productNumber",$pProductNumber);//appends to the item name



$xml->formatOutput=true;
$xml->saveXML();
$xml->save("prodList.xml");


?>