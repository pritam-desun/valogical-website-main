<?php include("include/master.php");
if (isset($_POST['submit'])) {
  // print_r($_POST);
  $people_name = isset($_POST["people_name"]) ? trim($_POST["people_name"]) : "";
  $people_designation = isset($_POST["people_designation"]) ? trim($_POST["people_designation"]) : "";
  $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
  $rating = isset($_POST["rating"]) ? trim($_POST["rating"]) : "";
  $status = isset($_POST["status"]) ? trim($_POST["status"]) : "";
  //print_r($status);
  $err = [];
  $errMsg = [];
  if(empty($_POST)){
    $errMsg['valid'] = "Please Enter data in the from..";
  }
  if ($people_name == "") {
    $err["people_name"] = "Please Enter Name  ";
  }
  if (preg_match('/[^a-z_\-0-9]/i', $people_name)) {
		$err['people_name'] = "Only letters, numeric and white space allowed";
	}
  if ($people_designation == "") {
    $err["people_designation"] = "Please Enter Designation  ";
  }
  if (preg_match('/[^a-z_\-0-9]/i', $people_designation)) {
		$err['people_designation'] = "Only letters, numeric and white space allowed";
	}
  if ($content == "") {
    $err["content"] = "Please Enter Content  ";
  }
  if ($status == "") {
    $err["status"] = "Please Enter Status  ";
  }
  if (empty($err)) {
    $query = "INSERT INTO `testimonials`(`people_name`, `people_designation`, `content`,`rating`,`status`) VALUES ('" . $people_name . "','" . $people_designation . "','" . $content . "','" . $rating . "','" . $status . "')";
    $result = mysqli_query($conn, $query);
    // Print_r($query);
    // die;
    if ($result) {
      $err['register'] = 'New Data Added successfully';
      header("location:testimonials.php?add=New Data Added successfully");
    } else {
      $err['register'] = 'Not Worked please check Your code ';
    }
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800" style="margin-left:  1.25rem !important;">Testimonials Form</h1>
          <?php if (isset($err['register'])) { ?>
            <div class="alert alert-success"><?= $err['register']; ?></div>
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
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Name :</label>
                          <input type="name" class="form-control form-control-user" name="people_name" id="exampleFirstName" placeholder="Enter a name.....">
                          <?php if (isset($err['people_name'])) { ?><div class="small alert-danger"><?= $err['people_name']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Designation :</label>
                          <input type="name" class="form-control form-control-user" name="people_designation" id="exampleInputEmail" placeholder="Enter a designation.....">
                          <?php if (isset($err['people_designation'])) { ?><div class="small alert-danger"><?= $err['people_designation']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Content :</label>
                          <textarea type="text" class="form-control form-control-user" id="contentt" name="content" placeholder="Enter a content...."></textarea>
                          <?php if (isset($err['content'])) { ?><div class="small alert-danger"><?= $err['content']; ?></div> <?php } ?>
                        </div>

                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Rating:</label>
                          <select type="status" name="rating" class="form-control sform-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                          <?php if (isset($err['Rating'])) { ?><div class="small alert-danger"><?= $err['Rating']; ?></div> <?php } ?>
                          </div>

                        
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Status:</label>
                          <select type="status" name="status" class="form-control sform-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="1" selected>Active</option>
                            <option value="2">Inactive</option>
                          </select>
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

  <script>
    ClassicEditor
      .create(document.querySelector('#contentt'))
      .then(contentt => {
        console.log(contentt);
        contentt.editing.view.change((writer) => {
            writer.setStyle(
              "height",
              "200px",
              contentt.editing.view.document.getRoot()
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

<script>
    document.title= "Taskenhancer :: Add Testimonials";
</script>