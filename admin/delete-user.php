 <?php
include "config.php";

$userid = $_GET['id'];

 $sql= "DELETE FROM user WHERE user_id='{$userid}'";

$result=mysqli_query($conn,$sql) or die("Querry unsuccessfully");

 header("Location: {$hostname}/admin/users.php");

  mysqli_close($conn);
?>