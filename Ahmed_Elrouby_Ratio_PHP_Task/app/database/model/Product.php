<?php
require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";
class product extends connection implements crud
{
    private $id;
    private $name;
    private $price;
    private $code;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
    public function create()
    {
        
    }
    public function read()
    {
        $query="select * from product";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query="INSERT INTO product( name , price , code ) VALUES('$this->name' , $this->price , '$this->code')";
        return $this->runDML($query);

    }
    public function delete()
    {
        
    }
    public function ProductExist()
    {
        $query="select * from product where code= '$this->code'";
        return $this->runDQL($query);
    }
}
?>