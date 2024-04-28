<?php

require_once 'MySql.php';

class Product extends MySql
{

    //get All Products
    public function getAll(){
        $query = "SELECT * FROM products";
        $result = $this->connect()->query($query);
        $products=[];
        if ($result->num_rows>0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($products , $row);
            }
        }
        return $products;

    }

    //get one product
    public function getOne($id){
        $query = "SELECT * FROM products WHERE id ='$id'";
        $result = $this->connect()->query($query);
        $product=null;
        if ($result->num_rows==1) {
            $product = $result->fetch_assoc();
        }
        return $product;
    }

    //create one 
    public function store(array $data)
    {
        $data['name']= mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc']= mysqli_real_escape_string($this->connect(), $data['desc']);

        $query = "INSERT INTO products (`name`, `desc`, `price`, `img`,`quantity`, `created_at`)
        
        VALUES ('{$data['name']}', '{$data['desc']}', '{$data['price']}', '{$data['img']}', '{$data['quantity']}',CURRENT_TIME() )";
        
        $result = $this->connect()->query($query);
        if($result == true)
        {  
            return true;
        }
        
        return false;
    
    
    }
    

    //Update
    public function update($id, array $data)
    {
        $data['name']= mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc']= mysqli_real_escape_string($this->connect(), $data['desc']);
        
        $query = "UPDATE products SET 
            `name` = '{$data['name']}', 
            `quantity` = '{$data['quantity']}', 
            `desc` = '{$data['desc']}', 
            `price` = '{$data['price']}'
             
        WHERE id = '$id'";
    
        $result = $this->connect()->query($query);
        if ($result == true)
        {
            return true;
        }
    
        return false;
    }
    

    //delete
    public function delete($id){
        $query = "DELETE FROM products 
        WHERE id = '$id' "; 
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        }
        return false; 

        
    }
    

}



?>