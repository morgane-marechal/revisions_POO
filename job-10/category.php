<?php

require('product.php');

class Category extends product{
    // déclaration d'une propriété
    /**
     * @var
     */
    private ?int $id;
    private ?string $name;
    private ?string $description;
    private  $createAt;
    private  $updateAt;

    private $pdo = "NULL";

    function __construct($id=null, $name=null, $description=null, $createAt=null) {
        $this->id=$id;
        $this->name = $name;
        $this->description = $description;

        $this->createAt = $createAt;
        $pdo = $this->connection();
        $this->pdo = $pdo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        return $this->name = $name;
    }





    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        return $this->description = $description;
    }



    public function getCreateAt(){
        return $this->createAt;
    }

    public function setCreateAt($createAt){
        return $this->createAt = $createAt;
    }

    public function getUpdateAt(){
        return $this->updateAt;
    }

    public function setUpdateAt($updateAt){
        return $this->updateAt = $updateAt;
    }

    //exo 6
    public function getCategoryById(int $categoryId): array {
        $productData = [];

        try {


            $query = "SELECT * FROM `category` WHERE category.id = '$categoryId'";
            $pdo_stmt = $this->pdo->query($query, PDO::FETCH_ASSOC);

            $result = $pdo_stmt->fetch();

            // update the product data
            $this->id = $categoryId;
            $productData = $result;

        } catch (PDOException $e) {
          // TODO: handle the exception
          echo $e->getMessage();
          die();
        }
        return $productData;
    }


    function getProducts(){
        $productsData = [];

        try {

            $query = "SELECT * FROM `product` WHERE product.category_id = $this->id";
            $pdo_stmt = $this->pdo->query($query, PDO::FETCH_ASSOC);
            $result = $pdo_stmt->fetchAll();
            // update the product data
            $productsData = $result;

        } catch (PDOException $e) {
          // TODO: handle the exception
          echo $e->getMessage();
          die();
        }
        return $productsData;
    }


}

//test pour voir si les methodes fonctionnent

// echo "retourne tous les produits avec la même catégorie que 7";
// $category = new Category();
// $categoryOf7 = $category->getCategoryById(1);
// var_dump($categoryOf7);
// $productsOfCategory = $category->getProducts();
// var_dump($productsOfCategory);

?>