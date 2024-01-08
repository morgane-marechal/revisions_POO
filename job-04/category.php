<?php
class Category

{
    // déclaration d'une propriété
    /**
     * @var
     */
    private ?int $id;
    private ?string $name;
    private ?string $description;
    private  $createAt;
    private  $updateAt;

    function __construct($id=null, $name=null, $description=null, $createAt=null) {
        $this->id=$id;
        $this->name = $name;
        $this->description = $description;
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


}

//test pour voir si les methodes fonctionnent

$newDate = date("Y-m-d H:i:s"); 
$category = new Category(1,'name', 'une description', $newDate);
echo $category->getId();

echo $category->getDescription();
$category->setName('leo');
echo $category->getName();
echo $category->getCreateAt();

?>