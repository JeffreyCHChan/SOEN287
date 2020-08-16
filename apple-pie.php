<!--Nareg Mouradian 40044254-->
<?php 
    session_start();        
?>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Pie</title>
    <link rel="stylesheet" type="text/css" href="items.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                        <option>Select Aisle</option>
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
                <li><a href="shoppingcart.php"><i class="fa fa-shopping-cart" ></i> My Cart</a></li>

            </ul>
        </div>

    </nav>

    <div class="row center" style="margin-top: 150px;">
        <div class="col-4 col-s-4">
            <img src="images/applepie.jpeg" alt="Apple Pie" width="350px">
        </div>

        <div class="col-7 col-s-7 spacing">
            <p class="brand">AtoZ FreshMarket</p>
            <p class="product">Apple Pie</p>

            <h1>
                <p class="original-price"><del>$5.99 ea. </del></p>
            </h1>
            (500g avg.)
            <p class="price" style="color: red;">$4.99 ea.</p>
            <p class="calcPrice" hidden>4.99</p>
            <button class="cart-btn" data-action="AddToCart" onclick="cartadd()">Add to Cart</button>

            <form action="" method="post" id="form">
                <input type="hidden" name="name" value="Apple Pie">
                <input type="hidden" name="Quantity" value="0" id="quan">
            </form>
            <br>
            <div class="itemCartInfo"></div>

            <hr>
            <p class="descriptionHeader"><b>Product Description</b></p>
            <p class="description">
                Sold Individually
                <br>
                <br> Category: Baked Goods
            </p>
            <hr>
            <button class="more">More Description</button>
            <div class="descriptionDisplay">
                <p class="description">
                    Apple pie made with love and care right in front of you.
                    <br>
                    <br>
                    <b>Origin:</b> Canada <br>
                    <br><b>
                    Product number:</b> 124973
                    <br>
                    <br> Ingredients: Eggs, flour, freshly cut apples , milk, butter , granulated sugar.<br>
                    <br>
                </p>
            </div>
            <hr>
        </div>
    </div>
    <script src="naregJS.js"></script>

    <?php
    include 'additem.php';
    ?>

</body>

</html>