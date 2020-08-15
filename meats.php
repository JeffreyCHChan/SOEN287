
<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meat</title>
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
                <li><a href="shoppingcart.php"><i class="fa fa-shopping-cart" ></i> My Cart</a></li>

            </ul>
        </div>

    </nav>

</header>

<body>
    <div style="margin-top:100px">
        <br>
        <h1 id="Baked goods"> Meats </h1>
    </div>
    <hr>

    <table border>
        <tr>
            <th>
                <a href="porkmeat.php" target="_self">Pork meat</a>
            </th>

            <td>
                <a href="porkmeat.php" target="_self"><img src="images/porkcut.jpg" alt="Pork cut Picture" class="Bakery" width="300" height="300"> </a>
            </td>

        </tr>
        <tr>
            <th>
                <a href="chickenwings.php" target="_self">Chicken wings</a>
            </th>
            <td>
                <a href="chickenwings.php" target="_self"><img src="images/chickenwings.jpg" alt="chicken wings Picture" class="Bakery" width="300" height="300"></a>
            </td>
        </tr>
        <tr>
            <th>
                <a href="groundbeef.php" target="_self">Ground beef</a>
            </th>
            <td>
                <a href="groundbeef.php" target="_self"><img src="images/groundbeef.jpg" alt="ground beef Picture" class="Bakery" width="300" height="300"></a>
            </td>
        </tr>
        <tr>
            <th>
                <a href="smokedSalmon.php" target="_self">Smoked Salmon</a>
            </th>
            <td>
                <a href="smokedSalmon.php" target="_self"><img src="images/smokedsalmon.jpg" alt="smoked salmon Picture" class="Bakery" width="300" height="300"></a>
            </td>
        </tr>
    </table>


</body>

</html>