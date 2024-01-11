<?php

// require('product.php');
require('product.php');

// // //test pour voir si les methodes fonctionnent
$newDate = date("Y-m-d H:i:s"); 


$product = new Product(NULL,"UpdateDell2", ['img.png', 'image-oridnateur'], 999, "lorem ipsum Tamere", 2, $newDate, NULL, 1 );
$photos = $product->getPhoto();
$name = $product->getName();
$product->create();

$product->setQuantity(666);
$product->update();
var_dump($photos);
var_dump($name);


?>