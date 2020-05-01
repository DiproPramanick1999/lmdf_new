<?php
  include __DIR__ . "/../header.php";
 ?>

<?php
if ($user['type'] == "user") {
  ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Today's Pass</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Booking</a></li>
            <li class="breadcrumb-item active">Gym Pass</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<?php if ($valid){ ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Gym Pass For ID: <?php echo $user['userid']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- <form role="form"> -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <center><img src="<?php echo base_url(); ?>back_static/profile/user/<?php echo $user["profile_pic"]; ?>" id="profile-pic" class="img-circle" style="width:150px;" alt=""> </center>
                  </div>
                  <div class="col-md-6" >
                    <h3><?php echo $user['username']; ?></h3>
                    <h4>Date: <?php echo $date ?></h4>
                    <h4>Time: <?php echo $time ?></h4>
                    <center><p style="color:red;">24hr format</p></center>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            <!-- </form> -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

<?php }else{ ?>
  <section class="content">
    <div class="container-fluid">
        <h1>You have no bookings</h1>
      </div>
    </section>
<?php
 }
}elseif ($user['type'] == "trainer" || $user['type'] == "sales") {
 ?>
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Today's Clients</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Booking</a></li>
           <li class="breadcrumb-item active">Clients</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <section class="content">
   <div class="container-fluid">
     <?php if ($list->num_rows()>0) {
              foreach ($list->result() as $row) {  ?>
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <?php
                        $timeArr = array(
                          '5' => "5:00-6:00",
                          '6' => "6:30-7:30",
                          '8' => "8:00-9:00",
                          '9' => "9:30-10:30",
                          '11' => "11:00-12:00",
                          '12' => "12:30-13:30",
                          '14' => "14:00-15:00",
                          '15' => "15:30-16:30",
                          '17' => "17:00-18:00",
                          '18' => "18:30-19:30",
                          '20' => "20:00-21:00",
                          '21' => "21:30-22:30",
                        );
                         ?>
                        <h3 class="card-title">Client: <?php echo $row->userid; ?></h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <!-- <form role="form"> -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <center><img src="<?php echo base_url(); ?>back_static/profile/user/<?php echo $row->pic; ?>" id="profile-pic" class="img-circle" style="width:100px;" alt=""> </center>
                            </div>
                            <div class="col-md-6" >
                              <h3><?php echo $row->username; ?></h3>
                              <h4>Time: <?php echo $timeArr[$row->time]; ?></h4>
                              <center><p style="color:red;">24hr format</p></center>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      <!-- </form> -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                </div>

     <?php
              }
            }else{ ?>
                <h2>No Clients Today</h2>
     <?php } ?>
   </div>
 </section>
<?php } ?>
 <?php
   include __DIR__ . "/../footer.php";
  ?>
