<?php include("include/master.php");
if (@$_GET['type'] == 'delete') {
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $err = [];
  $result1 = mysqli_query($conn, "DELETE FROM `banner` WHERE `banner_id` = $id");
  $row = mysqli_affected_rows($conn);
  //print_r($row);
  if ($row > 0) {
    $err['message'] = "Record Deleted Successfully";
    //header('Location:view_contact.php?type=true');
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php if (isset($err['message'])) { ?>
            <div class="alert alert-success"><?= $err['message']; ?></div>
          <?php } ?>
          <?php if (isset($_GET['add'])) { ?>
            <div class="alert alert-success"><?php echo $_GET['add']; ?></div>
          <?php }  ?>
          <?php if (isset($_GET['update'])) { ?>
            <div class="alert alert-success"><?= $_GET['update']; ?></div>
          <?php }  ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Banner </h1>
          <p class=" mb-4 "><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="add_banner.php">Add Data</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <?php $id = 0;
                $sql = "SELECT * FROM `banner`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                // print_r($row);
                ?>
                <?php if ($row == 0) : ?>
                  <h2>Data Not Found</h2>
                <?php else : ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>title</th>
                        <th>image</th>
                        <th>btn 1 text</th>
                        <th>btn 1 url</th>
                        <th>btn 2 text</th>
                        <th>btn 2 url</th>
                        <th colspan="2" class="ac-btn">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $id = 0;
                      $sql = "SELECT * FROM `banner`";
                      $result = mysqli_query($conn, $sql);
                      ?>
                      <?php while ($rows = mysqli_fetch_assoc($result)) {
                        $id = $id + 1;
                      ?>
                        <tr>
                          <td><?php echo $rows['banner_id'] ?></td>
                          <td><?php echo $rows['title'] ?></td>
                          <td><img src="<?php echo $rows['image'] ?>" height="50px"></td>
                          <td><?php echo $rows['btn_1_text'] ?></td>
                          <td><?php echo $rows['btn_1_url'] ?></td>
                          <td><?php echo $rows['btn_2_text'] ?></td>
                          <td><?php echo $rows['btn_2_url'] ?></td>
                          <td><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="edit_banner.php?id=<?php echo $rows['banner_id'] ?>">Edit </a> </td>
                          <td><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="return confirm('Are you sure ?')" href=" view_banner.php?id=<?php echo $rows['banner_id'] ?>&type=delete">Delete</a> </td>
                          </td>
                        <?php } ?>
                        </tr>
                    </tbody>
                  </table>
                <?php endif ?>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script language="JavaScript" type="text/javascript">
    function checkDelete() {
      return confirm('Are you sure?');
    }
  </script>

<?php
include("include/footer.php") 
?>

<script>
    document.title= "Taskenhancer :: View Banner";
</script>

<style>
  .ac-btn{
    width: 155px;
  }
</style>