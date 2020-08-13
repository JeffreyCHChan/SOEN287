<?php

    session_start();
        if(!isset($_SESSION['admin']) || $_SESSION['admin'] !="yes"){
            header('location: index.php');
    }

$fname = $lname = $email = $admin ="";
$snumber = $sname = $apt = $pcode="";
$username = $city = $province = $password="";
$users = simplexml_load_file("users/users.xml");

if(isset($_GET['user'])){
        
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('users/users.xml');

    $username=$_GET['user'];
    $xpath = new DOMXPATH($xml);

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
        //admin button
    }

     
}

if(isset($_POST['delete'])){

    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('users/users.xml');

    $username=$_GET['user'];
    $xpath = new DOMXPATH($xml);

    foreach($xpath->query("/users/user[username='$username']") as $node){
        $node->parentNode->removeChild($node);
    }

    $xml->formatoutput=true;
    $xml->save('users/users.xml');
    
    header("Location: userlist2.0.php");
}

?>


<!DOCTYPE html>
    <html>
        <head>
            <h1 style="text-align: center">Confirmation of User Deletion</h1>
            <link rel="stylesheet" type="text/css" href="product-backend.css">
        </head>

        <body>
            <p>Are you sure you would like to delete this user? (If not go back and refresh the page)</p>
            <p>Username: <?php echo $username?></p>
            <p>First Name: <?php echo $fname?></p>
            <p>Last Name: <?php echo $lname?></p>
            <p>Street Number: <?php echo $snumber?></p>
            <p>Street Name: <?php echo $sname?></p>
            <p>Apartment Number: <?php echo $apt?></p>
            <p>City: <?php echo $city?></p>
            <p>Province: <?php echo $province?></p>
            <p>Postal Code: <?php echo $pcode?></p>
            <p>Email: <?php echo $email?></p>
            <p></p>
            <form method="POST">
                <input type="submit" name="delete" value="Confirm">
            </form>



        </body>


    </html>