<?php
class Product

{
    // déclaration d'une propriété
    /**
     * @var
     */
    public $id;
    public $name;
public $photo;
public $price;
public $description;
public $quantity;
public $createAt;
public $updateAt ="";

    function __construct($id, $name, $photo, $price, $description, $quantity, $createAt) {
        $this->id=$id;
        $this->name = $name;
        $this->photo = $photo;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createAt = $createAt;
        


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


}

//test pour voir si les methodes fonctionnent

$newDate = date("Y-m-d H:i:s"); 
$product = new Product(1,'name', 'image.png', 'price', 'une description', 5, $newDate);
echo $product->getId();

echo $product->getName();
$product->setName('leo');
echo $product->getName();
echo $product->getCreateAt();

?>