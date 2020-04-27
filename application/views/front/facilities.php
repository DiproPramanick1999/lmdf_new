<?php
    if ($this->session->userdata("userid") != "") {
      redirect(base_url()."dashboard");
    }
 ?>
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
        <style>
            .tablink {
                background-color: #555;
                color: white;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 10px;
                font-size: 15px;
                width: 16%;
                border-left: 1px solid white;
              }

          .tablink:hover {
            background-color: #777;
          }

          /* Style the tab content (and add height:100% for full page content) */
          .tabcontent {
            color: white;
            display: none;
            padding: 100px 20px;
            height: 100%;
          }
        </style>
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
    		<li class="breadcrumb-item active" aria-current="page">Facilities</li>
    	</ol>
    </div>
    <!-- //page details -->
    <!-- //banner-botttom -->
    <section class="content-info py-5">
      <div class="text-center px-lg-5">
          <button class="tablink" onclick="openPage('cardio', this)" id="cs" style="width:18%">Cardio</button>
          <button class="tablink" onclick="openPage('group', this)" id="gc">Group</button>
          <button class="tablink" onclick="openPage('yoga', this)" id="yo" >Yoga</button>
          <button class="tablink" onclick="openPage('tabata', this)" id="tc">Tabata</button>
          <button class="tablink" onclick="openPage('boxing', this)" id="bc">Boxing</button>
          <button class="tablink" onclick="openPage('weights', this)" id="ws" style="width:18%">Weights</button>

      <div id="cardio" class="tabcontent">
          <p>
            Any physical activity or exercise that increases your heart rate is a cardio exercise. LMF has the best of machines for cardio training,
            like treadmills, elliptical trainers, stationary bikes, climbers and more. This is for all those who intend to lose weight,
            increase stamina and closely work on improving your aerobic capacity. Apart from these benefits, cardiovascular activities help you
            strengthen your respiratory system and heart, and set a foundation for a toned body by burning that stubborn fat.
          </p>
          <br><br><br><br>
          <img src="<?php echo base_url(); ?>front_static/images/cardio.png">

      </div>

      <div id="group" class="tabcontent">
          <p>One latest fitness trend that is gaining popularity these days is Group training. At LMF, we have group training sessions where our
             trainers lead a group of people for strength training, HIIT, Boxing, Yoga and much more. These sessions are conducted on a 1000 sq ft
             spacious hall for <b><i>Free of Cost</i></b>
          </p>
          <br><br><br><br>
          <img src="<?php echo base_url(); ?>front_static/images/group.png">
      </div>

      <div id="weights" class="tabcontent">
        <p>Weight training is the most popular form of workout. At LMF, we have the best equipment and quality weights where we train you
           to tone your body with different workout regimes like, Biceps and Triceps, Shoulder muscles, Chest, Lats, Back, Thighs and Legs.
           Weight training is not all about how heavy you can lift, it’s about how technically and efficiently you can lift weights so
           that the exact muscles get toned. Our trainers are expert in providing this training. Apart from that, our training program is
           also inclined towards injury recovery, where we help you recover from fractures, hamstring injury, muscle strain and slip disc.
        </p>
        <br><br><br><br>
        <img src="<?php echo base_url(); ?>front_static/images/weight1.png">

      </div>

      <div id="tabata" class="tabcontent">
          <p>Originated from Japan by a scientist Dr. Izumi Tabata and his team, Tabata is a popular form of
            high-intensity interval training (HIIT), featuring a series of exercises which last four minutes each.
            The structure of Tabata has an HIIT workout for 20 seconds and rest for 10 seconds. This is one set; you have to complete eight sets
            of each exercise. As compared to any other form of workout, Tabata has the highest impact on both, the aerobic and
            anaerobic system. At LMF, we train people in groups for this, which includes squats, push-ups, burpees and many other
            exercises that work on your large muscle groups. This workout is intended towards, weight loss, boosting your metabolism,
            improving your bone mass density and stamina. If you are short of time, and you need to work out as well, Tabata is for you.
          </p>
          <br><br><br><br>
          <img src="<?php echo base_url(); ?>front_static/images/tabata.png">

      </div>
      <div id="boxing" class="tabcontent">
          <p>Boxing is not just a sport, but also a form of high intensity training that increases your metabolism, burns good number of calories
             while you train, and burns even more when you are out of the gym. At LMF, we train people who have an affinity towards boxing and
             self-defense, through equipment and personal trainers. Here you will learn the technique of throwing the 6 basic punches,
             the technique of getting back to stance after each punch and to throw while moving. It is a great form of training for total body
             strength and power since it uses the entire body from head to toe.
           </p>
          <br><br><br><br>
          <img src="<?php echo base_url(); ?>front_static/images/boxing1.png">

      </div>
      <div id="yoga" class="tabcontent">
          <p>The most ancient form of fitness, yoga, is based on the principle of balance between mind, body and soul. With stress and
            anxiety becoming as common as cold and flu these days, the first thing that goes out of balance is our breath. This means less oxygen
            to the body and more carbon dioxide storage, which leads to several other health issues. So bringing our breath back to balance
            is the first step towards managing stress. At LMF, our experienced yoga instructors help you get this right by guiding
            you towards right body postures, meditation and most importantly-healthy breathing patterns that help you get ample oxygen,
            making you achieve balance between mind, body and soul.
          </p>
          <br><br><br><br>
          <img src="<?php echo base_url(); ?>front_static/images/yoga.png">

      </div>
      <script>
          var url = window.location.href;
          var url_id = (url.split("?")[1]).split("=")[1];
          var p = url_id;
          var e;
          if(p == "cardio")
              e = "cs";
          else if(p == "group")
              e = "gc";
          else if(p == "weights")
              e = "ws";
          else if(p == "tabata")
              e = "tc";
          else if(p == "yoga")
              e = "yo";
          else{
              e = "bc";
              p = "boxing";
          }
          e = document.getElementById(e);
          openPage(p,e);
          function openPage(pageName,elmnt) {
              color = "rgb(192,36,36)";
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablink");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
              }
              document.getElementById(pageName).style.display = "block";
              elmnt.style.backgroundColor = color;
          }
          // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
      </script>
      <br><br>
    </div>
  </section>
        <!-- //banner-botttom -->
        <!-- footer -->
        <?php include 'footer.php';?>
        <!-- //footer -->
  </body>
</html>
