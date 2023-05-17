<?php
include('include/master.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id) {
    $sql = "SELECT * FROM `testimonials` WHERE testimonial_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    // die();
}
if (isset($_POST['update'])) {
    $testimonial_id = $_GET["id"];
    $people_name = isset($_POST["people_name"]) ? trim($_POST["people_name"]) : "";
    $people_designation = isset($_POST["people_designation"]) ? trim($_POST["people_designation"]) : "";
    $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
    $rating = isset($_POST["rating"]) ? trim($_POST["rating"]) : "";
    $status = isset($_POST["status"]) ? $_POST["status"] : "";

    // print_r($people_name);
    $err = [];
    if ($people_name == "") {
        $err['people_name'] = "Name is Required";
    }
    if ($people_designation == "") {
        $err['people_designation'] = "Name is Required";
    }
    if ($content == "") {
        $err['content'] = "Name is Required";
    }
    if (empty($err)) {

        $query = "UPDATE `testimonials` SET
      `people_name`='$people_name',
      `people_designation`='$people_designation',
      `content`='$content',
      `rating`='$rating',
      `status`='$status'
     WHERE testimonial_id = $testimonial_id";
        $result = mysqli_query($conn, $query);
        //Print_r ($_POST);
        //die;
        if ($result) {
            //$err['register'] = 'Data Update successfully';
            header("Location: testimonials.php?update=Data Update successfully");
        } else {
            $err['register'] = 'Edit Not Worked please check Your code ';
        }
    }
}

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1  text-gray-800" style="margin-left:  1.25rem !important;">Testimonial Elements</h1>

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
                                                    <input type="name" class="form-control form-control-user" name="people_name" value="<?= isset($row["people_name"]) ? $row["people_name"] : ""; ?>" id="exampleFirstName" placeholder="Enetr a name">
                                                    <?php if (isset($err['people_name'])) { ?><div class="small alert-danger"><?= $err['people_name']; ?></div> <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Designation :</label>
                                                    <input type="name" class="form-control form-control-user" name="people_designation" value="<?= isset($row["people_designation"]) ? $row["people_designation"] : ""; ?>" id="exampleInputEmail" placeholder="Enter a designation">
                                                    <?php if (isset($err['people_designation'])) { ?><div class="small alert-danger"><?= $err['people_designation']; ?></div> <?php } ?>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Content :</label>
                                                    <textarea type="text" class="form-control form-control-user" id="contentt" value="<?= isset($row["content"]) ? $row["content"] : ""; ?>" name="content" placeholder="Enetr a content"><?= isset($row["content"]) ? $row["content"] : ""; ?></textarea>
                                                    <?php if (isset($err['content'])) { ?><div class="small alert-danger"><?= $err['content']; ?></div> <?php } ?>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Rating:</label>
                                                    <select type="rating" name="rating" class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                        <option value="<?= isset($row['rating']) ? $row['rating'] : ""; ?> " selected><?= isset($row['rating']) ? $row['rating'] : ""; ?></option>
                                                            <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                    </select>
                                                </div>


                                                <div class="form-group ">
                                                    <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Status:</label>
                                                    <select type="status" name="status" class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                        <option value="<?= isset($row['status']) ? $row['status'] : ""; ?> " selected><?= isset($row['status']) ? $row['status'] : ""; ?></option>
                                                        <?php
                                                        if ($row['status'] == 'active' && $row['status'] != 'inactive') { ?>
                                                            <option value="inactive">inactive</option>
                                                        <?php } else { ?>
                                                            <option value="active">active</option>
                                                        <?php } ?>
                                                    </select>
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