<?php

    $fname = $lname = $email = $admin ="";
    $snumber = $sname = $apt = $pcode=" ";
    $users = simplexml_load_file("users/users.xml"); 
    $invalid = array();


    if(isset($_POST['submit'])){

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
            $pcode = test_input($_POST["pcode"]);
            if (!preg_match("/[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/", $pcode)){
                $invalid["pcode"] = "Postal code format is Letter-Digit-Letter Digit-Letter-Digit";
            }
        }

        //Uploading of data to xml file once there is no invalid data entries
        if(count($invalid) == 0){           
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
    <style>

    </style>
</head>
<body>

    <div style="text-align: center">
        <h2> User Add/Edit </h2>
    <img src="images/profile.png" alt="user profile picture" width="200" height="200" >
        <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table border="Border" style="border:1px solid black;margin-left:auto;margin-right:auto;margin-top:30px;padding:5px;";>
                
                <tr>
                    <th colspan="2">
                        first name: <input type="text" name="fname" size="15" value = <?php print $fname?>>
                    </th>
                    <th colspan="2">
                        Last name: <input type="text"name="lname"size="15" value = <?php print $lname?>>
                    </th>

                </tr>
                <tr>
                    <th colspan="1">
                        Street#: <input type="text" name="snumber" size="10" value = <?php print $snumber?>>
                    </th>
                    <th colspan="2">
                        Street name: <input type="text" name="sname" size="30" value = <?php print $sname?>>
                    </th>
                    <th colspan="1">
                        Apt#: <input type="text" name="apt" size="10" value = <?php print $apt?>>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        Email Address: <input type="text"name="First name"size="35" value = <?php print $email?>>
                    </th>

                </tr>
                <tr>
                    <th colspan="4">
                        User Password (max length: 35): <input type="password"name="First name"size="35">

                    </th>                    
                </tr>
            </table>
            <input type="submit" name="submit" style="background-color:lightblue"; value="Save"size="10">
        </form>
    </div>



