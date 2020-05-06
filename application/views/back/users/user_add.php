<?php
  include __DIR__ . "/../header.php";
  if (!($user['type'] == "admin" || $user['type'] == "sales")) {
    redirect(base_url());
  }
 ?>

<!-- <div class="content-wrapper"> -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Client</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()."user/view"; ?>">Clients</a></li>
            <li class="breadcrumb-item active">Add New Client</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<form method="post" action="<?php echo base_url(); ?>user/user_add">
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
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>ID</label>
                      <input type="number" name="employeeid" class="form-control" placeholder="Enter ID" value="<?php echo $id; ?>" disabled>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name <span style="color:red">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $this->session->flashdata("name"); ?>" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Mobile Number <span style="color:red">*</span> </label>
                      <p style="color:red" id="mobile_msg"></p>
                      <input type="number" id="mobile" name="mobile" onchange="mobile_validate()" value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Mobile Number" required>
                      <script>
                          function mobile_validate() {
                            $.ajax({
                              type: 'POST',
                              url: '<?php echo base_url(); ?>user/mobile_validate',
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
                      <input type="email" id="email" name="email" class="form-control" onchange="email_validate()" value="<?php echo $this->session->flashdata("email"); ?>" placeholder="Enter Email" required>
                      <script>
                          function email_validate() {
                            $.ajax({
                              type: 'POST',
                              url: '<?php echo base_url(); ?>user/email_validate',
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
                      <label>Nationality<span style="color:red">*</span></label>
                      <select class="form-control" name="nationality">
                        <?php foreach ($nations as $row):?>
                            <option value="<?php echo $row->code; ?>" <?php if($row->nation == "India"){echo "selected";} ?>><?php echo $row->nation; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Birth <span style="color:red">*</span></label>
                      <div class="input-group">
                        <input type="date" class="form-control" name="dob" value="<?php echo $this->session->flashdata("dob"); ?>" required>
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
                        <option value="admin" <?php if($this->session->flashdata("etype") == 'admin') echo "selected"; ?>>Male</option>
                        <option value="sales" <?php if($this->session->flashdata("etype") == 'sales') echo "selected"; ?>>Female</option>
                        <option value="trainer" <?php if($this->session->flashdata("etype") == 'trainer') echo "selected"; ?>>Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Emergency Contact Number <span style="color:red">*</span> </label>
                      <input type="number" id="emernum" name="emernum"  value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Emergency Contact Name <span style="color:red">*</span></label>
                    <input type="text" name="emername" class="form-control" placeholder="Enter Contact Name" value="" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Relationship with Emergency Contact <span style="color:red">*</span></label>
                    <input type="text" name="relation" class="form-control" placeholder="Enter Relation With Contact" value="<?php echo $this->session->flashdata("name"); ?>" required>
                  </div>
                </div>
              </div>
                <!-- input states -->
                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Aadhar/Passport ID Number <span style="color:red">*</span></label>
                    <input type="text" name="verification" class="form-control" id="inputSuccess" placeholder="Enter Verification Details" value="<?php echo $this->session->flashdata("verification"); ?>" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Address <span style="color:red">*</span></label>
                    <input type="text" name="address" class="form-control" id="inputSuccess" placeholder="Enter Address" value="" required>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Blood Group <span style="color:red">*</span></label>
                      <select class="form-control" name="blood">
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        <option>O+</option>
                        <option>O-</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Height <span style="color:red">*</span></label>
                      <select class="form-control" name="height">
                        <?php for ($i=120; $i <=220 ; $i++) {
                          echo "<option>".$i."</option>";
                        } ?>
                      </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Weight<span style="color:red">*</span> </label>
                    <input type="number" id="weight" name="weight"  value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Weight" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Other Health Issues<span style="color:red">*</span> </label>
                    <input type="text" id="other" name="other"  value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Health Issues" required>
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
                        <select class="form-control" id="planC" name="planC" onchange="getPlans()">
                          <?php foreach ($plan_category as $row): ?>
                            <?php if ($row == "No Plan Category"): ?>
                                <option><?php echo $row; ?></option>
                              <?php else: ?>
                                <option value="<?php echo $row->category ?>"><?php echo ucwords($row->category); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        <script type="text/javascript">
                          function getPlans(){
                            var planC = $("#planC").val();
                            $.ajax({
                              type : "POST",
                              url  : "<?php echo base_url(); ?>user/get_plans",
                              data : {
                                'planC' : planC
                              },
                              success : function(msg) {
                                // console.log(msg);
                                $("#plans").html(msg);
                              },
                              error   : function(msg) {
                                alert("Server Busy.");
                                // console.log(msg);
                              }
                            });
                          }
                          getPlans();
                        </script>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plan Term <span style="color:red">*</span></label>
                        <select class="form-control" id="plans" name="plan">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Joining <span style="color:red">*</span></label>
                        <div class="input-group">
                          <input type="date" class="form-control" id="joind" name="joind" onchange="change_expd()">
                          <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                          </div>
                        </div>
                        <script type="text/javascript">
                          Date.prototype.toDateInputValue = (function() {
                              var local = new Date(this);
                              local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                              return local.toJSON().slice(0,10);
                          });
                          $('#joind').val(new Date().toDateInputValue());
                          function change_expd() {
                            console.log(new Date($("#joind").val()));
                          }
                        </script>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Expiry</label>
                        <div class="input-group">
                          <input type="date" class="form-control" id="expd" name="expd" disabled>
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
                        <select class="form-control" name="trainer">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Time Slot <span style="color:red">*</span></label>
                        <select class="form-control" name="time">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plan Price</label>
                        <input type="number" id="plan-price" name="plan_price"  value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Plan Price" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Personal Training <span style="color:red">*</span></label>
                        <select class="form-control" name="pt">
                          <option value="1">Yes</option>
                          <option value="0" selected>No</option>
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
                        <input type="number" id="discp" name="discp" class="form-control" placeholder="Enter Percentage" value="0">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cost to the Client<span style="color:red">*</span> </label>
                        <input type="number" id="discc" name="discc" class="form-control" placeholder="Cost to the Client">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Cash</label>
                          <input type="number" id="cash" name="cash" class="form-control" placeholder="Amount Paid By Cash">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Card</label>
                          <input type="number" id="card" name="card" class="form-control" placeholder="Amount Paid By Card">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Cheque</label>
                          <input type="number" id="cheque" name="cheque" class="form-control" placeholder="Amount Paid By Cheque">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Online</label>
                          <input type="number" id="online" name="online" class="form-control" placeholder="Amount Paid By Online">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Client</label>
                          <input type="number" id="apc" name="apc" class="form-control" placeholder="Amount Paid By Client">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Due Amount</label>
                          <input type="number" id="due" name="due" class="form-control" placeholder="Due Amount">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Due Payment Date(if applicable)</label>
                        <div class="input-group">
                          <input type="date" class="form-control" name="due_date" value="">
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
<?php if ($plan_category[0] == "No Plan Category"): ?>
  <script type="text/javascript">
    $("#user-add-btn").prop("disabled",true);
  </script>
<?php endif; ?>
 <?php
   include __DIR__ . "/../footer.php";
  ?>
