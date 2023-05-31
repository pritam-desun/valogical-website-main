<?php include("include/master.php");
// print_r($_SESSION['id']);
$id = isset($_GET['id']) ? $_GET['id'] : "";
if ($id) {
  $sql = "SELECT * FROM `master` WHERE master_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {

  $country = isset($_POST["country"]) ? trim($_POST["country"]) : "";
  $currency_code = isset($_POST["currency_code"]) ? trim($_POST["currency_code"]) : "";
  $currency_symbol = isset($_POST["currency_symbol"]) ? trim($_POST["currency_symbol"]) : "";
  $create_on = date("Y/m/d H:i:s");

  //print_r($image);
  $err = [];
  if ($country == "") {
    $err["country"] = "Please Enter Title  ";
  }
  if ($currency_code == "") {
    $err["currency_code"] = "Please Enter Currency Code";
  }
  if ($currency_symbol == "") {
    $err["currency_symbol"] = "Please Enter the Currency Symbol  ";
  }

  if (empty($err)) {
    $query = "UPDATE `master`  SET `country`='$country', `currency_code`='$currency_code',`currency_symbol`='$currency_symbol' WHERE master_id = $id";
    $result = mysqli_query($conn, $query);

    // die;
    if ($result) {
      // $err['add'] = 'Form Submit Successfully';
      // header("location:view_master.php?add=Form Submit Successfully");
      link_redirct("view_master", "Record Update Successfully");
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h2 mb-1 text-gray-800" style="margin-left:  1.25rem !important;">Master Elements</h1>
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
              <form class="user" action="" method="post">

                <div class="form-group ">
                  <label for="formFileLg" class="form-label">Country:</label>
                  <input type="text" class="form-control" value="<?= isset($row['country']) ? $row['country'] : ""; ?>" name="country" placeholder="Enter the Country Name">
                </div>
                <div class="form-group ">
                  <label for="formFileLg" class="form-label">Currency Code:</label>
                  <input type="text" class="form-control" value="<?= isset($row['currency_code']) ? $row['currency_code'] : ""; ?>" name="currency_code" placeholder="Enter the Country Name">
                </div>
                <div class="form-group ">
                  <label for="formFileLg" class="form-label">Currency Symbol:</label>
                  <input type="text" class="form-control" value="<?= isset($row['currency_symbol']) ? $row['currency_symbol'] : ""; ?>" name="currency_symbol" placeholder="Enter the Country Name">
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
  document.title = "Taskenhancer :: Edit Master";
</script>