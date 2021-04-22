<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="clearfix"></div>
	<div class="raw">
	    <div class="" role="tabpanel" data-example-id="togglable-tabs">
	      	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	        	<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tailormade</a>
	        	</li>
	        	<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Hire</a>
	        	</li>
	        	<!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Readymade</a>
	        	</li> -->
	      	</ul>
	      	<div id="myTabContent" class="tab-content">
	        	<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
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
					</ul>
					<div id="step-1">
		                <div class="row">
		                  <div class="col-md-12 col-sm-12 col-xs-12">
		                    <div class="x_panel">
		                      <div class="x_title">
		                        <h2>Personal Info</h2>
		                        <div class="clearfix"></div>
		                      </div>
		                      <div class="x_content">
		                      	<form class="form-horizontal form-label-left">
		                      		<div class="item form-group col-md-12 col-sm-12 col-xs-12">
		                      		    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Search Customer <span class="required">*</span>
		                      		    </label>
		                      		    <div class="col-md-6 col-sm-6 col-xs-12">
		                      		      	<input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Enter Customer Name or NIC" required="required" type="text">
		                      		    </div>
		                      		    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">New Customer</button>
		                      		</div>
		                      		<input type="text" id="cid" name="cid" class="invisible form-control col-md-7 col-xs-12">
		                      		
		            	        	<p>Enter order details</p>
		            	        	<div class="item form-group">
		            	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="price"> Total Price <span class="required">*</span>
		            	            	</label>
			            	            <div class="col-md-6 col-sm-6 col-xs-12">
			            	              <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="price" required="required" type="text">
			            	            </div>
			            	          </div>
			            	          <div class="item form-group">
			            	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fdate">Fit-on Date <span class="required">*</span>
			            	            </label>
			            	            <div class="col-md-6 col-sm-6 col-xs-12">
			            	              <div class="form-group">
		                                    <div class="input-group date" id="myDatepicker2">
		                                        <input id="fdate" name="fdate" type="text" class="form-control" required="required">
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
		                                        <input id="ddate" name="ddate" type="text" class="form-control" required="required">
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
								<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">Add new customer</h4>
											</div>
											<div class="modal-body">
												<form id="customerform" class="form-horizontal form-label-left" validate>
											        <div class="item form-group">
											            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtfname">First Name <span class="required">*</span>
											            </label>
											            <div class="col-md-6 col-sm-6 col-xs-12">
											              	<input id="txtfname" class="form-control col-md-7 col-xs-12" data-validate-words="1" name="txtfname" placeholder="first name(s) e.g Jon" required="required" type="text">
											            </div>
											        </div>
											        <div class="item form-group">
											            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlname">Last Name <span class="required">*</span>
											            </label>
											            <div class="col-md-6 col-sm-6 col-xs-12">
											              	<input id="txtlname" class="form-control col-md-7 col-xs-12" data-validate-words="1" name="txtlname" placeholder="last name(s) e.g Doe" required="required" type="text">
											            </div>
											        </div>
											        <div class="item form-group">
											            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtnic">NIC <span class="required">*</span>
											            </label>
											            <div class="col-md-6 col-sm-6 col-xs-12">
											            	<input id="txtnic" class="form-control col-md-7 col-xs-12" data-validate-length-range="12" name="txtnic" placeholder="123456789V" required="required" type="text">
											            </div>
											        </div>
											        <div class="item form-group">
											            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttel">Telephone <span class="required">*</span>
											            </label>
											            <div class="col-md-6 col-sm-6 col-xs-12">
											              	<input type="tel" id="txttel" name="txttel" required="required" data-validate-length-range="8,15" class="form-control col-md-7 col-xs-12">
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
											            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail2">Confirm Email <span class="required">*</span>
											            </label>
											            <div class="col-md-6 col-sm-6 col-xs-12">
											               	<input type="email" id="txtemail2" name="confirm_email" data-validate-linked="txtemail" required="required" class="form-control col-md-7 col-xs-12">
											            </div>
											        </div>                            
											        <div class="item form-group">
											            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtaddress">Address <span class="required">*</span>
											            </label>
											            <div class="col-md-6 col-sm-6 col-xs-12">
											        	    <textarea id="txtaddress" required="required" name="txtaddress" class="form-control col-md-7 col-xs-12"></textarea>
											            </div>
											        </div>
							                        <div class="ln_solid"></div>
						                        </form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
												<button type="reset" class="btn btn-warning" onclick="clearData();">Reset</button>
												<button id="addcustomer" type="button" class="btn btn-primary" onclick="addCustomer();">Add Customer</button>
											</div>
										</div>
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
			              	    <div class="x_panel">
			              	      	<div class="x_title">
			              	        	<h2>Styles Info</h2>
			              	        	<div class="clearfix"></div>
			              	      	</div>
			              	      	<div class="x_content">
				              	        <form class="form-horizontal form-label-left" novalidate>
				              	        	<p>Select suitable styles</p>
				              	        	<div class="col-lg-6">
					  	                		<ul class="nav nav-pills" role="tablist">
					  	                		  <li role="presentation" class="dropdown">
					  	                		    <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
					  	                		                Item
					  	                		                <span class="caret"></span>
					  	                		            </a>
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
					              	        <div class="col-lg-6">
					  	                		<ul class="nav nav-pills" role="tablist">
					  	                		  <li role="presentation" class="dropdown">
					  	                		    <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
					  	                		                Pieces
					  	                		                <span class="caret"></span>
					  	                		            </a>
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
					  	                	</div>
					  	                	<div class="col-lg-12">
					  	                	  <span class="section"></span>
					  	                	</div>
          			  	                	<div class="raw ">
          			  	                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          			  	                			<form action="#" class="dropzone" style="min-height:190px">
          			  	                			</form>
          			  	                			<form action="#" class="dropzone" style="min-height:190px">
          			  	                			</form>
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
          		  	                			      	<div class="checkbox col-lg-3">
      		  	                			      		    <label class="">
      		  	                			      		        <div class="icheckbox_flat-green checked" style="position: relative;">
      		  	                			      		        	<input type="checkbox" id="style" class="flat"  style="position: absolute; opacity: 0;">
      		  	                			      		        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
      		  	                			      		        	</ins>
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
          			  	                			  	<div class="checkbox col-lg-3">
      		  	                			      		    <label class="">
      		  	                			      		        <div class="icheckbox_flat-green checked" style="position: relative;">
      		  	                			      		        	<input type="checkbox" id="style1" class="flat"  style="position: absolute; opacity: 0;">
      		  	                			      		        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
      		  	                			      		        	</ins>
      		  	                			      		        </div>
      		  	                			      		    </label>
      		  	                			      		</div>
          		  	                			      	<div class="caption col-lg-9">
          			  	                			  		<p>Snow and Ice Incoming for the South</p>
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
          			  	                			  	<div class="checkbox col-lg-3">
          												    <label class="">
          												        <div class="icheckbox_flat-green checked" style="position: relative;">
          												        	<input type="checkbox" id="style2" class="flat"  style="position: absolute; opacity: 0;">
          												        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
          												        	</ins>
          												        </div>
          												    </label>
          												</div>
          												<div class="caption col-lg-9">
          			  	                			  		<p>Snow and Ice Incoming for the South</p>
          			  	                			  	</div>
          			  	                			</div>
          			  	                		</div>
          			  	                	</div>
          			  	                	<div class="raw">
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
          			  	                			  	<div class="checkbox col-lg-3">
          												    <label class="">
          												        <div class="icheckbox_flat-green checked" style="position: relative;">
          												        	<input type="checkbox" id="style1" class="flat"  style="position: absolute; opacity: 0;">
          												        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
          												        	</ins>
          												        </div>
          												    </label>
          												</div>
          												<div class="caption col-lg-9">
          			  	                			  		<p>Snow and Ice Incoming for the South</p>
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
          			  	                			  	<div class="checkbox col-lg-3">
          												    <label class="">
          												        <div class="icheckbox_flat-green checked" style="position: relative;">
          												        	<input type="checkbox" id="style1" class="flat"  style="position: absolute; opacity: 0;">
          												        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
          												        	</ins>
          												        </div>
          												    </label>
          												</div>
          												<div class="caption col-lg-9">
          			  	                			  		<p>Snow and Ice Incoming for the South</p>
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
          			  	                			  	<div class="checkbox col-lg-3">
          												    <label class="">
          												        <div class="icheckbox_flat-green checked" style="position: relative;">
          												        	<input type="checkbox" id="style1" class="flat"  style="position: absolute; opacity: 0;">
          												        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
          												        	</ins>
          												        </div>
          												    </label>
          												</div>
          												<div class="caption col-lg-9">
          			  	                			  		<p>Snow and Ice Incoming for the South</p>
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
          			  	                			  	<div class="checkbox col-lg-3">
          												    <label class="">
          												        <div class="icheckbox_flat-green checked" style="position: relative;">
          												        	<input type="checkbox" id="style1" class="flat"  style="position: absolute; opacity: 0;">
          												        	<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
          												        	</ins>
          												        </div>
          												    </label>
          												</div>
          												<div class="caption col-lg-9">
          			  	                			  		<p>Snow and Ice Incoming for the South</p>
          			  	                			  	</div>
          			  	                			</div>
          			  	                		</div>
          			  	                	</div>
				              	        	<div class="form-group">
				              	            	<div class="col-md-6 col-md-offset-9">
				              	              		<button id="sendmeasurment" type="submit" class="btn btn-primary">Add</button>
				              	            	</div>
				              	          	</div>
				              	        </form>
			              	      	</div>
      	            	        <div class="col-lg-12">
      		                	  <span class="section"></span>
      		                	</div>
      	            	        <table id="datatable" class="table table-striped table-bordered">
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
      	            	            <tr>
      	            	              <th>ID No</th>              
      	            	              <td>Rhona Davidson</td>
      	            	              <td>Integration Specialist</td>
      	            	              <td>Tokyo</td>
      	            	              <td>55</td>
      	            	              <td>2010/10/14</td>
      	            	              <td>$327,900</td>
      	            	            </tr>
      	            	            <tr>
      	            	              <th>ID No</th>              
      	            	              <td>Colleen Hurst</td>
      	            	              <td>Javascript Developer</td>
      	            	              <td>San Francisco</td>
      	            	              <td>39</td>
      	            	              <td>2009/09/15</td>
      	            	              <td>$205,500</td>
      	            	            </tr>
      	            	          </tbody>
      	            	        </table>
			              	    </div>
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
				              	        <div class="col-md-6 col-sm-12 col-xs-6">
				              	        	<form class="form-horizontal form-label-left" novalidate>
						  	                	<div class="col-lg-12">
						  	                	  <span class="section"></span>
						  	                	</div>
					              	          	<div class="item form-group">
					              	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="1st-item">t-Shirt <span class="required">*</span>
					              	            	</label>
					              	            	<div class="col-md-6 col-sm-6 col-xs-12">
					              	              		<textarea id="1st-item" class="form-control col-md-7 col-xs-12" name="1st-item" required="required" type="text"></textarea>
					              	            	</div>
					              	          	</div>
 					              	        <!--<div class="item form-group">
					              	            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="2st-item">Trouser <span class="required">*</span>
					              	            	</label>
					              	            	<div class="col-md-6 col-sm-6 col-xs-12">
					              	              		<textarea id="2st-item" class="form-control col-md-7 col-xs-12" name="2st-item" required="required" type="text"></textarea>
					              	            	</div>
					              	          	</div> -->
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
				              	        <div class="col-md-6 col-sm-12 col-xs-6">
				              	        	<div id="alerts"></div>
							                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
							                    <div class="btn-group">
							                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
							                      <ul class="dropdown-menu">
							                      </ul>
							                    </div>
							                    <div class="btn-group">
							                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
							                      <ul class="dropdown-menu">
							                        <li>
							                          <a data-edit="fontSize 5">
							                            <p style="font-size:17px">Huge</p>
							                          </a>
							                        </li>
							                        <li>
							                          <a data-edit="fontSize 3">
							                            <p style="font-size:14px">Normal</p>
							                          </a>
							                        </li>
							                        <li>
							                          <a data-edit="fontSize 1">
							                            <p style="font-size:11px">Small</p>
							                          </a>
							                        </li>
							                      </ul>
							                    </div>

							                    <div class="btn-group">
							                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
							                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
							                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
							                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
							                    </div>

							                    <div class="btn-group">
							                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
							                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
							                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
							                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
							                    </div>

							                    <div class="btn-group">
							                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
							                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
							                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
							                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
							                    </div>

							                    <div class="btn-group">
							                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
							                      <div class="dropdown-menu input-append">
							                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
							                        <button class="btn" type="button">Add</button>
							                      </div>
							                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
							                    </div>

							                    <div class="btn-group">
							                      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
							                      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
							                    </div>

							                    <div class="btn-group">
							                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
							                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
							                    </div>
							                </div>

											<div id="editor-one" class="editor-wrapper"></div>
											<textarea name="descr" id="descr" style="display:none;"></textarea>
				              	        </div>
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
<!-- /page content -->
	
