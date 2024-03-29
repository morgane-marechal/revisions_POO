<?php

require('connect.php');

class Product extends Connect{
    // déclaration d'une propriété
    /**
     * @var
     */
    private  ?int $id;
    private ?string $name;
    private ?string $photo;
    private ?int $price;
    private ?string $description;
    private ?int $quantity;
    private ?string $createAt;
    private ?string $updateAt;

    private $db = "NULL";

    function __construct($id = null, $name = null, $photo = null, $price = null, $description = null, $quantity = null, $createAt = null, $updateAt = null) {
        $this->id=$id;
        $this->name = $name;
        $this->photo = $photo;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $db = $this->connection();
                $this->db = $db;
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

    public function getPhoto(){
        return $this->photo;
    }

    public function setPhoto($photo){
        return $this->photo = $photo;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        return $this->price = $price;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        return $this->description = $description;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        return $this->quantity = $quantity;
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

    //get product by id

    public function getProductById(int $productId): array {
        $productCategory = [];

        try {

            $query = "SELECT * FROM `product` WHERE product.id = '$productId'";
            $pdo_stmt = $this->db->query($query, PDO::FETCH_ASSOC);

            $result = $pdo_stmt->fetch();

            // update the product Category
            $productCategory = $result;

        } catch (PDOException $e) {
          // TODO: handle the exception
          echo $e->getMessage();
          die();
        }

        return $productCategory;
    }


}




?>