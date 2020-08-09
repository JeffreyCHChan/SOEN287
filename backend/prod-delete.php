<?php

if(isset($_POST['submit'])){
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('prodList.xml');

    //variables
    $productName=$_POST['productName'];
    $xpath = new DOMXPATH($xml);

foreach($xpath->query("/root/Product[name='$productName']") as $node){
    $node->parentNode->removeChild($node);
}
    $xml->formatoutput = true;
    $xml->save('prodList.xml');
}
?>

<html>
<body>
<form  method="POST" action="prod-delete.php">
        <table border="1" class="col-s-12">
            <tr><th class="backendAddEdit">Product Name</th>
                <td><input type="text" id="productName" name="productName"></td>
            </tr>
        </table>
        <input type="submit" name="submit" onclick="backendProductConfirmation()">    
    </form>
</body>


</html>
