<?php

// require('product.php');
require('category.php');

echo "retourne category de produit 7 <br>";
$product = new Product();
$product7 = $product->getProductById(7);
$cat7 = $product->getCategory();
var_dump($cat7);

echo "<br>.<br>";

// echo "retourne tous les produits avec la même catégorie que 7";
// $category = new Category();
// $categoryOf7 = $category->getCategoryById($cat7['category_Id']);
// $productsOfCategory = $category->getProducts();
echo "retourne tous les produits avec la même catégorie que 7<br>";
$category = new Category();
$categoryOf7 = $category->getCategoryById($cat7['category_Id']);
var_dump($categoryOf7);
$productsOfCategory = $category->getProducts();
var_dump($productsOfCategory);



?>