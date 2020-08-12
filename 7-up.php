<!--Jeffrey Chak-Him Chan 40152579 -->
<?php 
    session_start();        
?>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24-Pack 7-UP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="items.css" />

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

<body onload="sodaQuantityCheck(), sodaCost()">
    <!--Calls the quantityCheck and cost methods and updates the values for quantity and the 
    corresponding cost on loading of the page-->

    <div class="row center" style="margin-top: 150px;">
        <div class="col-4 col-s-4">
            <img src="images/7-up.jpg" alt="7-UP">
        </div>

        <div class="col-7 col-s-7 spacing">
            <p class="brand">Brand: PepsiCo.</p>
            <p id="productName" class="product">24-Pack 7-UP</p>
            <p class="price"><del>Price: $8.47 ea.</del></p>
            <p class="price" style="color: red;">Price: $5.93 ea.</p>
            <p hidden id="price">5.93</p>
            <p class="avg-price"><del>$0.10/100mL</del></p>
            <p class="avg-price" style="color: red;">$0.07/100ml</p>
            <br>
            <form action="" method="post">
                <label for="quantity">Quantity:</label>
                <button type="button" onclick="sodaSubtract(), sodaCost()" class="quantity"> -</button>
                <button type="button" onclick="sodaAdd(), sodaCost()" class="quantity"> +</button>
                <input type="hidden" value="7-UP" name="name">
                <br>
                <input id="quantity" type="number" min="1" value="1" size="2" style="font-size: 16pt;" onkeyup="cost()" name="Quantity">
                <input type="submit" value="Add to Cart" class="quantity" onclick="popUp(),addToCart()">
            </form>
            <p id="sub-total" onload="cost()"><span><b>Sub-Total: </b></span> $5.93</p>

            <br>
            <br>

            <hr>
            <p class="descriptionHeader">Product Description</p>
            <p class="size" align="left">Weight: 12x355mL</p>
            <p class="description" align="left">Category: Dairy/Beverages</p>

            <hr>
            <button class="more" onclick="hiddenSwitch()">More Description</button>
            <hr>
            <br>
            <div id="moreDescription" hidden>
                <p class="description">The citrus taste from PepsiCo.'s 7-UP will leave you wanting more.</p>
                <p class="description" align="left"><b>Origin</b>: Canada
                    <br>Product number: 63595</p>
                <p hidden id="productNumber">63595</p>
                </p>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="product-pages-jeff.js">
        {}
    </script>
    <?php
            include 'additem.php';
            ?>

</body>

</html>