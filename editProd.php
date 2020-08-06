
//need to find way to retrive a specific item and return it
<?php
function  c_element($e_name, $parent){
    global $xml;
    $node=$xml->createElement($e_name);
    $parent ->appendChild($node);
    return $node;

}
function c_value($value, $parent){
    global $xml;
    $value=$xml->createTextNode($value);
    $parent ->appendChild($value);
    return $value;

}




$xml = new DomDocument('1.0', 'utf-8');
$xml->load("prodList.xml");
$root=$xml->getElementByTagName("prodList")->item(0); //first element





$xml->formatOutput = true;
$prodList= $xml->createElement('prodList');
$xml->appendChild($prodList);


echo print_r($_POST);

//items themself

$pSection=$xml->createElement($_POST['product']);
$prodList->appendChild($pSection);//appends to the whole product list

$name=$xml->c_element("productName", $_POST['productName']);
$c_value("productName",$name);//appends to the section
/*
$quantity=c_element("quantity", $_POST['quantity']);
$name->appendChild($quantity);//appends to the item name

$weight=$xml->createElement("weight", $_POST['weight']);
$name->appendChild($weight);//appends to the item name

$units=$xml->createElement("units", $_POST['units']);
$name->appendChild($units);//appends to the item name

$price=$xml->createElement("price", $_POST['price']);
$name->appendChild($price);//appends to the item name

$productDescription=$xml->createElement("description", $_POST['description']);
$name->appendChild($productDescription);//appends to the item name

$productBrand=$xml->createElement("productBrand", $_POST['productBrand']);
$name->appendChild($productBrand);//appends to the item name

$countryOfOrigin=$xml->createElement("countryOfOrigin", $_POST['countryOfOrigin']);
$name->appendChild($countryOfOrigin);//appends to the item name

*/
$xml->saveXML();
$xml->save("prodList.xml");

?>
