<?php

// require('product.php');
require('product.php');

// // //test pour voir si les methodes fonctionnent
$product = new Product();
$products = $product->findAll();
var_dump($products);


?>