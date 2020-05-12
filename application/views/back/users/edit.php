<?php
  include __DIR__ . "/../header.php";
  if (!($user['type'] == "admin" || $user['type'] == "sales")) {
    redirect(base_url());
  }
  if ($this->session->flashdata("update") == "success") {
    echo "<script>alert('Updated Successfully')</script>";
  }
  if ($this->session->flashdata("new_user") == "success") {
    echo "<script>alert('Client Added Successfully')</script>";
  }

 ?>

<!-- <div class="content-wrapper"> -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit/Extension</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()."user/view"; ?>">Clients</a></li>
            <li class="breadcrumb-item active">Edit Client</li>
          </ol>
        </div>
      </div>
      <!-- DROPDOWN HERE -->
      <?php
       $page="edit";
       $url = $this->uri->segment_array();
       $userid = end($url);
       ?>
      <?php include 'dropdown.php'; ?>
    </div><!-- /.container-fluid -->
  </section>
<form method="post" action="<?php echo base_url(); ?>user/update">
  <section class="content">
    <div class="container-fluid">
      <script type="text/javascript">
        var mob_valid = true;
        var email_valid = true;
        var trainer_valid = false;
      </script>
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
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>ID</label>
                      <input type="number" name="id" class="form-control" placeholder="Enter ID" value="<?php echo $id; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name <span style="color:red">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Mobile Number <span style="color:red">*</span> </label>
                      <p style="color:red" id="mobile_msg"></p>
                      <div class="input-group">
                      <input type="number" id="mobile" name="phone" onchange="mobile_validate()" value="<?php echo $phone; ?>" class="form-control" placeholder="Enter Mobile Number" required>
                      <div class="input-group-append" id="mob-loader" style="display:none;">
                        <img src="<?php echo base_url(); ?>back_static/images/loader.gif" style="width:20px;">
                      </div>
                    </div>
                      <script>
                          function mobile_validate() {
                            var mob_loader = document.getElementById('mob-loader');
                            mob_loader.style.display = "block";
                            $.ajax({
                              type: 'POST',
                              url: '<?php echo base_url(); ?>user/mobile_validate_edit',
                              data: {
                                'mobile' : $("#mobile").val(),
                                'id' : <?php echo $id; ?>,
                                'existing' : "<?php echo $phone; ?>",
                              },
                              success: function(msg) {
                                console.log(msg);
                                if (msg == "success") {
                                  $("#mobile_msg").text("");
                                  $("#mobile").addClass("is-valid");
                                  $("#mobile").removeClass("is-invalid");
                                  mob_valid = true;
                                  submit_valid();
                                }else {
                                  $("#mobile_msg").text("Mobile Number exists or invaild.");
                                  $("#mobile").addClass("is-invalid");
                                  $("#mobile").removeClass("is-valid");
                                  mob_valid = false;
                                  submit_valid();
                                }
                                mob_loader.style.display = "none";

                              },
                              error: function () {
                                alert("not found");
                                mob_loader.style.display = "none";
                                mob_valid = false;
                                submit_valid();
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
                      <div class="input-group">
                      <input type="email" id="email" name="email" class="form-control" onchange="email_validate()" value="<?php echo $email; ?>" placeholder="Enter Email" required>
                      <div class="input-group-append" id="email-loader" style="display:none;">
                        <img src="<?php echo base_url(); ?>back_static/images/loader.gif" style="width:20px;">
                      </div>
                    </div>
                      <script>
                          function email_validate() {
                            var email_loader = document.getElementById('email-loader');
                            email_loader.style.display = "block";
                            $.ajax({
                              type: 'POST',
                              url: '<?php echo base_url(); ?>user/email_validate_edit',
                              data: {
                                'email' : $("#email").val(),
                                'id' : <?php echo $id; ?>,
                                'existing' : "<?php echo $email; ?>",
                              },
                              success: function(msg) {
                                if (msg == "success") {
                                  $("#email_msg").text("");
                                  $("#email").addClass("is-valid");
                                  $("#email").removeClass("is-invalid");
                                  email_valid = true;
                                  submit_valid();
                                }else {
                                  $("#email_msg").text("Email exists or invaild.");
                                  $("#email").addClass("is-invalid");
                                  $("#email").removeClass("is-valid");
                                  email_valid = false;
                                  submit_valid();
                                }
                                email_loader.style.display = "none";
                              },
                              error: function () {
                                alert("not found");
                                email_loader.style.display = "none";
                                email_valid = false;
                                submit_valid();
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
                      <label>Nationality<span style="color:red">*</span></label>
                      <select class="form-control" name="country">
                        <?php foreach ($nations as $row):?>
                            <option value="<?php echo $row->code; ?>" <?php if($row->code == $country){echo "selected";} ?>><?php echo $row->nation; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Birth <span style="color:red">*</span></label>
                      <div class="input-group">
                        <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required>
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
                      <label>Gender <span style="color:red">*</span></label>
                      <select class="form-control" name="gender">
                        <option <?php if($gender == "Male"){echo "selected";} ?>>Male</option>
                        <option <?php if($gender == "Female"){echo "selected";} ?>>Female</option>
                        <option <?php if($gender == "Other"){echo "selected";} ?>>Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Emergency Contact Number <span style="color:red">*</span> </label>
                      <input type="number" id="emernum" name="emerNum"  value="<?php echo $emerNum; ?>" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Emergency Contact Name <span style="color:red">*</span></label>
                    <input type="text" name="emerName" class="form-control" placeholder="Enter Contact Name" value="<?php echo $emerName; ?>" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Relationship with Emergency Contact <span style="color:red">*</span></label>
                    <input type="text" name="relation" class="form-control" placeholder="Enter Relation With Contact" value="<?php echo $relation; ?>" required>
                  </div>
                </div>
              </div>
                <!-- input states -->
                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Aadhar/Passport ID Number <span style="color:red">*</span></label>
                    <input type="text" name="verification" class="form-control" id="verification" placeholder="Enter Verification Details" value="<?php echo $verification; ?>" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Address <span style="color:red">*</span></label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="<?php echo $address ?>" required>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Blood Group <span style="color:red">*</span></label>
                      <select class="form-control" name="blood">
                        <option <?php if($blood == "A+"){echo "selected";} ?>>A+</option>
                        <option <?php if($blood == "A-"){echo "selected";} ?>>A-</option>
                        <option <?php if($blood == "B+"){echo "selected";} ?>>B+</option>
                        <option <?php if($blood == "B-"){echo "selected";} ?>>B-</option>
                        <option <?php if($blood == "AB+"){echo "selected";} ?>>AB+</option>
                        <option <?php if($blood == "AB-"){echo "selected";} ?>>AB-</option>
                        <option <?php if($blood == "O+"){echo "selected";} ?>>O+</option>
                        <option <?php if($blood == "O-"){echo "selected";} ?>>O-</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Height <span style="color:red">*</span></label>
                      <select class="form-control" name="height">
                        <?php for ($i=120; $i <=220 ; $i++) {
                          if ($i == $height) {
                            $sel = "selected";
                          }else{
                            $sel = "";
                          }
                          echo "<option ".$sel.">".$i."</option>";
                        } ?>
                      </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Weight<span style="color:red">*</span> </label>
                    <input type="number" id="weight" name="weight"  value="<?php echo $weight; ?>" class="form-control" placeholder="Enter Weight" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Other Health Issues<span style="color:red">*</span> </label>
                    <input type="text" id="other" name="others"  value="<?php echo $others; ?>" class="form-control" placeholder="Enter Health Issues" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
        <div class="col-md-6">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Plan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plan Category <span style="color:red">*</span></label>
                        <select class="form-control" id="planC" name="planC" disabled>
                          <option value="<?php echo $planC ?>"><?php echo ucwords($planC); ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plan Term <span style="color:red">*</span></label>
                        <select class="form-control" id="plans" name="plans" disabled>
                          <option value="<?php echo $plans ?>"><?php echo ucwords($plans); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Joining <span style="color:red">*</span></label>
                        <div class="input-group">
                          <!-- <?php echo $joind; ?> -->
                          <input type="date" class="form-control" id="joind" name="joind" value="<?php echo $joind; ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                          </div>
                        </div>
                        <script type="text/javascript">
                        // To get todays date in IST
                          Date.prototype.toDateInputValue = (function() {
                              var local = new Date(this);
                              local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                              return local.toJSON().slice(0,10);
                          });
                          // $('#joind').val(new Date().toDateInputValue());
                        </script>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Expiry</label>
                        <div class="input-group">
                          <input type="date" class="form-control" id="expd" name="expd" value="<?php echo $expd; ?>" min="<?php echo $expd; ?>">
                          <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Trainer <span style="color:red">*</span></label>
                        <select class="form-control" id="trainer" name="trainer" onchange="get_time_slot()">
                          <?php foreach ($trainers as $key => $value): ?>
                            <option value="<?php echo $key; ?>" <?php if($trainer==$value["name"]){echo "selected";} ?>><?php echo $value["name"]; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Time Slot <span style="color:red">*</span></label>
                        <select class="form-control" name="time" value="<?php echo $time; ?>" id="time_slot">
                        </select>
                      </div>
                    </div>
                    <script type="text/javascript">
                        const trainers = (<?php echo json_encode($trainers);  ?>);
                        function get_time_slot() {
                          let userid = $("#trainer").val();
                          let data = trainers[userid];
                          let output = "";
                          if(data["sch"] == "0"){
                            output += "<option>None</option>";
                          }else if (data["sch"] == "1") {
                            output += ("<option>" + data["ftimein"] + "</option>");
                          }else {
                            output += ("<option>" + data["ftimein"] + "</option>");
                            output += ("<option>" + data["stimein"] + "</option>");
                          }
                          $("#time_slot").html(output);
                        }
                        get_time_slot();
                    </script>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plan Price</label>
                        <input type="number" id="plan-price" name="plan_price" class="form-control" placeholder="Plan Price" value="<?php echo $discc; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Personal Training <span style="color:red">*</span></label>
                        <select class="form-control" name="pt">
                          <option value="1" <?php if($pt == 1){echo "selected";} ?>>Yes</option>
                          <option value="0" <?php if($pt == 0){echo "selected";} ?>>No</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Payments</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Discount Percentage<span style="color:red">*</span> </label>
                        <input type="number" id="discp" name="discp" class="form-control" placeholder="Enter Percentage" value="<?php echo $discp; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cost to the Client<span style="color:red">*</span> </label>
                        <input type="number" id="discc" name="discc" class="form-control" placeholder="Cost to the Client" disabled value="<?php echo $discc; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Cash</label>
                          <input type="number" id="cash" name="cash" class="form-control" placeholder="Amount Paid By Cash" value="<?php echo $cash; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Card</label>
                          <input type="number" id="card" name="card" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Card" value="<?php echo $card; ?>" disabled>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Cheque</label>
                          <input type="number" id="cheque" name="cheque" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Cheque" value="<?php echo $cheque; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Online</label>
                          <input type="number" id="online" name="online" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Online" value="<?php echo $online; ?>" disabled>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Client</label>
                          <input type="number" id="apc" name="apc" class="form-control" placeholder="Amount Paid By Client" value="<?php echo $apc; ?>" disabled>
                        </div>
                    </div>
                    <input type="hidden" name="invoice" value="<?php echo $invoice; ?>">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Due Amount</label>
                          <input type="number" id="due" name="due" class="form-control" placeholder="Due Amount" value="<?php echo $due_amt; ?>" disabled>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Due Payment Date(if applicable)</label>
                        <div class="input-group">
                          <input type="date" class="form-control" name="due_date" id="due_date" value="<?php echo $due_date ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="row">
      <!-- /.card-header -->
        <div class="col-sm-12">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-footer">
                  <button type="submit" id="user-add-btn" class="btn btn-danger btn-lg float-right btn-block">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  </section>
</form>
<script type="text/javascript">
  function submit_valid() {
    if ($("#trainer").val() == "-1") {
      trainer_valid = false;
    }else {
      trainer_valid = true;
    }
    if (mob_valid && email_valid && trainer_valid) {
      $("#user-add-btn").prop("disabled",false);
    }else {
      $("#user-add-btn").prop("disabled",true);
    }
  }

  submit_valid();
</script>

 <?php
   include __DIR__ . "/../footer.php";
  ?>
