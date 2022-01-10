<?php
 include "config.php";
$page=basename($_SERVER['PHP_SELF']);
switch($page)
{
  case "single-product.php":
  if(isset($_GET['id']))
  {
   
    $sqli="SELECT * FROM post WHERE post_id ={$_GET['id']}";
    $resl=mysqli_query($conn,$sqli) or die("query failed");
    $total_page=mysqli_fetch_assoc($resl);
    $name=$total_page['title'];
  }else{
    $name="NO Post found";
  }
break;
 default:
 echo "Pixie PRODUCTS";
 break;
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php  echo $name; ?></title>

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
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
  
          <div class="featured-items">
         <div class="container">
           <div class="col-md-12">
             <div class="section-heading">
               <div class="line-dec"></div>
                <h1>Single Product</h1>
              </div>
             </div>
            </div>
          </div>
   
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
         
                <?php
                         include "config.php";

                           $post_id=$_GET['id'];

                           $sql="SELECT * FROM post 
                           LEFT JOIN category ON post.category = category.category_id
                           LEFT JOIN user ON post.author = user.user_id
                           WHERE post_id={$post_id}";

                           $result = mysqli_query($conn,$sql) or die ("Query unsuccessfully");
                          if(mysqli_num_rows($result)>0){
                             while($row = mysqli_fetch_assoc($result)){
                        ?>
                        
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">

                <ul class="slides">
                 
                    <img src="admin/upload/<?php echo $row['post_img'];?>" />
                
             
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                
                 
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4><?php echo $row['title'];?></h4>
              <h6>$<?php echo $row['Prize'];?></h6>
              <p> <?php echo $row['description'];?> </p>
              <form action="order.php" method="get">
                <label for="quantity">Quantity:</label>
                <input name="quantity" type="quantity" class="quantity-text" id="quantity" 
                	onfocus="if(this.value == '1') { this.value = ''; }" 
                    onBlur="if(this.value == '') { this.value = '1';}"
                    value="1">
                <input type="submit" class="button" value="Order Now!">
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6>Category: <span><a href="category.php?cid=<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></a></span></h6>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        <?php }}  ?>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->
          <div class="featured-items">
         <div class="container">
           <div class="col-md-12">
             <div class="section-heading">
               <div class="line-dec"></div>
                <h1>You May Also Like</h1>
              </div>
             </div>
            </div>
          </div>
   
      <div class="featured-items">
         <div class="container">
           <div class="row slider">
           <?php
                 include "config.php";
                      $cat_id=$_GET['cid'];
                     $limit=8;
                    if(isset($_GET['page'])){
                    $page=$_GET['page'];
                    }else{
                      $page=1;
                    }
                    $offset=($page-1)*$limit;
                  
                    $sql="SELECT * FROM post 
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id 
                    WHERE category = {$cat_id}
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    $result = mysqli_query($conn,$sql) or die ("Query unsuccessfully");
                    if(mysqli_num_rows($result)>0){
                           while($row = mysqli_fetch_assoc($result)){

           ?> 
           <div class="col-md-6">
              <a href="single-product.php?cid=<?php echo $row ['category_id'];?>&id=<?php echo $row ['post_id'];?>">
                <div class="featured-item">
                  <img src="admin/upload/<?php echo $row['post_img'];?>" alt="">
                  <h4><?php echo $row['title'];?></h4>
                  <h6>$<?php echo $row['Prize'];?></h6>
                 
                </div>
              </a>
          </div>
         
         <!-- Featred Ends Here -->
         <?php
          }
         }else{
           echo "<div class='alert alert-danger'>RECOD NOT FOUND</div>";
         }
                    $sql1= "SELECT * FROM post";
                   $result1= mysqli_query($conn,$sql1) or die("query failed");
                   if(mysqli_num_rows($result1) > 0){
                   $total_records=mysqli_num_rows($result1);
                   $total_pages= ceil($total_records / $limit);
                    }
         ?>
          </div>
        </div>
      </div>
    

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
