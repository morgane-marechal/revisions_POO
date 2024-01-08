<?php

require('product.php');
require('category.php');

$newDate = date("Y-m-d H:i:s"); 
$product = new Product(1,'name', 'image.png', 'price', 'une description', 5, $newDate);
echo $product->getId();

echo $product->getName();
$product->setName('leo');
echo $product->getName();
echo $product->getCreateAt();
echo "<br>";

$newDate = date("Y-m-d H:i:s"); 
$category = new Category(1,'name', 'une description', $newDate);
echo $category->getId();
echo "<br>";


echo $category->getDescription();
$category->setName('leo');
echo $category->getName();
echo $category->getCreateAt();
echo "<br>";

?>