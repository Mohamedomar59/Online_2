<?php
session_start( );

if (!isset($_SESSION['id'])) {
    header('location:login.php');
}

?>


<?php  include 'inc/header.php'; ?>


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

            <form action="handlers/handleAdd.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="price" placeholder="price">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="quantity" placeholder="quantity">
                </div>

                <div class="form-group">
                    <textarea  class="form-control" rows="6" name="desc" placeholder="description"></textarea>
                </div>
                

                <div class="form-group">
                    <input type="file" class="form-control-file" name="img">
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Add" name="submit">
                </div>
            </form>

        </div>

    </div>
</div>


<?php  include 'inc/footer.php'; ?>
    
