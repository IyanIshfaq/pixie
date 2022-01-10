<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pixie Template - About Page</title>

    <!-- Bootstrap core CSS -->
      <?php
     include "css.php";
     ?>
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
  </head>

  <body>
    
     <!-- header area -->
    <?php
     include "header.php";
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About Us</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
      <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>About Us</h1>
            </div>
          </div>
    <!-- About Page Starts Here -->
    <div class="about-page">
      <div class="container">
        <div class="row">

          <?php
             include "config.php";
             $sql="SELECT * FROM about ";
             $result=mysqli_query($conn,$sql) or die("querry failed");
             if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_assoc($result)){

            ?>
          <div class="col-md-6">
            <div class="left-image">
              <img src="admin/upload/<?php echo $row['aboutimg'];?>" alt="">
            </div>
          </div>
          <div class="col-md-6">
           <h4>Impotant Information for PIXIE</h4>
            <div class="right-content">
                           <?php echo $row['description'];?>
              <div class="share">
                <h6>Find us on: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
              </div>
            </div>
          <?php } } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- About Page Ends Here -->

   <!-- footer area -->
    <?php
     include "footer.php";
    ?>


    <!-- Bootstrap core JavaScript -->
    <?php
     include "js.php";
    ?>


  </body>

</html>
