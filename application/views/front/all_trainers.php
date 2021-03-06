<?php
    if ($this->session->userdata("userid") != "") {
      redirect(base_url()."dashboard");
    }
 ?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
          <title>Leon Maestro De Fitness</title>
          <link rel = "icon" type = "image/png" href = "<?php echo base_url(); ?>front_static/images/logo.png">
          <!-- For apple devices -->
          <link rel = "apple-touch-icon" type = "image/png" href = "<?php echo base_url(); ?>front_static/images/logo.png"/>
          <!-- Meta tag Keywords -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta charset="UTF-8" />
          <meta name="keywords" content="Leon Maestro De Fitness, leonmaestrodefitness, lmdf, gym, fitness, best gyms, lmf, clean gyms, gyms around me, boxing, tabata, yoga" />
          <script>
              addEventListener("load", function () {
                  setTimeout(hideURLbar, 0);
              }, false);

              function hideURLbar() {
                  window.scrollTo(0, 1);
              }
          </script>

          <!-- //Meta tag Keywords -->
          <!-- Custom-Files -->
          <link rel="stylesheet" href="<?php echo base_url(); ?>front_static/css/bootstrap.css">
          <!-- Bootstrap-Core-CSS -->
          <link rel="stylesheet" href="<?php echo base_url(); ?>front_static/css/style.css" type="text/css" media="all" />
          <!-- Style-CSS -->
          <!-- font-awesome-icons -->
          <link href="<?php echo base_url(); ?>front_static/css/font-awesome.css" rel="stylesheet">
          <!-- //font-awesome-icons -->
          <!-- /Fonts -->
         <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
         <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
          <!-- //Fonts -->

    </head>

    <body>
        <!-- header -->
          <?php include 'header.php';?>
        <!-- //header -->
        <!-- banner -->
        <section class="inner-page-banner" id="home">
        </section>
        <!-- //banner -->

        <!-- page details -->
        <div class="breadcrumb-agile">
        	<ol class="breadcrumb mb-0">
        		<li class="breadcrumb-item">
        			<a href="<?php echo base_url(); ?>">Home</a>
        		</li>
        		<li class="breadcrumb-item active" aria-current="page">Team</li>
        	</ol>
        </div>
        <!-- //page details -->
        <!-- //banner-botttom -->
        <section class="content-info py-5">
            <div class="container py-md-5">
                <div class="text-center px-lg-5">
                    <div class="title-desc text-center px-lg-5"></div>
                    <img src="<?php echo base_url(); ?>front_static/images/trainer1.jpg">
                    <img src="<?php echo base_url(); ?>front_static/images/trainer2.jpg">
                    <img src="<?php echo base_url(); ?>front_static/images/trainer3.jpg">
                </div>
            </div>
        </section>
        <!-- //banner-botttom -->

        <!-- footer -->
        <?php include 'footer.php';?>
        <!-- //footer -->
    </body>
</html>
