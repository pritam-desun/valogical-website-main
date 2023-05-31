<?php include("include/master.php");
$id = $_SESSION['id'];
$query = "SELECT * FROM `users` WHERE  `user_id` = $id  ";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$_SESSION['user_image'] = $data['image'];
$_SESSION['user_email'] = $data['email'];
$_SESSION['user_name'] = $data['name'];
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <?php if (isset($_GET['message'])) { ?>
    <div class="alert alert-success"><?= $_GET['message']; ?></div>
  <?php } ?>
  <?php if (isset($_GET['update'])) { ?>
    <div class="alert alert-success"><?= $_GET['update']; ?></div>
  <?php } ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Profile</h1>
  <p class=" mb-4 "><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="edit_profile.php">Update Profile</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Full Name</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?= $_SESSION['user_name']; ?> </p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><?= $_SESSION['user_email']; ?> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
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


<script language="JavaScript" type="text/javascript">
  function checkDelete() {
    return confirm('Are you sure?');
  }
</script>
<?php
include("include/footer.php")
?>

<script>
  document.title = "Taskenhancer :: Profile";
</script>