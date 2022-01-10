<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">About US</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="adout-post.php">add about us</a>
              </div>
              <div class="col-md-12">
                 <?php
                    include "config.php";
                    
                    $sql="SELECT * FROM about";
                    $result = mysqli_query($conn,$sql) or die ("Query unsuccessfully");
                    if(mysqli_num_rows($result)>0){
                  ?>
                   <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>description</th>
                          <th>Date</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                       <?php
                           while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                              
                              <td><?php echo $row['aid']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['aboutdate']; ?></td>
                              <td class='edit'><a href='update-about.php?id=<?php echo $row['aid']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-about.php?id=<?php echo $row['aid']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                            <?php } ?>
                      </tbody>
                  </table>
                    <?php } ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
