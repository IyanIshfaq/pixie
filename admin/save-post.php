<?php

include "config.php";
if(isset($_FILES['fileToUpload']))
{ 
  $errors = array();

  $file_name=$_FILES['fileToUpload']['name'];
  $file_size=$_FILES['fileToUpload']['size'];
  $file_tmp=$_FILES['fileToUpload']['tmp_name'];
  $file_type=$_FILES['fileToUpload']['type'];
  $file_ext=end(explode(".", $file_name));
  $extension=array("jpeg","jpg","png");

  if(in_array($file_ext,$extension) === false)
  {
     $errors[]="This extsion File is not allowed,Please choose a jpg,png file";
  }
  if($file_size > 2097152)
  {
  	$errors[]="File size must bee required 2mb or its lower";
  }
  if(empty($errors) == true)
  {
    move_uploaded_file($file_tmp,"upload/".$file_name);
  }else{
  	print_r($errors);
  	die();
  }
}


session_start();
$title=mysqli_real_escape_string($conn,$_POST['post_title']);
$desp=mysqli_real_escape_string($conn,$_POST['postdesc']);
$prize=mysqli_real_escape_string($conn,$_POST['post_prize']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$date=date("d M, Y");
$author=$_SESSION['user_id'];

$sql="INSERT INTO post(title,description,category,post_date,author,post_img,Prize)
      VALUES('{$title}','{$desp}',{$category},'{$date}',{$author},'{$file_name}','{$prize}');";
$sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category} ";
if(mysqli_multi_query($conn,$sql))
{
 header("Location: {$hostname}/admin/post.php");
}else{
	echo "<div class='alert alert-danger'>Querry Failed</div>";
}
?>