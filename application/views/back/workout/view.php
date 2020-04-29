<?php
  include __DIR__ . "/../header.php";
 ?>
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>View Workouts</h1>
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
         <div class="card card-danger">
           <div class="card-header">
             <h3 class="card-title">View Workout</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <!-- <form> -->
             <div class="card-body">
               <div class="form-group">
                 <label>Muscle Group</label>
                 <select class="form-control" name="muscle" id="muscle">
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
                 <select class="form-control" name="week" id="week">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                 </select>
               </div>
             <!-- /.card-body -->
             <div class="card-footer">
               <button class="btn btn-danger btn-block" onclick="viewVideo()">View</button>
             </div>
           <!-- </form> -->
           <div class="row">
             <div class="col-md-12 iframe-container" id="video-div">
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <script type="text/javascript">
      function viewVideo() {
        // alert("hi")
        $.ajax({
          type : 'POST',
          url : "<?php echo base_url(); ?>workout/viewVideo",
          data: {
            'muscle' : $("#muscle").val(),
            'week' : $("#week").val(),
          },
          success : function (msg) {            
            $("#video-div").html(msg);
            // alert("success");
          },
          error : function (msg) {
            alert("Server Error, Try Later");
            // console.log(msg);
          }
        })
      }
   </script>

 </section>
 <?php
   include __DIR__ . "/../footer.php";
  ?>
