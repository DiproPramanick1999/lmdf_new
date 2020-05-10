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
         <h1>TAX</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>tax">Tax</a></li>
           <li class="breadcrumb-item active">Update Tax</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>
<!--===============================================================SLOT BOOKING========================================================-->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
         <div class="col-md-6">
           <div class="card card-warning">
             <div class="card-header">
               <h3 class="card-title">PRESENT VALUE OF TAX</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form role="form" method="post" action="<?php echo base_url()?>Tax/tax_update">
                <?php
                   $url = $this->uri->segment_array();
                   $ins = end($url);
                   if($ins == 'updated'){
                       echo '<p class="text-success">Tax has been updated successfully</p>';
                   }
                   ?>
                   <p class="text-info">Present cgst:-<?php echo " ".$tax_details->row()->cgst."%";?> and Present sgst:- <?php echo " ".$tax_details->row()->sgst."%";?></p>
                 <div class="row">
                    <div class="col-sm-6">
                     <input style="display:none;" type="number" name="id" class="form-control" value="<?php echo $tax_details->row()->id;?>">
                      <!-- select -->
                      <div class="form-group">
                        <label>SGST</label>
                        <input type="number" name="sgst" class="form-control" value="<?php echo $tax_details->row()->sgst;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>CGST</label>
                        <input type="number" name="cgst" class="form-control" value="<?php echo $tax_details->row()->cgst;?>">
                      </div>
                    </div>
                 </div>



              <div class="col-md-12">
                  <button type="submit" name="update" value="Update" id="buttn" class="btn btn-info float-right btn-block">Change</button>
                </div>
               </form>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
       </div>
     </div>
   </section>



<?php
  include __DIR__ . "/../footer.php";
 ?>