<?php include_once("../incl/footer.php"); ?>
	
	<script type="text/javascript">
		$(document).ready(function (){
	        $('#title').text('New Order');
	        $('#breadcrumb').text('Create Order');

	        $("#name").typeahead({

	            onSelect: function(item) {
	                $("#id").val(item.value);
	                loadCustomer(item.value);
	            },
	            ajax: {

	                url: "../server.php",
	                timeout: 500,
	                displayField: "name",
	                triggerLength: 1,
	                method: "get",
	                loadingClass: "loading-circle",
	                preDispatch: function (query) {
	                    return {
	                        str: query
	                }
	                },
	                preProcess: function (data) {
	                    $("#id").val("");
	                    //loadCustomer('');
	                    if (data.success === false) {
	                        return false;
	                    }
	                    return data;
	                }
	            }
	        });
		    
		});
	    
	    function addCustomer(){
		    var fname =$("#txtfname").val();
		    var lname =$("#txtlname").val();
		    var nic =$("#txtnic").val();
		    var Pno =$("#txttel").val();
		    var email =$("#txtemail").val();
		    var address =$("#txtaddress").val();

		    var empData={fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address};

		    $.ajax({  
		      url: "../server.php?c=CustomerController&m=addCustomer",  
		      data: empData,
		      type: "POST",
		      dataType: "json",  
		      success: function (data) {
		        
		        new PNotify({
		          title: 'New Customer',
		          text: data+ " Susscessfully added to the system",
		          type: 'success',
		          styling: 'bootstrap3'
		        });
		        
		        clearData();

		      },  
		      error: function (errormessage) {  
		        alert(errormessage.responseText);
		        alert("Unable to add Customer");
		      }
		    });  
		}
	 //    function addOrder(){
		//     var cusid =$("#cid").val();
		//     var price =$("#price").val();
		//     var fdate =$("#fdate").val();
		//     var ddate =$("#ddate").val();
		//     var note =$("#note").val();

		//     var empData={fname:fname,lname:lname,nic:nic,Pno:Pno,email:email,address:address};

		//     $.ajax({  
		//       url: "../server.php?c=OrderController&m=addOrder",  
		//       data: empData,
		//       type: "POST",
		//       dataType: "json",  
		//       success: function (data) {
		        
		//         new PNotify({
		//           title: 'New Order ',
		//           text: data+ " Susscessfully added to the system",
		//           type: 'success',
		//           styling: 'bootstrap3'
		//         });
		        
		//         clearData();

		//       },  
		//       error: function (errormessage) {  
		//         alert(errormessage.responseText);
		//         alert("Unable to add Customer");
		//       }
		//     });
		// }


		  function clearData() {
		    $('input[type="text"]').val('');
		    $('input[type="tel"]').val('');
		    $('input[type="email"]').val('');
		    $('textarea').val('');
		  }
	</script>