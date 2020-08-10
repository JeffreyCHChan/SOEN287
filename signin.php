<!--Philip Arvanitis 29041931 -->
<?php
$error = false;
if(isset($_POST['signin'])){
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $password = md5($_POST['password']);
    if(file_exists('users/' . $username . '.xml')){
        $xml = new SimpleXMLElement('users/' . $username . '.xml', 0, true);
        if($password == $xml->password){
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
            die;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="accounts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="col-12 col-s-12" style="border: solid;  border-radius: 25px; padding: 10px; margin-top: 150px;">
            <h2 style="text-align: center;">Please sign in to your account</h2><br>
            <form action="" method="POST">
                <label for="username">Username</label><br>
                <input class="signin" type="text" id="account" name="username"><br>
                <label for="password">Password</label>
                <a href="forgot-password.html" class="forgot">Forgot password?</a><br>
                <input class="signin" type="password" id="password" name="password"><br>
                <input type="submit" value="Sign in" name="signin">
                <?php
                    if($error){
                         print "<p style='color: red;'>Invalid username and/or password</p>";
                    }
                ?>
            </form>
        </div>
    </div>

    <div class="row center">
        <div class="col-4 col-s-4" style="margin-top: 25px;">
            <h3>No account? Sign up now!</h3>
        </div>
        <div class="col-8 col-s-8" style="margin-top: 45px;">
            <a href="signup.php" class="newSignup">Sign Up</a>
        </div>
    </div>
</body>

</html>