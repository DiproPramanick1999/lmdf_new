<?php
  include __DIR__ . "/../header.php";
  // $employeeid = $this->session->flashdata('employeeid');
  if (!($user['type'] == "user")) {
    redirect(base_url());
  }
 ?>

 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Change User Photo <?php if($user['profile_pic'] == 'default.png') echo " to continue."; ?></h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">User</a></li>
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
                   <center><img src="<?php echo base_url(); ?>back_static/profile/user/<?php echo $pic; ?>" id="profile-pic" class="img-circle" style="width:200px;" alt=""> </center>
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
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="savePhoto()">Save</button> -->
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
            console.log(img);
            if (img != 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAFIklEQVR4Xu3VsRHAMAzEsHj/pTOBXbB9pFchyLycz0eAwFXgsCFA4C4gEK+DwENAIJ4HAYF4AwSagD9IczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhH4AStUAMmSuOW2AAAAAElFTkSuQmCC') {
              document.getElementById("profile-pic").src = img;
            }else {
              img = '';
            }
          }

          function upload() {
            // window.location.href = ('<?php echo base_url() ?>user/photoUpload');
            if (img) {
              $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>user/photoUpload",
                data: {
                  'photo': img,
                  'userid' : <?php echo $id; ?>
                },
                success: function (msg) {
                  alert("Photo updated.");
                  window.location.href = "<?php echo base_url(); ?>";
                },
                error: function (msg) {
                  // alert(msg);
                  console.log(msg);
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
