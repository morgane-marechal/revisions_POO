<?php

require('product.php');
require('category.php');



// //test pour voir si les methodes fonctionnent
$product = new Product();
$product7 = $product->getProductById(7);
var_dump($product7);




?>