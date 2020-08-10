<!--Philip Arvanitis 29041931 -->
<?php
    //Variables
    $username = $password = $c_password = "";
    $fname = $lname = $email = $admin = "";
    $snumber = $sname = $apt = $city = $province = $pcode = "";
    $users = simplexml_load_file("users/users.xml");

    //Error Variables
    $errors = array();

    if(isset($_POST['signup'])){
        //Error Validations
        if (empty($_POST["username"])){
            $errors["username"] = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[A-Za-z0-9]*$/", $username)){
                $errors["username"] = "Username name must only contain letter and numbers";
            } 
            foreach ($users->user as $checkUser){
                if ($checkUser->username == $username){
                    $errors["username"] = "Username already exists";
                }
            }
        }

        if (empty($_POST["password"])){
            $errors["password"] = "Please enter a password";
        } else {
            $password = test_input($_POST["password"]);
            //Password Verification
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $numbers = preg_match('@[0-9]@', $password);
            if (!$uppercase || !$lowercase || !$numbers || strlen($password) < 8) {
                $errors["password"] = "Password must be at least 8 characters long and contain at least one upper case letter, and one number";
            }
        }

        if (empty($_POST["c_password"])){
            $errors["c_password"] = "Please confirm your password";
        } else {
            $c_password = test_input($_POST["c_password"]);
            if ($_POST["password"] != $_POST["c_password"]){
                $errors["c_password"] = "Passwords do not match";
            }
        }

        if (empty($_POST["fname"])){
            $errors["fname"] = "First name is required";
        } else {
            $fname = test_input($_POST["fname"]);
            if (!preg_match("/^[A-Za-z]*$/", $fname)){
                $errors["fname"] = "First name must only contain letters";
            }
        }

        if (empty($_POST["lname"])){
            $errors["lname"] = "Last name is required";
        } else {
            $lname = test_input($_POST["lname"]);
            if (!preg_match("/^[A-Za-z]*$/", $lname)){
                $errors["lname"] = "Last name must only contain letters";
            }
        }

        if (empty($_POST["email"])) {
            $errors["email"] = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Invalid email format";
            }
        }

        if (empty($_POST["snumber"])){
            $errors["snumber"] = "Street Number is required";
        } else {
            $snumber = test_input($_POST["snumber"]);
            if (!preg_match("/^[0-9]*$/", $snumber)){
                $errors["snumber"] = "Street number must only contain numbers";
            }
        }

        if (empty($_POST["sname"])){
            $errors["sname"] = "Street name is required";
        } else {
            $sname = test_input($_POST["sname"]);
            if (!preg_match("/^[A-Za-z0-9 ]*$/", $sname)){
                $errors["sname"] = "Street name must only contain letters or numbers";
            }
        }

        if (empty($_POST["apt"])){
            $apt = "";
        } else {
            $apt = test_input($_POST["apt"]);
            if (!preg_match("/^[A-Za-z0-9]*$/", $apt)){
                $errors["apt"] = "Appartment must only contain letters or numbers";
            }
        }

        if (empty($_POST["city"])){
            $errors["city"] = "City is required";
        } else {
            $city = test_input($_POST["city"]);
            if (!preg_match("/^[a-zA-Z -]*$/", $city)){
                $errors["city"] = "City must only contain letters";
            }
        }
        
        if (empty($_POST["province"])){
            $errors["province"] = "Province is required";
        } else {
            $province = test_input($_POST["province"]);
            if (!preg_match("/^[A-Za-z]*$/", $province)){
                $errors["province"] = "Province must only contain letters";
            }
        }

        if (empty($_POST["pcode"])){
            $errors["pcode"] = "Postal code is required";
        } else {
            $pcode = test_input($_POST["pcode"]);
            if (!preg_match("/[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/", $pcode)){
                $errors["pcode"] = "Postal code format should be A0A 0A0";
            }
        }

        //Create XML Files
        if(count($errors) == 0){
            
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
            $user->addChild('admin', "y");
            $users->asXML("users/users.xml");
            header('Location: signin.php');
            die;
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="accounts.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .error {
    font-family: Arial, Helvetica, Times, sans-serif;
    color: red;
    }
    </style>
</head>

