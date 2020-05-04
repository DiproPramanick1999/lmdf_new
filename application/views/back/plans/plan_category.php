<?php
  include __DIR__ . "/../header.php";
 ?>

<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Add Plan Category</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item active">Add Plan Category</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>
<!--===============================================================SLOT BOOKING========================================================-->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
         <div class="col-md-8">
           <div class="card card-warning">
             <div class="card-header">
               <h3 class="card-title">Add Plan Category</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form role="form" method="post" action="<?php echo base_url()?>Plan/form_validation">
                 <div class="row">
                  <?php
                   if($this->uri->segment(2) == 'inserted'){
                       echo '<p class="text-success">Plan has been added successfully</p>';
                   }
                   ?>
                   <div class="col-sm-10">
                     <!-- select -->
                     <div class="form-group">
                          <input type="text" name="plancat" class="form-control" placeholder="Enter Plan Category">
                          <span class="text-danger"><?php echo form_error("plancat"); ?></span>
                     </div>
                   </div>
                 </div>



              <div class="col-md-10">
                  <button type="submit" name="insert" value="Insert" id="buttn" class="btn btn-info float-right btn-block">Add Plan Category</button>
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
