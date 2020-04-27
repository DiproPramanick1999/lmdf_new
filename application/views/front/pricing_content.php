
<section class="pricing py-5">
	<div class="container py-md-5">
			<h3 class="heading text-capitalize text-center mb-3 mb-sm-5">Our Pricing</h3>
			<div class="row pricing-grids">
					<div class="col-lg-6  mb-lg-0 mb-5">
							<div class="padding">
					 				<h3>RATE CARD</h3>
									<!-- Item starts -->
                  <div class="menu-item">
										<div class="row border-dot no-gutters">
												<div class="col-8 menu-item-name">
													<h6>PLAN <br>&nbsp;</h6>
												</div>
												<div class="col-4 menu-item-price text-right">
													<h6>AMOUNT</h6>
												</div>
										</div>
									</div>
									<div class="menu-item mt-4">
										<div class="row border-dot no-gutters">
											<div class="col-8 menu-item-name">
												<h6>1 MONTH</h6>
											</div>
											<div class="col-4 menu-item-price text-right">
												<h6>₹2200</h6>
											</div>
									</div>
								</div>
								<!-- Item ends -->
								<!-- Item starts -->
								<div class="menu-item my-4">
									<div class="row border-dot no-gutters">
										<div class="col-8 menu-item-name">
											<h6>2 MONTHS</h6>
										</div>
										<div class="col-4 menu-item-price text-right">
											<h6>₹3250</h6>
										</div>
									</div>
								</div>
								<!-- Item ends -->
								<!-- Item starts -->
								<div class="menu-item">
									<div class="row border-dot no-gutters">
										<div class="col-8 menu-item-name">
											<h6>3 MONTHS + 1 MONTH</h6>
										</div>
										<div class="col-4 menu-item-price text-right">
											<h6>₹5250</h6>
										</div>
									</div>
								</div>
								<!-- Item ends -->
								<!-- Item starts -->
								<div class="menu-item mt-4">
									<div class="row border-dot no-gutters">
										<div class="col-8 menu-item-name">
											<h6>3 MONTHS + 3 MONTHS</h6>
										</div>
										<div class="col-4 menu-item-price text-right">
											<h6>₹6900</h6>
										</div>
									</div>
								</div>
                <div class="menu-item mt-4">
										<div class="row border-dot no-gutters">
											<div class="col-8 menu-item-name">
												<h6>6 MONTHS + 6 MONTHS</h6>
											</div>
											<div class="col-4 menu-item-price text-right">
												<h6>₹8900</h6>
											</div>
										</div>
								</div>
					<!-- Item ends -->
							</div>
					</div>
            <!--  ================ OFFER PIC           -->
					<div class="col-lg-6  mb-lg-0 mb-5" >
                <div class="padding" style="max-height:510px; height:510px">
										<h3>OFFERS</h3>
										<?php if ($offer_pic->num_rows()>0){
														foreach ($offer_pic->result() as $row) {
										?>
																<img src="<?php echo base_url();?>front_static/<?php echo $row->offer_pic ?>" style="width:100%;max-height:350px">
										<?php
														}
										 } ?>
                </div>
					</div>
			</div>
      <br>
      <div class="container">
					<div class="row">
		          <p style="color:red;">* No Hidden or additional Charges.</p>
					</div>
		      <div class="row">
		          <p style="color:red;">* Complementary Group Training.</p>
					</div>
		      <div class="row">
		            <p style="color:red;">* No Registration fee. </p>
					</div>
      </div>


	</div>
</section>
