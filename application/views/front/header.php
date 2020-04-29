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
<header>
	<div class="container">
		<div class="header d-lg-flex justify-content-between align-items-center">
			<div class="header-agile">
				<h1>
					<a class="navbar-brand logo" href="<?php echo base_url(); ?>" style="color:#ff3a3a;">
					 <img src="<?php echo base_url(); ?>front_static/images/logo.png" alt="" style="height:50px;"><img src="<?php echo base_url(); ?>front_static/images/logo1.png" alt="" style="width:170px;">
					</a>
				</h1>
			</div>
			<div class="nav_w3ls">
				<nav>
					<label for="drop" class="toggle mt-lg-0 mt-1"><span class="fa fa-bars" aria-hidden="true"></span></label>
					<input type="checkbox" id="drop" />
						<ul class="menu">

             <li class="mr-lg-3 mr-2 active"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="mr-lg-3 mr-2 active"><a href="<?php echo base_url(); ?>home/about">About Us</a></li>
            <li class="mr-lg-3 mr-2"><a href="<?php echo base_url(); ?>home/team">Team</a></li>
            <li class="mr-lg-3 mr-2"><a href="<?php echo base_url(); ?>home/pricing">Pricing</a></li>
            <li class="mr-lg-3 mr-2 p-0">
  		    <label for="drop-2" class="toggle">Services <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
  		        <a href="#">Services <span class="fa fa-angle-down" aria-hidden="true"></span></a>
  		        <input type="checkbox" id="drop-2"/>
  		        <ul class="inner-dropdown">
  								<li><a href="<?php echo base_url(); ?>home/facilities?p=cardio" >Cardio </a></li>
  								<li><a href="<?php echo base_url(); ?>home/facilities?p=group">Group Class </a></li>
                  <li><a href="<?php echo base_url(); ?>home/facilities?p=weights">Weights</a></li>
                  <li><a href="<?php echo base_url(); ?>home/facilities?p=tabata">Tabata</a></li>
                  <li><a href="<?php echo base_url(); ?>home/facilities?p=boxing">Boxing</a></li>
                  <li><a href="<?php echo base_url(); ?>home/facilities?p=yoga">Yoga</a></li>
  		        </ul>
            </li>
             <li class="mr-lg-3 mr-2"><a href="<?php echo base_url(); ?>home/login">Login</a></li>
             <li class="mr-lg-3 mr-2"><a href="<?php echo base_url(); ?>home_l/signup">Sign up</a></li>
             <!-- <li class="mr-lg-3 mr-2"><a href="<?php echo base_url(); ?>home/trials">Book Trial</a></li> -->
             <li class="mr-lg-3 mr-2"><a href="<?php echo base_url(); ?>home/contact">Contact Us</a></li>
             <!-- <li class="mr-lg-3 mr-2"><a href="blog">Blogs</a></li> -->
						</ul>
				</nav>
			</div>

		</div>
	</div>
</header>
</body>
</html>
