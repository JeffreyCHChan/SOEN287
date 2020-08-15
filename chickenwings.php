
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chicken_wings</title>
    <link rel="stylesheet" type="text/css" href="items.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>

<header>
    <nav class="navbar">
        <div class="brand-title">
            <a href="index.html"><img src="images/atozmarketplace.jpg"></a>
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

</header>

<body>

    <div class="row center" style="margin-top: 150px;">
        <div class="col-4 col-s-4">
            <img src="images/chickenwings.jpg" alt="Chicken wings">
        </div>

        <div class="col-7 col-s-7">
            <p class="brand">Poulailler St-Je</p>
            <p class="product">Chicken wings</p>
            <p class="price"><del>$6.99 ea.</del></p>
            <p class="price" id="unit" style="color: red;">$5.99 ea.</p>
            <p class="avg-price"><del>$1.40 /100g</del></p>
            <p class="avg-price" style="color: red;">$1.20 /100g</p>
            <br>
            <form action="" method="post">
                <label for="quantity" class="Quantity">Quantity:</label>
                <input type="number" min="1" value="1" size="2" name="Quantity" id="quantity">
                <br>
                <input type="hidden" value="Chicken Wings" name="name">
                <span id="pricetag"></span>
                <br>
                <button class="cart-btn" type="submit" name="cart" id="button" style=" width:50%;">Add to cart</button>
                <br>
            </form>
            <br>
            <button class="plus-btn" type="button" name="plus" onclick="addbtn()" style=" width:15%;">+</button>
            <button class="minus-btn" type="button" name="minus" onclick="minusbtn()" style=" width:15%;">-</button>
            <br>
            <br>

            <hr>
            <p class="descriptionHeader">Product Description</p>
            <p class="size">Sold in 500g format</p>
            <p class="description">Category: Meat</p>
            <hr>
            <button class="more" id="downbtn"> More Description</button>
            <hr>
            <br>
            <p class="description" id="moreDescription">Bio chicken from your beloved Canadian farms !help local economy!<br>
                <br><b>Origin:</b> Canada<br>
                <br>Product number: 25001</p>
            </p>
            <hr>
        </div>
    </div>
    <script src="jsformeat.js"></script>
    <?php
    include 'additem.php';
    ?>
</body>

</html>