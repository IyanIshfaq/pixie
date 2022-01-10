 <?php
include "config.php";

$catid = $_GET['id'];

 $sql= "DELETE FROM category WHERE category_id='{$catid}'";

$result=mysqli_query($conn,$sql) or die("Querry unsuccessfully");

    header ("Location: {$hostname}/admin/category.php");

  mysqli_close($conn);
?>