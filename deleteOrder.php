<?php /* Nareg Mouradian 40044254 */ 
session_start(); 
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != "yes"){
    header ('location: index.php');
}
     

    if(isset($_POST['delete'])){

        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('orderxml.xml');

        $orderid=$_GET['order'];
        $xpath = new DOMXPATH($xml);

        foreach($xpath->query("/root/order[orderid='$orderid']") as $node){
            $node->parentNode->removeChild($node);
        }

        $xml->formatoutput=true;
        $xml->save('orderxml.xml');
        
        header("Location: order-list.php");
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <h1 style="text-align: center">Confirmation before deleting the order.</h1>
            <link rel="stylesheet" type="text/css" href="product-backend.css">
        </head>

        <body>
            
            <p> If you are sure of the deletion of order # <?php echo $_GET['order'] ?> press the confirm button below.
            If not then just press the back button on your browser. </p>

            <form method="POST">
                <input type="submit" name="delete" value="Confirm">
            </form>



        </body>


    </html>