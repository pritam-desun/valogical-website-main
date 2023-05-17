<?php include("include/master.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($id)) {
  $sql = "SELECT * FROM `contact` WHERE contact_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
  // print_r($_POST['update']);
  // print_r($_POST);
  // die();
  $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
  $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
  $subject = isset($_POST["subject"]) ? trim($_POST["subject"]) : "";
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
  $message = isset($_POST["message"]) ? trim($_POST["message"]) : "";
  //print_r($status);
  $err = [];
  if ($name == "") {
    $err["name"] = "Please enter people_name  ";
  }
  if ($email == "") {
    $err["email"] = "Please enter email  ";
  }
  if ($subject == "") {
    $err["subject"] = "Please enter subject  ";
  }
  if ($phone == "") {
    $err["phone"] = "Please enter phone  ";
  }
  if ($message == "") {
    $err["message"] = "Please enter messages  ";
  }
  if (empty($err)) {
    $query = "UPDATE  `contact` SET `name`='$name', `email`='$email', `subject`='$subject',`phone`='$phone',`message`='$message'  WHERE contact_id=$id";
    $result = mysqli_query($conn, $query);
    // Print_r($query);
    // die;
    if ($result) {
      header("location:view_contact.php?update=Form Update Successfully");
      //$err['add'] = 'Form Update Successfully';
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid ">

          <!-- Page Heading -->
          <h1 class="h3 mb-0 text-gray-800" style="margin-left:  1.25rem !important;">Contact Form Elements</h1>
          <?php if (isset($err['add'])) { ?>
            <div class=" alert alert-success"><?= $err['add']; ?>
            </div>
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
                      <form class="user" action="" method="post">
                        <div class="form-group ">
                          <input type="text" class="form-control form-control-user" name="name" value="<?= isset($row['name']) ? $row['name'] : ""; ?>" id="exampleFirstName" placeholder="name">
                          <?php if (isset($err['name'])) { ?><div class="small alert-danger"><?= $err['name']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="email" value="<?= isset($row['email']) ? $row['email'] : ""; ?>" id="exampleInputEmail" placeholder="email">
                          <?php if (isset($err['email'])) { ?><div class="small alert-danger"><?= $err['email']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="subject" value="<?= isset($row['subject']) ? $row['subject'] : ""; ?>" placeholder="subject">
                          <?php if (isset($err['subject'])) { ?><div class="small alert-danger"><?= $err['subject']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <input type="number" class="form-control form-control-user" id="exampleInputPassword" name="phone" value="<?= isset($row['phone']) ? $row['phone'] : ""; ?>" placeholder="phone number">
                          <?php if (isset($err['phone'])) { ?><div class="small alert-danger"><?= $err['phone']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <textarea type="text" class="form-control form-control-user" id="message" name="message" value="" placeholder="Enter the message..."><?= isset($row['message']) ? $row['message'] : ""; ?></textarea>
                          <?php if (isset($err['message'])) { ?><div class="small alert-danger"><?= $err['message']; ?></div> <?php } ?>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
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