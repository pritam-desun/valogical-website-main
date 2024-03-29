<?php include("include/master.php");
if (isset($_POST["submit"])) {
  $email = $_SESSION['user_email'];
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  if ($current_password == "") {
    $err=["current_password" => "Please Enter your Current Password!"];
  }
  if ($current_password != "") {
        $sql = "SELECT * FROM `users` WHERE password = '".md5($current_password)."' && user_id = '".$_SESSION['id']."'";
        $res = mysqli_query($conn, $sql);
        if (!mysqli_num_rows($res) > 0) {
            $err['current_password'] = "Please Enter Right Current Password!!";
        }
    }
  if ($new_password == "") {
    $err["new_password"] = "Please Enter New Password!";
  }
  if ($confirm_password == "") {
    $err["confirm_password"] = "Please Confirm your New Password!";
  }
  if ($new_password != $confirm_password) {
    $err["confirm_password"] = "New Password and Confirm Password does not match!";
  }
  if ($new_password == $current_password) {
    $err["new_password"] = "New and Current Password is same!";
  }
  $current_password = md5($_POST['current_password']);
  $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$current_password'";
  $result = mysqli_query($conn, $sql);
  $rowCount = mysqli_num_rows($result);
  //print_r($rowCount);
  if ($rowCount > 0) {
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    $sql = "UPDATE `users` set password = '$new_password' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_affected_rows($conn);
    print_r($rowCount);
    if ($rowCount > 0) {
      header("Location:profile.php?message=Password change successfully!");
    }
  }else{
    //$message = "Please Enter the bellow fields..!";
  }
}

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800" style="margin-left:  1.25rem !important;">Change Password</h1>
          <?php if (isset($message)) { ?>
            <div class=" alert alert-danger"><?= $message; ?>
            </div>
          <?php } ?>
          <!-- DataTales Example -->
          <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-4">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"></h1>
                      </div>
                      <form class="user" action="" method="post">
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Current Password:</label>
                          <input type="text" class="form-control form-control-user" name="current_password" id="current_password" placeholder="Enter a Current Password">
                          <?php if (isset($err['current_password'])) { ?><div class="small alert-danger"><?= $err['current_password']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">New Password:</label>
                          <input type="text" class="form-control form-control-user" name="new_password" id="new_password" placeholder="Enter a New Password">
                          <?php if (isset($err['new_password'])) { ?><div class="small alert-danger"><?= $err['new_password']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Confirm Password:</label>
                          <input type="text" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Enter a Confirm Password">
                          <?php if (isset($err['confirm_password'])) { ?><div class="small alert-danger"><?= $err['confirm_password']; ?></div> <?php } ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit ">
                      </form>

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
      .create(document.querySelector('#message'))
      .then(message => {
        console.log(message);
        message.editing.view.change((writer) => {
            writer.setStyle(
              "height",
              "200px",
              message.editing.view.document.getRoot()
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