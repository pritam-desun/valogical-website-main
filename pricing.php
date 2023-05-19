<?php
require_once("config.php");
require_once("inc/header.php");
$pricing = fetchResult('master','1 order by country asc');
?>
<!-- Start main-content -->
<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
	<div class="auto-container">
		<div class="title-outer">
			<h1 class="title">Pricing</h1>
			<ul class="page-breadcrumb">
				<li><a href="index.html">Home</a></li>
				<i class="fa fa-angle-right"></i>
				<li>Pricing</li>
			</ul>
		</div>
	</div>
</section>
<!-- end main-content -->

<!-- Pricing Section -->
<section class="pricing-sec">
	<div class="container bg-light pa">
		<div class="row">
			<div class="col-md-3 col-sm-2 col-0"></div>

			<div class="col-md-3 col-sm-4 col-6">
				<select onchange="editForm('inc/get_currency.php', this.value, 'currency','GET')" class="form-select sbc" aria-label="Default select example">
					<option disabled selected>Select Country</option>
					<?php while ($prow = mysqli_fetch_assoc($pricing)) { ?>
						<option value="<?= $prow['master_id'] ?>"><?= $prow['country'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-3 col-sm-4 col-6 cbc">
				<h5 id="currency" class="text">Change Currency</h5>
			</div>
			<div class="col-md-3 col-sm-2 col-0"></div>
		</div>
		<div class="row" id="pricing">
			<div class="inner-b a">
				<h5>Ready to<br> track an<br> Exclusive TRIAL?</h5>
				<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">START HERE</a>
			</div>
			<div class="inner-box-a b">
				<h6>VA 10 HOURS</h5>
					<P>USD 140/30 days</P>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
			</div>
			<div class="inner-box-a c">
				<h6>VA 10 HOURS</h5>
					<P>USD 140/30 days</P>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
			</div>
			<div class="inner-box-a d">
				<h6>VA 10 HOURS</h5>
					<P>USD 140/30 days</P>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
			</div>
			<div class="inner-box-a e">
				<h6>VA 10 HOURS</h5>
					<P>USD 140/30 days</P>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
			</div>
			<div class="inner-box-a f">
				<h6>VA 10 HOURS</h5>
					<P>USD 140/30 days</P>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
			</div>
		</div>
		<div class="row gx-3 gy-3">
			<div class="col-lg-2 col-md-1"></div>
			<div class="col-lg-4 col-md-5">
				<div class="box">
					<h6>FULL-TIME VIRTUAL EMPLOYEE</h6>
					<p>USD 1200 per month, 5 days a week for any business hours</p>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-5">
				<div class="box">
					<h6>PAY AS YOU GO</h6>
					<p>USD 18 per hour for unlimited validity</p>
					<a href="https://ehostingguru.com/stage/valogical/client/" target="_blank">SIGN UP</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-1"></div>
		</div>
	</div>
</section>
<section class="logo">
	<div class="container">
		<div class="row">
			<p>Like to discuss your requirements before signing up? <a href="tel:91+3478096802" class="ancor">Call</a>, <a href="mailto:info@taskenhancer.com" class="ancor">Email</a> or <a target="_blank" href="https://web.whatsapp.com/send?phone=918777846136" class="ancor">Chat</a> with us right away!</p>
		</div>
		<div class="row limg">
			<div class="col-sm-2 col-0"></div>
			<div class="col-sm-4 col-6">
				<img src="images/paypal.png">
				<p>We Accept PayPal Payment Setup</p>
			</div>
			<div class="col-sm-4 col-6">
				<img src="images/all-logo.png">
				<p>We Accept All Major Cards for Easy Payment Setup</p>
			</div>
			<div class="col-sm-2 col-0"></div>
		</div>
	</div>
</section>
<!-- End Pricing Section -->


<?php
include_once "framework/ajax/method.php";
include("inc/footer.php"); ?>