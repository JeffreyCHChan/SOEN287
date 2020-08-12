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
<h1 class="productList">Product List</h1>
        <hr> 

<a href= "prod-add.php"> Add Product</a>
<a href ="prod-delete.php"> Delete a Product</a>

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
        <th>Product Edit</th>
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
    <td> <form action="prod-edit.php?prodEdit=<?php echo "$node->name"?>" method="GET"> 
    <input type="submit" value="<?php echo "$node->name"?>" name="pEdit" id="pEdit"> 
    </td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</body>
</html>
