<?php
    if ($this->session->userdata("userid") != "") {
      redirect(base_url()."dashboard");
    }
 ?>
<?php?>
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
          <section class="inner-page-banner" id="home"></section>
        <!-- //banner -->
        <!-- page details -->
          <div class="breadcrumb-agile">
          	<ol class="breadcrumb mb-0">
          		<li class="breadcrumb-item">
          			<a href="<?php echo base_url(); ?>home">Home</a>
          		</li>
          		<li class="breadcrumb-item active" aria-current="page">About Us</li>
          	</ol>
          </div>
          <!-- //page details -->
          <!-- //banner-botttom -->
          <section class="content-info py-5" id="about" name="about">
              <div class="container py-md-5">
      		         <h3 class="heading text-center mb-3 mb-sm-5">About us</h3>
                  <div class="info-w3pvt-mid text-center px-lg-5">
                      <div class="title-desc text-center px-lg-5">
                          <p class="px-lg-5">Residing in a metro city and witnessing people with unhealthy lifestyle and stressful routines,
                                             we observed how fitness had taken a back seat and become a long forgotten story. We, being fitness freaks,
                                             realized how important it is to make people prioritize health over everything else.
                                             This passion towards leading a healthy life and encouraging the masses for the same inspired us
                                             to start our own gym, which is running successfully since the year 2014.
                          </p>
                          <br>
                          <h4>Why choose LMF?</h4>
                          <br>
                          <p class="px-lg-5">Already there are innumerable gyms in the city that are offering fine services,
                                             then why should you choose us?
                          </p>
                          <p class="px-lg-5">Because we understood that advanced gym services and low prices seldom go together,
                                             and fitness enthusiasts have to compromise either on quality or on prices.
                                             This is where inception of LMF began. Since our aim is to reach out to masses,
                                             we came up with something which is affordable for everyone and provides world class facilities as well.
                                             Addressing this major concern, we started the LMF gym, and since then, there has been no looking back.
                          </p>
                          <p class="px-lg-5">Located at a prime location in Bangalore, and with a strong base of satisfied customers,
                                            LMF has become a trusted name, because of the fitness programs, personal and group trainings
                                            and the best of gym facilities we offer at affordable prices. LMF is not just a gym,
                                            but a fitness hub that offers you interesting programs for your overall development
                                            like Body Building, Weight loss, Tabata, Strengthening and Rehabilitation workouts post Injury,
                                            and Yoga, led by a team of well qualified trainers who guide you to explore your healthy side.
                          </p>
                          <p class="px-lg-5">Fitness to us is not just about sweating in the gym to become slim, but about having a complete package
                                             of a healthy body, mind and soul. Therefore we focus on your all round development by guiding
                                             you through perfect workout routines, healthy eating habits, and helping you attain a peaceful
                                             state of mind. Our experienced trainers work closely with you to understand your fitness goals
                                             and recommend a very practical and effective set of workouts with appropriate diet plans keeping
                                             in mind your body type and daily routine.
                          </p>
                          <p class="px-lg-5">Join us today, push your limits and witness a healthy well-being.</p>
                      </div>
                  </div>
              </div>
          </section>
          <!-- //banner-botttom -->

          <!-- footer -->
          <?php include 'footer.php';?>
          <!-- //footer -->
      </body>
</html>
