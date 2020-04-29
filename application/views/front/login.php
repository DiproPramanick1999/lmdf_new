<?php
    if ($this->session->userdata("userid") != "") {
      redirect(base_url()."dashboard");
    }
    if ($this->session->flashdata("signup")) {
      echo "<script>alert('Registered Successfully. Please login to Continue');</script>";
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
        <?php include "header.php" ?>
        <!-- //header -->
        <!-- page details -->
        <div class="breadcrumb-agile">
        	<ol class="breadcrumb mb-0">
        		<li class="breadcrumb-item">
        			<a href="<?php echo base_url(); ?>">Home</a>
        		</li>
        		<li class="breadcrumb-item active" aria-current="page">Login</li>
        	</ol>
        </div>
        <!-- //page details -->
        <!-- //banner-botttom -->
        <section class="content-info py-5">
            <div class="container py-md-5">
                <div class="text-center px-lg-5">
                    <h3 class="heading text-center mb-3 mb-sm-5">Login</h3>
                </div>
                <div class="contact-w3pvt-form mt-5">
                    <form class="w3layouts-contact-fm" method="post" action="<?php echo base_url(); ?>separator/login_validation">
                      <p style="color:red;"><?php echo $this->session->flashdata("login_msg") . "<br>". $this->session->userdata("userid"); ?></p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="userid">User Id</label>
                                    <?php echo form_error("userid"); ?>
                                    <input class="form-control" type="number" name="userid" id="userid" placeholder="Enter User Id">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <?php echo form_error("password"); ?>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" >
                                </div>

                            </div>
                             <div class="form-group mx-auto mt-3">
                                <button class="btn submit" style="background-color:red;">Login</button>
                            </div>
                             <div class="form-group mx-auto mt-3">
                                <a href="#" onclick="window.location.href='forgot.php?forgot=<?php echo uniqid(true);?>'" >Forgot Password?</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- //banner-botttom -->
        <!-- footer -->
        <?php include "footer.php"?>
        <!-- //footer -->
    </body>
</html>
