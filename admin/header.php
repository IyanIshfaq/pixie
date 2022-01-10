<?php
include"config.php";
 session_start();
if(!isset( $_SESSION['username']))
{
    header("Location: {$hostname}/admin/");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../assets/css1/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
         <script src="https://kit.fontawesome.com/157630243c.js" crossorigin="anonymous"></script>

        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../assets/css1/style.css">
       
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="../assets/images/header-logo.png"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1">
                        
                        <a href="users.php"><i class=" fa fa-users" ><?php echo $_SESSION['username']; ?></i></a>

                        <a href="logout.php" ><i class="fas fa-sign-out-alt"></i> logout</a>

                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Products</a>
                            </li>
                            <?php
                            if( $_SESSION['user_role'] == '1'){

                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                             <li>
                                <a href="about.php">About Us</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                             <?php
                              }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
