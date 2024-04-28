<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>

    
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand  "href="index.php">Online Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div  class="navbar-nav "> 
            <a class="nav-item nav-link" aria-current="page" href="index.php">All Products</a>

            <?php if(isset($_SESSION['id']))  {  ?>
            <a class="nav-item nav-link" href="add.php">Add New</a>
            <?php   }  ?>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['id']))  {  ?>
                <a class="nav-item nav-link disabled" href="#"><?php echo $_SESSION['username']; ?></a>
                <a class="nav-item nav-link" href="handlers/handleLogout.php">Logout</a>
            <?php   }  ?>
        </div>

     </div>
</nav>

