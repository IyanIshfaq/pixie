<?php
include "config.php";

$post_id=$_GET['id'];

$sql1  = "SELECT * FROM about WHERE aid = {$post_id};";
$result1=mysqli_query($conn,$sql1)or die('Query failed : Selection');
$row=mysqli_fetch_assoc($result1);

unlink('upload/'.$row['aboutimg']);

$sql  = "DELETE FROM about WHERE aid = {$post_id}";
if(mysqli_query($conn,$sql))
{
      header("Location: {$hostname}/admin/about.php");
}else{
	echo "querry failed";
}

?>
