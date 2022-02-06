<?php
require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";
class customer extends connection implements crud
{
    private $id;
    private $name;
    private $address;
    private $phone;

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
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
    public function create()
    {
        
    }
    public function read()
    {
        $query="select * from customer";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query="INSERT INTO customer( name , address , phone ) VALUES('$this->name' , '$this->address' , '$this->phone')";
        return $this->runDML($query);
    }
    public function delete()
    {
        
    }
    public function PhoneExist()
    {
        $query="select * from customer where phone= '$this->phone'";
        return $this->runDQL($query);
    }
}
?>