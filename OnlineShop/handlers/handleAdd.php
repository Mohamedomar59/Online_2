<?php


session_start( );
require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';

require_once '../classes/validation/Validator.php' ;


use  validation\Validator;
use  helpers\Image;

if (!isset($_SESSION['id']))
{
    header('location:../login.php');
    die();
}

if (isset($_POST['submit'])) 
{
    //read data
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $price=$_POST['price'];
    $img=$_FILES['img'];
    $quantity=$_POST['quantity'];


    //validation 
    $v = new Validator;

    $v->rules('name',$name,['required','string','max:100'] );
    $v->rules('desc',$desc,['required','string'] );
    $v->rules('price',$price,['required','numeric'] );
    $v->rules('quantity',$quantity,['required','numeric'] );
    $v->rules('image',$img,['required-image','image'] );

    $errors=$v->errors;
    


    //if valid
    if ($errors == []) {
        # store in db

        $image =new Image($img);

        $data = [
            'name'=>$name,
            'desc'=>$desc,
            'img'=> $image->new_name,
            'price'=>$price,
            'quantity'=>$quantity,

            
        ];
        
        $prod=new Product;
        $result=$prod->store($data);

        //if stored successfully
        if (true) {
            $image->upload();
            header('location:../index.php');
        }
        else 
        {
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../add.php');
        }
    }
    else
     {
        $_SESSION['errors'] = $errors;
        header('location:../add.php');
    }
    
}else
{
    header('location:../add.php');
}



?>