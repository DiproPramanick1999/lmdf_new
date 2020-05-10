<?php
  include __DIR__ . "/../header.php";
//if(!($user['type'] == "admin")){
//    redirect(base_url());
//  }
 ?>

<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Update Plan</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>plan/view">Update Plan</a></li>
           <li class="breadcrumb-item active">Update Plan</li>
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
               <h3 class="card-title">Update Plan</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form role="form" method="post" action="<?php echo base_url();?>Plan/update_add_plan">
                  <p style="color:red"><?php echo $this->session->flashdata("new_msg"); ?></p>
                  <div class="row">
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="text" name="id" style="display:none;"value="<?php echo $planData->row()->id;?>">
                        <label>Plan Name</label>
                        <input type="text" name="plan_name" class="form-control" placeholder="Enter Plan Name" value="<?php echo $planData->row()->name;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="plan_price" class="form-control" placeholder="Enter Price Amount" value="<?php echo $planData->row()->price;?>">
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Plan category</label>
                        <select class="form-control" name="plan_cat">
                          <?php
                            if($plan_cat->num_rows() > 0)
                            {
                                ?>
                                <option value="<?php echo $planData->row()->category;?>"><?php echo $planData->row()->category;?></option>
                                <?php
                                foreach($plan_cat->result() as $row)
                                {
                                    if($row->category!=$planData->row()->category){
                                    ?>
                                       
                                        <option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>

                                    <?php
                                    }
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
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Tax</label>
                        <select class="form-control" name="plan_tax_type">
                          <option style="display:none;" value="<?php echo $planData->row()->tax_type;?>"><?php if($planData->row()->tax_type=='inclusive'){echo "Inclusive";}else{echo "Exclusive";}?></option>
                          <option value="inclusive">Inclusive</option>
                          <option value="exclusive">Exclusive</option>
                        </select>
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Years</label>
                        <select class="form-control" name="plan_year" id="sel_year"  onchange="checker()">
                          <option style="display:none;" value="<?php echo $planData->row()->years;?>"><?php echo $planData->row()->years;?></option>
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
                          <option style="display:none;" value="<?php echo $planData->row()->months;?>"><?php echo $planData->row()->months;?></option>
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




            <div class="row">
              <div class="col">
                  <button type="submit" name="update" value="Update" id="buttn" class="btn btn-info float-right btn-block">Update Plan Category</button>
              </div>
               <div class="col">
                  <button type="submit" name="delete" value="Delete" id="buttn" class="btn btn-danger float-right btn-block">Delete</button>
              </div>
        </div>
               </form>
               <div class="row">
               </div>
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
