<?php include("include/master.php");
if (@$_GET['type'] == 'delete') {

    $id =  isset($_GET['id']) ? $_GET['id'] : '';

    $sql = "DELETE FROM testimonials WHERE `testimonial_id` = '$id'";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_affected_rows($conn);
    print_r($row);
    if ($row > 0) {
        $err['msg'] = "Deleted Successfully.";
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (isset($err['msg'])) { ?>
        <div class="alert alert-success"><?= $err['msg']; ?></div>
    <?php } ?>
    <?php if (isset($_GET['add'])) { ?>
        <div class="alert alert-success"><?php echo $_GET['add']; ?></div>
    <?php }  ?>
    <?php if (isset($_GET['update'])) { ?>
        <div class="alert alert-success"><?= $_GET['update']; ?></div>
    <?php }  ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Testimonials </h1>
    <p class=" mb-4 "><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="form.php">Add Data</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $id = 0;
                $sql = "SELECT * FROM `testimonials`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                // print_r($row);
                ?>
                <?php if ($row == 0) : ?>
                    <h2>Data Not Found</h2>
                <?php else : ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Content</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $id = $id + 1;
                            ?>
                                <tr>
                                    <td><?php echo $rows['testimonial_id'] ?></td>
                                    <td><?php echo $rows['people_name'] ?></td>
                                    <td><?php echo $rows['people_designation'] ?></td>
                                    <td><?php echo $rows['content'] ?></td>
                                    <td><?php echo $rows['rating'] ?></td>
                                    <td><?php echo $rows['status'] ?> </td>
                                    <td><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="edit.php?id=<?php echo $rows['testimonial_id'] ?>">Edit</a> || <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="return confirm('Are you sure?')" href="testimonials.php?id=<?php echo $rows['testimonial_id'] ?>&type=delete">Delete</a>
                                    </td>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table>
                <?php endif ?>
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

<script language="JavaScript" type="text/javascript">
    function checkDelete() {
        return confirm('Are you sure?');
    }
</script>
<?php
include("include/footer.php")
?>

<script>
    document.title = "Taskenhancer :: Testimonials";
</script>