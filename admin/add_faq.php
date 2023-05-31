<?php include("include/master.php");
if (isset($_POST['submit'])) {

  $ques = isset($_POST["question"]) ? trim($_POST["question"]) : "";
  $answ = isset($_POST["answer"]) ? trim($_POST["answer"]) : "";
  $err = [];

  if ($ques == "") {
    $err["question"] = "Please write your question  ";
  }
  if (is_numeric($ques)) {
    $err["question"] = "Please enter letters and alpha-numeric ";
  }
  if (is_numeric($answ)) {
    $err["answ"] = "Please enter letters and alpha-numeric  ";
  }
  if ($answ == "") {
    $err["answer"] = "Please write your answer  ";
  }
  if (empty($err)) {
    //die("here");
    $query = "INSERT INTO `faq`(`question`, `answer`) VALUES ('" . $ques . "','" . $answ . "')";
    $result = mysqli_query($conn, $query);
    //Print_r($query);
    // die;
    if ($result) {
      add_redirct("faq", "Record added successfully");
    } else {
      $err['message'] = ' Not Worked please check Your code ';
    }
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800 " style="margin-left:  1.25rem !important;">FAQ </h1>
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
                <h1 class="h4 text-gray-900 mb-4 ">Frequently Asked Questions</h1>
              </div>
              <form class="user" action="" method="post">
                <div class="form-group ">
                  <label for="exampleFormControlTextarea1" class="form-label text-secondary-emphasis">Question:</label>
                  <input type="name" name="question" value="<?= isset($_POST['question']) ? $_POST['question'] : "" ?>" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="write........">
                  <?php if (isset($err['question'])) { ?><div class="small alert-danger"><?= $err['question']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" class="form-label">Answer:</label>

                  <textarea type="name" name="answer" value="" class="form-control" id="answer" rows="3" placeholder="" cols="30" rows="10"><?= isset($_POST['answer']) ? $_POST['answer'] : "" ?></textarea>
                  <?php if (isset($err['answer'])) { ?><div class="small alert-danger"><?= $err['answer']; ?></div> <?php } ?>
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
  document.title = "Taskenhancer :: Add FAQ";
</script>