<?php include("include/master.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';


if ($id) {
  $sql = "SELECT * FROM `portfolio` WHERE portfolio_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  //print_r($row['image']);
}
//reset($row);
if (isset($_POST['update'])) {

  $target_dir = "upload/";
  $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
  $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
  $image_tep_name = $_FILES['image']['tmp_name'];
  $url_text  = isset($_POST["url_text"]) ? trim($_POST["url_text"]) : "";

  $err = [];

  if (file_exists($row['image'])) {
    $image = $row['image'];
    $image_tep_name = $_FILES['image']['tmp_name'];
    if (!empty($_FILES['image']['name'])) {
      $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
      $image_tep_name = $_FILES['image']['tmp_name'];
    }
  }

  if ($url_text == "") {
    $err["url_text"] = "Please Enter Url Text  ";
  }
  if ($name == "") {
    $err["name"] = "Please Enter Name  ";
  }

  // if ($date == "") {
  //   $err["date"] = "Please Set the Today date  ";
  // }

  if (empty($err)) {
    $query = "UPDATE `portfolio` SET
    `image`='$image',
    `url_text`='$url_text',
    `name`='$name'   
    WHERE portfolio_id = $id";
    //print_r($query);
    $result = mysqli_query($conn, $query);
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      // $err['add'] = 'Form Update Successfully';
      // header("location:view_portfolio.php?update=Form Update Successfully");
      link_redirct("view_portfolio", "Record Update Successfully");
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800" style="margin-left:  1.25rem !important;">Portfolio Elements</h1>
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
                  <label for="exampleFormControlTitle" class="form-label">Url text :</label>
                  <input type="name" class="form-control form-control-user" id="name" name="name" value="<?= isset($row['name']) ? $row['name'] : ""; ?> " placeholder="name  ">
                  <?php if (isset($err['name'])) { ?><div class="small alert-danger"><?= $err['name']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Portfolio Name:</label>
                  <input type="text" class="form-control form-control-user" id="url_text" value="<?= isset($row['url_text']) ? $row['url_text'] : ""; ?> " name="url_text" placeholder="url text  ">
                  <?php if (isset($err['url_text'])) { ?><div class="small alert-danger"><?= $err['url_text']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="formFileLg" class="form-label">Upload Image:</label>
                  <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                  <?php if (isset($row['image'])) { ?>
                    <?php print_r($row['image']); ?>
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
  document.title = "Taskenhancer :: Edit Portfolio";
</script>