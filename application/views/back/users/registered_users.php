<?php include __DIR__ . "/../header.php";
  if ($user["type"] != "admin") {
    redirect(base_url());
  }
?>
<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Registered Clients: <?php echo $count ?></h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Clients</a></li>
           <li class="breadcrumb-item active">Registered</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

    <section class="content" >
        <div class="container-fluid">
          <button class="btn btn-dark" onclick="window.location.href='<?php echo base_url() ?>/dashboard/registered_download'" style="margin-bottom:10px;">Download All Details Excel  <i class="fas fa-download"></i></button>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <!-- <h3 class="card-title">Fixed Header Table</h3> -->
                  <!-- <div class="card-tools">
                      <input type="date" class='datepicker' name="datepicker1" id="get_details"/>
                      <button class="btn btn-dark" id="btn">Get Details</button>

                  </div> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table id="customers">
                    <tr >
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone No.</th>
                      <th>Email</th>
                      <th>Address</th>
                    </tr>
                    <tbody id="table-body-employee" style="cursor:pointer;">
                      <?php echo $table; ?>
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

<?php include __DIR__ . "/../footer.php"; ?>
