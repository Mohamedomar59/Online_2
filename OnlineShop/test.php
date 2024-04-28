<?php
include 'classes/Product.php';

$prod=new Product ; 
var_dump($prod->update(1,[
    'name'=>'new product udate',
    'quantity'=>10,
    'price'=>99,
    'desc'=>'neeeeeeeeeeeeeeeeeeeeeew',
]));
?>