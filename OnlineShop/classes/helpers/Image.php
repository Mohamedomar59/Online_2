<?php 


namespace helpers;

class Image{

    private $name;
    private $tmp_name;
    public $new_name;

    public function __construct($img)
    {
       $this->name= $img['name'];
       $this->tmp_name = $img['tmp_name'];
       $this->new_name = $img['new_name'];


       $ext= pathinfo($this->name)['extension'];
       $this->new_name = uniqid(). '.' . $ext;
    }
    public function upload(){
        move_uploaded_file($this->tmp_name,'../images/'. $this->new_name);
    }




}


















?>