<?php
include("include/config.php");
if(isset($_SESSION['admin'])){
 header('Location:dashboard.php');
}
$errMsg = '';
if (isset($_POST['submit'])) {
    if ($_POST['email'] == "") {
        $err['email'] = "Email is Required";
    }
    if ($_POST['password'] == "") {
        $err['password'] = "Password is Required";
    }
    if (!empty($err['email']) && ($err['Password'])) {
        $errMsg = "Email and Password is Required";
    }
    if (empty($err)) {
        $password = md5($_POST['password']);
        echo $query = "SELECT * FROM `users` WHERE `email` = '".$_POST['email']."' and `password` = '$password' ";  
    
        $result = mysqli_query($conn,$query);     
        $data = mysqli_fetch_assoc($result);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $_SESSION['admin']=$data;
            $_SESSION['user_image'] = $data['image'];
            $_SESSION['user_email'] = $data['email'];
            $_SESSION['user_name'] = $data['name'];
            $_SESSION['id'] = $data['user_id'];
            $_SESSION['logged_in'] = 1;
            header("Location: dashboard.php");
        } else {
            $errMsg = "Invalid username and password";
        }
    }
} else {
    $errMsg = '';
}
$_POST=[];



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Taskenhancer : Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-lg-block bg-login-image">

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to Login</h1>
                                        <?php if (!empty($errMsg)) { ?>
                                            <div class="alert alert-danger"><?= $errMsg; ?></div> <?php } ?>
                                        <?php if (isset($_GET['log'])) { ?>
                                            <div class="alert alert-danger"><?= $_GET['log'];; ?></div> <?php } ?>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input required type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <?php if (!empty($err['email'])) {
                                            ?>
                                                <small class="text-danger" role="alert">
                                                    <?= $err['email'] ?>
                                                </small>
                                            <?php } ?>
                                        </div>


                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                            <?php if (!empty($err['password'])) {
                                            ?>
                                                <small class="text-danger" role="alert">
                                                    <?= $err['password'] ?>
                                                </small>
                                            <?php }
                                            ?>
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="login">
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php $err='' ?>