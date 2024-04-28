<?php
session_start( );

require_once '../classes/Product.php';

if (!isset($_SESSION['id']))
{
    header('location:../login.php');
    die();
}

$id=$_GET['id'];

$pord = new Product;

$product = $pord->getOne($id);
$img = $product['img'];
$result = $pord->delete($id);

unlink('../images/'. $img);

if ($result ==true) 
{

} 
else 
{ 
    
}
header('location:../index.php')

?>