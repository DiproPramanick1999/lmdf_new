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
         <h1>Add Plan Category</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>plan/view">Plan Category</a></li>
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
         <div class="col-md-6">
           <div class="card card-warning">
             <div class="card-header">
               <h3 class="card-title">Add Plan Category</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form role="form" method="post" action="<?php echo base_url()?>Plan/planCatUpdate">
                 <div class="row">
                  <?php
                        $url = $this->uri->segment_array();
                        $id = $this->uri->segment(3);
                        $ins = end($url);
                        if($ins == 'notUpdated'){
//                                     redirect(base_url() . "Plan/updatePlanCat/".$id);
                            echo '<p class="text-danger">Plan Category has not been updated.Please fill the details properly.</p>';
                        }

                     ?>
                   <div class="col-sm-12">
                     <!-- select -->
                     <div class="form-group">
                          <input type="text" name="plancat" class="form-control" placeholder="Enter Plan Category" value="<?php echo $planCatData->row()->category;?>">
                          <input type="text" name="id" style="display:none;"value="<?php echo $planCatData->row()->id;?>">
                          <span class="text-danger"><?php echo form_error("plancat"); ?></span>
                     </div>
                   </div>
                 </div>


        <div class="row">
              <div class="col">
                  <button type="submit" name="update" value="Update" id="buttn" class="btn btn-info float-right btn-block">Update Plan Category</button>
              </div>
               <div class="col">
                  <button type="submit" name="delete" value="Delete" id="buttn" class="btn btn-danger float-right btn-block">Delete</button>
              </div>
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
