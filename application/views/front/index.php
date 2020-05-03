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
  <?php
  include "header.php"
  ?>
<!-- //header -->
<!-- banner -->
<div class="banner_w3lspvt" id="home">
	<div class="csslider infinity" id="slider1">
		<ul class="banner_slide_bg">
			<li>
				<div class="slider-info bg1">
					<div class="bs-slider-overlay">
						<div class="banner-text">
							<div class="container">
								<h2 class="movetxt agile-title text-capitalize"><sup><span class="fa fa-quote-left"></span></sup>Being healthy and fit isn’t a fad, it’s a lifestyle<sup><span class="fa fa-quote-right"></span></sup></h2>
								<p>Come, be a part of the largest growing community of fitness enthusiasts who inspire you to become a better version of yourself everyday</p>
								<a href="trial" class="btn btn-danger" style="background-color:red ;"> Book A Trial </a>
<!--                <a href="login" class="btn btn-danger" style="background-color:red ;"> Login  </a>-->
							</div>
						</div>
					</div>
				</div>
			</li>


		</ul>

	</div>
</div>
<!-- //banner -->
 <!-- banner bottom grids -->
    <section class="content-info py-5" id="about" name="about">
        <div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">About us</h3>

            <div class="info-w3pvt-mid text-center px-lg-5">

                <div class="title-desc text-center px-lg-5">
<!--					<img src="images/about.png" alt="news image" style="height:300px;" class="img-fluid">-->
                    <p class="px-lg-5">Residing in a metro city and witnessing people with unhealthy lifestyle and stressful routines, we observed how fitness had taken a back seat and become a long forgotten story. We, being fitness freaks, realized how important it is to make people prioritize health over everything else. This passion towards leading a healthy life and encouraging the masses for the same inspired us to start our own gym, which is running successfully since the year 2014.</p>
                    <!-- <a class="btn mt-lg-4 mt-3 read scroll" href="#services" role="button" style="background-color:red;">Learn More</a> -->
                    <br>
<h4>Why choose LMF?</h4>
                    <br>
<p class="px-lg-5">Already there are innumerable gyms in the city that are offering fine services, then why should you choose us?</p>

                    <p class="px-lg-5">Because we understood that advanced gym services and low prices seldom go together, and fitness enthusiasts have to compromise either on quality or on prices. This is where inception of LMF began. Since our aim is to reach out to masses, we came up with something which is affordable for everyone and provides world class facilities as well. Addressing this major concern, we started the LMF gym, and since then, there has been no looking back. </p>
                    <p class="px-lg-5">Located at a prime location in Bangalore, and with a strong base of satisfied customers, LMF has become a trusted name, because of the fitness programs, personal and group trainings and the best of gym facilities we offer at affordable prices. LMF is not just a gym, but a fitness hub that offers you interesting programs for your overall development like Body Building, Weight loss, Tabata, Strengthening and Rehabilitation workouts post Injury, and Yoga, led by a team of well qualified trainers who guide you to explore your healthy side.</p>
                    <p class="px-lg-5">Fitness to us is not just about sweating in the gym to become slim, but about having a complete package of a healthy body, mind and soul. Therefore we focus on your all round development by guiding you through perfect workout routines, healthy eating habits, and helping you attain a peaceful state of mind. Our experienced trainers work closely with you to understand your fitness goals and recommend a very practical and effective set of workouts with appropriate diet plans keeping in mind your body type and daily routine.</p>
                    <p class="px-lg-5">Join us today, push your limits and witness a healthy well-being.</p>

                </div>
            </div>
        </div>
    </section>
    <!-- //banner bottom grids -->


	<!-- pricing -->
<?php include "pricing_content.php"; ?>
<!-- //pricing -->


  <!--/order-now-->
    <section class="order-sec py-5">
        <div class="container py-md-5">
            <div class="test-info text-center">
                <h3 class="tittle order" style="color:red;">
                    <span>CALL US FOR ANY QUERIES</span>@</h3>
                <h4 class="tittle my-2">9886781967</h4>

                <div class="read-more mx-auto m-0 text-center">
                    <a href="contact.php" class="read-more scroll btn" >Drop a Mail <span class="fa fa-envelope"></span></a> </div>
            </div>
        </div>
    </section>
    <!--//order-now-->

 <!--/testimonials-->
    <section class="testimonials py-5" id="testimonials">
        <div class="container py-md-5">
               <h3 class="heading text-center mb-3 mb-sm-5">Client Reviews</h3>
            <div class="row mt-3">

                <div class="col-md-4 test-grid text-left px-lg-3">
                    <div class="test-info">

                        <p>Located in a good location, the gym is spread out on 2 floors, with all the equipments and machines, which are new/ in fairly new condition.
Trainers are awesome. Kudos to Ajay, he is very accessible and always has a happy to help attitude.
I would recommend this gym to all the fitness enthusiasts in the area!</p>
                        <h3 class="mt-md-4 mt-3"> Aakash Bhargava</h3>

                        <div class="test-img text-center mb-3">
                            <img src="<?php echo base_url(); ?>front_static/images/test1.png" class="img-fluid" alt="user-image" style="height:80px;">
                        </div>

                    </div>
                </div>
                <div class="col-md-4 test-grid text-left px-lg-3 py-sm-5 py-md-0 py-3">
                    <div class="test-info">

                        <p>Simply amazing.. The owner of the gym, Ajay gave me a diet plan four months back.. I am following it strictly and have lost 24 kgs in 4 months. Now my weight is 96 kgs. It was 120 four months back.. Fabulous gym and very supporting and friendly staff with clean and hygienic environment.<br><br></p>
                        <h3 class="mt-md-4 mt-3"> Ajitabh Das</h3>
                        <div class="test-img text-center mb-3">
                            <img src="<?php echo base_url(); ?>front_static/images/test2.png" class="img-fluid" alt="user-image" style="height:80px;">
                        </div>

                    </div>
                </div>
                <div class="col-md-4 test-grid text-left px-lg-3">
                    <div class="test-info">

                        <p>An amazing place to workout with the most effective equipments and necessary guidance. Trainers are professional with their guidance along with the most friendly attitude. Love to be a part of this gym. Most of the positive vibes given here!<br><br><br></p>
                        <h3 class="mt-md-4 mt-3">Shriiyaa Sridhar</h3>

                        <div class="test-img text-center mb-3">
                            <img src="<?php echo base_url(); ?>front_static/images/test3.png" class="img-fluid" alt="user-image" style="height:80px;">
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

<!--//testimonials-->
<!-- subscribe -->

<!-- footer -->
      <?php
      include "footer.php"
      ?>
    <!-- //footer -->
</body>
</html>
