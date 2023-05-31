<?php include("include/master.php");
include "../framework/main.php";
$sql = "SELECT * FROM `site_info`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

  $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
  $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
  $skype = isset($_POST["skype"]) ? trim($_POST["skype"]) : "";
  $whatsapp = isset($_POST["whatsapp"]) ? trim($_POST["whatsapp"]) : "";
  $youtube_link = isset($_POST["youtube_link"]) ? trim($_POST["youtube_link"]) : "";
  $twitter_link = isset($_POST["twitter_link"]) ? trim($_POST["twitter_link"]) : "";
  $instagram_link = isset($_POST["instagram_link"]) ? trim($_POST["instagram_link"]) : "";
  $facebook_link = isset($_POST["facebook_link"]) ? trim($_POST["facebook_link"]) : "";
  $number_of_happy_customer = isset($_POST["number_of_happy_customer"]) ? trim($_POST["number_of_happy_customer"]) : "";
  $number_of_client = isset($_POST["number_of_client"]) ? trim($_POST["number_of_client"]) : "";
  $number_of_jobs = isset($_POST["number_of_jobs"]) ? trim($_POST["number_of_jobs"]) : "";
  $number_of_workers = isset($_POST["number_of_workers"]) ? trim($_POST["number_of_workers"]) : "";
  $number_of_contributors = isset($_POST["number_of_contributors"]) ? trim($_POST["number_of_contributors"]) : "";

  if (empty($err)) {

    $query = "UPDATE `site_info` SET `email`='$email',`phone`='$phone',`skype`='$skype',`whatsapp`='$whatsapp',`youtube_link`='$youtube_link',`twitter_link`='$twitter_link',`instagram_link`='$instagram_link',`facebook_link`='$facebook_link ',`number_of_happy_customer`='$number_of_happy_customer',`number_of_client`='$number_of_client',`number_of_jobs`='$number_of_jobs',`number_of_workers`='$number_of_workers',`number_of_contributors`='$number_of_contributors' WHERE 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
      reload(1);
      $err['add'] = "Record edited successfully!! ";
    } else {
      $err['add'] = 'Not worked please check Your code ';
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
        <form class="user" action="" method="post">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group ">
                <label for="formFileLg" class="form-label">Email:</label>
                <input type="text" class="form-control form-control-sm" value="<?= isset($row['email']) ? $row['email'] : ""; ?>" name="email" placeholder="Enter the email ID">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">

              <div class="form-group ">
                <label for="formFileLg" class="form-label">Phone:</label>
                <input type="text" class="form-control form-control-sm" value="<?= isset($row['phone']) ? $row['phone'] : ""; ?>" name="phone" placeholder="Enter the phone Number">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="form-group ">
                <label for="formFileLg" class="form-label">Skype:</label>
                <input type="text" class="form-control form-control-sm" value="<?= isset($row['skype']) ? $row['skype'] : ""; ?>" name="skype" placeholder="Enter the skype Name">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="form-group ">
                <label for="formFileLg" class="form-label">Whatsapp:</label>
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
                <label for="formFileLg" class="form-label">Instagram Link:</label>
                <input type="text" class="form-control form-control-sm" value="<?= isset($row['instagram_link']) ? $row['instagram_link'] : ""; ?>" name="instagram_link" placeholder="Enter the Instagram Link">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="form-group ">
                <label for="formFileLg" class="form-label">Facebook Link:</label>
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
          <input type="submit" class="btn btn-primary btn-user btn-block" name="update" value="Update">
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
    document.title = "Taskenhancer :: Edit Web Information";
  </script>