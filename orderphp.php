<?php
session_start();

if(isset($_POST['btn1'])){
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load('orderxml.xml');
    $xml2=simplexml_load_file("orderxml.xml") or die("Error: Cannot create object");
    $ordercountTag = $xml->getElementsByTagName("ordercount")->item(0);

  $ordercount=(int)$xml2->ordercount;


   
   $main = json_decode($_SESSION['cart']);
   //if($_SESSION['order']== null){
   //$_SESSION['order']=1;
   // }

    $username="Elon Musk";
    $orderTag = $xml->createElement("order");
    $usernametag=$xml->createElement("username",$username);
    $orderidtag=$xml->createElement("orderid", $ordercount);
    //$_SESSION['order']++;
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
    $ordercount++;
    $newtag=$xml->createElement("ordercount",$ordercount);
    $rootTag-> replaceChild($newtag,$ordercountTag);
    $orderTag->appendChild($orderidtag);
    $orderTag->appendChild($usernametag);
    $rootTag->appendChild($orderTag);
    $xml->formatoutput = true;
    $xml->save('orderxml.xml');

    echo"<script type='text/javascript'>alert('Your order is being processed, Thank you!');</script>";


    unset($_SESSION['cart']);

}
?>





