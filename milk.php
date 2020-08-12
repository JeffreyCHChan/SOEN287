<!--Jeffrey Chak-Him Chan 40152579 -->
<?php 
    session_start();        
?>
<html lang="en">


<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2% Milk</title>
    <link rel="stylesheet" type="text/css" href="items.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .quantity {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<header>
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
</header>

<body onload="milkQuantityCheck(), milkCost()">
    <!--Calls the quantityCheck and cost methods and updates the values for quantity and the 
    corresponding cost on loading of the page-->

    <div class="row center" style="margin-top: 150px;">
        <div class="col-4 col-s-4">
            <img src="images/milk.jpg" alt="Milk" width="">
        </div>

        <div class="col-7 col-s-7 spacing">
            <p class="brand">Brand: Beatrice</p>
            <p id="productName" class="product">2% Milk</p>
            <p class="price">Price: $12.00 ea.</p>
            <p hidden id="price" class="price">12.00</p>
            <p class="size">(4L)</p>
            <p class="avg-price">$3/1L</p>
            <br>
            <form action="" method="post">
                <label for="quantity">Quantity:</label>
                <button type="button" onclick="milkSubtract(), milkCost()" class="quantity"> -</button>
                <button type="button" onclick="milkAdd(), milkCost()" class="quantity"> +</button>
                <input type="hidden" value="milk" name="name">
                <br>
                <input id="quantity" type="number" min="1" value="1" size="2" style="font-size: 16pt;" onkeyup="cost()" name="Quantity">

                <input type="submit" value="Add to Cart" class="quantity" onclick="popUp(),addToCart()">
            </form>
            <p id="sub-total" class="sub-total"><b>Sub-Total: </b> $12.00</p>
            <br>
            <br>

            <hr>
            <p class="descriptionHeader">Product Description</p>
            <p class="size" align="left">Weight: 4L</p>
            <p class="description" align="left">Category: Dairy/Beverages</p>
            <hr>
            <button class="more" onclick="hiddenSwitch()">More Description</button>
            <hr>
            <br>
            <div id="moreDescription" class="moreDescription" hidden>

                <p class="description">Fresh from dairy farms this pasturized milk comes from Canadian cows.</p>
                <p class="description" align="left"><b>Origin</b>: Canada
                    <br>Product number: 68452</p>
                <p hidden id="productNumber" class="productNumber">68452</p>
                </p>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="product-pages-jeff.js">
    </script>

     <?php
        include 'additem.php';
        ?>

</body>

</html>