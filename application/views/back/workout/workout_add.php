<?php
  include __DIR__ . "/../header.php";
  if (!($user['type'] == "admin")) {
    redirect(base_url());
  }

  if ($this->session->flashdata('workout_check')=='success') {
    echo "<script>alert('Video Link Added.')</script>";
  }
 ?>
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Add Workout</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item active">Workout</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-md-6">
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">Add New Workout</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <form role="form" method="post" action="<?php echo base_url(); ?>workout/addlink">
             <div class="card-body">
               <div class="form-group">
                 <label>Muscle Group</label>
                 <select class="form-control" name="muscle">
                   <option>Chest</option>
                   <option>Biceps</option>
                   <option>Triceps</option>
                   <option>Back</option>
                   <option>Shoulders</option>
                   <option>Legs</option>
                   <option>Abs</option>
                   <option>Tabata</option>
                 </select>
               </div>
               <div class="form-group">
                 <label>Week</label>
                 <select class="form-control" name="week">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="linker">Enter Embed Link</label>
                 <input type="text" name="embed" class="form-control" id="linker" placeholder="Enter Embed Link" required>
               </div>
             </div>
             <!-- /.card-body -->

             <div class="card-footer">
               <button type="submit" class="btn btn-primary btn-block">Submit</button>
             </div>
           </form>
         </div>
       </div>

       <div class="col-md-6">
         <div class="card card-danger">
           <div class="card-header">
             <h3 class="card-title">Delete Workout Video</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <form role="form" method="post" action="<?php echo base_url(); ?>workout/addlink">
             <div class="card-body">
               <div class="form-group">
                 <label>Muscle Group</label>
                 <select class="form-control" name="muscle">
                   <option>Chest</option>
                   <option>Biceps</option>
                   <option>Triceps</option>
                   <option>Back</option>
                   <option>Shoulders</option>
                   <option>Legs</option>
                   <option>Abs</option>
                   <option>Tabata</option>
                 </select>
               </div>
               <div class="form-group">
                 <label>Week</label>
                 <select class="form-control" name="week">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                 </select>
               </div>
             <!-- /.card-body -->
             <div class="card-footer">
               <button type="submit" class="btn btn-danger btn-block">Delete</button>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <?php
   include __DIR__ . "/../footer.php";
  ?>
