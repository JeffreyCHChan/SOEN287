<?php
session_start();
class cartitem{

public $category;
public $name;
public $unit_price;
public $quantity;

function __construct($category,$name,$unit_price,$quantity) {

    $this->category=$category;
    $this->name = $name;
    $this->unit_price=$unit_price;
    $this->quantity=$quantity;
  }

}
$index;
$exist=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_SESSION["cart"]))
        $cartarray=array();

    else{
        $cartarray=json_decode($_SESSION['cart']);


        for($i=0;$i<count($cartarray);$i++){

           if($cartarray[$i]->name==$_POST['name']&&$cartarray[$i]->category=='Vegetables'){

           $exist=1;
           $index=$i;
            }
            else if($cartarray[$i]->name==$_POST['name'])
            $exist=2;


        }
    }

    if($exist==0){
    $xml=simplexml_load_file("prodList.xml") or die("Error: Cannot create object");
    foreach($xml->children() as $Product){
        if($Product->name==$_POST['name']){
        $cat=$Product->section;
        $nam=$Product->name;
        $un=$Product->price;

        array_push($cartarray,new cartitem("$cat","$nam","$un",$_POST['Quantity']));

        }
        }

    $_SESSION['cart']=json_encode($cartarray);



}
else if($exist==1){

 $cartarray[$index]->quantity=$_POST['Quantity'];

    $_SESSION['cart']=json_encode($cartarray);



}
else echo"<script type='text/javascript'>alert('the item already exist');</script>";
}





?>