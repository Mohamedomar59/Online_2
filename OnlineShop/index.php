<?php
session_start( );

require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';


$pord = new Product;
$products = $pord->getAll();

?>


<?php  include 'inc/header.php'; ?>


<div  class="container my-5 ">
        <div class="row">


        <?php if($products !== []) { ?>
            <?php foreach ($products as $Product) { ?>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="images/<?php echo $Product['img'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $Product['name']; ?></h5>
                            <p class="text-muted">$<?php echo $Product['price']; ?></p>
                            <p class="card-text">
                                <?php echo helpers\Str::limit($Product['desc']); ?>
                            </p>
                            <a href="show.php?id=<?php echo $Product['id']; ?>" class="btn btn-primary">Show</a>
                            <?php if(isset($_SESSION['id']))  {  ?>
                                <a href="edit.php?id=<?php echo $Product['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="handlers/handleDelete.php?id=<?php echo $Product['id']; ?>" class="btn btn-danger">Delete</a>
                            <?php   }  ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
         <?php } else { ?>
            <p> No Product found </p>
        <?php } ?>
        </div>
    </div>


<?php  include 'inc/footer.php'; ?>
    
