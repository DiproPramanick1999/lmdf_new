<?php
  include __DIR__ . "/../header.php";
if(!($user['type'] == "admin")){
    redirect(base_url());
  }
 ?>


<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Plan Details</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>plan/view">Plans</a></li>
           <li class="breadcrumb-item active">View</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

    <section class="content"  style="margin-top:20px;">
        <div class="container-fluid">
          <button class="btn btn-dark" onclick="window.location.href='add'">Add Plan</button>  
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <!-- <h3 class="card-title">Fixed Header Table</h3> -->
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 100%;" onkeyup="getDetails()">
                      <input type="text" name="table_search" id="get_details" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" id="btn" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table id="customers">
                    <tr >
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Year</th>
                      <th>Month</th>
                    </tr>
                    <tbody id="table-body-plan" style="cursor:pointer;">
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
             <!-- /.card -->

             <script type="text/javascript">
                    $("#btn").click(function () {
                         getDetails();
                    });

                    $("#btn1").click(function () {
                         window.location.href="<?php echo base_url() ?>Plan/plan_view";
                    });

                 function getDetails() {
                   $.ajax({
                     type: "POST",
                     url: "<?php echo base_url();?>Plan/plan_details",
                     data: {
                       'get_details' : $("#get_details").val()
                     },
                     success: function (msg) {
                       $("#table-body-plan").html(msg);
                     },
                     error: function () {
                       alert("error");
                     }
                   });
                 }
                 getDetails();
                 
                 function viewPlan(id)
                 {
                     window.location.href="<?php echo base_url() ?>Plan/updatePlanAdd/"+id;
                 }

             </script>



<?php
  include __DIR__ . "/../footer.php";
 ?>
