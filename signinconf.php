<?php
session_start();
//header('Location: signin.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed In</title>
    <link rel="stylesheet" type="text/css" href="accounts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body onload="pageRedirect()">

    <nav class="navbar">
        <div class="brand-title"><a href="index.html"><img src="images/atozmarketplace.jpg"></a></div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>

        </a>
        <div class="navbar-links">
            <ul>
                <select onchange="window.location.href=this.value"
                    style="color:white; background-color: rgb(82,79,79);">
                    <option>Select Aisle</option>
                    <option value="beverages.html">Beverages</option>
                    <option value="fruits.html">Fruits</option>
                    <option value="vegetables.html">Vegetables</option>
                    <option value="baked-goods.html">Baked Goods</option>
                    <option value="meats.html">Meats</option>
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
                <li><a href="shoppingcart.html"><i class="fa fa-shopping-cart"></i> My Cart</a></li>

            </ul>
        </div>

    </nav>

    <div class="row center">
        <div class="col-12 col-s-12" style="border: solid;  border-radius: 25px; padding: 10px; margin-top: 150px;">
            <h2 id="message" style="text-align: center;"></h2><br>
            
        </div>
    </div>

<script>

function pageRedirect(){
 var delay = 2000; // time in milliseconds

 // Display message
 document.getElementById("message").innerHTML = "You have signed in. You will be redirected to the main page.";
 
 setTimeout(function(){
  window.location = "index.php";
 },delay);
 
}
</script>

</body>

</html>