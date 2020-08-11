<?php 
    session_start(); 
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != "yes"){
        header ('location: index.php');
    }
    
?>
<?php
//have all delete buttons redirect to here and add styling to the html
if(isset($_POST['submit'])){
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('prodList.xml');

    //variables
    $productName=$_POST['productName'];
    $xpath = new DOMXPATH($xml);

foreach($xpath->query("/root/Product[name='$productName']") as $node){// iterate through and if the name matches then delete
    $node->parentNode->removeChild($node);
}
    $xml->formatoutput = true;
    $xml->save('prodList.xml');
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="product-backend.css">
</head>
<body>
<h1 class="productList">Delete a Product</h1>
<h4 class="productList">Enter a product name to be deleted </h4>
<a href ="prod-list.php"> Back to Product List</a>
<form  method="POST" action="prod-delete.php">
        <table border="1" class="col-s-12">
            <tr><th class="backendAddEdit">Product Name</th>
                <td><input type="text" id="productName" name="productName"></td>
            </tr>
        </table>
        <input type="submit" name="submit" onclick="backendProductConfirmation()">    
    </form>
</body>


</html>
