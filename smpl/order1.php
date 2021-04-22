<?php include_once("../incl/header.php");?>
<!-- page content -->

<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		    <div class="" role="tabpanel" data-example-id="togglable-tabs">
		    	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
			      	<li role="presentation" class="active"><a href="tailormade.php" id="home-tab" role="tab" >Tailormade</a>
			      	</li>
			      	<li role="presentation" class=""><a href="hire.php" role="tab" id="profile-tab" >Hire</a>
			      	</li>
			      	<li role="presentation" class=""><a href="readymade.php" role="tab" id="profile-tab2" >Readymade</a>
			      	</li>
		    	</ul>
		    	<div id="myTabContent" class="tab-content">
			      	<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						<div class="row">
				            <div class="col-md-12 col-sm-12 col-xs-12">
				                <div class="x_panel">
									<div class="x_title" style="height:30px">
										<h2>Create Order <small>Sessions</small></h2>
									</div>
									
									<div class="x_content">
					                    <!-- Smart Wizard -->
					                    <div id="wizard" class="form_wizard wizard_horizontal">
								          	<ul class="wizard_steps">
												<li>
													<a href="#step-1">
														<span class="step_no">1</span>
														<span class="step_descr">
															Step 1<br />
														<small>Customer Details</small>
														</span>
													</a>
												</li>
												<li>
													<a href="#step-2">
														<span class="step_no">2</span>
														<span class="step_descr">
															Step 2<br />
														<small>Select Style</small>
														</span>
													</a>
												</li>
												<li>
													<a href="#step-3">
														<span class="step_no">3</span>
														<span class="step_descr">
															Step 3<br />
														<small>Measurement Details</small>
														</span>
													</a>
												</li>
												<li>
													<a href="#step-4">
														<span class="step_no">4</span>
														<span class="step_descr">
															Step 4<br />
														<small>Order Details</small>
														</span>
													</a>
												</li>
											</ul>
					                      	<div id="step-1">
					                      		<div class="col-md-12 col-sm-12 col-xs-12">
					                      		  	<div class="col-md-6 col-sm-6 col-xs-6">
					                      		    		<h2>Add or Select the customer</h2>
					                      		  	</div>
					                      		  	<div class="col-md-6 col-sm-6 col-xs-6">
					                      		    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">  <span><i class="fa fa-plus"></i></span>   New Customer</button>
					                      		  	</div>
					                      		</div>
					                      		<div class="col-md-12 col-sm-12 col-xs-12" style="height: 450px">
		                		                	<!-- old customer -->
		                		                  	<table id="customertable" class="table table-striped table-bordered">
		                		                		<thead>
		                			                  	    <tr>
		                			                  	      <th>ID No</th>
		                			                  	      <th>Customer Name</th>
		                			                  	      <th>NIC</th>
		                			                  	      <th>Email</th>
		                			                  	      <th>Option</th>
		                			                  	    </tr>
		                		                  		</thead>
		                			                  	<tbody>
		                			                  	    
		                			                  	</tbody>
		                		                  	</table>
		                		                </div>
		                		                <!-- modals -->
												<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">

															<div id="formpanel" class="x_panel">
												                <!-- new customer -->
												                <div class="x_content">
																	<div class="modal-header">
													            		<div class="x_title">
													                    	<h2>Enter Customer details</h2>
													                    	<div class="clearfix"></div>
													                	</div>
																	</div>
																	<div class="modal-body">
																		<form id="customerform" class="form-horizontal form-label-left" novalidate="">
																			<input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtfname">First Name <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input id="txtfname" class="form-control col-md-7 col-xs-12"  name="txtfname" placeholder="first name(s) e.g Jon" required="required" type="text">
																				</div>
																			</div>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlname">Last Name <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input id="txtlname" class="form-control col-md-7 col-xs-12" name="txtlname" placeholder="last name(s) e.g Doe" required="required" type="text">
																				</div>
																			</div>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtnic">NIC <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input id="txtnic" class="form-control col-md-7 col-xs-12" name="txtnic" placeholder="123456789V" required="required" type="text">
																				</div>
																			</div>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttel">Telephone <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																				<input type="tel" id="txttel" name="txttel" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
																				</div>
																			</div>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail">Email <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input type="email" id="txtemail" name="txtemail" required="required" class="form-control col-md-7 col-xs-12">
																				</div>
																			</div>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemailcon">Confirm Email <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input type="email" id="txtemailcon" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
																				</div>
																			</div>                            
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtaddress">Address <!-- <span class="required">*</span> -->
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<textarea id="address"  name="address" class="form-control col-md-7 col-xs-12"></textarea>
																				</div>
																			</div>
																			<div class="ln_solid"></div>
																			<div class="form-group">
																				<div class="col-md-6 col-md-offset-3">
																					<button id="btnrest" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
																					<button id="submit" class="btn btn-success" onclick="addCustomer();">Save and Select</button>
																					<button id="update" style="display: none;" class="btn btn-success" onclick="selectEmployee();">Select</button>
																				</div>
																			</div>
																			<div class="ln_solid"></div>
																		</form>		
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearData();">Close</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
					                      	</div>
					                      	<div id="step-2">
							              		<div class="row">
								              		<div class="col-md-12 col-sm-12 col-xs-12">
						          	      				<div class="x_title">
						          	        				<h2>Styles Info</h2>
						          	        				<div class="clearfix"></div>
						          	      				</div>
								            	        <form id="styleform" class="form-horizontal form-label-left" novalidate>
								            	        	<p>Select suitable styles</p>
								            	        	<div class="col-lg-12">
									  	                		<ul id="itemcat" class="nav nav-pills" role="tablist">
									  	                		  <li role="presentation" class="dropdown">
									  	                		    <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Item<span class="caret"></span></a>
									  	                		    <ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
									  	                		      
									  	                		    </ul>
									  	                		  </li>
									  	                		</ul>
									  	                	</div>
									  	                	<!-- <div class="col-lg-6">
									  	                		<ul class="nav nav-pills" role="tablist">
									  	                		  <li role="presentation" class="dropdown">
									  	                		    <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Pieces<span class="caret"></span></a>
									  	                		    <ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
									  	                		      <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#">Shirt</a>
									  	                		      </li>
									  	                		      <li role="presentation"><a id="li2" role="menuitem" tabindex="-1" href="#">Trousers</a>
									  	                		      </li>
									  	                		      <li role="presentation"><a id="li3" role="menuitem" tabindex="-1" href="#">Saree/ blouse</a>
									  	                		      </li>		  	                		      
									  	                		      <li role="presentation"><a id="li4" role="menuitem" tabindex="-1" href="#">Frocks</a>
									  	                		      </li>
									  	                		    </ul>
									  	                		  </li>
									  	                		</ul>
									  	                	</div> -->
									  	                	<div class="col-lg-12">
									  	                		<span class="section"></span>
									  	                	</div>
									  	                	<div id="styletable" class="raw ">
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									  	                			<form action="../controllers/upload.php" method="post" enctype="multipart/form-data" class="dropzone" style="min-height:190px"></form>
									  	                			<form action="#" class="dropzone" style="min-height:190px" ></form>
									  	                		</div>
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                	</div>
									  	                	<div class="raw ">
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									                			    <div class="thumbnail">
									                			        <div class="image view view-first">
									                			        	<img style="width: 100%; display: block;" src="../production/images/media.jpg" alt="image">
									                			        	<div class="mask">
									                			          		<p>Your Text</p>
									                			        	    <div class="tools tools-bottom">
									                			                <a href="#"><i class="fa fa-link"></i></a>
									                			            		<a href="#"><i class="fa fa-pencil"></i></a>
									                			            		<a href="#"><i class="fa fa-times"></i></a>
									                			          		</div>
									                			        	</div>
									                			      	</div>
									                			      	<div class="radio col-lg-3">
									                			      		<label class="">
											                			      	<div class="iradio_flat-green" style="position: relative;">
											                			      		<input type="radio" class="flat" name="style" id="id" value="id" style="position: absolute; opacity: 0;">
											                			      		<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											                			      	</div>
											                			    </label>
									                			      	</div>
									                			      	<div class="caption col-lg-9">
									                			      		<p>
									              			      		    Snow and Ice Incoming for the South</p>
									                			      	</div>
									                			    </div>
									  	                		</div>
									  	                	</div>
								              	        	<div class="form-group">
								              	          		<div class="col-md-6 col-md-offset-9">
								              	            		<button id="sendmeasurment" type="submit" class="btn btn-primary">Select</button>
								              	          		</div>
								              	        	</div>
								              	      	</form>
									  	                <div class="clearfix"></div><br>
								            	        <table id="styletable" class="table table-striped table-bordered">
								            	          <thead>
								            	            <tr>
								            	              <th>No</th>
								            	              <th>Item</th>
								            	              <th>Piece</th>
								            	              <th>Style</th>
								            	              <th>Codes</th>
								            	              <th>Edit</th>
								            	              <th>Delete</th>
								            	            </tr>
								            	          </thead>
								            	          <tbody>
								            	          	
								            	          </tbody>
								            	        </table>
								            		</div>
								            	</div>
									       	</div>
									        <div id="step-3">
									           	<div class="row">
										           	<div class="col-md-12 col-sm-12 col-xs-12">
										         	    <div class="x_panel">
											              	<div class="x_title">
											                	<h2>Measurement Info</h2>
											                	<div class="clearfix"></div>
											              	</div>
											              	<div class="x_content">
														       	<form class="form-horizontal form-label-left" novalidate>
											          	        	<p>Enter  by selecting the item Measurement</p>
											          	        	<div class="col-lg-6">
											  	                		<ul class="nav nav-pills" role="tablist">
											  	                		  <li role="presentation" class="dropdown">
										  	                		    	<a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Item<span class="caret"></span></a>
											  	                		    <ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
											  	                		      <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#">Shirt</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#">t-Shirt</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li2" role="menuitem" tabindex="-1" href="#">Trousers</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#">Blazer</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li3" role="menuitem" tabindex="-1" href="#">Saree</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#">Blouse</a></li>	  	                		      
											  	                		      <li role="presentation"><a id="li4" role="menuitem" tabindex="-1" href="#">Frocks</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li4" role="menuitem" tabindex="-1" href="#">Uniforms</a>
											  	                		      </li>
											  	                		    </ul>
											  	                		  </li>
											  	                		</ul>
											  	                	</div>
										              	        	<!-- <div class="col-lg-6">
											  	                		<ul class="nav nav-pills" role="tablist">
											  	                		  <li role="presentation" class="dropdown">
											  	                		    <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Pieces<span class="caret"></span></a>
											  	                		    <ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
											  	                		      <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#">Shirt</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li2" role="menuitem" tabindex="-1" href="#">Trousers</a>
											  	                		      </li>
											  	                		      <li role="presentation"><a id="li3" role="menuitem" tabindex="-1" href="#">Saree/ blouse</a>
											  	                		      </li>		  	                		      
											  	                		      <li role="presentation"><a id="li4" role="menuitem" tabindex="-1" href="#">Frocks</a>
											  	                		      </li>
											  	                		    </ul>
											  	                		  </li>
											  	                		</ul>
											  	                	</div> -->
											  	                	<div class="col-lg-12">
											  	                	  <span class="section"></span>
											  	                	</div>
											        	          	<div class="item form-group">
											        	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="neck">Neck <span class="required">*</span>
											        	            	</label>
											        	            	<div class="col-md-6 col-sm-6 col-xs-12">
											        	              		<input id="neck" class="form-control col-md-7 col-xs-12" name="neck" required="required" type="text">
											        	            	</div>
											        	          	</div>
											        	          	<div class="item form-group">
											        	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="shoulder">Shoulder <span class="required">*</span>
											        	            	</label>
											        	            	<div class="col-md-6 col-sm-6 col-xs-12">
											        	              		<input id="shoulder" class="form-control col-md-7 col-xs-12" name="shoulder" required="required" type="text">
											        	            	</div>
											        	          	</div>
											        	          	<div class="item form-group">
											        	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lenght">Lenght <span class="required">*</span>
											        	            	</label>
											        	            	<div class="col-md-6 col-sm-6 col-xs-12">
											        	              		<input id="lenght" class="form-control col-md-7 col-xs-12" name="lenght" required="required" type="text">
											        	            	</div>
											        	          	</div>
											        	          	<div class="item form-group">
											        	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hand">Hand <span class="required">*</span>
											        	            	</label>
											        	            	<div class="col-md-6 col-sm-6 col-xs-12">
											        	              		<input id="hand" class="form-control col-md-7 col-xs-12" name="hand" required="required" type="text">
											        	            	</div>
											        	          	</div>
											        	          	<div class="item form-group">
											        	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="chest">Chest <span class="required">*</span>
											        	            	</label>
											        	            	<div class="col-md-6 col-sm-6 col-xs-12">
											        	              		<input id="chest" class="form-control col-md-7 col-xs-12" name="chest" required="required" type="text">
											        	            	</div>
											        	          	</div>
											        	          	<div class="form-group">
											        	            	<div class="col-md-6 col-md-offset-3">
											        	              		<button id="addfield" name="addfield" type="button" class="btn btn-primary">Add a field</button>
											        	            	</div>
											        	          	</div>
											        	            <div class="ln_solid"></div>
											          	        	<div class="form-group">
											        	            	<div class="col-md-6 col-md-offset-3">
											      	              		<button type="reset" class="btn btn-primary">Clear</button>
											      	              		<button id="sendmeasurment" type="submit" class="btn btn-success">Add</button>
											        	            	</div>
											        	          	</div>
											          	        </form>
									              			</div>
									            		</div>
									           		</div>
								            	</div>		            
								        	</div>
									        <div id="step-4">
								            	<div class="row">
								            	  	<div class="col-md-12 col-sm-12 col-xs-12">
								            	    	<div class="x_panel">
										            	    <div class="x_title">
										            	        <h2>Order Info</h2>
										            	        <div class="clearfix"></div>
										            	    </div>
								            	      		<div class="x_content">
										            	        <form class="form-horizontal form-label-left" novalidate>
										            	          <p>Enter order details</p>
										            	          <div class="item form-group">
										            	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span>
										            	            </label>
										            	            <div class="col-md-6 col-sm-6 col-xs-12">
										            	              <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="price" required="required" type="text">
										            	            </div>
										            	          </div>
										            	          <div class="item form-group">
										            	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Discount  </label>
										            	            <div class="col-md-6 col-sm-6 col-xs-12">
										            	              <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="price" type="text">
										            	            </div>
										            	          </div>
										            	          <div class="item form-group">
										            	          	<label class="control-label col-md-3 col-sm-3 col-xs-12">Urgent Order</label>
										            	          	<div class="col-md-9 col-sm-9 col-xs-12">
										            	          	  <div class="">
										            	          	    <label>
										            	          	      <input type="checkbox" class="js-switch" data-switchery="true">
										            	          	    </label>
										            	          	  </div>
										            	          	</div>
										            	          </div>
										            	          <div class="item form-group">
										            	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fdate">Fit-on Date <span class="required">*</span>
										            	            </label>
										            	            <div class="col-md-6 col-sm-6 col-xs-12">
										            	              <div class="form-group">
									                                <div class="input-group date" id="myDatepicker2">
									                                  <input id="fdate" name="fdate" type="text" class="form-control">
									                                  <span class="input-group-addon">
									                                  	<span class="glyphicon glyphicon-calendar"></span>
									                                  </span>
									                                </div>
									                              </div>
										            	            </div>
										            	          </div>
										            	          <div class="item form-group">
										            	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddate">Delivery Date <span class="required">*</span>
										            	            </label>
										            	            <div class="col-md-6 col-sm-6 col-xs-12">
										            	              <div class="form-group">
									                                <div class="input-group date" id="myDatepicker2">
									                                  <input id="ddate" name="ddate" type="text" class="form-control">
									                                  <span class="input-group-addon">
									                                    <span class="glyphicon glyphicon-calendar"></span>
									                                  </span>
									                                </div>
									                              </div>
										            	            </div>
										            	          </div>
										            	          <div class="item form-group">
										            	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">Description or Note
										            	            </label>
										            	            <div class="col-md-6 col-sm-6 col-xs-12">
										            	              <textarea id="note" name="note" class="form-control col-md-7 col-xs-12"></textarea>
										            	            </div>
										            	          </div>
										            	          <div class="ln_solid"></div>
										            	          <div class="form-group">
										            	            <div class="col-md-6 col-md-offset-3">
										            	              <button type="reset" class="btn btn-primary">Reset</button>
										            	              <button id="sendorder" type="submit" class="btn btn-success">Submit</button>
										            	            </div>
										            	          </div>
										            	        </form>
								            	      		</div>
								            	    	</div>
								            	  	</div>
								            	</div>
								            </div>
					                    </div>
					                    <!-- End SmartWizard Content -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /page content -->
	
