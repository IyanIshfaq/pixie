<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <?php 
         include "config.php";
         $aid=$_GET['id'];
         $sql="SELECT * FROM about
         WHERE aid = {$aid}";
         $result=mysqli_query($conn,$sql)or die ("querry failed");
         if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <form action="save-update-about.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            
            <div class="form-group">
                <input type="hidden" name="aid"  class="form-control" value="<?php echo $row['aid'];?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                   <?php echo $row['description'];?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['aboutimg'];?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['aboutimg'];?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <?php 
          } 
        }else{
            echo "result not found";
        } 

        ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
