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
         <h1>Plan Category Details</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>plan/view">Plan Category</a></li>
           <li class="breadcrumb-item active">View</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

    <section class="content" >
        <div class="container-fluid">
          <button class="btn btn-dark" onclick="window.location.href='categoryadd'">Add Plan Category</button>  
          <div class="row">
            <div class="col-12">
              <div class="card" style="margin-top:30px;">
                <div class="card-header">
                  <!-- <h3 class="card-title">Fixed Header Table</h3> -->
                  <div class="card-tools" >
                    <div class="input-group input-group-sm" style="width: 100%;">
                      <input type="text" name="table_search" id="get_details" onkeyup="getDetails()" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" id="btn" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <?php
                   $url = $this->uri->segment_array();
                   $ins = end($url);
                   if($ins == 'Updated'){
                      echo '<p class="text-success">Plan Category has been Updated</p>';
                  }
                   ?>
                   
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table id="customers">
                    <tr >
                      <th>Plan Category</th>
                    </tr>
                    <tbody id="table-body-employee" style="cursor:pointer;">
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
                         window.location.href="<?php echo base_url() ?>Plan/view";
                    });

                 function getDetails() {
                   $.ajax({
                     type: "POST",
                     url: "<?php echo base_url();?>Plan/details",
                     data: {
                       'get_details' : $("#get_details").val()
                     },
                     success: function (msg) {
                       $("#table-body-employee").html(msg);
                     },
                     error: function () {
                       alert("error");
                     }
                   });
                 }
                 getDetails();
                 
                 function viewPlanCat(id)
                 {
                     window.location.href="<?php echo base_url() ?>Plan/updatePlanCat/"+id;
                 }

             </script>



<?php
  include __DIR__ . "/../footer.php";
 ?>
