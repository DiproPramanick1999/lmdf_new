<?php
  include __DIR__ . "/../header.php";
  // $employeeid = $this->session->flashdata('employeeid');
  if (!($user['type'] == "admin")) {
    redirect(base_url());
  }
 ?>

 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Change Employee Photo</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url()."employee"; ?>">Employees</a></li>
           <li class="breadcrumb-item active">Photo</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <!-- left column -->
       <div class="col-md-6">
         <!-- general form elements -->
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">Change Photo Here</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
           <!-- <form role="form"> -->
             <div class="card-body">
               <div class="row">
                 <div class="col-md-6">
                   <center><img src="<?php echo base_url(); ?>back_static/profile/employee/<?php echo $pic; ?>" id="profile-pic" class="img-circle" style="width:200px;" alt=""> </center>
                 </div>
                 <div class="col-md-6" style="margin-top:50px;">
                   <center><button type="button" class="btn btn-default" name="button" data-toggle="modal" data-target="#exampleModal" onclick="startCam()">Change Photo</button>
                 </div>
               </div>

             </div>
             <!-- /.card-body -->
           <!-- </form> -->
         </div>
         <!-- /.card -->
       </div>
       <!--/.col (left) -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </section>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <center><video id="video" width="200" height="200" autoplay></video></center>
          </div>
          <div class="col-md-6">
              <center><canvas id="canvas" width="200" height="200"></canvas></center>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="snap">Capture</button>
      </div>
      <script type="text/javascript">
          var img;
          var video = document.getElementById('video');
          var canvas = document.getElementById('canvas');
          var context = canvas.getContext('2d');
          var video = document.getElementById('video');
          function startCam() {
            // Get access to the camera!
            if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
              // Not adding `{ audio: true }` since we only want video now
              navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                  //video.src = window.URL.createObjectURL(stream);
                  video.srcObject = stream;
                  video.play();
              });
            }
            context.clearRect(0, 0, canvas.width, canvas.height);
          }

          // Trigger photo take
          document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 200, 200);
            savePhoto();
            upload();
          });

          function savePhoto() {
            img = canvas.toDataURL('image/png');
            if (img) {
              document.getElementById("profile-pic").src = img;
            }
          }

          function upload() {
            if (img) {
              $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>employee/photoUpload",
                data: {
                  'photo': img,
                  'employeeid' : <?php echo $id; ?>
                },
                success: function (msg) {
                  alert("Employee photo updated.");
                  window.location.href = "<?php echo base_url()."employee" ?>";
                },
                error: function () {
                  alert("error");
                }
              });
            }else{
              alert("No new photo detected.");
            }
          }

      </script>
    </div>
  </div>
</div>

 <?php
   include __DIR__ . "/../footer.php";
  ?>
