<?php
  include __DIR__ . "/../header.php";
  if (!($user['type'] == "admin")) {
    redirect(base_url());
  }
 ?>


 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Your Employees</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item active">Employees</li>
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
                  <!-- <h3 class="card-title">Fixed Header Table</h3> -->

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" name="table_search" id="search" onkeyup="getEmployees()" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table id="customers">
                    <tr >
                      <th>ID</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Type</th>
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
                 function getEmployees() {
                   $.ajax({
                     type: "POST",
                     url: "<?php echo base_url() ?>employee/getEmployees",
                     data: {
                       'search' : $("#search").val(),
                     },
                     success: function (msg) {
                       console.log(msg);
                       $("#table-body-employee").html(msg);
                     },
                     error: function () {
                       alert("error");
                     }
                   });
                 }
                 getEmployees();

                 function viewEmployeeDetails(id) {
                   window.location.href="<?php echo base_url() ?>employee/view/"+id;
                 }
             </script>

 <?php
   include __DIR__ . "/../footer.php";
  ?>
