<style type="text/css">
	#hideMe {
		-moz-animation: cssAnimation 0s ease-in 5s forwards;
		/* Firefox */
		-webkit-animation: cssAnimation 0s ease-in 5s forwards;
		/* Safari and Chrome */
		-o-animation: cssAnimation 0s ease-in 5s forwards;
		/* Opera */
		animation: cssAnimation 0s ease-in 5s forwards;
		-webkit-animation-fill-mode: forwards;
		animation-fill-mode: forwards;
	}

	@keyframes cssAnimation {
		to {
			width: 0;
			height: 0;
			overflow: hidden;
		}
	}

	@-webkit-keyframes cssAnimation {
		to {
			width: 0;
			height: 0;
			visibility: hidden;
		}
	}
</style>
<?php include_once("../incl/header.php"); ?>
<!-- page content -->

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
				<li role="presentation" class="active"><a href="tailormade.php" id="home-tab" role="tab">Tailormade</a>
				</li>
				<li role="presentation" class=""><a href="hire.php" role="tab" id="profile-tab">Hire</a>
				</li>
				<li role="presentation" class=""><a href="readymade.php" role="tab" id="profile-tab2">Readymade</a>
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
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> <span><i class="fa fa-plus"></i></span> New Customer</button>
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
											<input type="text" id="txtfname1" name="txtfname1" class="invisible form-control col-md-7 col-xs-12">
											<input type="text" id="txtlname1" name="txtlname1" class="invisible form-control col-md-7 col-xs-12">
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
																		<input type="text" id="id" name="id" onkeyup="stoppedTyping();" class="invisible form-control col-md-7 col-xs-12">
																		<div class="item form-group">
																			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtfname">First Name <span class="required">*</span>
																			</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<input id="txtfname" class="form-control col-md-7 col-xs-12" name="txtfname" placeholder="first name(s) e.g Jon" required="required" type="text">
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
																				<input id="txtnic" class="form-control col-md-7 col-xs-12" name="txtnic" placeholder="123456789V" required="required" type="text" onblur="validateNIC(this.value, 'warning');">
																			</div>
																		</div>
																		<div class="item form-group">
																			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttel">Telephone <span class="required">*</span>
																			</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<input type="tel" id="txttel" name="txttel" required="required" data-validate-length-range="8,20" onblur="validateMobileNumber(this.value, 'warning');" class="form-control col-md-7 col-xs-12">
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
																			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtaddress">Address
																				<!-- <span class="required">*</span> -->
																			</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<textarea id="address" name="address" class="form-control col-md-7 col-xs-12"></textarea>
																			</div>
																		</div>
																		<div class="ln_solid"></div>
																		<div class="form-group">
																			<div class="col-md-6 col-md-offset-3">
																				<button id="btnrest" type="reset" class="btn btn-primary" onclick="clearData();">Reset</button>
																				<button id="submit" class="btn btn-success" onclick="addCustomer();">Save and Select</button>
																				<button id="update" style="display: none;" class="btn btn-success" onclick="selectCustomer();">Select</button>
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
													<br><br>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<h4>Select or Add a suitable styles</h4>
													</div>

													<!-- Large modal -->
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addStyle-modal-lg">Add New Style</button>
													<br><br>

													<div class="modal fade addStyle-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">

																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
																	<h4 class="modal-title" id="myModalLabel">Add new style</h4>
																</div>
																<div class="modal-body">
																	<div class="col-md-12 col-sm-12 col-xs-12">
																		<form id="imageform" action="upload.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="my_image">Select Image File:<span class="required">*</span></label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input type="file" id="my_image" name="my_image" required="required">
																					<?php if (isset($_GET['error'])) : ?>
																						<p id="hideMe" style="color: red;"><?php echo $_GET['error']; ?></p>
																					<?php endif ?>
																				</div>
																			</div>
																			<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image Description:</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																					<input id="description" type="text" class="form-control col-md-7 col-xs-12" name="description" placeholder="Style Description">
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-6 col-md-offset-3">
																					<input class="btn btn-default" type="reset" name="reset" value="Clear" onclick="clearData();">
																					<input id="btnsubmit" class="btn btn-primary" type="submit" name="btnsubmit" value="Upload">
																				</div>
																			</div>
																		</form>
																	</div>
																</div><br><br><br><br><br><br>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>

															</div>
														</div>
													</div>



													<form id="styleform" class="form-horizontal form-label-left" novalidate>
														<input type="text" id="cusid" name="cusid" class="invisible form-control col-md-7 col-xs-12">
														<div class="col-lg-12">
															<span class="section"></span>
														</div>
														<div id="styletable" class="raw ">
															<?php
															include("db_conn.php");
															$sql = "SELECT * FROM style ORDER BY stlid DESC";
															$res = mysqli_query($conn, $sql);

															if (mysqli_num_rows($res) > 0) {
																while ($images = mysqli_fetch_assoc($res)) {  ?>
																	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
																		<div class="thumbnail">
																			<div class="image view view-first">
																				<img style="width: 100%; display: block;" src="style/<?= $images['stlname'] ?>" alt="<?= $images['stlname'] ?>">
																				<div class="mask" data-toggle="modal" data-target=".bs-<?= $images['stlid'] ?>">
																					<div class="tools tools-bottom">
																						<a href="#"><i class="fa fa-link"></i></a>
																					</div>
																				</div>
																			</div>
																			<!-- Small modal -->
																			<div class="modal fade bs-<?= $images['stlid'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-sm">
																					<div class="modal-content">

																						<div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
																							</button>
																							<h4 class="modal-title" id="myModalLabel2">Style preview</h4>
																						</div>
																						<div class="modal-body">
																							<div class="alb" style=" width: 270px;
																	                              height: 300px;
																	                              padding: 5px;">
																								<img src="style/<?= $images['stlname'] ?>" width="100%" height="100%">
																							</div>
																							<p> Description :<?php echo $images['stldesc']; ?></p>
																						</div>
																						<div class="modal-footer">
																							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																						</div>

																					</div>
																				</div>
																			</div>
																			<!-- /modals -->

																			<div class="radio col-lg-3">
																				<label class="">
																					<div class="iradio_flat-green" style="position: relative;">
																						<input type="radio" class="flat" name="style" id="<?= $images['stlid'] ?>" value="<?= $images['stlid'] ?>" style="position: absolute; opacity: 0;">
																						<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
																					</div>
																				</label>
																			</div>
																			<div class="caption col-lg-9">
																				<p><?php echo $images['stldesc']; ?></p>
																			</div>
																		</div>
																	</div>

															<?php }
															} ?>
														</div>
														<div class="form-group">
															<div class="col-md-6 col-md-offset-9">
																<button id="select" type="button" class="btn btn-primary" onclick="Select();">Select</button>
															</div>
														</div>
													</form>
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
															<form id="measurementform" class="form-horizontal form-label-left" novalidate>
																<p>Enter by selecting the item Measurement</p>
																<input type="text" id="cusid1" name="cusid1" class="invisible form-control col-md-7 col-xs-12">
																<input type="text" id="style_id1" name="style_id1" class="invisible form-control col-md-7 col-xs-12">
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtitem ">Item <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<input type="text" list="itemname" id="txtitem" class="form-control col-md-7 col-xs-12" name="txtitem" required="required">
																		<datalist id="itemname">
																			<option value="Shirt">
																			<option value="t-Shirt">
																			<option value="Trousers">
																			<option value="Blazer">
																			<option value="Frocks">
																			<option value="Uniforms (Male)">
																			<option value="Uniforms (Female)">
																		</datalist>
																	</div>
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtitem ">No of Item <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<input defautvalue='1' type="number" id="no_of_item" class="form-control col-md-7 col-xs-12" name="no_of_item" required="required" onChange="checkQuantity();">
																	</div>
																</div>
																<div class="col-lg-12">
																	<span class="section"></span>
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtmeasurement ">Measurements <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<textarea id="txtmeasurement" required="required" name="txtmeasurement" class="form-control col-md-7 col-xs-12" rows="4"></textarea>
																	</div>
																	<button id="selectMeasurement" name="selectMeasurement" type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-measurement" onclick="getMeasurementBycusId();">Add Old Measurement</button>
																	<!-- Measurement large modal -->
																	<div class="modal fade bs-measurement" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog modal-lg">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
																					</button>
																					<h4 class="modal-title" id="myModalLabel1">Select a measurements</h4>
																				</div>
																				<div class="modal-body">
																					<table id="cusmeasurementtable" class="table table-bordered">
																						<thead>
																							<tr>
																								<th>Customer Name</th>
																								<th>Item</th>
																								<th>Measurements</th>
																								<th>More details</th>
																								<th>Option</th>
																							</tr>
																						</thead>
																						<tbody></tbody>
																					</table>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!-- /modals -->
																</div>
																<input type="text" id="measid" name="measid" class="invisible form-control col-md-7 col-xs-12">
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rawMaterials ">Inhouse Raw Material</label>
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" id="notice" name="notice" style="color:red; display: none" >There are not enough material for this in-house.</label>
																	<div class="col-md-1 col-sm-1 col-xs-1">
																		<input id="isRaw" name="isRaw" type="checkbox" value="true" onChange="handleRaw();">
																	</div>
																	<div class="col-md-5 col-sm-5 col-xs-5" id="rawMaterialsDiv" >
																		<!-- <input type="text" list="itemname" id="rawMaterials" class="form-control col-md-7 col-xs-12" name="rawMaterials" required="required"> -->
																		
																	</div>
																	<button id="selectRawMaterial" style="display:none" name="selectRawMaterial" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-raw" onclick="getAllMaterials();">Select Material</button>
																	<!-- Raw Material large modal -->
																		<div class="modal fade bs-raw" tabindex="-1" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
																						</button>
																						<h4 class="modal-title" id="myModalLabel1">Select a Raw Material</h4>
																					</div>
																					<div class="modal-body">
																						<table id="materialtable" class="table table-bordered">
																							<thead>
																								<tr>
																									<th>Name</th>
																									<th>Type</th>
																									<th>Color</th>
																									<th>Quantity</th>
																									<th>Description</th>
																									<th>Option</th>
																								</tr>
																							</thead>
																							<tbody></tbody>
																						</table>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			</div>
																		</div>
																		<!-- /modals -->
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtmoredetails">More Details </label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<textarea id="txtmoredetails" class="form-control col-md-7 col-xs-12" name="txtmoredetails"></textarea>
																	</div>
																</div>
																<div class="ln_solid"></div>
																<div class="form-group">
																	<div class="col-md-6 col-md-offset-3">
																		<button type="reset" class="btn btn-primary">Clear</button>
																		<button id="savemeasurment" name="savemeasurment" type="button" class="btn btn-success" onclick="addMeasurement();">Save</button>
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
															<form id="orderform" class="form-horizontal form-label-left" novalidate>
																<input type="text" id="cusid2" name="cusid2" class="invisible 
										            	          form-control col-md-7 col-xs-12">
																<h5>Enter order details</h5>
																<input type="text" id="style_id2" name="style_id2" class="invisible form-control col-md-7 col-xs-12">
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<input id="price" class="form-control col-md-7 col-xs-12" name="price" required="required" type="text">
																	</div>
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">Advance/ Discount </label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<input id="discount" class="form-control col-md-7 col-xs-12" name="discount" type="text">
																	</div>
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fdate">Fit-on Date
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<input id="fdate" name="fdate" type="date" class="form-control">
																	</div>
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddate">Delivery Date <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<input id="ddate" name="ddate" type="date" class="form-control" required="required">
																	</div>
																</div>
																<div class="item form-group">
																	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">Description or Note
																	</label>
																	<div class="col-md-6 col-sm-6 col-xs-12">
																		<textarea id="note" name="note" class="form-control col-md-7 col-xs-12"></textarea>
																	</div>
																</div>
																<input type="text" id="measid1" name="measid1" class="invisible form-control col-md-7 col-xs-12">
																<div class="ln_solid"></div>
																<div class="form-group">
																	<div class="col-md-6 col-md-offset-3">
																		<button type="reset" class="btn btn-primary" onclick="$('#orderform')[0].reset();">Reset</button>
																		<button id="btnsendorder" type="button" class="btn btn-success" onclick="addOrder();">Submit</button>
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
<!-- <script type="text/javascript">
	function stoppedTyping(){
        if(this.value.length < 0) { 
            document.querySelector('.buttonNext').disabled = true; 
        } else { 
            document.querySelector('.buttonNext').disabled = false;
        }
    }
