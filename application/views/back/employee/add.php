<?php
  include __DIR__ . "/../header.php";
  if (!($user['type'] == "admin")) {
    redirect(base_url());
  }
 ?>

<!-- <div class="content-wrapper"> -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Employee</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()."employee"; ?>">Employees</a></li>
            <li class="breadcrumb-item active">Add New Employee</li>
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
        <div class="col-md-6">
          <!-- general form elements disabled -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p style="color:red"><?php echo $this->session->flashdata("emp_new_msg"); ?></p>
              <form method="post" action="<?php echo base_url() ?>employee/detailCheck">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>ID</label>
                      <input type="number" name="employeeid" class="form-control" placeholder="Enter ID" value="<?php echo $new_id; ?>" disabled>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name <span style="color:red">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $this->session->flashdata("name"); ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Mobile Number <span style="color:red">*</span> </label>
                      <p style="color:red" id="mobile_msg"></p>
                      <input type="number" id="mobile" name="mobile" onchange="mobile_validate()" value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Mobile Number">
                      <script>
                          function mobile_validate() {
                            $.ajax({
                              type: 'POST',
                              url: '<?php echo base_url(); ?>employee/mobile_validate',
                              data: {
                                'mobile' : $("#mobile").val()
                              },
                              success: function(msg) {
                                console.log(msg);
                                if (msg == "success") {
                                  $("#mobile_msg").text("");
                                  $("#mobile").addClass("is-valid");
                                  $("#mobile").removeClass("is-invalid");
                                }else {
                                  $("#mobile_msg").text("Mobile Number exists or invaild.");
                                  $("#mobile").addClass("is-invalid");
                                  $("#mobile").removeClass("is-valid");
                                }
                              },
                              error: function () {
                                alert("not found");
                              }
                            })
                          }
                      </script>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email <span style="color:red">*</span></label>
                      <p style="color:red" id="email_msg"></p>
                      <input type="email" id="email" name="email" class="form-control" onchange="email_validate()" value="<?php echo $this->session->flashdata("email"); ?>" placeholder="Enter Email">
                      <script>
                          function email_validate() {
                            $.ajax({
                              type: 'POST',
                              url: '<?php echo base_url(); ?>employee/email_validate',
                              data: {
                                'email' : $("#email").val()
                              },
                              success: function(msg) {
                                if (msg == "success") {
                                  $("#email_msg").text("");
                                  $("#email").addClass("is-valid");
                                  $("#email").removeClass("is-invalid");
                                }else {
                                  $("#email_msg").text("Email exists or invaild.");
                                  $("#email").addClass("is-invalid");
                                  $("#email").removeClass("is-valid");
                                }
                              },
                              error: function () {
                                alert("not found");
                              }
                            })
                          }
                      </script>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Employee Type <span style="color:red">*</span></label>
                      <select class="form-control" name="type">
                        <option value="admin" <?php if($this->session->flashdata("etype") == 'admin') echo "selected"; ?>>Admin</option>
                        <option value="sales" <?php if($this->session->flashdata("etype") == 'sales') echo "selected"; ?>>Client Representative</option>
                        <option value="trainer" <?php if($this->session->flashdata("etype") == 'trainer') echo "selected"; ?>>Trainer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Birth <span style="color:red">*</span></label>
                      <div class="input-group">
                        <input type="date" class="form-control" name="dob" value="<?php echo $this->session->flashdata("dob"); ?>">
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Salary <span style="color:red">*</span></label>
                      <input type="number" name="salary" class="form-control" value="<?php echo $this->session->flashdata("salary"); ?>" placeholder="Enter Salary">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Joining <span style="color:red">*</span></label>
                      <div class="input-group">
                        <input type="date" name="doj" class="form-control" value="<?php echo $this->session->flashdata("doj"); ?>">
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- input states -->
                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Aadhar/Passport ID Number <span style="color:red">*</span></label>
                    <input type="text" name="verification" class="form-control" id="inputSuccess" placeholder="Enter Verification Details" value="<?php echo $this->session->flashdata("verification"); ?>">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Schedule<span style="color:red">*</span></label>
                      <div class="custom-control custom-radio" onchange="scheduleFun()">
                        <input class="custom-control-input radio-schedule" type="radio" value="0" id="customRadio1" name="scheduleRadio" checked>
                        <label for="customRadio1" class="custom-control-label">None</label>
                      </div>
                      <div class="custom-control custom-radio" onchange="scheduleFun()">
                        <input class="custom-control-input radio-schedule" type="radio" value="1" id="customRadio2" name="scheduleRadio">
                        <label for="customRadio2" class="custom-control-label">Once</label>
                      </div>
                      <div class="custom-control custom-radio" onchange="scheduleFun()">
                        <input class="custom-control-input radio-schedule" type="radio" value="2" id="customRadio3" name="scheduleRadio">
                        <label for="customRadio3" class="custom-control-label">Twice</label>
                      </div>
                    </div>
                    <script type="text/javascript">
                        function scheduleFun() {
                          var sch = $("input[name='scheduleRadio']:checked").val();
                          if (sch == 0) {
                            $(".ftime").hide();
                            $(".stime").hide();
                          }else if (sch == 1) {
                            $(".ftime").show();
                            $(".stime").hide();
                          }else{
                            $(".ftime").show();
                            $(".stime").show();
                          }
                        }
                        scheduleFun();
                    </script>
                  </div>
                </div>
                <div class="row ftime" style="display:none;">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>First Schedule Time In<span style="color:red">*</span> </label>
                      <input type="time" id="ftimein" name="ftimein" class="form-control" placeholder="Time In">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>First Schedule Time Out<span style="color:red">*</span> </label>
                      <input type="time" id="ftimeout" name="ftimeout" class="form-control" placeholder="Time In">
                    </div>
                  </div>
                </div>
                <div class="row stime" style="display:none;">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Second Schedule Time In<span style="color:red">*</span> </label>
                      <input type="time" id="stimein" name="stimein" class="form-control" placeholder="Time In">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Second Schedule Time Out<span style="color:red">*</span> </label>
                      <input type="time" id="stimeout" name="stimeout" class="form-control" placeholder="Time In">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right btn-block">Next</button>
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
