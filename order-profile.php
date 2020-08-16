<!--Nareg Mouradian 40044254-->
<?php 
    session_start(); 
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != "yes"){
        header ('location: index.php');
    }
    
   $orderid = $username ="";
   $name = $quantity = $section = $price = "";
   $order = simplexml_load_file("orderxml.xml");
   $xml = new DOMDocument("1.0", "UTF-8");
   $xml->load('orderxml.xml');
   $orderid=$_GET['order'];
   $xpath = new DOMXPATH($xml);
   $_SESSION['edit']="yes";

   foreach($xpath->query("/root/order[orderid='$orderid']") as $node){

    $username = $node->getElementsByTagName('username')[0]->nodeValue;

   }
  
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Profile</title>
        <link rel="stylesheet" type="text/css" href="product-backend.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <form id='form' action ='order-profile.php' method='get'>

<div>    

    <h1 id = "OrderProfile"> Order Profile </h1>

    <table class="ProfileTable">
        <tr class="ProfileHeader">
            <th colspan="4">Customer Name: <?php echo $username ?></th>
        </tr>
        <tr class="ProfileHeader">
            <th colspan="4">Order Number: <?php echo $_GET['order'] ?></th>
        </tr>

        <tr class="ProfileSubHeader">
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Aisle Name</td>
            <td>Price</td>
        </tr>
    
        <?php if(isset($_GET['order'])){
           
    foreach($order->order as $orders){
        if($_GET['order'] == $orders->orderid){
           
            foreach($orders->product as $products){
               echo "<tr class='ProfileRest'>";
               echo "<td>" . $products->name . "</td>";
               echo "<td><input type='number' name='qtt[]' min='1' value='". $products->quantity . "'></td>";
               echo "<input type='hidden' value='$orderid' name='fixSave'>";
               echo "<td>" . $products->section . "</td>";
               echo "<td>" . $products->price . "</td>";
            }
            
        
        }
       
    } 
   
}
    ?>
 
 </form>
    </table>
  
    <input type="submit" value="Save" name="saveC">

 
</div>

<?php

if(isset($_GET['saveC'])){
   
$i = 0;

  foreach($order->children() as $orders)
{
             foreach($orders->children() as $products)
    {
         $products->quantity = $_GET['qtt'][$i];
         $i = $i+1;  
       
    }   
   }  

file_put_contents("orderxml.xml" , $order->saveXML());

header("Location: order-list.php");
}

?>


    </body> 
</html>