</script> -->

<?php include_once("../incl/footer.php"); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#title').text('New Order');
		$('#breadcrumb').text('Create Tailormade Order');
		loadCustomerData();
		var cusid = $("#cusid").val();
		if (cusid === "") {
			$('.buttonNext').addClass('buttonDisabled');
			console.log(cusid);
		} else {
			$('.buttonNext').removeClass('buttonDisabled');
		}
	});



	//Load Customer data function  
	function loadCustomerData() {
		$.ajax({
			url: '../server.php?c=CustomerController&m=getAllCustomerDESC',
			type: "POST",
			dataType: "json",
			success: function(data) {
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
						<td> ' + id + '  </td>\
						<td> ' + fname + ' ' + lname + ' </td>\
						<td> ' + nic + '  </td>\
						<td> ' + email + '  </td>\
						<td>\
						<a href="#" class="select btn btn-success btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Select </a><br>\
						</td>';

					$("#customertable tbody").append(row);
				}
				$('#customertable').DataTable();
			}
		});
	}

	function validateNIC(nic, color) {
		console.log(nic, color);
		// Remove any spaces or dashes from the NIC number
		nic = nic.replace(/[\s-]/g, '');

		// Check if the NIC number has 9 digits and ends with 'V' or 'X'
		if (/^\d{9}[VXvx]$/i.test(nic)) {
			return true;
		}

		// Check if the NIC number has 12 digits
		if (/^\d{12}$/.test(nic)) {
			return true;
		}

		// If neither of the above conditions is true, the NIC number is invalid
		new PNotify({
			title: 'NIC Error',
			text: "NIC should have 9 digits and end with V or X, or 12 digits without any letters",
			type: color,
			styling: 'bootstrap3',
			delay: 3000
		});
		// alert('NIC should have 9 digits and end with V or X, or 12 digits without any letters');
		return false;
	}

  	function validateMobileNumber(mobileNumber, color) {
		// Remove any spaces or dashes from the mobile number
		mobileNumber = mobileNumber.replace(/[\s-]/g, '');

		// Check if the mobile number is valid
		if (/^(0|\+94)\d{9}$/.test(mobileNumber)) {
			return true;
		} else {
		new PNotify({
			title: 'Telephone Number Error',
			text: "Telephone Number should have 9 digits and start with 0 or +94",
			type: color,
			styling: 'bootstrap3',
			delay: 3000
		});
		return false;
		}
	}

	function addCustomer() {

		var check = $('#customerform')[0].checkValidity();
		if (check == true) {
			var fname = $("#txtfname").val();
			var lname = $("#txtlname").val();
			var nic = $("#txtnic").val();
			var tel = $("#txttel").val();
			var email = $("#txtemail").val();
			var add = $("#address").val();

			if (!validateNIC(nic, 'error')) {
				$("#txtnic").focus();
				return;
			}

			if (!validateMobileNumber(tel, 'error')) {
				$("#txttel").focus();
				return;
			}

			var Data = {
				fname: fname,
				lname: lname,
				nic: nic,
				tel: tel,
				email: email,
				add: add
			};

			$.ajax({
				url: "../server.php?c=CustomerController&m=addCustomer",
				data: Data,
				type: "POST",
				dataType: "json",
				success: function(data) {
					// alert(data+ " Susscessfully added to the system");
					new PNotify({
						title: 'New Customer',
						text: data + " Susscessfully added to the system",
						type: 'success',
						styling: 'bootstrap3'
					});

					loadCustomerData();
					$('#customerform')[0].reset()


				},
				error: function(errormessage) {
					alert(errormessage.responseText);
					alert("Unable to add Customer");
				}
			});
		} else {
			$("#txtfname").focus();
		}
	}

	function getCustomer(id) {
		$.ajax({
			type: "POST",
			url: '../server.php?c=CustomerController&m=getCustomer',
			data: {
				'id': id
			},
			success:

				function(data) {
					$('#styleform')[0].reset();

					// alert(data);
					var d = data[0];
					var id = d.cusid;
					var fname = d.cusFname;
					var lname = d.cusLname;

					$("#cusid").val(id);
					$("#cusid1").val(id);
					$("#cusid2").val(id);
					$("#txtfname1").val(fname);
					$("#txtlname1").val(lname);

					new PNotify({
						title: 'Customer Selected',
						text: fname + " " + lname + " selected Susscessfully",
						type: 'success',
						styling: 'bootstrap3'
					});
					$('.buttonNext').removeClass('buttonDisabled');
					// $("#txtlname1").focus();
					// document.getElementById("txtfname1").focus();
				},
			dataType: 'json'
		});
	}

	function Select() {
		var cusid = $("#cusid").val();
		var style = $("input[name='style']:checked").val();
		$("#style_id1").val(style);
		$("#style_id2").val(style);
		if (style) {
			$("#style_id1").val(style);
			$("#style_id2").val(style);
			new PNotify({
				title: 'Style',
				text: "Style (Style Id = " + style + ") Susscessfully Selected",
				type: 'success',
				styling: 'bootstrap3'
			});
		} else {
			new PNotify({
				title: 'Style',
				text: "A Style is not Selected",
				type: 'warning',
				styling: 'bootstrap3'
			});
		}
	}

	function addOrder() {
		var check = $('#orderform')[0].checkValidity();
		if (check == true) {
			var fname = $("#txtfname1").val();
			var lname = $("#txtlname1").val();
			var cusid = $("#cusid2").val();
			var cusname = fname + " " + lname;
			var styleid = $("#style_id2").val();
			var fitondate = $("#fdate").val();
			var deliverydate = $("#ddate").val();
			var price = $("#price").val();
			var discount = $("#discount").val();
			var description = $("#note").val();
			var measid = $("#measid1").val();

			var Data = {
				cusid: cusid,
				cusname: cusname,
				styleid: styleid,
				fitondate: fitondate,
				deliverydate: deliverydate,
				price: price,
				discount: discount,
				description: description,
				measid: measid
			};

			$.ajax({
				url: "../server.php?c=OrderController&m=addOrder",
				data: Data,
				type: "POST",
				dataType: "json",
				success: function(data) {
					// alert(data+ " Susscessfully added to the system");
					//adding measurement id
					new PNotify({
						title: 'New Order',
						text: data + "Order is Susscessfully added to the system",
						type: 'success',
						styling: 'bootstrap3'
					});

					$('#orderform')[0].reset()
					window.setTimeout(window.location.href = "pendingorder.php", 5000);

				},
				error: function(errormessage) {
					alert(errormessage.responseText);
					alert("Unable to add Order");
				}
			});
		} else {
			$("#price").focus();
		}

	}

	function addMeasurement() {
		var check = $('#measurementform')[0].checkValidity();
		if (check == true) {
			var fname = $("#txtfname1").val();
			var lname = $("#txtlname1").val();
			var cusid = $("#cusid1").val();
			var cusname = fname + " " + lname;
			var item = $("#txtitem").val();
			var measurement = $("#txtmeasurement").val();
			var moredetails = $("#txtmoredetails").val();

			var Data = {
				cusid: cusid,
				cusname: cusname,
				item: item,
				measurement: measurement,
				moredetails: moredetails
			};

			$.ajax({
				url: "../server.php?c=MeasurementController&m=addMeasurement",
				data: Data,
				type: "POST",
				dataType: "json",
				success: function(data) {

					$.ajax({
						url: '../server.php?c=MeasurementController&m=getAllMeasurementDESC',
						type: "POST",
						dataType: "json",
						success: function(data) {
							// alert(data);
							var d = data[0];
							var id = d.measId;
							// alert(id);
							$("#measid").val(id);
							$("#measid1").val(id);
						},
					});
					new PNotify({
						title: 'Measurement',
						text: data + "'s Measurement is Susscessfully added to the system",
						type: 'success',
						styling: 'bootstrap3'
					});
					// $('#measurementform')[0].reset();

				},
				error: function(errormessage) {
					alert(errormessage.responseText);
					alert("Unable to add Measurement");
				}
			});
		} else {
			$("#item").focus();
			alert("not working");
		}

	}

	function handleRaw() {
		var rawMaterialsDiv = document.getElementById("selectRawMaterial");
		var isRawCheckbox = document.getElementById("isRaw");
		if (isRawCheckbox.checked == true){
			rawMaterialsDiv.style.display = "block";
		} else {
			rawMaterialsDiv.style.display = "none";
		}
	}

	function getAllMaterials() {
		$.ajax({  
		url: '../server.php?c=MaterialController&m=getAllMaterial',
		type: "POST",  
		dataType: "json",  
		success: function (data) {  
			// alert(JSON.stringify(data));
			var table = $('#materialtable').DataTable();
			$("#materialtable tbody").empty();
			table.destroy();
			for (i = 0; i < data.length; i++) {

			var id = data[i].rid;
			var name = data[i].Name;
			var type = data[i].Type;
			var col = data[i].Color;
			var quan = data[i].Quantity;
			var desc = data[i].Description;

			var func_select = 'getMaterial(' + id + ')';

			row = 
			' <tr>\
				<td> '+name+' </td>\
				<td> '+type+' </td>\
				<td> '+col+' </td>\
				<td> '+quan+' m </td>\
				<td> '+desc+' </td>\
				<td>\
					<a href="#" class="btn btn-warning btn-xs" onclick="'+func_select+'"><i class="fa fa-shopping-cart"></i> Select </a>\
				</td>';

			$("#materialtable tbody").append(row);
			}
			$('#materialtable').DataTable();
		}
		});  
	}

	function getMaterial(id){
		$.ajax({
			type: "POST",
			url: '../server.php?c=MaterialController&m=getMaterial',
			data: {'id':id},
			success: function(data){
				var d=data[0]; 
				var id = d.rid;
				var name = d.Name;
				var type = d.Type;
				var col = d.Color;
				var quan = d.Quantity;
				var desc = d.Description;

				let idStrng = id.toString().padStart(3, '0');

				var quatWant = prompt('Please enter required quantity, Only '+quan+' m available');
				
				var func_close = 'rawClose(' + id + ',' + quan + ')';

				if (quatWant > quan){
					alert('Only '+quan+' m available');
				} else {
					$('.bs-raw').modal('hide');
					var card = '<div class="card" style="color:black; position:relative; border:1px solid blue; background-color:lightblue; padding: 10px">\
						<button style="position:absolute; top:-10px; right:-15px;padding: 0; border-radius:70%; font-size:18px;" onclick='+ func_close +'>\
							<i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>\
						</button>\
						<div class="card-body">\
							<p class="card-title" style="font-weight:700">' + name + ' - Id: ' + idStrng + '</p>\
							<p class="card-text">Color: ' + col + '</p>\
							<p class="card-text">' + desc + '</p>\
							<p class="card-text">' + quatWant + 'm from ' + quan + 'm</p>\
						</div>\
					</div>';
					$("#rawMaterialsDiv").html(card);
					console.log('Prompt Val', quatWant);

					//Update raw material quantity
					var newQuan = quan - quatWant;
					$.ajax({
						type: "POST",
						url: '../server.php?c=MaterialController&m=updateMaterialQuantity',
						data: {
							'id': id,
							'quan': newQuan
						},
						success: function(data){
							console.log('Raw Material Quantity Updated');
							new PNotify({
								title: 'Using Material',
								text: "Raw Material Quantity Updated",
								type: 'success',
								styling: 'bootstrap3'
							});
						}
					});
				}
			},
			dataType: 'json'
		});
		
	} 

	function getQuantity(){
		var totalQuatity = 0;

		$.ajax({  
      		async: false,
			url: '../server.php?c=MaterialController&m=getAllMaterial',
			type: "POST",  
			dataType: "json",  
			success: function (data) {  
				// alert(JSON.stringify(data));
				var table = $('#materialtable').DataTable();
				$("#materialtable tbody").empty();
				table.destroy();
				for (i = 0; i < data.length; i++) {

					var id = data[i].rid;
					var name = data[i].Name;
					var type = data[i].Type;
					var col = data[i].Color;
					var quan = data[i].Quantity;
					var desc = data[i].Description;

					totalQuatity = (+quan) + (+totalQuatity);
				}
			}
		});
		return totalQuatity;
	}

	function valdQua(no_of_item, item){
		if(no_of_item < 1){
			new PNotify({
				title: 'Please input a valid quantity',
				text: "Item quantity",
				type: 'warning',
				styling: 'bootstrap3'
			});
			return false;
		}

		if(item == '' || item == null){
			new PNotify({
				title: 'Please select an item',
				text: "Item",
				type: 'warning',
				styling: 'bootstrap3'
			});
			return false;
		}
		return true;
	}



	function checkQuantity() {
		var item = $("#txtitem").val();
		var no_of_item = $("#no_of_item").val();

		if(no_of_item < 1){
			new PNotify({
				title: 'Please input a valid quantity',
				text: "Item quantity",
				type: 'warning',
				styling: 'bootstrap3'
			});
			return;
		}

		if(item == '' || item == null){
			new PNotify({
				title: 'Please select an item',
				text: "Item",
				type: 'warning',
				styling: 'bootstrap3'
			});
			return;
		}

		var totalQuatity = getQuantity();

		console.log(totalQuatity);

		var shirt = 2.75*(+no_of_item);
		var tShirt = 10*(+no_of_item);
		var trousers = 4*(+no_of_item);
		var blazer = 12*(+no_of_item);
		var frocks = 11*(+no_of_item);
		var uniformsM = 6*(+no_of_item);
		var uniformsF = 15*(+no_of_item);

		var isRawCheckbox = document.getElementById("isRaw");
		var notice = document.getElementById("notice");

		if (item == "Shirt" ){
			if(shirt > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}
		else if (item == "t-Shirt" ){
			if(tShirt > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}
		else if (item == "Trousers" ){
			if(trousers > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}
		else if (item == "Blazer" ){
			if(blazer > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}
		else if (item == "Frocks" ){
			if(frocks > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}
		else if (item == "Uniforms (Male)" ){
			if(uniformsM > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}
		else if (item == "Uniforms (Female)" ){
			if(uniformsF > totalQuatity){
				notice.style.display = 'block';
				isRawCheckbox.style.display = 'none';
			}else{
				notice.style.display = 'none';
				isRawCheckbox.style.display = 'block';
			}
		}else{
			new PNotify({
				title: 'Please select from the list',
				text: "Item",
				type: 'warning',
				styling: 'bootstrap3'
			});
			return;
		}


		
	}

	function rawClose(id, quan) {
		let result = window.confirm("Are you sure you want to delete this material?");
		if (result) {
			// upodating raw material quantity
			$.ajax({
				type: "POST",
				url: '../server.php?c=MaterialController&m=updateMaterialQuantity',
				data: {
					'id': id,
					'quan': quan
				},
				success: function(data){
					console.log('Raw Material Quantity Updated');
					new PNotify({
						title: 'Deleting Selected Material',
						text: "Raw Material Quantity Updated",
						type: 'success',
						styling: 'bootstrap3'
					});
				}
			});
		}
	}

	function getMeasurementBycusId() {
		// $("#profile-tab").tab("show");
		// $("#profile-tab").html("Update Measurement");
		var id = $("#cusid1").val();
		$.ajax({
			type: "POST",
			url: '../server.php?c=MeasurementController&m=getMeasurementBycusId',
			data: {
				'id': id
			},
			dataType: 'json',
			success: function(data) {
				if (data === null) {
					new PNotify({
						title: 'No Measurements!',
						text: 'There are no measurements for selected customer.',
						type: 'warning',
						styling: 'bootstrap3'
					});
					return;
				}

				var table = $('#cusmeasurementtable').DataTable();
				$("#cusmeasurementtable tbody").empty();
				table.destroy();
				for (i = 0; i < data.length; i++) {
					// alert(data);
					var id = data[i].measId;
					var cusid = data[i].cusid;
					var cusname = data[i].cusName;
					var item = data[i].item;
					var measurement = data[i].measurement;
					var moredetails = data[i].moreDetails;

					var func_select = 'selectMeasurement(' + id + ')';

					row = ' <tr>\
						<td> ' + cusname + '  </td>\
						<td> ' + item + '  </td>\
						<td> ' + measurement + '  </td>\
						<td> ' + moredetails + '  </td>\
						<td>\
							<a href="#" class="btn btn-info btn-xs" onclick="' + func_select + '"><i class="fa fa-pencil"></i> Select </a>\
					</td>';

					$("#cusmeasurementtable tbody").append(row);
				}
				$('#cusmeasurementtable').DataTable();
			},
		});
	}

	function selectMeasurement(id) {
		// // Get a reference to the modal element
		// var modal = document.querySelector('.bs-measurement');
		// // Hide the modal by calling the hide() method
		// modal.hide();
		$('.bs-measurement').modal('hide');
		$.ajax({
      		async: false,
			type: "POST",
			url: '../server.php?c=MeasurementController&m=getMeasurement',
			data: {
				'id': id
			},
			dataType: 'json',
			success: function(data) {
				var d = data[0];
				var id = d.measId;
				var cusid = d.cusid;
				var cusname = d.cusName;
				var item = d.item;
				var measurement = d.measurement;
				var moredetails = d.moreDetails;
				console.log(id, cusid, cusname, item, measurement, moredetails);
			
				$("#measid").val(id);
				$("#measid1").val(id);
				$("#cusid1").val(cusid);
				$("#txtitem").val(item);
				$("#txtmeasurement").val(measurement);
				$("#txtmoredetails").val(moredetails);
			}
		});
	}

	function deleteCustomer(id) {
		var ans = confirm("Are you sure you want to delete this Record?");
		if (ans) {
			$.ajax({
				url: "../server.php?c=CustomerController&m=deleteCustomer",
				data: {
					'id': id
				},
				type: "POST",
				// dataType: "json",  
				success: function(data) {
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
				error: function(errormessage) {
					alert(errormessage.responseText);
				}
			});
		}
	}


	function clearData() {
		$('#imageform')[0].reset();
	}

	function Reload() {
		location.reload();
	}
</script>