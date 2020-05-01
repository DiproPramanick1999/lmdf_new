<?php
  include __DIR__ . "/../header.php";
 ?>
 

<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Customer Details</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"></a></li>
           <li class="breadcrumb-item active">Customer Details</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                 <button class="btn btn-dark" id="btn1">Get All Details</button>
                  <!-- <h3 class="card-title">Fixed Header Table</h3> -->
                  <div class="card-tools">
                      <input type="date" class='datepicker' name="datepicker1" id="get_details"/>
                      <button class="btn btn-dark" id="btn">Get Details</button>                  
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table id="customers">
                    <tr >
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone No.</th>
                      <th>Date</th>
                      <th>Time Slot</th>
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
                         window.location.href="<?php echo base_url() ?>book_l/client";
                    });
                 
                 function getDetails() {
                   $.ajax({
                     type: "POST",
                     url: "<?php echo base_url();?>book_l/date_pick",
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
