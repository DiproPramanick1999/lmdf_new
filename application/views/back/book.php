<?php
  include 'header.php';
 ?>

 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Book An Appointment</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item active">Book appointment</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>
<!--===============================================================SLOT BOOKING========================================================-->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
         <div class="col-md-10">
           <div class="card card-warning">
             <div class="card-header">
               <h3 class="card-title">SLOT BOOKING</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form role="form" method="post" action="<?php echo base_url()?>book_l/booking">
               <?php
                   if($this->uri->segment(2) == 'inserted'){
                       echo '<p class="text-success">Your Slot has been booked successfully</p>';
                   }
                   ?>

                <?php date_default_timezone_set("Asia/Calcutta");
                      $today = date('Y-m-d'); 
                      $tomorrow = date("Y-m-d", strtotime("+1 day"));
                      $this->session->userdata('userid');
                 ?>
                 <div class="row">
                   <div class="col-sm-6">
                     <!-- select -->
                     <div class="form-group">
                       <label>Day Available</label>
                       <select class="form-control" name="date" id="sel_date" onchange="checker()">
                         <option value="<?php echo $today;?>">Today</option>
                         <option value="<?php echo $tomorrow;?>">Tomorrow</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Time Available</label>
                       <select class="form-control" name="time" id="sel_time" onchange="checker()">
                         <option value="5">5:00-6:00</option>
                         <option value="6">6:30-7:30</option>
                         <option value="8">8:00-9:00</option>
                         <option value="9">9:30-10:30</option>
                         <option value="11">11:00-12:00</option>
                         <option value="12">12:30-13:30</option>
                         <option value="14">14:00-15:00</option>
                         <option value="15">15:30-16:30</option>
                         <option value="17">17:00-18:00</option>
                         <option value="18">18:30-19:30</option>
                         <option value="20">20:00-21:00</option>
                         <option value="21">21:30-22:30</option>
                       </select>
                     </div>
                   </div>
                 </div>
                 


              <div class="card-footer">
                  <button type="submit" name="insert" value="Insert" id="buttn" class="btn btn-info float-right btn-block">Book Slot</button>
                </div>
               </form>
             </div>
             <!-- /.card-body -->
           </div>
           <script>
                     console.log("hello");
                     function checker(){
                         console.log("hello");
                         $.ajax({
                             
                             type : 'POST',
                             url : '<?php echo base_url();?>book_l/checkAvailability',
                             data : {
                                 'date' : $("#sel_date").val(),
                                 'time' : $("#sel_time").val(),
                                 'id' : <?php echo $user['userid'];?>
                             },
                             success: function(msg){
                                 //alert(msg);
                                 if(msg!= 'Success'){
                                     console.log(msg);
                                     $("#buttn").attr('disabled',  "disabled");
                                     //alert("he");
                                     //alert(msg);
                                 }
                                 else{
                                     //
                                     console.log(msg);
                                     //alert('she');
                                    // alert("YYEESS");
                                     $("#buttn").removeAttr("disabled");
                                 }
                             },
                             error: function(msg){
                                 console.log(msg);
                                 alert("server error try again later");
                             }
                             
                         });
                     }
                            checker();
                   
                   </script>
          
           <!-- /.card -->
         </div>
       </div>
     </div>
   </section>

<?php
  include 'footer.php';
 ?>
