<?php


session_start( );


require_once '../classes/validation/Validator.php' ;
require_once '../classes/Admin.php' ;



use  validation\Validator;

if (isset($_POST['submit'])) 
{
    //read data
    $email=$_POST['email'];
    $password=$_POST['password'];

    //validation 
    $v = new Validator;

    $v->rules('email',$email,['required','email','max:100']);
    $v->rules('password',$password,['required','string'] );


    $errors=$v->errors;
    
    //if valid
    if ($errors == [])
    {
        $admin=new Admin;
        $result=$admin->attemp($email,sha1($password));
        if ($result !== null)
        {
            $_SESSION['id']=$result['id'];
            $_SESSION['username']=$result['username'];
            header('location:../index.php');
        }
        else 
        {
            $_SESSION['errors']=['your credentials are not correct'];
            header('location:../login.php');
        }
    }
    else
    {
        $_SESSION['errors']=$errors;
        header('location:../login.php');
    }
    
}else
{
    header('location:../login.php');
}



?>