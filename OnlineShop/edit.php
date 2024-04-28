<?php
session_start( );

if (!isset($_SESSION['id'])) 
{
    header('location:login.php');
}


require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';



$id= $_GET['id'];

$pord = new Product;
$product = $pord->getOne($id);


?>


<?php  include 'inc/header.php'; ?>


<div class="container my-5">
     <div class="row">
        <div class="col-lg-6 offset-lg-3">
            
            <?php if (isset($_SESSION['errors'])) {  ?>
                <div class="alert alert-danger">
                    <?php foreach($_SESSION['errors']as $error) { ?>
                        <p class="text-center mb-0"><?php echo $error; ?></p>
                    <?php  }  ?>
                 </div>
             <?php  }  ?>

             <?php unset($_SESSION['errors'])  ?>

        
            <form action="handlers/handleEdit.php?id=<?php echo $product['id'];?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="<?php echo $product['name'];?> " placeholder="name">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="price" value="<?php echo $product['price'];?>"  placeholder="price">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="quantity" value="<?php echo $product['quantity'];?>"  placeholder="quantity">
                </div>
                <div class="form-group">
                    <textarea  class="form-control" rows="6" name="desc" placeholder="description"><?php echo $product['desc']; ?></textarea>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Edit" name="submit">
                </div>
            </form>

        </div>
    </div>
</div>


<?php  include 'inc/footer.php'; ?>
    
