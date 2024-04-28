<?php
require_once 'MySql.php';

class Admin extends MySql
{
    public function attemp($email , $hased_password) 
    {
        $query = " SELECT * from admins 
        WHERE email = '$email' and `password` = '$hased_password'  ";
        
        $result = $this->connect()->query($query);
        $user=null;
        if ($result->num_rows==1)
        {
            $user= $result->fetch_assoc();
        }
        return $user;
        
    }

}


















?>