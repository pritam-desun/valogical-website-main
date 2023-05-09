<?php 
include("config.php");
include("inc/header.php"); 
?>
		<!-- Start main-content -->
		<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
			<div class="auto-container">
				<div class="title-outer">
					<h1 class="title">Blog</h1>
					<ul class="page-breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li>Blog</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- end main-content -->

		<!-- News Section -->
		<section class="bg-silver-light">
			<div class="container pb-90">
				<div class="row">

				<?php $id = 0;
           $sql = "SELECT * FROM `blog`";
           $result = mysqli_query($conn, $sql);
           $row = mysqli_num_rows($result);
            // print_r($row);
              while ($rows = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
								$author = $rows['author']
            ?>
					<!-- News Block -->
					<div class="news-block col-xl-4 col-lg-6 col-md-6">
						<div class="inner-box">
							<div class="image-box">
								<figure class="image"><a href="blog_details.php?id=<?php echo $rows['blog_id'];?>"><img src="admin/<?php echo $rows['feature_img']?>" alt=""></a>
								</figure>
							</div>
							<div class="content-box">
								<span class="date"><?php echo (new DateTime($rows['published_on']))->format('d M, Y')  ?></span>
								<span class="post-info"><i class="fa fa-user-circle"></i> 
								<?php 
								$queary = "SELECT `users`.`name`, `blog`.`author` FROM `users` LEFT JOIN `blog` ON `blog`.`$author`=`users`.`user_id` ORDER BY `users`.`name`";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_num_rows($result);
								echo $rows['name'] ?></span>
								<h5 class="title"><a href="blog_details.php?id=<?php echo $rows['slug'];?>"><?php echo $rows['title'] ?></a></h5>
								<div class="text"><?php echo $rows['short_desc'] ?></div>
								<a method="Get" href="blog_details.php?id=<?php echo $rows['slug'];?>" class="read-more"><i class="fa fa-long-arrow-alt-right"></i> Read More</a>
							</div>
						</div>
					</div>
					<?php } ?>

					
			</div>
		</section>
		<!--End News Section -->

		<!-- Main Footer -->
		<?php include("inc/footer.php"); ?>
