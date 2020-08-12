<?php
session_start();
if(isset($_POST['btn1'])){
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('orderxml.xml');
   $main = json_decode($_SESSION['cart']);

    $username="Elon Musk";
    $orderTag = $xml->createElement("order");
    $usernametag=$xml->createElement("username",$username);
    //variables
    for($i=0;$i<count($main);$i++){
    $productName=$main[$i]->name;
    $section =  $main[$i]->category;
    $quantity= $main[$i]->quantity;
    $price =($main[$i]->quantity*$main[$i]->unit_price);



    $rootTag = $xml->getElementsByTagName("root")->item(0);


    $productNameTag = $xml->createElement("product");
        $name=$xml->createElement("name",$productName);
        $sectionTag =  $xml->createElement("section",$section);
        $quantityTag= $xml->createElement("quantity",$quantity);
        $priceTag =$xml->createElement("price",$price);

        //append the data to the product name then append product name to the root


            //appending to the product Name
            $productNameTag->appendChild($name);
            $productNameTag->appendChild($sectionTag);
            $productNameTag->appendChild($quantityTag);
            $productNameTag->appendChild($priceTag);

            $orderTag->appendChild($productNameTag);
}

    $orderTag->appendChild($usernametag);
    $rootTag->appendChild($orderTag);
    $xml->formatoutput = true;
    $xml->save('orderxml.xml');

    echo"<script type='text/javascript'>alert('Your order is being processed, Thank you!');</script>";


    unset($_SESSION['cart']);

}
?>





