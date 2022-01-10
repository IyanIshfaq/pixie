<?php
 include "config.php";
$page=basename($_SERVER['PHP_SELF']);
switch($page)
{
  case "category.php":
  if(isset($_GET['cid']))
  {
   
    $sqli="SELECT * FROM category WHERE category_id ={$_GET['cid']}";
    $resl=mysqli_query($conn,$sqli) or die("query failed");
    $total_page=mysqli_fetch_assoc($resl);
    $name=$total_page['category_name'];
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
    
    <!-- Pre Header -->
    
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
    <!-- Items Starts Here -->
      <div class="featured-items">
      <div class="container">
       <div class="col-md-12">

          <?php 
            include "config.php";
          $cat_id=$_GET['cid'];
          $sql1= "SELECT * FROM category WHERE category_id={$cat_id}";
           $result1= mysqli_query($conn,$sql1) or die("query failed");
           $row1=mysqli_fetch_assoc($result1);
           ?>
            <div class="section-heading">
              <h1><?php echo $row1['category_name']?></h1>
            </div>
          </div>
           <div class="col-md-12 col-sm-19">
             <?php
                include "config.php";
                if(isset($_GET['cid']))
                {
                    $cat_id=$_GET['cid']; 
                }
                $sql="SELECT * FROM category WHERE post > 0";

                $result = mysqli_query($conn,$sql) or die ("Query unsuccessfully");
                 if(mysqli_num_rows($result)>0){
                    $active= '';
                ?>
            <div id="filters" class="button-group">
               <a href="products.php"><button class="btn btn-primary" data-filter="*">All Products</button></a>
               <?php 
                while($row = mysqli_fetch_assoc($result)){ 
                        if(isset($_GET['cid']))
                        {
                        if($row['category_id']==$cat_id)
                        {
                            $active='active';
                        }else{
                            $active= '';
                        }
                        }

                   echo "<a  href='category.php?cid={$row['category_id']}'><button class='btn btn-primary' data-filter='.new'>{$row['category_name']}</button></a>";

                     } ?> 
            </div>
            <?php } ?> 
          </div>
          </div>
          </div>
          
  
  <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
         


          <!-- slider -->
          
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
                    LIMIT {$offset},{$limit} ";
                    $result = mysqli_query($conn,$sql) or die ("Query unsuccessfully");
                    if(mysqli_num_rows($result)>0){
                           while($row = mysqli_fetch_assoc($result)){

           ?> 
          <div class="col-md-3">
              <a href="single-product.php?cid=<?php  echo $row ['category_id']; ?>&id=<?php echo $row ['post_id'];?>">
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
           }?>
          </div>
        </div>
      </div>
    

     <!-- PAGENATION -->
     <?php 
               
                  if(mysqli_num_rows($result1) > 0){

                   $total_records=$row1['post'];
                   $total_pages= ceil($total_records / $limit);

                   echo "<div class='page-navigation'>";
                    echo "<div class='container'>";
                      echo      "<div class='row'>";
                       echo "<div class='col-md-12'>";
                         echo "<ul>";


                  
                     for($i=1;$i <= $total_pages;$i++){
                     if($i==$page){
                       $active="current-page";
                     }else{
                       $active="";
                     }
                       
                       echo '<li class='.$active.'><a href="category.php?page='.$i.'">'.$i.'</a></li>';
                     }
                     if($total_pages > $page){
                      echo '<li><a href="category.php?page='.($page + 1).'"><i class="fa fa-angle-right"></i></a></li>';
                      }
                     
                            echo "</ul>";
                           echo "</div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";

                    }
                 ?>
    <!-- Featred Page Ends Here -->


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