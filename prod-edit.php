<?php
//on load
if(!isset($_POST['find'])){
    $name = "";
    $section =  "";
    $quantity= "";

    $weight = "";
    $units= "";
    $price = "";
    $description= "";

    $brand = "";
    $origin = "";
    $productId= "";
    ;

}

//once find is given
if(isset($_POST['find'])){
    //copy add stuff
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('prodList.xml');
    
    //variables
    $productName=$_POST['productName'];
    $xpath = new DOMXPATH($xml);

foreach($xpath->query("/root/Product[name='$productName']") as $node){//selects all products that have the name we searched for

    $name = $node->getElementsByTagName('name')[0]->nodeValue; 
    $section =  $node->getElementsByTagName('section')[0]->nodeValue; 
    $quantity= $node->getElementsByTagName('quantity')[0]->nodeValue; 

    $weight = $node->getElementsByTagName('weight')[0]->nodeValue; 
    $units= $node->getElementsByTagName('units')[0]->nodeValue;
    $price =  $node->getElementsByTagName('price')[0]->nodeValue; 
    $description= $node->getElementsByTagName('description')[0]->nodeValue;

    $brand = $node->getElementsByTagName('brand')[0]->nodeValue; 
    $origin =  $node->getElementsByTagName('origin')[0]->nodeValue; 
    $productId= $node->getElementsByTagName('productId')[0]->nodeValue;  
    ;
    
    
    
}
    $xml->formatoutput = true;
    $xml->save('prodList.xml');
}
?>

<?php // deletes old one and appends a modified version
if(isset($_POST['modify'])){
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('prodList.xml');
    $xpath = new DOMXPATH($xml);
    $productName=$_POST['productName'];
    foreach($xpath->query("/root/Product[name='$productName']") as $node){// iterate through and if the name matches then delete
        $node->parentNode->removeChild($node);
    }
//variables
$productName=$_POST['productName'];
$section =  $_POST['section'];
$quantity= $_POST['quantity'];
$weight = $_POST['weight'];
$units=$_POST['units'];
$price =$_POST['price'];
$productDescription= $_POST['description']; 
$productBrand= $_POST['productBrand'];
$countryOfOrigin= $_POST['countryOfOrigin'];
$productNumber= $_POST['productNumber'];


$rootTag = $xml->getElementsByTagName("root")->item(0); 

$productNameTag = $xml->createElement("Product");
    $name=$xml->createElement("name",$productName);
    $sectionTag =  $xml->createElement("section",$section);
    $quantityTag= $xml->createElement("quantity",$quantity);
    $weightTag = $xml->createElement("weight",$weight);
    $unitsTag=$xml->createElement("units",$units);
    $priceTag =$xml->createElement("price",$price);
    $productDescriptionTag= $xml->createElement("description",$productDescription); 
    $productBrandTag= $xml->createElement("brand",$productBrand);
    $countryOfOriginTag= $xml->createElement("origin",$countryOfOrigin);
    $productNumberTag= $xml->createElement("productId",$productNumber);

$productNameTag->appendChild($name);
$productNameTag->appendChild($sectionTag);
$productNameTag->appendChild($quantityTag);
$productNameTag->appendChild($weightTag);
$productNameTag->appendChild($unitsTag);
$productNameTag->appendChild($priceTag);
$productNameTag->appendChild($productDescriptionTag);
$productNameTag->appendChild($productBrandTag);
$productNameTag->appendChild($countryOfOriginTag);
$productNameTag->appendChild($productNumberTag);

$rootTag->appendChild($productNameTag);

$xml->formatoutput = true;
$xml->save('prodList.xml');
echo "Product Modified";
}

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="product-backend.css">
</head>
<body>
        <script type="text/javascript" src="backend-product.js"></script>
<h1 class="productList">Product Edit</h1>
<h4 class="productList"> Enter Product Name then click 'Find' and check the Section dropbox, click 'Modify' to submit the change</h4>
<a href ="prod-list.php"> Back to Product List</a>
<hr>
<form  method="POST" action="prod-edit.php">
        <table border="1" class="col-s-12">
            <tr><th class="backendAddEdit">Product Name </th>
                <td><input type="text" id="productName" name="productName" height="200" width="500" placeholder="<?php echo $name?>" value="<?php echo $name?>"> </td>
            </tr>
            <th class="backendAddEdit"><label for="productSearch">Section</label></th>
            <td><select id="sectionSearch" name="section" placeholder="" value="<?php echo $section?>">
                <option selected disabled> Select Product</option>
                <option value="Beverages">Beverages</option>
                <option value="Fruits">Fruits</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Baked-Goods">Baked Goods</option>
                <option value="Meats">Meats</option>
                
            </select></td>

            </tr><tr><th class="backendAddEdit">Quantity </th>
                <td><input type="text" id="quantity" name="quantity" placeholder="" value="<?php echo $quantity?>"></td>
            </tr><tr><th class="backendAddEdit">Weight </th>
                <td><input type="text" id="weight" name="weight" placeholder="" value="<?php echo $weight?>"></td>
            </tr><tr><th class="backendAddEdit">Units </th>
                <td><input type="text" id="units" name="units" placeholder="" value="<?php echo $units?>"></td>
            </tr><tr><th class="backendAddEdit">Price </th>
                <td><input type="text" id="price" name="price" placeholder="" value="<?php echo $price?>"></td>
            </tr><tr><th class="backendAddEdit">Description </th>
                <td><input type="text" id="description" name="description" placeholder="" value="<?php echo $description?>"></td>
            </tr><tr><th class="backendAddEdit">Brand </th>
                <td><input type="text" id="productBrand" name="productBrand" placeholder="" value="<?php echo $brand?>"></td>
            </tr><tr><th class="backendAddEdit">Country of Origin </th>
                <td><input type="text" id="countryOfOrigin" name="countryOfOrigin" placeholder="" value="<?php echo $origin?>"></td>
            </tr><tr><th class="backendAddEdit">Product Id </th>
                <td><input type="text" id="productNumber" name="productNumber" placeholder="" value="<?php echo $productId?>"></td>
            </tr>
        </table>
        <input type="submit" name="find" value="Find">
        <input type="submit" name="modify" onclick="backendProductConfirmation()" value="Modify">
    </form>
</body>


</html>
