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
        		<li class="breadcrumb-item active" aria-current="page">Trials</li>
        	</ol>
        </div>
        <!-- //page details -->
        <!-- //banner-botttom -->
            <section class="content-info py-5">
                <div class="container py-md-5">
                    <div class="text-center px-lg-5">
                        <h3 class="heading text-center mb-3 mb-sm-5">Book A Trial</h3>
                        <p style="color:red;"><?php echo $this->session->flashdata('response'); ?></p>
                    </div>

                        <form method="post" action="<?php echo base_url(); ?>home/trial_validation">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <?php echo form_error("first_name"); ?>
                                        <input class="form-control" type="text" name="first_name">
                                    </div>
                                </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <?php echo form_error("last_name"); ?>
                                        <input class="form-control" type="text" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <?php echo form_error("email"); ?>
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <?php echo form_error("phone"); ?>
                                        <input class="form-control" type="number" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" id="categoryList" name="category" onchange="ChangeTimeList()">
                                          <option value="Tabata">Tabata</option>
                                          <option value="Boxing">Boxing</option>
                                          <option value="Yoga">Yoga</option>
                                          <option value="Weight">Weight Training</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Slots</label>
                                        <select class="form-control" id="timeList" name="timings" onchange="weightTimeList()">
                                          <option value="Monday 7:00-8:00AM">Monday 7:00-8:00AM</option>
                                          <option value="Monday 8:00-9:00PM">Monday 8:00-9:00PM</option>
                                          <option value="Wednesday 7:00-8:00AM">Wednesday 7:00-8:00AM</option>
                                          <option value="Wednesday 8:00-9:00PM">Wednesday 8:00-9:00PM</option>
                                          <option value="Friday 7:00-8:00AM">Friday 7:00-8:00AM</option>
                                          <option value="Friday 8:00-9:00PM">Friday 8:00-9:00PM</option>
                                          <option value="Saturday 8:00-9:00PM">Saturday 8:00-9:00PM</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row weightClass" style="display:none;">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Timings</label>
                                        <select class="form-control" id="timeList1" name="weightTime">
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mx-auto mt-3">
                                  <button type="submit" class="btn submit" name="Submit">Book Trial</button>
                            </div>

                        </form>

                </div>
        </section>
        <!-- //banner-botttom -->

        <script>
            var groupTimings = {};
            groupTimings['Tabata'] = ['Monday 7:00-8:00AM', 'Monday 8:00-9:00PM', 'Wednesday 7:00-8:00AM', 'Wednesday 8:00-9:00PM','Friday 7:00-8:00AM', 'Friday 8:00-9:00PM','Saturday 8:00-9:00PM'];
            groupTimings['Boxing'] = ['Tuesday 7:30-9:00PM','Thursday 7:30-9:00PM','Saturday 7:30-9:00PM'];
            groupTimings['Yoga'] = ['Thursday 6:30-7:30AM'];
            groupTimings['Weight'] = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
            var timesList = ["5:00-6:00AM","6:00-7:00AM","7:00-8:00AM","8:00-9:00AM","9:00-10:00AM","10:00-11:00AM","11:00AM-12:00PM","12:00PM-1:00PM","1:00PM-2:00PM","2:00PM-3:00PM","3:00PM-4:00PM", "4:00PM-5:00PM","5:00PM-6:00PM","6:00PM-7:00PM","7:00PM-8:00PM","8:00PM-9:00PM","9:00PM-10:00PM"];
            function ChangeTimeList() {
              var categoryList = document.getElementById("categoryList");
              var timeList = document.getElementById("timeList");
              var selCat = categoryList.options[categoryList.selectedIndex].value;
              while (timeList.options.length) {
                timeList.remove(0);
              }
              var times = groupTimings[selCat];

              if(selCat == "Weight"){
                    document.querySelector(".weightClass").style.display = "block";
                    var weightList = document.getElementById("timeList1");
                    var i;
                    for (i = 0; i < timesList.length; i++) {
                        var time = new Option(timesList[i], timesList[i]);
                        weightList.options.add(time);
                    }
              }else{
                    document.querySelector(".weightClass").style.display = "none";
              }

              if (times) {
                var i;
                for (i = 0; i < times.length; i++) {
                  var time = new Option(times[i], times[i]);
                  timeList.options.add(time);
                }
              }


            }


            function weightTimeList(){
              var timeList = document.getElementById("timeList");
              var selCat = timeList.options[timeList.selectedIndex].value;
              var weightList = document.getElementById("timeList1");
              while (weightList.options.length) {
                weightList.remove(0);
              }
              if(selCat == "Sunday"){
                  var i;
                    for (i = 5; i < timesList.length; i++) {
                        var time = new Option(timesList[i], timesList[i]);
                        weightList.options.add(time);
                    }
              }else{
                  var i;
                    for (i = 0; i < timesList.length; i++) {
                        var time = new Option(timesList[i], timesList[i]);
                        weightList.options.add(time);
                    }
              }
            }
        </script>



        <div class="map-w3layouts">
            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d1682.3210560853051!2d77.6353390540868!3d13.01348413189024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3bae16df450f6e0f%3A0xd7405dfd47014d72!2sLeon%20Maestro%20De%20Fitness%2C%20Venkateshappa%20Layout%2C%20Kammanahalli%2C%20Bengaluru%2C%20Karnataka%20560043!3m2!1d13.013705499999999!2d77.6357879!4m5!1s0x3bae16df450f6e0f%3A0xd7405dfd47014d72!2sleon%20maestro%20de%20fitness!3m2!1d13.013705499999999!2d77.6357879!5e0!3m2!1sen!2sin!4v1572536814826!5m2!1sen!2sin" allowfullscreen=""></iframe>
        </div>
        <!-- footer -->
        <?php include 'footer.php';?>
        <!-- //footer -->

    </body>
</html>
