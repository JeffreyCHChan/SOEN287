<?php 
    session_start(); 
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != "yes"){
        header ('location: index.php');
    }
    
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="product-backend.css">
</head>
<body>
<h1 class="productList">Product List</h1>
        <hr> 

<a href= "prod-add.php"> Add Product</a>
<a href ="prod-delete.php"> Delete a Product</a>
<a href ="prod-edit.php"> Edit a Product</a>
<br>
<hr>
<table border="2" style="width: 100%; height: min-content;">
    <thead>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Section</th>
        <th>Weight</th>
        <th>Units</th>
        <th>Price</th>
        <th>Description</th>
        <th>Brand</th>
        <th>Country Of Origin</th>
        <th>Product Id</th>
</thead>

<tbody>
<?php 
    $xml = new SimpleXMLElement('ProdList.xml',0,TRUE);
    

foreach($xml->Product as $node)//will iterate over products
:?>

<tr>
    <td> <?php echo "$node->name"?></td>
    <td> <?php echo "$node->quantity"?></td>
    <td> <?php echo "$node->section"?></td>
    <td> <?php echo "$node->weight"?></td>
    <td> <?php echo "$node->units"?></td>
    <td> <?php echo "$node->price"?></td>
    <td> <?php echo "$node->description"?></td>
    <td> <?php echo "$node->brand"?></td>
    <td> <?php echo "$node->origin"?></td>
    <td> <?php echo "$node->productId"?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</body>
</html>
