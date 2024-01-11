<?php

// require('product.php');
require('product.php');

// // //test pour voir si les methodes fonctionnent
$newDate = date("Y-m-d H:i:s"); 


$product = new Product(NULL,"Super Asus 300", ["img1.png"], 999, "lorem ipsum Tamere", 2, $newDate, NULL, 1 );
$productCreate=$product->create();
var_dump($productCreate);


?>