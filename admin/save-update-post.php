<?php
include "config.php";
if(empty($_FILES['new-image']['name']))
{
   $file_name=$_POST['old_image'];
}else{
   $errors=array();

   $file_name=$_FILES['new-image']['name'];
   $file_size=$_FILES['new-image']['size'];
   $file_type=$_FILES['new-image']['type'];
   $file_tmp=$_FILES['new-image']['tmp_name'];
   $file_ext=end(explode(".",$file_name));
   $extension=array("jpg","png","jpeg");
   if(in_array($file_ext,$extension) === false)
   {
     $errors[]="File extension does not match.please choose jpg,png";
   }
   if($file_size > 2097152)
   {
     $errors[]="File size must be 2md or less";
   }
   if(empty($errors) == true)
   {
   	move_uploaded_file($file_tmp,"upload/".$file_name);
   }
   else{
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
  
      $sql="UPDATE post SET title='{$title}',description ='{$desp}',category={$category},post_img='{$file_name}',Prize='{$prize}'
      WHERE post_id={$_POST['post_id']};";
      if($_POST['old_cat'] != $_POST['category']){
      $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$_POST['category']} ;";
      $sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$_POST['old_cat']} ;";

      }
      

      if(mysqli_multi_query($conn,$sql))
      {
        header("Location: {$hostname}/admin/post.php");
      }else{
      	echo "querry failed";
      }
?>