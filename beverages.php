<!--Jeffrey Chak-Him Chan 40152579 -->
<?php 
    session_start();        
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beverages</title>
        <link rel="stylesheet" type="text/css" href="aisle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar">
            <nav class="navbar">
                <div class="brand-title"><a href="index.php"><img src="images/atozmarketplace.jpg"></a></div>
                <a href="#" class="toggle-button">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
        
                </a>
                <div class="navbar-links">
                    <ul>
                        <select onchange="window.location.href=this.value" style=" color:white; background-color: rgb(82,79,79);">
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
            
        </nav>

       
     <br>  


<div class="main">

    <h1 id = "AisleTitle"> Beverages </h1>

 <table border>
    <tr>
        <th><a href="milk.php" target="_self" class="aisleItem" >2% Milk</a></th>
    
            <td><a href="milk.php" target="_self" class="aisleItem" ><img src="images/milk.jpg" alt="2% Milk"  class="BeveragesImages"></a></td>
        </tr>
        <tr>
            <th>
                <a href="7-up.php" target="_self" class="aisleItem">7-UP</a>
            </th>
            <td><a href="7-up.php" target="_self" class="aisleItem"><img src="images/7-up.jpg" alt="7-UP"  class="BeveragesImages" ></a></td>
        </tr>

    <tr>
        <th><a href="coca-cola.php" target="_self" class="aisleItem">Coca-Cola</a></th>
        <td><a href="coca-cola.php" target="_self" class="aisleItem"><img src="images/coca-cola.jpg" alt="Coca-Cola" class="BeveragesImages" ></a></td>
    </tr>
  </table>
</div>
 

    </body> 
</html>