<body>

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
                <li><a href="signin.php"><i class="fa fa-unlock-alt"></i> Login</a></li>
                <li><a href="shoppingcart.html"><i class="fa fa-shopping-cart"></i> My Cart</a></li>

            </ul>
        </div>

    </nav>

    <div class="row center">
        <div class="col-12 col-s-12" style="margin: 150px 0 50px 0;">
            <h2 style="text-align: center;">Let's Sign Up!</h2><br>
        </div>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row center">
            <div class="col-6 col-s-6">
                <label for="fname">*First Name</label>
                <span class="error"><?php if(array_key_exists("fname", $errors)) print $errors["fname"];?></span>
                <span class="error"><?php print $fname;?></span>
                <input class="signup" type="text" id="fname" name="fname" value="<?php print $fname?>">
            </div>
            <div class="col-6 col-s-6">
                <label for="lname">*Last Name</label>
                <span class="error"><?php if(array_key_exists("lname", $errors)) print $errors["lname"];?></span>
                <span class="error"><?php print $lname;?></span>
                <input class="signup" type="text" id="lname" name="lname" value="<?php print $lname?>">
            </div>
        </div>

        <div class="row center">
            <div class="col-2 col-s-2">
                <label for="snumber">*Street #</label>
                <span class="error"><?php if(array_key_exists("snumber", $errors)) print $errors["snumber"];?></span>
                <span class="error"><?php print $snumber;?></span>
                <input class="signup" type="text" id="snumber" name="snumber" value="<?php print $snumber?>">
            </div>
            <div class="col-8 col-s-8">
                <label for="sname">*Street Name</label>
                <span class="error"><?php if(array_key_exists("sname", $errors)) print $errors["sname"];?></span>
                <span class="error"><?php print $sname;?></span>
                <input class="signup" type="text" id="sname" name="sname" value="<?php print $sname?>">
            </div>
            <div class="col-2 col-s-2">
                <label for="apt">Apt#</label>
                <span class="error"><?php if(array_key_exists("apt", $errors)) print $errors["apt"];?></span>
                <span class="error"><?php print $apt;?></span>
                <input class="signup" type="text" id="apt" name="apt" value="<?php print $apt?>">
            </div>
        </div>

        <div class="row center">
            <div class="col-4 col-s-4">
                <label for="city">*City</label>
                <span class="error"><?php if(array_key_exists("city", $errors)) print $errors["city"];?></span>
                <span class="error"><?php print $city;?></span>
                <input class="signup" type="text" id="city" name="city" value="<?php print $city?>">
            </div>
            <div class="col-4 col-s-4">
                <label for="province">*Province</label>
                <span class="error"><?php if(array_key_exists("province", $errors)) print $errors["province"];?></span>
                <span class="error"><?php print $province;?></span>
                <input class="signup" type="text" id="province" name="province" value="<?php print $province?>">
            </div>
            <div class="col-4 col-s-4">
                <label for="pcode">*Postal Code</label>
                <span class="error"><?php if(array_key_exists("pcode", $errors)) print $errors["pcode"];?></span>
                <span class="error"><?php print $pcode;?></span>
                <input class="signup" type="text" id="pcode" name="pcode" value="<?php print $pcode?>">
            </div>
        </div>

        <div class="row center">
            <div class="col-12 col-s-12">
                <label for="email">*Email</label>
                <span class="error"><?php if(array_key_exists("email", $errors)) print $errors["email"];?></span>
                <span class="error"><?php print $email;?></span>
                <input class="signup" type="text" id="email" name="email" value="<?php print $email?>">
            </div>
        </div>

        <div class="row center">
            <div class="col-12 col-s-12">
                <label for="username">*Username</label>
                <span class="error"><?php if(array_key_exists("username", $errors)) print $errors["username"];?></span>
                <span class="error"><?php print $username;?></span>
                <input class="signup" type="text" id="username" name="username" value="<?php print $username?>">
            </div>
        </div>

        <div class="row center">
            <div class="col-6 col-s-6">
                <label for="password">*Password</label>
                <span class="error"><?php if(array_key_exists("password", $errors)) print $errors["password"];?></span>
                <span class="error"><?php print $password;?></span>
                <input class="signup" type="password" id="password" name="password">
            </div>
            <div class="col-6 col-s-6">
                <label for="password">*Confirm Password</label>
                <span class="error"><?php if(array_key_exists("c_password", $errors)) print $errors["c_password"];?></span>
                <span class="error"><?php print $c_password;?></span>
                <input class="signup" type="password" id="password" name="c_password">
            </div>
        </div>

        <div class="row center">
            <div class="col-6 col-s-6 spacing">
                <input class="signupButton" type="reset" name="reset" value="Reset">
                <br>
                <br>
            </div>
        </div>

        <div class="row center">
            <div class="col-12 col-s-12">
                <input class="signupButton" type="submit" name="signup" value="Sign Up">
            </div>
        </div>

    </form>
</body>

</html>