<?php include("include/master.php");
$id = isset($_GET['id']) ? $_GET['id'] : "";
if ($id) {
  $sql = "SELECT * FROM `faq` WHERE faq_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {


  $ques = isset($_POST["question"]) ? trim($_POST["question"]) : "";
  $answ = isset($_POST["answer"]) ? trim($_POST["answer"]) : "";
  $err = [];

  if ($ques == "") {
    $err["question"] = "Please Enter Question  ";
  }
  if ($answ == "") {
    $err["answer"] = "Please Enter Answer  ";
  }
  if (empty($err)) {
    //die("here");
    $query = "UPDATE `faq`  SET `question`='$ques', `answer`='$answ' WHERE faq_id = $id";
    $result = mysqli_query($conn, $query);
    //Print_r($query);
    // die;
    if ($result) {
      //header("location:edit_faq.php");
      //$err['message'] = ' Record Update Successfully';
      header("location:faq.php?update=Record Update Successfully");
    } else {
      $err['message'] = ' Not Worked please check Your code ';
    }
  }
}
$ques = [];
$answ = [];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800" style="margin-left:  1.25rem !important;">FAQ Elements </h1>
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
              </div>
              <form class="user" action="" method="post">
                <div class="form-group ">
                  <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Question:</label>
                  <input type="name" name="question" value="<?= isset($row['question']) ? $row['question'] : ""; ?>" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="write........">
                  <?php if (isset($err['question'])) { ?><div class="small alert-danger"><?= $err['question']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" class="form-label">Answer:</label>

                  <textarea type="name" name="answer" value="" class="form-control" id="answer" rows="3" placeholder="" cols="30" rows="10"><?= isset($row['answer']) ? $row['answer'] : ""; ?></textarea>
                  <?php if (isset($err['answer'])) { ?><div class="small alert-danger"><?= $err['answer']; ?></div> <?php } ?>
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
    .create(document.querySelector('#answer'))
    .then(answer => {
      console.log(answer);
      answer.editing.view.change((writer) => {
          writer.setStyle(
            "height",
            "200px",
            answer.editing.view.document.getRoot()
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
  document.title = "Taskenhancer :: Edit FAQ";
</script>