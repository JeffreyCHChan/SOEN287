<?php

    session_start();
    if(!isset($_SESSION['admin']) || $_SESSION['admin'] !="yes"){
        header('location: index.php');
    }

    $fname = $lname = $email = $admin ="";
    $snumber = $sname = $apt = $pcode="";
    $username = $city = $province = $password="";
    $users = simplexml_load_file("users/users.xml"); 
    $invalid = array();


    if(isset($_GET['user'])){
        
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('users/users.xml');

        $username=$_GET['user'];
        $xpath = new DOMXPATH($xml);
        $_SESSION['edit']="yes";

        echo "ADMIN BUTTON AUTOMATICALLY UNCHECKED ON EDIT";

        foreach($xpath->query("/users/user[username='$username']") as $node){

            $fname = $node->getElementsByTagName('fname')[0]->nodeValue;
            $lname = $node->getElementsByTagName('lname')[0]->nodeValue;
            $snumber = $node->getElementsByTagName('snumber')[0]->nodeValue;
            $sname = $node->getElementsByTagName('sname')[0]->nodeValue;
            $apt = $node->getElementsByTagName('apt')[0]->nodeValue;
            $city = $node->getElementsByTagName('city')[0]->nodeValue;
            $province = $node->getElementsByTagName('province')[0]->nodeValue;
            $pcode = $node->getElementsByTagName('pcode')[0]->nodeValue;
            $email = $node->getElementsByTagName('email')[0]->nodeValue;
            $admin = $node->getElementsByTagName('admin')[0]->nodeValue;
        }

         
    }


    if(isset($_POST['usersub'])){

        //Username
        if (empty($_POST["username"])){
            $invalid["username"] = "Username is required";
        } else {
            $username = test_userin($_POST["username"]);
            if (!preg_match("/^[A-Za-z0-9]*$/", $username)){
                $invalid["username"] = "Username name must only contain letter and numbers";
            } 
            if($_SESSION['edit']!="yes"){
            foreach ($users->user as $checkUser){
                if ($checkUser->username == $username){
                    $invalid["username"] = "Username already exists";
                }
            }
            }
        }

        //Password

        
        if (empty($_POST["password"]) && $_SESSION['edit']!="yes"){
            if(empty($_POST["password"])){
            $invalid["password"] = "Please enter a password";
            } else {
                $password = test_userin($_POST["password"]);
                //Password Verification
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $numbers = preg_match('@[0-9]@', $password);
                if (!$uppercase || !$lowercase || !$numbers || strlen($password) < 8) {
                    $invalid["password"] = "Password must be at least 8 characters long and contain at least one upper case letter, and one number";
                }
            }
        }

        //First Name
        if (empty($_POST['fname'])){
            $invalid["fname"] = "You must enter your first name";
        }else{
            $fname = test_userin($_POST["fname"]);
            if (!preg_match("/^[A-Za-z]*$/", $fname)){
                $invalid["fname"] = "Your first name must only contain letters";
            }
        }

        //Last Name
        if (empty($_POST['lname'])){
            $invalid["lname"] = "You must enter your last name";
        }else{
            $lname = test_userin($_POST["lname"]);
            if (!preg_match("/^[A-Za-z]*$/", $lname)){
                $invalid["lname"] = "Your last name must only contain letters";
            }
        
        }

        //Email address
        if (empty($_POST['email'])){
            $invalid["email"] = "You must enter your e-mail address";
        }else{
            $email = test_userin($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $invalid["email"] = "Please enter a valid e-mail";
            }
        }

        //Street Number
        if (empty($_POST['snumber'])){
            $invalid["snumber"] = "You must enter your street number";
        }else{
            $snumber = test_userin($_POST["snumber"]);
            if (!preg_match("/^[0-9]*$/", $snumber)){
                $invalid["snumber"] = "Your street number must only contain numbers";
            }
        }
        
        //Street Name
        if (empty($_POST['sname'])){
            $invalid["sname"] = "You must enter your street name";
        }else{
            $sname = test_userin($_POST["sname"]);
            if (!preg_match("/^[A-Za-z]*$/", $sname)){
                $invalid["sname"] = "Your street name must only contain letters";
            }
        }

        //Apartment number
        if (empty($_POST['apt'])){
            $apt = "";
        }else{
            $apt = test_userin($_POST["apt"]);
            if (!preg_match("/^[0-9]*$/", $apt)){
                $invalid["apt"] = "Your street number must only contain numbers";
            }
        }

        //Postal Code
        if (empty($_POST["pcode"])){
            $invalid["pcode"] = "You must enter your postal code.";
        }else{
            $pcode = test_userin($_POST["pcode"]);
            if (!preg_match("/[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/", $pcode)){
                $invalid["pcode"] = "Postal code format is Letter-Digit-Letter Digit-Letter-Digit";
            }
        }

        //City
        if (empty($_POST["city"])){
            $invalid["city"] = "City is required";
        } else {
            $city = test_userin($_POST["city"]);
            if (!preg_match("/^[a-zA-Z -]*$/", $city)){
                $invalid["city"] = "City must only contain letters";
            }
        }

        if (empty($_POST["province"])){
            $invalid["province"] = "Province is required";
        } else {
            $province = test_userin($_POST["province"]);
            if (!preg_match("/^[A-Za-z]*$/", $province)){
                $invalid["province"] = "Province must only contain letters";
            }
        }



        //$admin = test_userin($_POST["admin"]);

        //Uploading of data to xml file once there is no invalid data entries
        if(count($invalid) == 0){
            if($_SESSION['edit']=="yes"){
                foreach($users->user as $editUser){
                    if($editUser->username==$username){
                        $editUser->fname=$fname;
                        $editUser->lname=$lname;
                        $editUser->email=$email;
                        $editUser->snumber=$snumber;
                        $editUser->sname=$sname;
                        $editUser->apt=$apt;
                        $editUser->city=$city;
                        $editUser->province=$province;
                        $editUser->pcode=$pcode;
                        if (isset($_POST['admin'])){
                        $editUser->admin="on";
                        }
                        if(!empty($password)){
                            $editUser->password=md5($password);
                        }
                        $users->asXML("users/users.xml");
                        $_SESSION ['edit']="no";
                        header('Location: userlist2.0.php');
                        die;
                    }
                }

            }else{           
            $user = $users->addChild('user');
            $user->addChild('username', $username);
            $user->addChild('password', md5($password));
            $user->addChild('email', $email);
            $user->addChild('fname', $fname);
            $user->addChild('lname', $lname);
            $user->addChild('snumber', $snumber);
            $user->addChild('sname', $sname);
            $user->addChild('apt', $apt);
            $user->addChild('city', $city);
            $user->addChild('province', $province);
            $user->addChild('pcode', $pcode);
            if (isset($_POST['admin'])){ 
            $user->addChild('admin', "on");
            }
            $users->asXML("users/users.xml");
            header('Location: userlist2.0.php');
            die;
            }
        }
    }


    function test_userin($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User_edit</title>
    <link rel="stylesheet" type="text/css" href="product-backend.css">

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
<body>

    <div style="text-align: center">
        <h2> User Add/Edit </h2>
    <img src="images/profile.png" alt="user profile picture" width="200" height="200" >
        <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>


                <div>
                    <label>First Name</label>
                    <span class="error"><?php if(array_key_exists("fname", $invalid)) print $invalid["fname"];?></span>
                    <input class="usersub" type="text" id="fname" name="fname" value="<?php print $fname?>">
                </div>

                <div>
                    <label>Last Name</label>
                    <span class="error"><?php if(array_key_exists("lname", $invalid)) print $invalid["lname"];?></span>
                    <input class="usersub" type="text" id="lname" name="lname" value="<?php print $lname?>">
                </div>

                <div>
                    <label>Street Number</label>
                    <span class="error"><?php if(array_key_exists("snumber", $invalid)) print $invalid["snumber"];?></span>
                    <input class="usersub" type="text" id="snumber" name="snumber" value="<?php print $snumber?>">
                </div>

                <div>
                    <label>Street Name</label>
                    <span class="error"><?php if(array_key_exists("sname", $invalid)) print $invalid["sname"];?></span>
                    <input class="usersub" type="text" id="sname" name="sname" value="<?php print $sname?>">
                </div>

                <div>
                    <label>Apartment Number</label>
                    <span class="error"><?php if(array_key_exists("apt", $invalid)) print $invalid["apt"];?></span>
                    <input class="usersub" type="text" id="apt" name="apt" value="<?php print $apt?>">
                </div>

                <div>
                    <label>City</label>
                    <span class="error"><?php if(array_key_exists("city", $invalid)) print $invalid["city"];?></span>
                    <input class="usersub" type="text" id="city" name="city" value="<?php print $city?>">
                </div>

                <div>
                    <label>Province</label>
                    <span class="error"><?php if(array_key_exists("province", $invalid)) print $invalid["province"];?></span>
                    <input class="usersub" type="text" id="province" name="province" value="<?php print $province?>">
                </div>

                <div>
                    <label>Postal Code</label>
                    <span class="error"><?php if(array_key_exists("pcode", $invalid)) print $invalid["pcode"];?></span>
                    <input class="usersub" type="text" id="pcode" name="pcode" value="<?php print $pcode?>">
                </div>

                <div>
                    <label>Email</label>
                    <span class="error"><?php if(array_key_exists("email", $invalid)) print $invalid["email"];?></span>
                    <input class="usersub" type="text" id="email" name="email" value="<?php print $email?>">
                </div>

                <div>
                    <label>Username</label>
                    <span class="error"><?php if(array_key_exists("username", $invalid)) print $invalid["username"];?></span>
                    <input class="usersub" type="text" id="username" name="username" value="<?php print $username?>">
                </div>

                <div>
                    <label>Password</label>
                    <span class="error"><?php if(array_key_exists("password", $invalid)) print $invalid["password"];?></span>
                    <input class="usersub" type="text" id="password" name="password" value="<?php print $password?>">
                </div>

                <div>
                    <p>Admin: <form method="POST"><input type="checkbox" id="admin" name="admin" value="<?php print $admin ?>"></form></p>
                </div>
                <input type="submit" name="usersub" style="background-color:lightblue"; value="Save" size="10">

            </div>
            
        </form>
    </div>

    </body>

</html>