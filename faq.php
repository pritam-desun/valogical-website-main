<?php include("config.php");
include("inc/header.php"); 
      ?>

		<!-- Start main-content -->
		<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
			<div class="auto-container">
				<div class="title-outer">
					<h1 class="title">Faq</h1>
					<ul class="page-breadcrumb">
						<li><a href="index.html">Home</a></li>
						<i class="fa fa-angle-right"></i>
						<li>FAQ</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- end main-content -->

		<!-- FAQ Section -->
		<section class="">
			<div class="container">
				<div class="row">
					<div class="col">
						<ul class="accordion-box wow fadeInRight">
						<?php $id = 0;
           $sql = "SELECT * FROM `faq`";
           $result = mysqli_query($conn, $sql);
           $row = mysqli_num_rows($result);
            // print_r($row);
              while ($rows = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
            ?>
							<!--Block-->
							<li class="accordion block active-block">
								<div class="acc-btn active"><?php echo $rows['question'] ?>
									<div class="icon fa fa-plus"></div>
								</div>
								<div class="acc-content current">
									<div class="content">
										<div class="text"><?php echo $rows['answer'] ?></div>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--End FAQ Section -->

		<!-- Main Footer -->
		<?php include("inc/footer.php"); ?>
		


