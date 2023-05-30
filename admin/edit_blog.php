<?php include("include/master.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id) {
  $sql = "SELECT * FROM `blog` WHERE blog_id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  // die();
}
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
if (isset($_POST['update'])) {
  $target_dir = "upload/";
  $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
  $image = $target_dir . basename($_FILES['feature_img']['name'], 'JPEG');
  $image_tep_name = $_FILES['feature_img']['tmp_name'];
  $short_desc = isset($_POST["short_desc"]) ? trim($_POST["short_desc"]) : "";
  $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
  $published_status = isset($_POST["published_status"]) ? trim($_POST["published_status"]) : "";

  // $datetime = date("$date", " H:i:s");



  //print_r($status);
  $err = [];
  if (file_exists($row['feature_img'])) {
    $image = $row['feature_img'];
    $image_tep_name = $_FILES['feature_img']['tmp_name'];
    if (!empty($_FILES['feature_img']['name'])) {
      $image = $target_dir . basename($_FILES['feature_img']['name'], 'JPEG');
      $image_tep_name = $_FILES['feature_img']['tmp_name'];
    }
  }
  if ($title == "") {
    $err["title"] = "Please Enter title  ";
  }
  if ($short_desc == "") {
    $err["short_desc"] = "Please Enter short description";
  }
  if ($content == "") {
    $err["content"] = "Please Enter the content  ";
  }

  if (empty($err)) {
    $slug = slugify($title);
    $query = "UPDATE `blog` SET
    `title`='$title',
    `slug` ='$slug',
    `feature_img`='$image',
    `short_desc`='$short_desc',
    `content`='$content',
    `published_status`='$published_status'
    WHERE blog_id = $id";
    $result = mysqli_query($conn, $query);

    // die;
    if ($result) {
      move_uploaded_file($image_tep_name, $image);
      // $err['add'] = 'Form Update Successfully';
      header("location:view_blog.php?update=Record Update Successfully");
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800" style="margin-left:  1.25rem !important;">Blog Elements</h1>
  <?php if (isset($err['add'])) { ?>
    <div class="alert alert-success"><?= $err['add']; ?></div>
  <?php } ?>
  <!-- DataTales Example -->
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 col-md-7">
            <div class="p-5">
              <div class="text-cEnter">
              </div>
              <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Title:</label>
                  <input type="text" class="form-control form-control-user" value="<?= isset($row['title']) ? $row['title'] : ""; ?>" name="title" id="title" placeholder="">
                  <?php if (isset($err['title'])) { ?><div class="small alert-danger"><?= $err['title']; ?></div> <?php } ?>
                </div>
                <div class="form-group">
                  <label for="formFileLg" class="form-label">Feature Image:</label>
                  <input class="form-control form-control-lg" id="feature_img" type="file" name="feature_img">
                  <?php if (isset($row['feature_img'])) { ?>
                    <?php print_r($row['feature_img']); ?>
                  <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Short desp :</label>
                  <textarea type="name" value="" name="short_desc" rows="8" class="form-control" id="short_desp" rows="3" placeholder=""><?= isset($row['short_desc']) ? $row['short_desc'] : ""; ?></textarea>
                  <?php if (isset($err['short_desc'])) { ?><div class="small alert-danger"><?= $err['short_desc']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="exampleFormControlTitle" class="form-label">Content :</label>
                  <textarea type="name" value="" name="content" rows="" class="form-control" id="contentt" rows="3" placeholder=""><?= isset($row['content']) ? $row['content'] : ""; ?></textarea>
                  <?php if (isset($err['content'])) { ?><div class="small alert-danger"><?= $err['content']; ?></div> <?php } ?>
                </div>
                <div class="form-group ">
                  <label for="formFileLg" class="form-label">Published Status:</label>
                  <select type="status" name="published_status" class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="<?= isset($row['published_status']) ? $row['published_status'] : ""; ?>" selected><?= isset($row['published_status']) ? $row['published_status'] : ""; ?></option>
                    <?php
                    if ($row['published_status'] == 'Published' && $row['published_status'] != 'draft') { ?>
                      <option value="draft">draft</option>
                    <?php } else { ?>
                      <option value="published">published</option>
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
<?php
include("include/footer.php")
?>

<script>
  document.title = "Taskenhancer :: Edit Blog";
</script>