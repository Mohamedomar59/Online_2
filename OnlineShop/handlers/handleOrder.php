<?php


session_start( );
require_once '../classes/Product.php';
require_once '../classes/Order.php';
require_once '../classes/OrderDetails.php';
require_once '../classes/validation/Validator.php' ;


use  validation\Validator;
?>

<?php
if (isset($_POST['submit'])) 
{
    //read data
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];


    //validation 
    $v = new Validator;

    $v->rules('name',$name,['required','string','max:100'] );
    $v->rules('email',$email,['required','string','email'] );
    $v->rules('phone',$phone,['required','numeric'] );
    $v->rules('address',$address,['required','string'] );
    

    $errors=$v->errors;
    


    //if valid
    if ($errors == []) {
        # store in db
        $data =
        [
            'customerName'=>$name,
            'customerEmail'=>$email,
            'customerPhone'=> $phone,
            'customerAddress'=>$address,
        ];
        
        $order=new Order;
        $result=$order->store($data);

        //if stored successfully
        if (true)
        {
            header('location:../index.php');
            session_destroy();

        }
        else 
        {
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../buyProducts.php');
        }
    }
    else
     {
        $_SESSION['errors'] = $errors;
        header('location:../buyProducts.php');
    }
    
}else
{
    header('location:../buyProducts.php');
}



?>