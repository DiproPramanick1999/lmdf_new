<?php
  include __DIR__ . "/../header.php";
  if (!($user['type'] == "user")) {
    redirect(base_url());
  }
 ?>

<!-- <div class="content-wrapper"> -->

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Personal Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."User/user_detail_view"; ?>">Personal</a></li>
          <li class="breadcrumb-item active">Details</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- general form elements disabled -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <center><img src="<?php echo base_url(); ?>back_static/profile/user/<?php echo $user_details->row()->pic;?>" id="profile-pic" class="img-circle" style="width:200px;" alt=""> </center>
                </div>
              </div>
              <!--<p style="color:red"><?php //echo $this->session->flashdata("emp_new_msg"); ?></p>-->
              <form method="post" action="">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>ID</label>
                      <input type="number" name="employeeid" class="form-control" placeholder="Enter ID" value="<?php echo $user['userid'];?>" disabled>
                      <input type="hidden" name="id" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $user_details->row()->name;?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="number" id="mobile" name="mobile" value="<?php echo $user_details->row()->phone;?>" class="form-control" placeholder="Enter Mobile Number" disabled>

                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" id="email" name="email" class="form-control" value="<?php echo $user_details->row()->email;?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="dob" value="<?php echo $user_details->row()->dob;?>" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Blood Group</label>
                      <div class="input-group">
                        <input type="text" name="doj" class="form-control" value="<?php echo $user_details->row()->blood;?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label>Emergency Number</label>
                      <div class="input-group">
                        <input type="text" name="doj" class="form-control" value="<?php echo $user_details->row()->emerNum;?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Emergency Name</label>
                      <div class="input-group">
                        <input type="text" name="doj" class="form-control" value="<?php echo $user_details->row()->emerName;?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                 <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Joining</label>
                      <div class="input-group">
                        <input type="text" name="doj" class="form-control" value="<?php echo $user_details->row()->joind;?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Expiry</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="dob" value="<?php echo $user_details->row()->expd;?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label>Plan Name</label>
                      <div class="input-group">
                        <input type="text" name="doj" class="form-control" value="<?php echo $user_details->row()->plans;?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status</label>
                      <div class="input-group">
                        <?php if ($user_details->row()->status == "Expire"): ?>
                        <input type="text" name="doj" class="form-control" value="Expired" disabled>
                        <?php else: ?>
                          <input type="text" name="doj" class="form-control" value="<?php echo $user_details->row()->status; ?>" disabled> 
                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer">
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

 <?php
   include __DIR__ . "/../footer.php";
  ?>
