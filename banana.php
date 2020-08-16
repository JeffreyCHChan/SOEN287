<!--Maxime Giroux 40157483-->

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bananas</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
        <link rel="stylesheet" type="text/css" href="items.css"> 
        <script text="text/javascript" src="maximeitems.js"></script>
    </head>

    <header>
        <nav class="navbar">
            <div class="brand-title"><a href="index.php"><img src="images/atozmarketplace.jpg"></a></div>
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

                        if(isset($_SESSION['admin']) && $_SESSION['admin']=="yes"){
                            echo '<li><a href="admin.php"><i class="fa fa-cogs" aria-hidden="true"></i>Admin</a></li>';
                        }

                        if(isset($_SESSION['username'])){
                            echo '<li><a href="signout.php"><i class="fa fa-unlock-alt"></i>Log Out</a></li>';
                        }else{
                            echo '<li><a href="signin.php"><i class="fa fa-unlock-alt"></i>Login</a></li>';
                        }
                    ?>
                    
                    <li><a href="signin.php"><i class="fa fa-unlock-alt" ></i> Login</a></li>
                    <li><a href="shoppingcart.php"><i class="fa fa-shopping-cart" ></i> My Cart</a></li>  
                 
                </ul>  
            </div>
            
        </nav>
               
    </header>

    <body onload="savednumberbanana(), bananacost()">

        <div class="row center" style="margin-top: 150px;">
            <div class="col-4 col-s-4">
                <img src="images/banana.jpg" alt="Banana">   
            </div>

            <div class="col-7 col-s-7">
                <p class="brand">Chiquita</p>
                <p class="product">Banana</p>
                <p class="price">$0.33 avg. ea.</p>
                <p class="size">(190 g avg.)</p>
                <p class="avg-price">$1.74 /kg $0.79 /lb</p>
                <br>

                <form action="" method="post">
                    <div>
                        <button type="button" onclick="increasebanana(); bananacost();add()">▲</button>
                        <p id="quantity">1</p>
                        <input type="hidden" name="Quantity" id="quan" value="1">
                        <input type="hidden" value="Banana" name="name">
                        <button type="button" onclick="decreasebanana(); bananacost();min()">▼</button>
                        <p id="fruitcost">Price: $3.99</p>
                    </div>


                    <br>
                    <input type="submit" value="Add to Cart">

                </form>
                <br>
                <br>

                <hr>
                <p class="descriptionHeader">Product Description</p>
                <p class="size">Sold by Weight</p>
                <p class="description">Category: Fruits</p>
                <hr>
                <button class="more" onclick="bananaDescription()">More Description</button>
               
                
                <div class="description" id="description" style="margin-bottom: 20px;">
                </div>
                <hr>

            </div>
        </div>

    <?php
    include 'additem.php';
    ?>


        <script>
            var c;
            if (sessionStorage.getItem("num1") == null){
                    c = 1;
                    
            }else
            c= Number(sessionStorage.getItem("num1"));

            function Storeupdate() {
                if (typeof(Storage) !== "undefined") {
                    // Store
                    sessionStorage.setItem("num1", c);

                } else {
                    document.getElementById("quan").value = "Sorry, your browser does not support Web Storage...";
                }
            }

            function add(){
                c++;
                document.getElementById("quan").value=c;
                Storeupdate();

            }
            
            function min(){
                if(c>1){
                c--;
                document.getElementById("quan").value=c;

                }
                alert(document.getElementById("quan").value);
                Storeupdate();
            }


    </script>
        
    </body>
</html>