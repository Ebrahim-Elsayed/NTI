<!--
    # http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz
  
  * Fetch the following data for all products from the previous API.    
  products_id 
  products_name,
  products_description,
  products_quantity ,
  products_model,
  products_image,
  products_date_added ,
  products_liked  

  * Insert each raw in Text File  , then Create A page to Diplay the Inserted data from  Text File . -->
<?php

$data = file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');
// var_dump(json_decode($data , true));
echo "<pre>";
    // print_r(json_decode($data , true));
echo "<pre>";

$productsArray = json_decode($data , true);

foreach ($productsArray['data'] as $key => $value) {
        $file = fopen('products.txt' ,'a') or die('can not open');
        $text =
        "products_id => "           . $value['products_id']         . "\n" ;
        "products_name => "         . $value['products_name']       . "\n" .
        "products_description => "  . $value['products_description']. "\n" .
        "products_quantity => "     . $value['products_quantity']   . "\n" .
        "products_model => "        . $value['products_model']      . "\n" .
        "products_image => "        . $value['products_image']      . "\n" .
        "products_date_added => "   . $value['products_date_added'] . "\n" .
        "products_liked => "        . $value['products_liked']      . "\n" . 
        "********************************************************"  . "\n";
        
        fwrite($file ,$text);
        fclose($file);
            
    // echo $myProducts;
    // $id    = $value['products_id']         ;   
    // $name  = $value['products_name']       ;   
    // $desc  = $value['products_description'];   
    // $quant = $value['products_quantity']   ;   
    // $model = $value['products_model']      ;   
    // $img   = $value['products_image']      ;   
    // $date  = $value['products_date_added'] ;   
    // $liked = $value['products_liked']      ;   
}

// 
?>