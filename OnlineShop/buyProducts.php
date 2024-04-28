<?php
session_start( );

require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';
include 'inc/header.php';
?>


<div class="container mt-5">
    <div class="row">
        <div col-lg-12>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Price</th>
                        <th>image</th>
                    </tr>
                </thead>
                <?php if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $cardId)
                    {
                        $prod=new Product;
                        $product=$prod->getOne($cardId);
                    ?>
                    <tbody>
                        <tr>
                            <td scope="row"> <?php echo $product['name'] ?> </td>
                            <td><?php echo $product['desc'] ?></td>
                            <td><?php echo $product['price'] ?></td>
                            <td><img style="width: 500px;" src="images/<?php echo $product['img'];?>" class="img-fluid"></td>
                        </tr>
                    </tbody>
                    <?php   }   ?>
                <?php   }   ?>

            </table>
        </div>
    </div>
</div>

<div  class="container my-5 ">
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

            <form action="handlers/handleOrder.php" method="post" >
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="address">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Check out</button>
            </form>
        </div>

    </div>
</div>


<?php  include 'inc/footer.php'; ?>
    

















<?php  include 'inc/footer.php'; ?>
