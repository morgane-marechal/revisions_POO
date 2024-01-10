<?php

// require('product.php');
require('product.php');

// // //test pour voir si les methodes fonctionnent
$newDate = date("Y-m-d H:i:s"); 


$product = new Product(NULL,"UpdateDell1", "img1.png", 999, "lorem ipsum Tamere", 2, $newDate, NULL, 1 );
$product->create();
$product->setQuantity(666);
$product->update();
var_dump($product);


?>