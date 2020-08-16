<?php

    session_start();
    if(!isset($_SESSION['admin']) || $_SESSION['admin'] !="yes"){
        header('location: index.php');
    }
    
    $xml=simplexml_load_file("users/users.xml") or die("Error: Cannot create object");    

?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="product-backend.css">
<script type = "text/javascript" src="userlistdelete.js"></script>

<nav class="navbar-links">
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
</head>

<header>
<h1>User List</h1>
</header>

<body>


<div id='content'>
    <table border="2" style="width: 100%; height: min-content;" id="userlist" datasrc="#usersxml">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Street #</th>
                <th>Street Name</th>
                <th>Apt #</th>
                <th>City</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($xml->children() as $users)
            :?>

                <tr>

                    
                    <td><?php echo "$users->username"?></td>
                    <td><?php echo "$users->fname"?></td>
                    <td><?php echo "$users->lname"?></td>
                    <td><?php echo "$users->snumber"?></td>
                    <td><?php echo "$users->sname"?></td>
                    <td><?php echo "$users->apt"?></td>
                    <td><?php echo "$users->city"?></td>
                    <td><?php echo "$users->province"?></td>
                    <td><?php echo "$users->pcode"?></td>
                    <td><?php echo "$users->email"?></td>
                    <td><?php echo "$users->admin"?></td>
                    <td>
                        <form action="user-edit2.0.php?user=<?php echo"$users->username"?>" method="GET">
                            <input name="user" type="submit" id="inventoryAdd" value="<?php echo "$users->username"?>">
                        </form>
                    </td>
                    <td>
                        <form action="deleteconfirmation.php?user=<?php echo"$users->username"?>" method="GET">
                          <input type="submit" name="user" id="userDelete" value="<?php echo "$users->username"?>" onclick="deleteRow(this)">
                        </form>
                    </td>
                </tr>
               
                <?php endforeach ?>

                
            
        </tbody>
    </table>
</div>

<form action="user-edit2.0.php">
    <input type="submit" id="userAdd" value="Add New User">
</form>

</body>

</html>


