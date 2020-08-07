    <?php
    //actually getting info into a form page
        $dom = new DOMDocument;
        $dom->load("prodList.xml");
        $xml = simplexml_import_dom($dom);

        //print_r ($xml);
       // print_r ($xml->productList->Type->productName->quantity);
        

        $pattern = "(/([?]\w?(-)*[a-zA-Z])/)";
        
       //$url = ($_SERVER['REQUEST_URL']);
       $url = "C:/Apache24/htdocs/edit%20test.php?Coca-Cola=Edit+Item";

        
        foreach ($xml->Type as $type)//$type is the link upto product name
        {
            $name =  $type->productName;
            if ("?$name" == preg_match($pattern,$url)){
                $quantity = $type->productName->quantity;
                $weight = $type->productName->weight;
                $units = $type->productName->units;
                $price = $type->productName->price;
                $description = $type->productName->description;
                $brand=$type->productName->brand;
                $countryOfOrigin = $type->productName->countryOfOrigin;
                $productNumber=$type->productName->productNumber;
                
            }
            else{
                echo"Not Found";
            }
                
            
            
            echo "Quantity: $quantity\t";
            echo "Weight: $weight $units\t"; 
            echo "Price: $price\t";
            echo "Description: $description\t"; 
            echo "Brand: $brand\t";
            echo "Coutry of Origin: $countryOfOrigin\t"; 
            echo "Product ID: $productNumber\n";
        }


            ?>
            