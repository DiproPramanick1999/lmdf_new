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
         <h1>Add Plan</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item active">Add Plan</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>
<!--===============================================================ADD PLAN========================================================-->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
         <div class="col-md-8">
           <div class="card card-warning">
             <div class="card-header">
               <h3 class="card-title">Add Plan</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form role="form" method="post" action="<?php echo base_url();?>Plan/add_plan">
                  <p style="color:red"><?php echo $this->session->flashdata("new_msg"); ?></p>
                  <div class="row">
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Plan Name</label>
                        <input type="text" name="plan_name" class="form-control" placeholder="Enter Plan Name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="plan_price" class="form-control" placeholder="Enter Price Amount">
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Plan category</label>
                        <select class="form-control" name="plan_cat">
                          <?php
                            if($plan_cat->num_rows() > 0)
                            {
                                ?>
                                <option style="display:none;" value="">Select Plan Category</option>
                                <?php
                                foreach($plan_cat->result() as $row)
                                {
                                    ?>
                                        <option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
                                    
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <option style="display:none;" value="">Select Plan Category</option>
                                <script type="text/javascript">
                                     function check(){
                                         $("buttn").attr("disabled", "disabled");
                                     }
                                    check();
                            
                                </script>
                                <?php
                                
                                
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Years</label>
                        <select class="form-control" name="plan_year" id="sel_year" onchange="checker()">
                          <option style="display:none;" value="">Select Years</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Months</label>
                        <select class="form-control" name="plan_month" id="sel_month" onchange="checker()">
                          <option style="display:none;" value="">Select Months</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>




              <div class="col-md-10">
                  <button type="submit" name="insert" value="Insert" id="buttn" class="btn btn-info float-right btn-block">Add Plan</button>
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
<script type="text/javascript">

        function checker(){
            var a,b;
            a=$("#sel_year").val();
            b=$("#sel_month").val();
            if(a==0 && b==0){
                $("#buttn").attr('disabled', 'disabled');
            }
            else{
                $("#buttn").removeAttr("disabled");
            }

        }
    checker();
</script>

<?php
  include __DIR__ . "/../footer.php";
 ?>
