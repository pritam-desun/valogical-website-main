<?php 
require_once("config.php") ;
require_once("inc/header.php"); 
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM `services` WHERE `service_id` = $id ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
    ?>
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
      <div class="auto-container">
        <div class="title-outer">
          <h1 class="title"> <?php print_r($row['short_desp']); ?></h1>
          <ul class="page-breadcrumb">
            <li><a href="index.php">Home</a></li>
            <i class="fa fa-angle-right"></i>
            <li>Services</li>
          </ul>
        </div>
      </div>
    </section>


    <!--Start Services Details-->
    <section class="services-details">
      <div class="container">
        <div class="row">
          <!--Start Services Details Sidebar-->
          <div class="col-xl-4 col-lg-4">
            <div class="service-sidebar">
              <!--Start Services Details Sidebar Single-->
              <div class="sidebar-widget service-sidebar-single">

                <div class="service-details-help">
                  <div class="help-shape-1"></div>
                  <div class="help-shape-2"></div>
                  <h2 class="help-title">Contact with <br> us for any <br> advice</h2>
                  <div class="help-icon">
                    <span class=" lnr-icon-phone-handset"></span>
                  </div>
                  <div class="help-contact">
                    <p>Need help? Talk to an expert</p>
                    <a href="tel:<?= $site_info_header['phone'] ?>">+<?= $site_info_header['phone'] ?></a>
                  </div>
                </div>

                <!--Start Services Details Sidebar Single-->
                <div class="sidebar-widget service-sidebar-single mt-4">
                  <div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1200m">
                    <a href="https://web.whatsapp.com/send?phone=<?= $site_info_header['whatsapp'] ?>" class="theme-btn btn-style-one d-grid"><span class="btn-title"><span
                          class="fa-thin fa-message-lines"></span>Chat Now</span></a>
                        <hr>
                          <a href="services.php" class="theme-btn btn-style-two d-grid"><span class="btn-title"><span
                          class=""></span>Go  Previous</span></a>
                  </div>
                </div>
              </div>

              <!--End Services Details Sidebar-->
            </div>
          </div>

          <!--Start Services Details Content-->
          <div class="col-xl-8 col-lg-8">
            <div class="services-details__content">
              <h3 class="mt-4"> <?php print_r($row['short_desp']); ?></h3>
              <p class="text-justify"> <?=$row['long_desp']; ?>
              </p>
            </div>
          </div>
          <!--End Services Details Content-->
        </div>
      </div>
    </section>
    <!--End Services Details-->
 <?php 
}
     include("inc/footer.php"); ?>

<style>
  .services-details__content p{
    text-align: justify;
  }
</style>

<script>
    document.title= "Taskenhancer :: service_details";
</script>