<?php
  include 'header.php';
  include 'must.php';
 ?>

 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0 text-dark">Dashboard</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">Dashboard</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

 <section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
       <div class="col-lg-3 col-12" style="cursor:pointer;" onclick="window.location.href='workout/view'">
         <!-- small box -->
         <div class="small-box bg-info">
           <div class="inner">
             <h3>Workout Videos</h3>

             <p>@home</p>
           </div>
           <div class="icon">
             <i class="fas fa-dumbbell"></i>
           </div>
           <a href="<?php echo base_url(); ?>/workout/view" class="small-box-footer">Click To View <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <?php
         if ($user['type'] == "admin") {
        ?>
        <div class="col-lg-3 col-12" style="cursor:pointer;" onclick="window.location.href='workout/add'">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Add Video</h3>

              <p>only admin</p>
            </div>
            <div class="icon">
              <i class="fas fa-plus"></i>
            </div>
            <a href="<?php echo base_url(); ?>/workout/add" class="small-box-footer">Click To Add <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <?php } ?>
     </div>
   </div>
 </section>

<?php
  if ($user['type'] == "admin") {
 ?>
<?php } ?>

<?php
  if ($user['type'] == "sales") {
    // code...
 ?>
<?php } ?>

<?php
  if ($user['type'] == "trainer") {
    // code...
 ?>
<?php } ?>

<?php
  if ($user['type'] == "user") {
    // code...
 ?>
<?php } ?>

<?php
  include 'footer.php';
 ?>