<?php include_once("../incl/footer.php"); ?>
	
	<script type="text/javascript">
		$(document).ready(function (){
	        $('#title').text('New Order');
	        $('#breadcrumb').text('Create Tailormade Order');
        	loadCustomerData();
        	loadItemCat();
		});

	  	//Load Customer data function  
		function loadCustomerData() {
			$.ajax({  
				url: '../server.php?c=CustomerController&m=getAllCustomer',
				type: "POST",  
				dataType: "json",  
				success: function (data) {  
					// alert(JSON.stringify(data));
					var table = $('#customertable').DataTable();
					$("#customertable tbody").empty();
					table.destroy();
					for (i = 0; i < data.length; i++) {

						var id = data[i].cusid;
						var fname = data[i].cusFname;
						var lname = data[i].cusLname;
						var nic = data[i].cusNIC;
						var tel = data[i].cusPno;
						var email = data[i].cusEmail;
						var add = data[i].cusAddress;

						var func_view = 'viewCustomer(' + id + ')';
						var func_edit = 'getCustomer(' + id + ')';
						var func_delete = 'deleteCustomer(' + id + ')';

						row = 
						' <tr>\
						<td> '+id+'  </td>\
						<td> '+fname+' '+lname+' </td>\
						<td> '+nic+'  </td>\
						<td> '+email+'  </td>\
						<td>\
						<a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="'+func_edit+'"><i class="fa fa-pencil"></i> Choose </a>\
						</td>';

						$("#customertable tbody").append(row);
					}
					$('#customertable').DataTable();
				}
			});
		}

		//Load Item category function  
		function loadItemCat() {
			$.ajax({  
				url: '../server.php?c=CustomerController&m=getAllCustomer',
				type: "POST",  
				dataType: "json",  
				success: function (data) {  
					// alert(JSON.stringify(data));
					// var table = $('#customertable').DataTable();
					$("#itemcat ul").empty();
					// table.destroy();
					for (i = 0; i < data.length; i++) {

						var id = data[i].cusid;
						var fname = data[i].cusFname;
						var lname = data[i].cusLname;
						var nic = data[i].cusNIC;
						var tel = data[i].cusPno;
						var email = data[i].cusEmail;
						var add = data[i].cusAddress;

						var func_view = 'viewItemStyle(' + id + ')';

						row = 
						' <li role="presentation"><a id="li1" role="menuitem" tabindex="-1" href="#" onclick="'+func_view+'" >'+  fname +'</a></li>';

						$("#itemcat ul").append(row);
					}
				}
			});
		}

		//Load Item category function  
		function loadStyle() {
			$.ajax({  
				url: '../server.php?c=CustomerController&m=getAllCustomer',
				type: "POST",  
				dataType: "json",  
				success: function (data) {  
					// alert(JSON.stringify(data));
					// var table = $('#customertable').DataTable();
					$("#itemcat ul").empty();
					// table.destroy();
					for (i = 0; i < data.length; i++) {

						var id = data[i].cusid;
						var fname = data[i].cusFname;
						var lname = data[i].cusLname;
						var nic = data[i].cusNIC;
						var tel = data[i].cusPno;
						var email = data[i].cusEmail;
						var add = data[i].cusAddress;

						var func_view = 'viewItemStyle(' + id + ')';

						row = 
						'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">\
            			    <div class="thumbnail">\
            			        <div class="image view view-first">\
            			        	<img style="width: 100%; display: block;" src="'+source+'" alt="image">\
            			        	<div class="mask">\
            			          		<p>Your Text</p>\
            			        	    <div class="tools tools-bottom">\
            			                <a href="#"><i class="fa fa-link"></i></a>\
            			            		<a href="#"><i class="fa fa-pencil"></i></a>\
            			            		<a href="#"><i class="fa fa-times"></i></a>\
            			          		</div>\
            			        	</div>\
            			      	</div>\
            			      	<div class="checkbox col-lg-3">\
        			      		    <label class="">\
      			      		        <div class="icheckbox_flat-green checked" style="position: relative;">\
      			      		        	<input type="checkbox" id="style1" class="flat"  style="position: absolute; opacity: 0;">\
      			      		        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>\
      			      		        </div>\
        			      		    </label>\
          			      		</div>\
            			      	<div class="caption col-lg-9">\
            			      		<p>\
          			      		    '+name+' <br> '+description+'</p>\
            			      	</div>\
            			    </div>\
                		</div>';

						$("#itemcat ul").append(row);
					}
				}
			});
		}

		function addCustomer(){

		  var check = $('form')[0].checkValidity();
		  if(check == true){
		    var fname =$("#txtfname").val();
		    var lname =$("#txtlname").val();
		    var nic =$("#txtnic").val();
		    var tel =$("#txttel").val();
		    var email =$("#txtemail").val();
		    var add =$("#address").val();

		    var Data={fname:fname,lname:lname,nic:nic,tel:tel,email:email,add:add};

		    $.ajax({  
		      url: "../server.php?c=CustomerController&m=addCustomer",  
		      data: Data,
		      type: "POST",
		      dataType: "json",  
		      success: function (data) {
		        // alert(data+ " Susscessfully added to the system");
		        new PNotify({
		          title: 'New Customer',
		          text: data+ " Susscessfully added to the system",
		          type: 'success',
		          styling: 'bootstrap3'
		        });
		        
		        loadCustomerData();
		        clearData();


		      },  
		      error: function (errormessage) {  
		        alert(errormessage.responseText);
		        alert("Unable to add Customer");
		      }
		    });
		  }else{
		    $("#txtfname").focus();
		  }
		}

		function getCustomer(id){
		  // $("#profile-tab").tab("show");
		  // $("#profile-tab").html("Update Customer");
		  $.ajax({
		    type: "POST",
		    url: '../server.php?c=CustomerController&m=getCustomer',
		    data: {'id':id},
		    success:

		    function(data){
		      $('#customerform')[0].reset();
		      $("#submit").css("display","none");
		      $("#update").css("display","");

		      // alert(data);
		      var d=data[0];
		      var id = d.cusid;
		      var fname = d.cusFname;
		      var lname = d.cusLname;
		      var nic = d.cusNIC;
		      var tel = d.cusPno;
		      var email = d.cusEmail;
		      var add = d.cusAddress;

		      $("#id").val(id);
		      $("#txtfname").val(fname);
		      $("#txtlname").val(lname);
		      $("#txtnic").val(nic);
		      $("#txttel").val(tel);
		      $("#txtemail").val(email);
		      $("#address").val(add);
		    },
		    dataType: 'json'
		  });
		  document.getElementById("formpanel").focus();
		  $("#txtfname").focus();
		} 

		function deleteCustomer(id) {  
		  var ans = confirm("Are you sure you want to delete this Record?");

		  if (ans) {  
		    $.ajax({  
		      url: "../server.php?c=CustomerController&m=deleteCustomer",
		      data: {'id':id},
		      type: "POST",  
		        // dataType: "json",  
		        success: function (data) { 
		        // alert('Deleted');
		        loadCustomerData();
		        new PNotify({
		          title: 'Deleted!',
		          text: 'Customer removed.',
		          type: 'error',
		          styling: 'bootstrap3'
		        });
		        clearData();
		      
		      },  
		      error: function (errormessage) {  
		        alert(errormessage.responseText);  
		      }  
		    });
		  }  
		}


		function clearData() {
		  // $('input[type="text"]').val('');
		  // $('input[type="password"]').val('');
		  // $('Select').val('');
		  $("#submit").css("display","");
		  $("#update").css("display","none");
		  $('#customerform')[0].reset();
		  // setTimeout(function() {location.reload()},2400);
		}

		function Reload() {
		  location.reload();
		  $("#txtfname").focus();
		}
	    
	</script>