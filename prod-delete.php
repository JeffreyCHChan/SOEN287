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
<div>
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
    </div>

<div style="margin-top: 150px;"> 
<h1 class="productList">Delete a Product</h1>
<h4 class="productList">Enter a product name to be deleted </h4>
<a href ="prod-list.php"> Back to Product List</a>
<form  method="POST" action="prod-delete.php">
        <table border="1" class="col-s-12">
            <tr><th class="backendAddEdit">Product Name</th>
                <td><input type="text" id="productName" name="productName"></td>
            </tr>
        </table>
        <input type="submit" name="submit" onclick="deleteItem()">    
    </form>
    </div>
</body>


</html>
