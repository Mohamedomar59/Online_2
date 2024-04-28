<?php

session_start( );
require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';
require_once '../classes/validation/Validator.php';

use validation\Validator;
if (!isset($_SESSION['id']))
{
    header('location:../login.php');
    die();
}

if (isset($_POST['submit'])) 
{

    $id=$_GET['id'];
    //read data
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];



    //validation 
    $v = new Validator;

    $v->rules('name',$name,['required','string','max:100'] );
    $v->rules('price',$price,['required','numeric'] );
    $v->rules('quantity',$quantity,['required','numeric'] );
    $v->rules('desc',$desc,['required','string'] );

    

    $errors=$v->errors;
    //if valid
    if ($errors == []) {
        # store in db

        $data = [
            'name'=>$name,
            'desc'=>$desc,
            'price'=>$price,
            'quantity'=>$quantity,            
        ];
        
        $prod=new Product;
        $result=$prod->update($id,$data);

        //if stored successfully
        if (true) {
            header('location:../show.php?id='.$id);
        }
        else 
        {
            $_SESSION['errors'] = ['error update in database'];
            header('location:../edit.php?id='.$id);
        }
    }
    else 
     {
        $_SESSION['errors'] = $errors;
        header('location:../edit.php?id='.$id);
    }
    
}else
{
    header('location:../index.php');
}



?>