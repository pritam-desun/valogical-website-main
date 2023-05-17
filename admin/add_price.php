<?php include("include/master.php");;

$id = isset($_GET['id']) ? $_GET['id'] : "";
if ($id) {
  $sql = "SELECT * FROM `master` WHERE master_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {

  $country = isset($_POST["country"]) ? trim($_POST["country"]) : "";
  $price = isset($_POST["price"]) ? trim($_POST["price"]) : "";
  $err = [];

  if ($country == "") {
    $err["country"] = "Please enter Question  ";
  }
  if ($price == "") {
    $err["price"] = "Please enter Answer  ";
  }
  if (empty($err)) {
    //die("here");
    $query = "INSERT INTO `price`(`country`, `prices`) VALUES ('" . $country . "','" . $price . "')";
    $result = mysqli_query($conn, $query);
    //Print_r($query);
    // die;
    if ($result) {
      $err['message'] = 'New Record Addded successfully';
      // header("location:add_price.php?add=New Record Addded successfully");
    } else {
      $err['message'] = ' Not Worked please check Your code ';
    }
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800 " style="margin-left:  1.25rem !important;">Pricing </h1>
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
                        <h1 class="h4 text-gray-900 mb-4 "></h1>
                      </div>
                      <form class="user" action="" method="post">
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Country:</label>
                          <input type="name" name="country" value="<?= isset($row['country']) ? $row['country'] : ""; ?>" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="........">
                          <?php if (isset($err['country'])) { ?><div class="small alert-danger"><?= $err['country']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label">Price:</label>
                          <input type="price" name="price" value="" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="........">
                          <?php if (isset($err['price'])) { ?><div class="small alert-danger"><?= $err['price']; ?></div> <?php } ?>
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