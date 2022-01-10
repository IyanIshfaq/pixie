<?php
include "config.php";

if(isset($_FILES['fileToUpload']))
{ 
  $errors = array();

  $file_name=$_FILES['fileToUpload']['name'];
  $file_size=$_FILES['fileToUpload']['size'];
  $file_tmp=$_FILES['fileToUpload']['tmp_name'];
  $file_type=$_FILES['fileToUpload']['type'];
  $file=explode(".", $file_name);
   $file_ext=end($file);
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

$desp=mysqli_real_escape_string($conn,$_POST['postdesc']);
$date=date("d M, Y");

$sqli="INSERT INTO  about(description,aboutdate,aboutimg)
      VALUES('{$desp}','{$date}','{$file_name}')";

 $result = mysqli_query($conn,$sqli) or die ("Query unsuccessfully");
header("Location: {$hostname}/admin/about.php");


?>