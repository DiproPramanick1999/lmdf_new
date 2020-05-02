<?php
  include __DIR__ . "/../header.php";
  if ($user["type"] != "admin") {
    redirect(base_url());
  }
 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-6">
          <div class="col-sm-6">
            <h1 class="text-primary">Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>book_l/client">Booking</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url().'back_static/profile/user/'.$client_data->row()->pic;?>" alt="User profile picture">
                </div>
                <h3 id="id"><?php echo $client_data->row()->userid;?></h3>
                <h3 class="profile-username text-center" id="name"><?php echo $client_data->row()->username;?></h3>
                <p class="text-muted text-center" id="userid"><?php echo $client_data->row()->phone;?></p>
                <h2 class="text-warning">Booking History</h2>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time Slot</th>
                    </tr>
                  </thead>
                  <tbody id="tbl">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
    <script type="text/javascript">
            $("#id").hide();
            function getDetails() {
                   $.ajax({
                     type: "POST",
                     url: "<?php echo base_url();?>book_l/clienttable",
                     data: {
                       'get_details' : $("#id").html(),
                     },
                     success: function (msg) {
                       $("#tbl").html(msg);
                     },
                     error: function (msg) {
                       alert(msg);
                     }
                   });
                 }
                 getDetails();

    </script>



<?php
  include __DIR__ . "/../footer.php";
 ?>
