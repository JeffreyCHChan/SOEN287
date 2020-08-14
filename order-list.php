<!--Nareg Mouradian 40044254-->
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order List</title>
        <link rel="stylesheet" type="text/css" href="product-backend.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

<div>    

    <h1 id = "OrderList"> Order List </h1>

    <table class="ListTable">
        <tr>
            <th>Order Number</th>
            <th>Customer Name</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>

        <?php

$xml = simplexml_load_file('naregOrderList.xml') or die("Error: Cannot create an object");
foreach($xml->children() as $order) {
        echo "<tr>";
        echo "<td>$order->orderid</td>";
        echo "<td>$order->username</td>";
        echo "<td>";
        $totalPrice = 0;
        foreach($order->children() as $product){
                  $totalPrice;
                  $totalPrice += $product->price; 
                }
        echo $totalPrice;
        echo "</td>";
        echo "<td><a href='order-profile.php'><button>Edit</button></a> / <button>Delete</button></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='4'><button class='itemMore'>Items</button>";
        echo "<div class='itemDescMore'>";
        foreach($order->children() as $product)
    { 
        if($product->name != ""){
        echo "<p class='itemMenu'>";
        echo "<ul>";
        echo "<li>";
        echo "Product Name: $product->name"; 
        echo "</li>";
        echo "<li>";
        echo "Product Section: $product->section";
        echo "</li>";
        echo "<li>";
        echo "Product Quantity: $product->quantity";
        echo "</li>";
        echo "<li>";
        echo "Product Price: $product->price";
        echo "</li>";
        echo "</ul>";
        echo "</p>";  
        }

    }
        echo " </div>";
        echo "</td> ";
        echo "</tr> ";
        
   
}

?>
    </table>


    <!-- <a><button>Save</button></a> -->
    <a href="order-profile.php"><button>Add an Order</button></a>

</div>

<script src="naregOrderList.js"></script>
    </body> 
</html>