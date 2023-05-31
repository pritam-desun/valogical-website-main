<?php include("include/master.php");
// print_r($_SESSION['id']);

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}
if (isset($_POST['submit'])) {

  $target_dir = "upload/";
  $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
  $image = $target_dir . basename($_FILES['feature_img']['name'], 'JPEG');
  $image_tep_name = $_FILES['feature_img']['tmp_name'];
  $short_desc = isset($_POST["short_desc"]) ? trim($_POST["short_desc"]) : "";
  $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
  $published_status = isset($_POST["published_status"]) ? trim($_POST["published_status"]) : "";
  $published_on = date("Y/m/d H:i:s");
  //print_r($image);


  $err = [];
  if ($title == "") {
    $err['title'] = "Title is  Required";
  }
  if ($title != "") {
    $sql = "SELECT * FROM `blog` WHERE title='$title'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
      $err['title'] = "Title is Already Exists";
    }
  }
  if ($image == "") {
    $err["image"] = "Please Enter image  ";
  }
  if ($short_desc == "") {
    $err["short_desc"] = "Please Enter short description";
  }
  if ($content == "") {
    $err["content"] = "Please Enter the content  ";
  }

  if (empty($err)) {
    $slug = slugify($title);
    $query = "INSERT INTO `blog`(`title`,`slug`, `author`, `feature_img`,`short_desc`,`content`,`published_on`,`published_status`) VALUES ('" . $title . "','" . $slug . "','" . $_SESSION['id']  . "','" . $image  . "','" . $short_desc  . "','" . $content  . "','" . $published_on . "','" . $published_status . "')";
    $result = mysqli_query($conn, $query);

    // die;
    if ($result) {
      //die;
      move_uploaded_file($image_tep_name, $image);
      // $err['add'] = 'Form Submit Successfully';
      header("Refresh:view_blog.php?add=Form Submit Successfully");
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800" style="margin-left:  1.25rem !important;">Blog</h1>
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
                <h1 class="h4 text-gray-900 mb-4">Add New Blog</h1>
              </div>
              <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Title:</label>
                  <input required type="text" class="form-control form-control-user" value="<?= isset($_POST['title']) ? $_POST['title'] : "" ?>" name="title" id="title" placeholder="">
                  <?php if (isset($err['title'])) { ?><div class="small alert-danger"><?= $err['title']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="formFileLg" class="form-label">Feature Image:</label>
                  <input required class="form-control form-control-lg" value="<?= isset($_POST['image']) ? $_POST['image'] : "" ?>" id="feature_img" type="file" name="feature_img">
                </div>
                <?php if (isset($err['image'])) { ?><div class="small alert-danger"><?= $err['image']; ?></div> <?php } ?>

                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Short desp :</label>
                  <textarea required type="name" name="short_desc" rows="8" class="form-control" value="<?= isset($_POST['short_desc']) ? $_POST['short_desc'] : "" ?>" id="short_desp" rows="5" placeholder=""></textarea>
                  <?php if (isset($err['short_desc'])) { ?><div class="small alert-danger"><?= $err['short_desc']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Content :</label>
                  <textarea required type="name" name="content" rows="8" class="form-control" value="<?= isset($_POST['content']) ? $_POST['content'] : "" ?>" id="contentt" rows="5" placeholder=""></textarea>
                  <?php if (isset($err['content'])) { ?><div class="small alert-danger"><?= $err['content']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="formFileLg" value="<?= isset($_POST['published_status']) ? $_POST['published_status'] : "" ?>" class="form-label">Published Status:</label>
                  <select type="status" name="published_status" class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="Draft" selected>Draft</option>
                    <option value="Published">Published</option>
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
    .create(document.querySelector('#short_desp'))
    .then(short_desp => {
      console.log(short_desp);
      short_desp.editing.view.change((writer) => {
          writer.setStyle(
            "height",
            "200px",
            short_desp.editing.view.document.getRoot()
          );
        })
        .catch(error => {
          console.error(error);
        });
    });
</script>
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

</body>

</html>
<?php
include("include/footer.php")
?>
<script>
  document.title = "Taskenhancer :: Add Blog";
</script>