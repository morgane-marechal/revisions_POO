<?php

// require('product.php');
require('product.php');

// // //test pour voir si les methodes fonctionnent
$product = new Product();
$product7 = $product->findOneById(7);
var_dump($product7);



?>