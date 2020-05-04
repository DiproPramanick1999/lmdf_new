<?php
  include __DIR__ . "/../header.php";
 ?>
 

<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Client Details</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Clients</a></li>
           <li class="breadcrumb-item active">Customer Details</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

    <section class="content" >
        <div class="container-fluid">
          <button class="btn btn-dark" id="btn1" style="margin-bottom:10px;">Get All Details</button>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <!-- <h3 class="card-title">Fixed Header Table</h3> -->
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
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

             </script>



<?php
  include __DIR__ . "/../footer.php";
 ?>