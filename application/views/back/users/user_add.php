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
      <script type="text/javascript">
        var mob_valid = false;
        var email_valid = false;
        var planc_valid = false;
        var plan_valid = false;
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
                      <div class="input-group">
                      <input type="number" id="mobile" name="phone" onchange="mobile_validate()" value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Mobile Number" required>
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
                              url: '<?php echo base_url(); ?>user/mobile_validate',
                              data: {
                                'mobile' : $("#mobile").val()
                              },
                              success: function(msg) {
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
                      <input type="email" id="email" name="email" class="form-control" onchange="email_validate()" value="<?php echo $this->session->flashdata("email"); ?>" placeholder="Enter Email" required>
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
                              url: '<?php echo base_url(); ?>user/email_validate',
                              data: {
                                'email' : $("#email").val()
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
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Emergency Contact Number <span style="color:red">*</span> </label>
                      <input type="number" id="emernum" name="emerNum"  value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Emergency Contact Name <span style="color:red">*</span></label>
                    <input type="text" name="emerName" class="form-control" placeholder="Enter Contact Name" value="" required>
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
                    <input type="text" name="verification" class="form-control" id="verification" placeholder="Enter Verification Details" value="<?php echo $this->session->flashdata("verification"); ?>" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Address <span style="color:red">*</span></label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="" required>
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
                    <input type="text" id="other" name="others"  value="<?php echo $this->session->flashdata("mobile"); ?>" class="form-control" placeholder="Enter Health Issues" required>
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
                                <script type="text/javascript">
                                    planc_valid = false;
                                </script>
                              <?php else: ?>
                                <option value="<?php echo $row->category ?>"><?php echo ucwords($row->category); ?></option>
                                <script type="text/javascript">
                                    planc_valid = true;
                                </script>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Plan Term <span style="color:red">*</span></label>
                        <select class="form-control" onchange="getPlanDetails()" id="plans" name="plans">
                        </select>
                      </div>
                    </div>
                  </div>
                  <script type="text/javascript">
                    const plans = <?php echo json_encode($plans); ?>;
                    let plan;
                    function getPlans(){
                      var planC = $("#planC").val();
                      output = "";
                      if(planC in plans){
                        plan = plans[planC];
                        for (var i in plan) {
                          output += "<option>"+i+"</option>";
                        }
                        plan_valid = true;
                      }else {
                        plan = "none";
                        output += "<option>No Plans</option"
                        plan_valid = false;
                      }
                      $("#plans").html(output);
                      getPlanDetails();
                      submit_valid();
                    }
                    getPlans();
                  </script>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Joining <span style="color:red">*</span></label>
                        <div class="input-group">
                          <input type="date" class="form-control" id="joind" name="joind" onchange="expdDateChange()">
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
                          $('#joind').val(new Date().toDateInputValue());
                        </script>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Expiry</label>
                        <div class="input-group">
                          <input type="date" class="form-control" id="expd" name="expd" readonly>
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
                            <option value="<?php echo $key; ?>"><?php echo $value["name"]; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Time Slot <span style="color:red">*</span></label>
                        <select class="form-control" name="time" id="time_slot">
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
                        <input type="number" id="plan-price" name="plan_price" class="form-control" placeholder="Plan Price" readonly>
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
                <input type="hidden" name="tax_type" id="tax_type">
                <script type="text/javascript">
                  var years = 0;
                  var months = 0;
                  var price = 0;
                  var tax_type = "";
                  function expdDateChange() {
                    // Converting years and months to total months
                    var tot_month = 12*years + parseInt(months);
                    // Finding Expired Date
                    var joind = new Date($("#joind").val()+" 00:00:00");
                    joind.setMonth(joind.getMonth()+tot_month);
                    var joinM = joind.getMonth()+1;
                    var joinD = joind.getDate()-1;
                    var expd = joind.getFullYear() + "-" + (joinM<10?"0"+joinM:joinM) + "-" + (joinD<10?"0"+joinD:joinD);
                    $("#expd").val(expd);
                  }

                  function getPlanDetails(){
                    let sel_plan = plan[$("#plans").val()]
                    years = sel_plan["years"];
                    months = sel_plan["months"];
                    price = sel_plan["price"];
                    tax_type = sel_plan["tax_type"];
                    $("#plan-price").val(price);
                    $("#tax_type").val(tax_type);
                    expdDateChange();
                    payments_init();
                  }
                  getPlanDetails();
                </script>
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
                        <input type="number" id="discp" name="discp" class="form-control" onkeyup="discp_change()" placeholder="Enter Percentage" value="0">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cost to the Client<span style="color:red">*</span> </label>
                        <input type="number" id="discc" name="discc" class="form-control" onkeyup="discc_change()" placeholder="Cost to the Client">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Cash</label>
                          <input type="number" id="cash" name="cash" ="cost_calculation()" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Cash">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Card</label>
                          <input type="number" id="card" name="card" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Card" value="0">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Cheque</label>
                          <input type="number" id="cheque" name="cheque" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Cheque" value="0">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Online</label>
                          <input type="number" id="online" name="online" onkeyup="cost_calculation()" class="form-control" placeholder="Amount Paid By Online" value="0">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Amount Paid By Client</label>
                          <input type="number" id="apc" name="apc" class="form-control" placeholder="Amount Paid By Client" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Due Amount</label>
                          <input type="number" id="due" name="due" class="form-control" placeholder="Due Amount" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Due Payment Date(if applicable)</label>
                        <div class="input-group">
                          <input type="date" class="form-control" name="due_date" value="" id="due_date">
                          <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $('#due_date').val(new Date().toDateInputValue());
                    </script>
                  </div>
                  <script type="text/javascript">
                    function cost_calculation() {
                      var cash = parseInt($("#cash").val());
                      var card = parseInt($("#card").val());
                      var cheque = parseInt($("#cheque").val());
                      var online = parseInt($("#online").val());
                      $("#cash").val(cash);
                      $("#card").val(card);
                      $("#cheque").val(cheque);
                      $("#online").val(online);
                      var ctc = $("#discc").val()
                      if ((cash+card+cheque+online)>ctc) {
                        cash = card = cheque = online = 0;
                        $("#cash").val(0);
                        $("#card").val(0);
                        $("#cheque").val(0);
                        $("#online").val(0);
                      }

                      var apc = (cash+card+online+cheque);
                      $("#apc").val(apc);
                      $("#due").val(ctc-apc);
                    }

                    function payments_init() {
                      $("#discc").val(price);
                      $("#cash").val(0);
                      $("#card").val(0);
                      $("#cheque").val(0);
                      $("#online").val(0);
                      $("#discp").val(0);
                      cost_calculation();
                    }
                    payments_init();
                    function discp_change() {
                      let discp = parseInt($("#discp").val());
                      $("#discp").val(discp);
                      let discc = price;
                      if (discp>100 || discp<0 || isNaN(discp)) {
                        $("#discp").val(0);
                        $("#discc").val(price);
                        $("#cash").val(0);
                        $("#card").val(0);
                        $("#cheque").val(0);
                        $("#online").val(0);
                      }else {
                        let ctc = discc - (discc*discp/100);
                        $("#discc").val(ctc);
                        $("#cash").val(0);
                        $("#card").val(0);
                        $("#cheque").val(0);
                        $("#online").val(0);
                      }
                    }
                    function discc_change() {
                      let discc = parseInt($("#discc").val());
                      if (discc>price) {
                        $("#discp").val(0);
                        var val = 0;
                        $("#discc").val(price);
                        $("#cash").val(price);
                        $("#card").val(0);
                        $("#cheque").val(0);
                        $("#online").val(0);
                        $("#apc").val(price);
                        cost_calculation();
                      }else {
                        var val = ((price-discc)/price)*100;
                        $("#discc").val(discc);
                        $("#cash").val(0);
                        $("#card").val(0);
                        $("#cheque").val(0);
                        $("#online").val(0);
                        $("#apc").val(discc);
                        cost_calculation();
                      }
                      $("#discp").val(parseInt(val));
                    }
                  </script>
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
      plan_valid = false;
    }else {
      plan_valid = true;
    }
    if (mob_valid && email_valid && planc_valid && plan_valid && plan_valid) {
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
