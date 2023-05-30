<?php
include("include/master.php");

if (isset($_POST['update'])) {
  $target_dir = "upload/";
  $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
  $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
  $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
  $image_tep_name = $_FILES['image']['tmp_name'];
  $password = isset($_POST["password"]) ? $_POST["password"] : "";
  $err = [];
  if (file_exists($_SESSION['user_image'])) {
    $image = $_SESSION['user_image'];
    $image_tep_name = $_FILES['image']['tmp_name'];
    if (!empty($_FILES['image']['name'])) {
      $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
      $image_tep_name = $_FILES['image']['tmp_name'];
    }
  }
  if ($name == "") {
    $err["name"] = "Please enter name  ";
  }
  if ($email == "") {
    $err['email'] = "Email is Required";
  }
  // print_r($image);
  // die();
  $id = isset($_SESSION['id']) ? $_SESSION['id'] : "";
  if (empty($err)) {
    //Print_r($query);
    $sql = "UPDATE users SET
   `name`='$name',
    email='$email',
    image='$image'  
    WHERE user_id = $id";
    /* echo $sql;
    die; */
    $result = mysqli_query($conn, $sql);
    // $row =  $conn->affected_rows;
    // print_r($row);
    // die();
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      header("location:profile.php?update=Profile Update successfully");
    } else {
      $err['messsage'] = 'Registration Not Worked please check Your code ';
    }
  }
} ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800" style="margin-left:  1.25rem !important;">Upadte Profile </h1>
          <?php if (isset($err['message'])) { ?>
            <div class="alert alert-success"><?= $err['message']; ?></div>
          <?php } ?>
          <!-- DataTales Example -->
          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="p-5">
                      <div class="text-center">
                      </div>
                      <form class="user" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Name:</label>
                          <input type="name" name="name" value="<?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ""; ?>" class="form-control" id="exampleFormControlTextarea1" rows="3">
                          <?php if (isset($err['name'])) { ?><div class="small alert-danger"><?= $err['name']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label">Email:</label>
                          <input type="email" name="email" value="<?= isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ""; ?>" class="form-control" id="exampleFormControlTextarea1" rows="3">
                          <?php if (isset($err['email'])) { ?><div class="small alert-danger"><?= $err['email']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label">Profile Image Upload:</label>
                          <input type="file" name="image" value="" class="form-control" id="exampleFormControlTextarea1" rows="3">
                          <?php if (isset($_SESSION['user_image'])) { ?>
                            <?php print_r($_SESSION['user_image']); ?>
                          <?php } ?>
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

  <?php
include("include/footer.php") 
?>

<script>
    document.title= "Taskenhancer :: Edit Profile";
</script>