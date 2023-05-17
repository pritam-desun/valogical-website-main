<?php include("include/master.php");
// print_r($_POST)
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
  $sql = "SELECT * FROM `services` WHERE service_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
  //die("");
  $target_dir = "upload/";
  $s_desp = isset($_POST["short_desp"]) ? trim($_POST["short_desp"]) : "";
  $l_desp = isset($_POST["long_desp"]) ? trim($_POST["long_desp"]) : "";
  $status = isset($_POST["status"]) ? $_POST["status"] : "";
  $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
  $image_tep_name = $_FILES['image']['tmp_name'];

  $err = [];

  if (file_exists($row['icon'])) {
    $image = $row['icon'];
    $image_tep_name = $_FILES['image']['tmp_name'];
    if (!empty($_FILES['image']['name'])) {
      $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
      $image_tep_name = $_FILES['image']['tmp_name'];
    }
  }
  // else {
  //   $err['image'] = "Image Not Found ! First You Need To Upload Image ";
  // }

  if ($s_desp == "") {
    $err['short_desp'] = "Short description field is Required";
  }
  if ($l_desp == "") {
    $err['long_desp'] = "long description field is Required";
  }

  if (empty($err)) {
    //print_r($image);
    //print_r($row['icon']);

    $query = "UPDATE `services` SET
  `short_desp`='$s_desp',
  `long_desp`='$l_desp',
  `icon`='$image',
  `status`='$status'
  WHERE service_id = $id";
    $result = mysqli_query($conn, $query);
    // $rows = mysqli_num_rows($result);
    // print_r($rows);
    // die();
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      header("Location: view_service.php?update=Data Update successfully.");
    } else {
      $err['register'] = 'Edit Not Worked please check Your code ';
    }
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid mb-0 ">
          <!-- Page Heading -->
          <h1 class="h3 mb-0 text-gray-800 " style="margin-left:  1.25rem !important;">Edit Services</h1>
          <?php if (isset($err['message'])) { ?>
            <div class=" alert alert-success"><?= $err['message']; ?>
            </div>
          <?php } ?>
          <!-- DataTales Example -->
          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12 col-md-7">
                    <div class="p-5">
                      <div class="text-center">
                      </div>
                      <form class="user" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis ">Short Description:</label>
                          <textarea type="text" name="short_desp" value="" class="form-control ckeditor" id="short_desp" rows="3"><?php echo isset($row['short_desp']) ? $row['short_desp'] : ""; ?></textarea>
                          <?php if (isset($err['short_desp'])) { ?><div class="small alert-danger"><?= $err['short_desp']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label">Long Description:</label>
                          <textarea type="text" name="long_desp" value="" class="form-control ckeditor" id="long_desp" rows="3"><?php echo isset($row['long_desp']) ? $row['long_desp'] : ""; ?></textarea>
                          <?php if (isset($err['long_desp'])) { ?><div class="small alert-danger"><?= $err['long_desp']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="formFileLg" class="form-label">Upload Icon:</label>
                          <input type="file" class="form-control form-control-lg" value="<?= isset($row['icon']) ? $row['icon'] : ""; ?>" id="formFileLg" name="image">
                          <?php if (isset($err1['image'])) { ?><div class="small alert-danger"><?= $err1['image']; ?></div> <?php } ?>
                          <?php if (isset($row['icon'])) { ?>
                            <?php print_r($row['icon']); ?>
                          <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="formFileLg" class="formform-label">Status:</label>
                          <select type="status" name="status" class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="<?= isset($row['status']) ? $row['status'] : ""; ?> " selected><?= isset($row['status']) ? $row['status'] : ""; ?></option>
                            <?php
                            if ($row['status'] == 'active' && $row['status'] != 'inactive') { ?>
                              <option value="inactive">inactive</option>
                            <?php } else { ?>
                              <option value="active">active</option>
                            <?php } ?>
                          </select>

                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="update" value="Submit ">
                      </form>
                      <hr>
                    </div>
                  </div>
                </div>
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

 
  <script>
    ClassicEditor
      .create(document.querySelector('#short_desp'))
      .then(short_desp => {
        console.log(short_desp);
        short_desp.editing.view.change((writer) => {
            writer.setStyle(
              "height",
              "200px",
              short_desp.editing.view.document.getRoot()
            );
          })
          .catch(error => {
            console.error(error);
          });
      });
  </script>
  <script>
    ClassicEditor
      .create(document.querySelector('#long_desp'))
      .then(long_desp => {
        console.log(long_desp);
        long_desp.editing.view.change((writer) => {
            writer.setStyle(
              "height",
              "200px",
              long_desp.editing.view.document.getRoot()
            );
          })
          .catch(error => {
            console.error(error);
          });
      });
  </script>
<?php
include("include/footer.php") 
?>