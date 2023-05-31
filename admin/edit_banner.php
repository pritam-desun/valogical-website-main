<?php include("include/master.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id) {
  $sql = "SELECT * FROM `banner` WHERE banner_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  // die();
}
if (isset($_POST['update'])) {
  $target_dir = "upload/";
  $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
  $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
  $image_tep_name = $_FILES['image']['tmp_name'];
  $btn_1_text = isset($_POST["btn_1_text"]) ? trim($_POST["btn_1_text"]) : "";
  $btn_1_url = isset($_POST["btn_1_url"]) ? trim($_POST["btn_1_url"]) : "";
  $btn_2_text = isset($_POST["btn_2_text"]) ? trim($_POST["btn_2_text"]) : "";
  $btn_2_url = isset($_POST["btn_2_url"]) ? trim($_POST["btn_2_url"]) : "";
  $date = isset($_POST["date"]) ? $_POST["date"] : "";
  // $datetime = date("$date", " H:i:s");



  //print_r($status);
  $err = [];
  if (file_exists($row['image'])) {
    $image = $row['image'];
    $image_tep_name = $_FILES['image']['tmp_name'];
    if (!empty($_FILES['image']['name'])) {
      $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
      $image_tep_name = $_FILES['image']['tmp_name'];
    }
  }
  if ($title == "") {
    $err["title"] = "Please Enter title  ";
  }
  if ($image == "") {
    $err["image"] = "Please upload image  ";
  }
  if ($btn_1_text == "") {
    $err["btn_1_text"] = "Please Enter Button 1 Url  ";
  }
  if ($btn_1_url == "") {
    $err["btn_1_url"] = "Please Enter Button  1 Url ";
  }
  if ($btn_2_text == "") {
    $err["btn_2_text"] = "Please Enter Button  2 Text ";
  }
  if ($btn_2_text == "") {
    $err["btn_2_url"] = "Please Enter Button  2 Url ";
  }

  if (empty($err)) {

    $query = "UPDATE `banner` SET
    `title`='$title',
    `image`='$image',
    `btn_1_url`='$btn_1_text',
    `btn_2_url`='$btn_1_url',
    `btn_2_text`='$btn_2_text',
    `btn_2_url`='$btn_2_url'
    WHERE banner_id = $id";
    $result = mysqli_query($conn, $query);

    // die;
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      // $err['add'] = 'Form Update Successfully';
      // header("location:view_banner.php?update=Record Update successfully");
      echo "<script>
      location.replace('view_banner.php?update=Record Update successfully');
    </script>";
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800" style="margin-left:  1.25rem !important;"> Form Elements</h1>
  <?php if (isset($err['add'])) { ?>
    <div class="alert alert-success"><?= $err['add']; ?></div>
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
                  <label for="exampleFormControlTitle" class="form-label">Title:</label>
                  <input type="text" class="form-control form-control-user" value="<?= isset($row['title']) ? $row['title'] : ""; ?> " name="title" id="title" placeholder="title">
                  <?php if (isset($err['title'])) { ?><div class="small alert-danger"><?= $err['title']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="formFileLg" class="form-label">Upload Image:</label>
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                  <?php if (isset($row['image'])) { ?>
                    <?php print_r($row['image']); ?>
                  <?php } ?>
                </div>
                <?php if (isset($err['image'])) { ?><div class="small alert-danger"><?= $err['image']; ?></div> <?php } ?>

                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button_1_Text:</label>
                  <input type="text" class="form-control form-control-user" value="<?= isset($row['btn_1_text']) ? $row['btn_1_text'] : ""; ?> " id="btn_1_text " name="btn_1_text" placeholder="btn_1_text ">
                  <?php if (isset($err['btn_1_text'])) { ?><div class="small alert-danger"><?= $err['btn_1_text']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button_1_Url:</label>
                  <input type="text" class="form-control form-control-user" value="<?= isset($row['btn_1_url']) ? $row['btn_1_url'] : ""; ?> " id="btn_1_url " name="btn_1_url" placeholder="btn_1_url  ">
                  <?php if (isset($err['btn_1_url'])) { ?><div class="small alert-danger"><?= $err['btn_1_url']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button_1_Text:</label>
                  <input type="text" class="form-control form-control-user" value="<?= isset($row['btn_2_text']) ? $row['btn_2_text'] : ""; ?> " id="btn_2_text  " name="btn_2_text" placeholder="btn_2_text  ">
                  <?php if (isset($err['btn_2_text'])) { ?><div class="small alert-danger"><?= $err['btn_2_text']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Button_1_Url Url:</label>
                  <input type="text" class="form-control form-control-user" value="<?= isset($row['btn_2_url']) ? $row['btn_2_url'] : ""; ?> " id="btn_1_text " name="btn_2_url" placeholder="btn_1_url  ">
                  <?php if (isset($err['btn_2_url'])) { ?><div class="small alert-danger"><?= $err['btn_2_url']; ?></div> <?php } ?>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" name="update" value="Submit ">
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

<?php
include("include/footer.php")
?>

<script>
  document.title = "Taskenhancer :: Edit Banner";
</script>