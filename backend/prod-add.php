<html>
<head>
    <meta charset="UTF-8">
    <title>Add a Product</title>
    <link rel="stylesheet" type="text/css" href="product-backend.css"/>     
    <script type="text/javascript" src="backend-product.js"></script>
</head>

<body>

<?php

if(isset($_POST['submit'])){
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('prodList.xml');

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
    
//append the data to the product name then append product name to the root


    //appending to the product Name
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
}
?>

<form  method="POST" action="prod-add.php">
        <table border="1" class="col-s-12">
            <th class="backendAddEdit"><label for="productSearch">Product Search</label></th>
            <td><select id="sectionSearch" name="section">
                <option selected disabled> Select Product</option>
                <option value="Beverages">Beverages</option>
                <option value="Fruits">Fruits</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Baked-Goods">Baked Goods</option>
                <option value="Meats">Meats</option>
                
            </select></td>
            <tr>
                <th class="backendAddEdit"><label for="Inventory" class="backendAddEdit">Quantity</label></th>
                <td><input type="number"  min="0" id="quantity" name="quantity"> </td>
            </tr>
            <tr><th class="backendAddEdit">Product Name</th>
                <td><input type="text" id="productName" name="productName"></td>
            </tr>
            <tr><th class="backendAddEdit" >Product Weight/Number of Units </th>
                <td><input type="number" min="0" id="weight" name="weight" ></td>
            </tr>
            <tr>
                <tr><th class="backendAddEdit">Product Unit of Measure</th>
                    <td><input type="text" placeholder="Unit value (g,lbs,kg,etc.)" id="units" name="units"></td>
            </tr>
            <tr><th class="backendAddEdit">Product Price</th>
                <td><input type="number" min="0" step="0.01" id="price" name="price"></td> 
            </tr>
            <tr><th class="backendAddEdit">Product Description</th>
                <td><textarea name="description" rows="4" cols="25" id="productDescription"   placeholder="Enter Product Description Here" ></textarea></td>
            </tr>
            <tr>
                <th class="backendAddEdit">Product Brand</th>
                <td><input type="text" id="productBrand" name="productBrand"></td>
            </tr>
            <tr>
                <th class="backendAddEdit">Product Country of Origin</th>
                <td><input type="text" id="origin" name="countryOfOrigin" ></td>
            </tr>
            <tr>
                <th class="backendAddEdit">Product ID</th>
                <td><input type="number" min="1000" id="productNumber" name="productNumber"></td>
            </tr>
        </table>
        <input type="submit" name="submit" onclick="backendProductConfirmation()">    
    </form>
    


</body>
</html>