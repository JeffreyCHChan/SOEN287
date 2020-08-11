
<?php 
    session_start(); 
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != "yes"){
        header ('location: index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add a Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="product-backend.css"/>     
    <script type="text/javascript" src="backend-product.js"></script>

</head>





<body>

<nav class="navbar">
        <div class="brand-title">
            <a href="index.php"><img src="images/atozmarketplace.jpg"></a>
        </div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>

        </a>
        <div class="navbar-links">
            <ul>
                <select onchange="window.location.href=this.value" style="color:white; background-color: rgb(82,79,79);"> 
                            <option value="aisle.php">Select Aisle</option>
                            <option value="beverages.php">Beverages</option>
                            <option value="fruits.php">Fruits</option>
                            <option value="vegetables.php">Vegetables</option>
                            <option value="baked-goods.php">Baked Goods</option>
                            <option value="meats.php">Meats</option>
                    </select>
                    <?php
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] == "yes"){
                            echo '<li><a href="admin.php"><i class="fa fa-cogs" aria-hidden="true"></i>Admin</a></li>';
                        }   
                                             
                        if (isset($_SESSION['username'])){
                            echo '<li><a href="signout.php"><i class="fa fa-unlock-alt"></i>Log Out</a></li>';
                        } else {
                            echo '<li><a href="signin.php"><i class="fa fa-unlock-alt"></i>Login</a></li>';
                        }
                    ?>
                <li><a href="shoppingcart.html"><i class="fa fa-shopping-cart" ></i> My Cart</a></li>

            </ul>
        </div>

    </nav>

    <div style="margin-top: 150px;"> 
<h1 class="productList">Add a Product</h1>
<h4 class="productList">Enter a product name to be added </h4>
<a href ="prod-list.php"> Back to Product List</a>
</div>
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
            <th class="backendAddEdit"><label for="productSearch">Section</label></th>
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