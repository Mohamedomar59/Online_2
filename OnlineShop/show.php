<?php
session_start( );

require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';

$id=$_GET['id'];

$_SESSION['prodId']=$id;
if (!isset( $_SESSION['cart']))
{
    $_SESSION['cart']=[];

}
if (isset($_POST['cart']))
{
    array_push($_SESSION['cart'] , $_SESSION['prodId'] );
}

$pord = new Product;
$product = $pord->getOne($id);

?>


<?php  include 'inc/header.php'; ?>


<div  class="container my-5 ">
        <div class="row">

       <?php if($product !== null) { ?>
            <div class="col-lg-6">
            <img src="images/<?php echo $product['img'];?>" class="img-fluid">
            </div>
            <div class="col-lg-6 ">
                <h5><?php echo $product['name'];?></h5>
                <p class="text-muted">Price: $<?php echo $product['price']; ?></p>
                <p class="text-muted">Quantity: <?php echo $product['quantity']; ?></p>
                <p> <?php echo $product['desc']; ?></p>
      
                <div class="row">
                <div class="col-lg-2">
                        <form method="post" action="show.php?id=<?php echo $product['id']; ?>">
                        <a href="index.php" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <form method="post" action="show.php?id=<?php echo $product['id']; ?>">
                             <input class="btn btn-primary" type="submit" name="cart"  value="Add To Cart">
                        </form>
                    </div>
                    <div class="col">
                        <?php  if (isset($_POST['cart'])) {  ?>
                                <a href="buyProducts.php" class="btn btn-success" >buy Products</a>
                        <?php    }  ?>
                    </div>
                </div>

                <?php if(isset($_SESSION['id']))  {  ?>
                    <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="handlers/handleDelete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Delete</a>
                <?php   }  ?>
            </div>  
            <?php } else { ?>
            <p> No Product found </p>
        <?php } ?>    
        </div>
    </div>


<?php  include 'inc/footer.php'; ?>
    
