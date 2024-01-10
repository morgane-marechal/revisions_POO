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
    private  $createAt;
    private  $updateAt;
    private ?int $id_category;

    private $db = "NULL";

    function __construct($id = null, $name = null, $photo = null, $price = null, $description = null, $quantity = null, $createAt = null, $updateAt = null, $id_category = null) {
        $this->id=$id;
        $this->name = $name;
        $this->photo = $photo;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->id_category = $id_category;
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

    public function getIdCategory(){
        return $this->id_category;
    }

    public function setIdCategory($id_category){
        return $this->id_category = $id_category;
    }

    //get product by id

    public function getProductById(int $productId): array {
        $productData = [];

        try {

            $query = "SELECT * FROM `product` WHERE product.id = '$productId'";
            $pdo_stmt = $this->db->query($query, PDO::FETCH_ASSOC);

            $result = $pdo_stmt->fetch();

            // update the product data
            $this->id = $productId;
            $productData = $result;

        } catch (PDOException $e) {
          // TODO: handle the exception
          echo $e->getMessage();
          die();
        }

        return $productData;
    }


    function getCategory(){
        $productData = [];

        try {

            $query = "SELECT product.category_Id FROM `product` WHERE product.id = $this->id";
            $pdo_stmt = $this->db->query($query, PDO::FETCH_ASSOC);
            $result = $pdo_stmt->fetch();
            // update the product data
            $productData = $result;

        } catch (PDOException $e) {
          // TODO: handle the exception
          echo $e->getMessage();
          die();
        }
        return $productData;
    }

    public function findOneById(int $productId) {



            $query = "SELECT * FROM `product` WHERE product.id = '$productId'";
            $pdo_stmt = $this->db->query($query, PDO::FETCH_ASSOC);

            $result = $pdo_stmt->fetch();

            // update the product data
            // $productData = $result;


        if ($result!=NULL){
            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->photos = $result['photos'];
            $this->price = $result['price'];
            $this->description = $result['description'];
            $this->quantity = $result['quantity'];
            $this->createAt = $result['createAt'];
            $this->updateAt = $result['updateAt'];
            $this->category_id = $result['category_id'];
            return $this;

        }else{
            return false;
        }
        
    }

    public function findAll() {
        $productData = [];

        try {

            $query = "SELECT * FROM `product`";
            $pdo_stmt = $this->db->query($query, PDO::FETCH_ASSOC);

            $result = $pdo_stmt->fetchAll();

            foreach ($result as $instanceProduct) {
                // $instanceProduct['name'];
                $product = new Product($instanceProduct['id'],$instanceProduct['name'], $instanceProduct['photos'], $instanceProduct['price'],
                $instanceProduct['description'], $instanceProduct['quantity'], $instanceProduct['createAt'],$instanceProduct['updateAt'],
                $instanceProduct['category_id']);
                array_push($productData, $product);
              }
        } catch (PDOException $e) {
          // TODO: handle the exception
          echo $e->getMessage();
          die();
        }
        return $productData;
    }

    public function create(){
        $query = "INSERT INTO `product` (name, photos, price, description, quantity, createAt, updateAt, category_id) VALUES (:name, :photos, :price, :description, :quantity, :createAt, :updateAt, :category_id)";
        $sql_exe = $this->db->prepare($query);
        $sql_exe->execute([
            'name' => htmlspecialchars($this->name),
            'photos' => htmlspecialchars($this->photo),
            'description' => htmlspecialchars($this->description),
            'price' => htmlspecialchars($this->price),
            'quantity' => htmlspecialchars($this->quantity),
            'category_id' => htmlspecialchars($this->id_category),
            'createAt' => $this->createAt,
            'updateAt' => $this->updateAt
        ]); 

        if ($sql_exe) {
            $queryLastId = "SELECT LAST_INSERT_ID() FROM `product`";
            $pdo_stmt = $this->db->query($queryLastId, PDO::FETCH_ASSOC);
            $result = $pdo_stmt->fetch();
            $this->id=$result['LAST_INSERT_ID()'];
            return $this;
        }else{
            return false;
        } 
    }

    public function update(){
        $query = "UPDATE `product` SET name = :name, photos = :photo, price = :price, description = :description, quantity= :quantity, createAt = :createAt, updateAt = :updateAt, category_id = :category_id WHERE id = :id";
        $sql_exe = $this->db->prepare($query);
        $sql_exe->execute([
            'id' => $this->id,
            'name' => htmlspecialchars($this->name),
            'photo' => htmlspecialchars($this->photo),
            'description' => htmlspecialchars($this->description),
            'price' => htmlspecialchars($this->price),
            'quantity' => htmlspecialchars($this->quantity),
            'category_id' => htmlspecialchars($this->id_category),
            'createAt' => $this->createAt,
            'updateAt' => $this->updateAt
        ]); 

        return $this;

    }
}












// var_dump($newProductSeven);




?>