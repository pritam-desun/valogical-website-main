<?php include("include/master.php");
if (isset($_POST['submit'])) {

  // print_r($_POST);
  $target_dir = "upload/";

  $s_desp = isset($_POST["short_desp"]) ? trim($_POST["short_desp"]) : "";
  $l_desp = isset($_POST["long_desp"]) ? trim($_POST["long_desp"]) : "";
  $status = isset($_POST["status"]) ? $_POST["status"] : "";
  $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
  $image_tep_name = $_FILES['image']['tmp_name'];
  //$image_folder = 'upload/'.$image;
  //print_r($people_designation);
  //print_r($s_desp);
  $err = [];
  if ($s_desp == "") {
    $err["short_desp"] = "Please enter short Description  ";
  }
  if ($l_desp == "") {
    $err["long_desp"] = "Please enter long Description  ";
  }
  if ($status == "") {
    $err["status"] = "Please Maitain the Status   ";
  }
  if ($image == "") {
    $err["image"] = "image is required   ";
  }
  if (empty($err)) {
    //die("here");
    $query = "INSERT INTO `services`(`short_desp`, `long_desp`, `icon`,`status`) VALUES ('" . $s_desp . "','" . $l_desp . "','" . $image . "','" . $status . "')";
    $result = mysqli_query($conn, $query);
    //Print_r($query);
    // die;
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      $err['message'] = 'New Record Addded successfully';
      //$msg = $err['message'];
      header("location:view_service.php?add=New Record Added successfully");
    } else {
      $err['message'] = ' Not Worked please check Your code ';
    }
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid ">

          <!-- Page Heading -->
          <h1 class="h3 mb-3   text-gray-800" style="margin-left:  1.25rem !important;">Add Services</h1>
          <?php if (isset($err['message'])) { ?>
            <div class="alert alert-success"><?= $err['message']; ?></div>
          <?php } ?>
          <!-- DataTales Example -->
          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-50">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="p-5">
                      <div class="text-center">
                      </div>
                      <form class="user" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group  ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis w-100">Short Description:</label>
                          <textarea type="name" name="short_desp" rows="8" class="form-control form-control-sm" id="short_desp" rows="3" placeholder="Short Description........"></textarea>
                          <?php if (isset($err['short_desp'])) { ?><div class="small alert-danger"><?= $err['short_desp']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label">Long Description:</label>
                          <textarea type="name" name="long_desp" class="form-control form-control-sm" id="long_desp" rows="3" placeholder="Long Description........"></textarea>
                          <?php if (isset($err['long_desp'])) { ?><div class="small alert-danger"><?= $err['long_desp']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="formFileLg" class="form-label">Upload Icon:</label>
                          <input class="form-control form-control-sm" id="formFileLg" type="file" name="image">
                          <?php if (isset($err['image'])) { ?><div class="small alert-danger"><?= $err['images']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="formFileLg" class="form-label">Status:</label>
                          <select type="status" name="status" class="form-control form-control-sm form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="1" selected>Active</option>
                            <option value="2">Inactive</option>
                          </select>
                          <?php if (isset($err['status'])) { ?><div class="small alert-danger"><?= $err['status']; ?></div> <?php } ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit ">
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

<script>
    document.title= "Taskenhancer :: Add Services";
</script>