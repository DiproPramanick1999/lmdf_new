<!DOCTYPE html>
<?php
    if ($this->session->userdata("userid") != "") {
      redirect(base_url()."dashboard");
    }
 ?>
<html lang="zxx">
    <head>
        <title>Leon Maestro De Fitness</title>
         <link rel = "icon" type = "image/png" href = "<?php echo base_url(); ?>/front_static/images/logo.png">
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
        			<a href="index.php">Home</a>
        		</li>
        		<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        	</ol>
        </div>
      <!-- //page details -->
      <!-- //banner-botttom -->
      <section class="content-info py-5">
          <div class="container py-md-5">
              <div class="text-center px-lg-5">
                  <h3 class="heading text-center mb-3 mb-sm-5">Contact Us</h3>
                  <p style="color:red;"><?php echo $this->session->flashdata('response'); ?></p>
              </div>
              <form method="post" action="<?php echo base_url(); ?>home/contact_validation">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>First Name</label>
                              <?php echo form_error("first_name"); ?>
                              <input class="form-control" type="text" name="first_name" placeholder="">
                          </div>
                          <div class="form-group">
                              <label>Last Name</label>
                              <span style="color:red;"><?php echo form_error("last_name"); ?></span>
                              <input class="form-control" type="text" name="last_name" placeholder="">
                          </div>
                          <div class="form-group">
                              <label>Email</label>
                              <span style="color:red;"><?php echo form_error("email"); ?></span>
                              <input class="form-control" type="text" name="email" placeholder="">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Write Message</label>
                              <span style="color:red;"><?php echo form_error("message"); ?></span>
                              <textarea class="form-control" name="message" placeholder=""></textarea>
                          </div>
                      </div>
                      <div class="form-group mx-auto mt-3">
                          <button type="submit" class="btn submit" name="submit_btn">Submit</button>
                      </div>
                  </div>

              </form>
          </div>
      </section>
      <!-- //banner-botttom -->

      <div class="map-w3layouts">
            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d1682.3210560853051!2d77.6353390540868!3d13.01348413189024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae16df450f6e0f%3A0xd7405dfd47014d72!2sLeon%20Maestro%20De%20Fitness%2C%20Venkateshappa%20Layout%2C%20Kammanahalli%2C%20Bengaluru%2C%20Karnataka%20560043!3m2!1d13.013705499999999!2d77.6357879!4m5!1s0x3bae16df450f6e0f%3A0xd7405dfd47014d72!2sleon%20maestro%20de%20fitness!3m2!1d13.013705499999999!2d77.6357879!5e0!3m2!1sen!2sin!4v1572536814826!5m2!1sen!2sin" allowfullscreen="">
            </iframe>
      </div>

      <!-- footer -->
      <?php include 'footer.php';?>
      <!-- //footer -->

    </body>
</html>
