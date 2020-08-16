<!--Nareg Mouradian 40044254-->
<?php 
    session_start();        
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baked Goods</title>
        <link rel="stylesheet" type="text/css" href="aisle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
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

       
     <br>  


<div class="main">

    <h1 id = "AisleTitle"> Baked Goods </h1>

 <table border>
    <tr>
        <th>
            <a href="baguette.php" target="_self">Baguette</a>
        </th>
        
        <td>
            <a href="baguette.php" target="_self"><img src="images/baguette.jpg" alt="Baguette"  width="300px" class = "item"> </a>
        </td>
       
    </tr>
    <tr>
        <th>
            <a href="apple-pie.php" target="_self">Apple Pie</a>
        </th>
        <td>
            <a href="apple-pie.php" target="_self"><img src="images/applepie.jpeg" alt="Apple Pie"  width="300px"  class = "item"></a>
        </td>
    </tr>
    <tr>
        <th>
            <a href="chocolate-cake.php" target="_self">Chocolate Cake</a>
        </th>
        <td>
            <a href="chocolate-cake.php" target="_self"><img src="images/choco-cake.jpg" alt="Chocolate Cake"  width="300px"  class = "item"></a>
        </td>
        </tr>
  </table>
</div>
 

    </body> 
</html>
