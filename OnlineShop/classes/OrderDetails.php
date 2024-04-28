<?php

require_once 'MySql.php';

class OrderDetials extends MySql
{

    //get All Products
    public function getAll(){
        $query = "SELECT * FROM Orderdetials";
        $result = $this->connect()->query($query);
        $orderdetials=[];
        if ($result->num_rows>0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($orderdetials , $row);
            }
        }
        return $orderdetials;

    }

    //get one product
    public function getOne($id)
    {
        $query = "SELECT * FROM orderdetials WHERE id ='$id' ";
        $result = $this->connect()->query($query);
        $orderdetials=null;
        if ($result->num_rows==1)
        {
            $order = $result->fetch_assoc();
        }
        return $orderdetials;
    }

    //create one 
    public function store(array $data)
    {
        $query = "INSERT INTO orderdetials (`order_id`, `product_id`, `priceEach`)
        
        VALUES ('{$data['order_id']}', '{$data['product_id']}', '{$data['priceEach']}')";
        
        $result = $this->connect()->query($query);
        if($result == true)
        {  
            return true;
        }
        
        return false;
    
    
    }
}



?>