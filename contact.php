<?php
require_once("config.php");
require_once("inc/header.php");
include_once "framework/main.php";
if (isset($_POST['submit'])) {


	$name = isset($_POST["name"]) ? $_POST["name"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
	$phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
	$message = isset($_POST["message"]) ? $_POST["message"] : "";

	$err = [];
	if ($name == "") {
		$err["name"] = "Please enter name";
	}
	if ($email == "") {
		$err['email'] = "Email is Required";
	}
	if ($subject == "") {
		$err["subject"] = "Please enter a subject";
	}
	if ($phone == "") {
		$err["phone"] = "Phone Number is Required";
	}
	if (empty($err)) {

		$query = "INSERT INTO `contact`(`name`, `email`, `subject`, `phone`, `message`) VALUES ('$name','$email','$subject','$phone','$message')";
		//Print_r($query);
		$result = mysqli_query($conn, $query);

		if ($result) {
			$msg['messsage'] = 'massage submit successfully';
			 reload(1);
		} else {
			$msg['messsage'] = 'massage not submit successfully ';
		}
	}
}


?>
<!--End Main Header -->

<!-- Start main-content -->
<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
	<div class="auto-container">
		<div class="title-outer">
			<h1 class="title">Contact Us</h1>
			<ul class="page-breadcrumb">
				<li><a href="index.html">Home</a></li>
				<i class="fa fa-angle-right"></i>
				<li>Contact</li>
			</ul>
		</div>
	</div>
</section>
<!-- end main-content -->

<!--Contact Details Start-->
<section class="team-contact-form">
	<div class="container pb-100">
		<div class="sec-title text-center">
			<span class="sub-title">Contact With Us Now</span>
			<h2 class="section-title__title">Feel Free to Write Our <br> Tecnology Experts</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<?php if (isset($msg['messsage'])) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?php echo $msg['messsage']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php } ?>

				<!-- Contact Form -->
				<form id="contact_form" name="contact_form" class="" method="post">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<input  required name="name" class="form-control" type="text" value="<?= (array_key_exists('name', $_POST)) ? $_POST["name"] : '' ?>" placeholder="Enter Name">
								<p style="color:red;font-size:14px;"><?php if (isset($err['name'])) {
																			echo $err['name'];
																		} ?> </p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<input  required name="email" class="form-control required email" type="email" value="<?= (array_key_exists('email', $_POST)) ? $_POST["email"] : '' ?>" placeholder="Enter Email">
								<p style="color:red;font-size:14px;"><?php if (isset($err['email'])) {
																			echo $err['email'];
																		} ?> </p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<input  required name="subject" class="form-control required" type="text" value="<?= (array_key_exists('subject', $_POST)) ? $_POST["subject"] : '' ?>" name="subject" placeholder="Enter Subject">
								<p style="color:red;font-size:14px;"><?php if (isset($err['subject'])) {
																			echo $err['subject'];
																		} ?> </p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<input  required name="phone" class="form-control" type="text" name="phone" value="<?= (array_key_exists('phone', $_POST)) ? $_POST["phone"] : '' ?>" placeholder="Enter Phone">
								<p style="color:red;font-size:14px;"><?php if (isset($err['phone'])) {
																			echo $err['phone'];
																		} ?> </p>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<textarea name="message" class="form-control required" rows="5 type=" text" name="phone" placeholder="Enter Message"></textarea>
					</div>
					<div class="mb-3 text-center">

						<button type="submit" name="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Send message</span></button>
						<button type="reset" class="theme-btn btn-style-one"><span class="btn-title">Reset</span></button>
					</div>
				</form>
				<!-- Contact Form Validation-->
			</div>
		</div>
	</div>
</section>
<!--Contact Details End-->



<!-- form submit -->
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.form.min.js"></script>
<script>
	(function($) {
		$("#contact_form").validate({
			submitHandler: function(form) {
				var form_btn = $(form).find('button[type="submit"]');
				var form_result_div = '#form-result';
				$(form_result_div).remove();
				form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
				var form_btn_old_msg = form_btn.html();
				form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
				$(form).ajaxSubmit({
					dataType: 'json',
					success: function(data) {
						if (data.status == 'true') {
							$(form).find('.form-control').val('');
						}
						form_btn.prop('disabled', false).html(form_btn_old_msg);
						$(form_result_div).html(data.message).fadeIn('slow');
						setTimeout(function() {
							$(form_result_div).fadeOut('slow')
						}, 6000);
					}
				});
			}
		});
	})(jQuery);
</script>

<?php include("inc/footer.php"); ?>