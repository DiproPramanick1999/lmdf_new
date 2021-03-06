<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Leon Maestro De Fitness</title>
    <link rel = "icon" type = "image/png" href = "images/logo.png">
    <!-- For apple devices -->
    <link rel = "apple-touch-icon" type = "image/png" href = "images/logo.png"/>
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
   <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Fonts -->
    <script type="text/javascript" src="js/angular.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>

<body>

<!-- header -->
 <?php include "header.php"?>
  <!-- //header -->
<!-- banner -->
<section class="inner-page-banner" id="home">
</section>
<!-- //banner -->

<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb mb-0">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
	</ol>
</div>
<!-- //page details -->
<!-- //banner-botttom -->

<!-- Page Content -->
   <div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                              <?php if ($valid) {
                                ?>
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="<?php echo base_url(); ?>home/resetValidation">
                                    <p style="color:red;"><?php echo $this->session->flashdata('error_msg'); ?></p>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter password" class="form-control"  type="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                            <input id="confirmPassword" name="Cpassword" placeholder="Confirm password" class="form-control"  type="password" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="hidden" name="uid" value="<?php echo $uid ?>">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-danger" name="button">Reset Password</button>
                                    </div>
                                </form>
                              <?php }else {
                               ?>
                               <h3>This Link is Invalid</h3>
                             <?php } ?>
                            </div><!-- Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>
</div> <!-- /.container -->
<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->
</body>
</html>
