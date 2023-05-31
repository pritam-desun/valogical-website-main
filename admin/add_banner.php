<?php include("include/master.php");

// trigger_error("Fatal error", E_USER_ERROR);
if (isset($_POST['submit'])) {

  $target_dir = "upload/";
  $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
  $image = $target_dir . basename($_FILES['image']['name']);
  $image_tep_name = $_FILES['image']['tmp_name'];
  $btn_1_text = isset($_POST["btn_1_text"]) ? trim($_POST["btn_1_text"]) : "";
  $btn_1_url = isset($_POST["btn_1_url"]) ? trim($_POST["btn_1_url"]) : "";
  $btn_2_text = isset($_POST["btn_2_text"]) ? trim($_POST["btn_2_text"]) : "";
  $btn_2_url = isset($_POST["btn_2_url"]) ? trim($_POST["btn_2_url"]) : "";

  //print_r($status);
  $err = [];
  if ($title == "") {
    $err["title"] = "Please enter title  ";
  }
  if (preg_match('/[^a-z_\-0-9]/i', $title)) {
    $err['title'] = "Only letters, numeric and white space allowed";
  }
  if ($image == "") {
    $err["image"] = "Please Enter Image  ";
  }
  if ($btn_1_text == "") {
    $err["btn_1_text"] = "Please Enter 1st Button Name  ";
  }
  if (preg_match('/[^a-z_\-0-9]/i', $btn_1_text)) {
    $err['btn_1_text'] = "Only letters, numeric and white space allowed";
  }
  if ($btn_1_url == "") {
    $err["btn_1_url"] = "Please Enter 1st Button URL ";
  }
  if (preg_match("/(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/", $btn_1_url)) {
    $err['btn_1_url'] = "Invalid URL format";
  }
  if ($btn_2_text == "") {
    $err["btn_2_text"] = "Please Enter 2nd Button Name  ";
  }
  if (preg_match('/[^a-z_\-0-9]/i', $btn_1_text)) {
    $err['btn_1_text'] = "Only letters, numeric and white space allowed";
  }
  if ($btn_2_url == "") {
    $err["btn_2_url"] = "Please Enter 1st Button URL ";
  }
  if (preg_match("/(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/", $btn_2_url)) {
    $err['btn_2_url'] = "Invalid URL format";
  }
  if (empty($err)) {
    $query = "INSERT INTO `banner`(`title`, `image`, `btn_1_text`,`btn_1_url`,`btn_2_text`,`btn_2_url`) VALUES ('" . $title . "','" . $image  . "','" . $btn_1_text  . "','" . $btn_1_url  . "','" . $btn_2_text  . "','" . $btn_2_url  . "')";
    $result = mysqli_query($conn, $query);

    // die;
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      $err['add'] = 'Form Submit Successfully';
      header("Refresh:view_banner.php?add=Form Submit Successfully");
    } else {
      $err['add'] = '!Oops Something Went Wrong. Please Try Again.';
    }
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 " style="margin-left:  1.25rem !important;">Banner Form</h1>
  <?php if (isset($err['add'])) { ?>
    <div class="alert alert-success"><?= $err['add']; ?></div>
  <?php } ?>
  <!-- DataTales Example -->
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 col-md-12 ">
            <div class="p-5">
              <div class="text-center">
              </div>
              <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Title:</label>
                  <input required type="text" class="form-control form-control-user" value="<?= isset($_POST['title']) ? $_POST['title'] : "" ?>" name="title" id="title" placeholder="">
                  <?php if (isset($err['title'])) { ?><div class="small alert-danger"><?= $err['title']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="formFileLg" class="form-label">Upload Image:</label>
                  <input required class="form-control form-control-lg" accept=".jpg,.png,.jpeg" value="<?= isset($_POST['image']) ? $_POST['image'] : "" ?>" id="formFileLg" type="file" name="image">
                </div>
                <?php if (isset($err['image'])) { ?><div class="small alert-danger"><?= $err['image']; ?></div> <?php } ?>

                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button 1 Text:</label>
                  <input required type="text" class="form-control form-control-user" value="<?= isset($_POST['btn_1_text']) ? $_POST['btn_1_text'] : "" ?>" id="btn_1_text " name="btn_1_text" placeholder=" ">
                  <?php if (isset($err['btn_1_text'])) { ?><div class="small alert-danger"><?= $err['btn_1_text']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button 1 Url:</label>
                  <input required type="text" class="form-control form-control-user" value="<?= isset($_POST['btn_1_url']) ? $_POST['btn_1_url'] : "" ?>" id="btn_1_url " name="btn_1_url" placeholder="  ">
                  <?php if (isset($err['btn_1_url'])) { ?><div class="small alert-danger"><?= $err['btn_1_url']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button 2 Text:</label>
                  <input required type="text" class="form-control form-control-user" value="<?= isset($_POST['btn_2_text']) ? $_POST['btn_2_text'] : "" ?>" id="btn_2_text  " name="btn_2_text" placeholder="  ">
                  <?php if (isset($err['btn_2_text'])) { ?><div class="small alert-danger"><?= $err['btn_2_text']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button 2 Url:</label>
                  <input required type="text" class="form-control form-control-user" value="<?= isset($_POST['btn_2_url']) ? $_POST['btn_2_url'] : "" ?>" id="btn_1_text " name="btn_2_url" placeholder="  ">
                  <?php if (isset($err['btn_2_url'])) { ?><div class="small alert-danger"><?= $err['btn_2_url']; ?></div> <?php } ?>
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


<?php
include("include/footer.php")
?>

<script>
  document.title = "Taskenhancer :: Add Banner";
</script>

<style>
  #formFileLg {
    padding-bottom: 32px;
  }
</style>