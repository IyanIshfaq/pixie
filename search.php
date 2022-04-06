<?php
 include "config.php";
$page=basename($_SERVER['PHP_SELF']);
switch($page)
{
  case "search.php":
  if(isset($_GET['search']))
  {
    $name=$_GET['search'];
  }else{
    $name="NO Reco..";
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
               <?php
                include "config.php";
                if(isset($_GET['search']))
                {
                   $sear_term=mysqli_real_escape_string($conn,$_GET['search']); 
                }
              
                ?>
          <div class="col-md-12">
            <div class="section-heading">
              <h1>Search : <?php echo $sear_term; ?></h1>
               </div>
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

                    include "config.php";
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
                    WHERE title LIKE  '%{$sear_term}%' OR description  LIKE  '%{$sear_term}%'
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    // echo $sql;
                    // die();
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
    </div>

     <!-- PAGENATION -->
     <?php 
                  $sql1= "SELECT * FROM post
                  WHERE title LIKE '%{$sear_term}%'";
                  $result1= mysqli_query($conn,$sql1) or die("query failed");
                  if(mysqli_num_rows($result1) > 0){

                   $total_records=mysqli_num_rows($result1);
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
                       
                       echo '<li class='.$active.'><a href="search.php?search='.$sear_term.'&page='.$i.'">'.$i.'</a></li>';
                     }
                     if($total_pages > $page){
                      echo '<li><a href="search.php?search='.$sear_term.'&page='.($page + 1).'"><i class="fa fa-angle-right"></i></a></li>';
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