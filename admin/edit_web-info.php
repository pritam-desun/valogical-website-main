<?php include("include/master.php");
include "../framework/main.php";
// print_r($_SESSION['id']);
$sql = "SELECT * FROM `site_info`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

  $country = isset($_POST["email"]) ? trim($_POST["email"]) : "";
  $currency_code = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
  $currency_symbol = isset($_POST["skype"]) ? trim($_POST["skype"]) : "";
  $currency_symbol = isset($_POST["whatsapp"]) ? trim($_POST["whatsapp"]) : "";
  $currency_symbol = isset($_POST["youtube_link"]) ? trim($_POST["youtube_link"]) : "";
  $currency_symbol = isset($_POST["twitter_link"]) ? trim($_POST["twitter_link"]) : "";
  $currency_symbol = isset($_POST["instagram_link"]) ? trim($_POST["instagram_link"]) : "";
  $currency_symbol = isset($_POST["facebook_link"]) ? trim($_POST["facebook_link"]) : "";

  if (empty($err)) {
     $query = "UPDATE `master`  SET `country`='$country', `currency_code`='$currency_code',`currency_symbol`='$currency_symbol' WHERE master_id = $id";
    $result = mysqli_query($conn, $query);

    // die;
    // if ($result) {
    //   // $err['add'] = 'Form Submit Successfully';
    //   // header("location:view_master.php?add=");
    //   redirect('amdin/view_master.php');
    //   $_GET['add']="Form Submit Successfully";
    // } else {
    //   $err['add'] = ' Not Worked please check Your code ';
    // }
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


        <form class="user" action="" method="post">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group ">
                <label for="formFileLg" class="form-label">email:</label>
                <input type="text" class="form-control form-control-sm" value="<?= isset($row['email']) ? $row['email'] : ""; ?>" name="email" placeholder="Enter the email ID">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">

            <div class="form-group ">
              <label for="formFileLg" class="form-label">phone:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['phone']) ? $row['phone'] : ""; ?>" name="phone" placeholder="Enter the phone Number">
            </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">skype:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['skype']) ? $row['skype'] : ""; ?>" name="skype" placeholder="Enter the skype Name">
            </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">whatsapp:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['whatsapp']) ? $row['whatsapp'] : ""; ?>" name="whatsapp" placeholder="Enter the whatsapp Number">
            </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Youtube Link:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['youtube_link']) ? $row['youtube_link'] : ""; ?>" name="youtube_link" placeholder="Enter the Youtube Link">
            </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Twitter Link:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['twitter_link']) ? $row['twitter_link'] : ""; ?>" name="twitter_link" placeholder="Enter the Twitter Link">
            </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">instagram Link:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['instagram_link']) ? $row['instagram_link'] : ""; ?>" name="instagram_link" placeholder="Enter the Instagram Link">
            </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">facebook Link:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['facebook_link']) ? $row['facebook_link'] : ""; ?>" name="facebook_link" placeholder="Enter the Facebook Link">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Number of Happy Customer:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['number_of_happy_customer']) ? $row['number_of_happy_customer'] : ""; ?>" name="number_of_happy_customer" placeholder="Enter the Number of Happy Customer">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Number of Client:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['number_of_client']) ? $row['number_of_client'] : ""; ?>" name="number_of_client" placeholder="Enter the Number of Client">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Number of Jobs:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['number_of_jobs']) ? $row['number_of_jobs'] : ""; ?>" name="number_of_jobs" placeholder="Enter the Number of Jobs">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Number of Workers:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['number_of_workers']) ? $row['number_of_workers'] : ""; ?>" name="number_of_workers" placeholder="Enter the Number of Workers">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="form-group ">
              <label for="formFileLg" class="form-label">Number of Contributors:</label>
              <input type="text" class="form-control form-control-sm" value="<?= isset($row['number_of_contributors']) ? $row['number_of_contributors'] : ""; ?>" name="number_of_contributors" placeholder="Enter the Number of contributors">
            </div>
          </div>
      </div>
      <input type="submit" class="btn btn-primary btn-user btn-block" name="update" value="Submit ">
      </form>
      <hr>

    </div>
  </div>
</div>


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
    document.title= "Taskenhancer :: Edit Web Information";
</script>