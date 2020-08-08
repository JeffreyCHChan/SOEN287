    <?php
    $dom = new DOMDocument();
    $dom->load("prodList.xml");
    $xml = simplexml_import_dom($dom);

    // print_r ($xml);
    // print_r ($xml->productList->Type->productName->quantity);

    $pattern = "(/([?]\w?[a-zA-Z]*(-)*[a-zA-Z]+)/)";

    // $url = ($_SERVER['REQUEST_URL']);
    $url = "C:/Apache24/htdocs/edit%20test.php?Coca-Cola=Edit+Item";
    global $quantity, $weight, $units, $price, $description, $brand, $countryOfOrigin, $productNumber, $name;
    $totalItems = 0;

    foreach ($xml->Type as $type) {
        $totalItems ++;
    }
    echo "$totalItems\n";

     foreach ($xml->Type as $type)//$type is the link upto product name
    {
    $name = $type;

    //if ("$name" == preg_match($pattern, $url)) {
        echo "true";

        $quantity = $type->productName->quantity;
        $weight = $type->productName->weight;
        $units = $type->productName->units;
        $price = $type->productName->price;
        $description = $type->productName->description;
        $brand = $type->productName->brand;
        $countryOfOrigin = $type->productName->countryOfOrigin;
        $productNumber = $type->productName->productNumber;
    //} else {
        echo "Not Found";
    //}
/*
    echo "Quantity: $quantity\t";
    echo "Weight: $weight $units\t";
    echo "Price: $price\t";
    echo "Description: $description\t";
    echo "Brand: $brand\t";
    echo "Coutry of Origin: $countryOfOrigin\t";
    echo "Product ID: $productNumber\n";
*/
    echo "<table border='2' style='width: 100%; height: min-content;''>     ";
    echo "<td><p class='headers'><b>Category</b></p></td>";
    echo "<td><p class='headers'><b>Quantity</b></p></td>";
    echo "<td><p class='headers'><b>Add</b></p></td>";
    echo "<td><p class='headers'><b>Remove</b></p></td>";
    echo "<td><p class='headers'><b>Edit</b></p></td>";
    echo "<form method='POST'>";

    echo "<tr id='$name'>";
    echo "<td class='itemData' id='productName'>$name</td>";
    echo "<td class='itemData' id='quantity'>$quantity</td>";
    echo "<td><form action='product-add.html'> <input type='submit' id='inventoryAdd' value='Add Item' /></form></td>;";
    echo "   <td><form          ><input type='button' onclick='deleteItem('7-up')' value='Remove' name='7-UP'></form></td>";
    echo "<td><form action='product-edit.html'> <input type='submit' id='inventoryEdit' value='Edit Item' name='7-UP'/></form></td>";
    echo "</tr>";
    echo "</table>";
    }
    ?>
