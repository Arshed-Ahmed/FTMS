<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Payroll Info</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<p>Pay rates for every item sewed or stiched</p>
							<table id="itempayrate" class="table table-striped table-bordered">
								<thead>
								    <tr>
										<th width="33%">Item</th>
										<th width="33%">Pay rate</th>
										<th>Option</th>
								    </tr>
								</thead>
								<tbody>
								    <tr>
										<td>t-Shirt</td>
										<td>Rs. 900</td>
										<td>
											<a href="#" class="btn btn-info btn-xs" onclick="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil"></i> Edit </a>
		                					<a href="#" class="btn btn-danger btn-xs" onclick=""><i class="fa fa-trash-o"></i> Delete </a>
										</td>
								    </tr>
								</tbody>
							</table>
							<a href="#" class="btn btn-success btn-xs" onclick="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add more </a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<p>Pay rates for Wages and Over Time works</p>
							<table id="ottable" class="table table-striped table-bordered">
								<thead>
								    <tr>
										<th width="33%">Time rate</th>
										<th width="33%">Payment</th>
										<th>Option</th>
								    </tr>
								</thead>
								<tbody>
									<tr>
										<td>Per Day (Wage)</td>
										<td>Rs. 1300</td>
										<td>
											<a href="#" class="btn btn-info btn-xs" onclick=""><i class="fa fa-pencil" data-toggle="modal" data-target=".bs-example-modal-lg"></i> Edit </a>
		                					<a href="#" class="btn btn-danger btn-xs" onclick=""><i class="fa fa-trash-o"></i> Delete </a>
										</td>
								    </tr>
								    <tr>
										<td>Per Hour (OT)</td>
										<td>Rs. 100</td>
										<td>
											<a href="#" class="btn btn-info btn-xs" onclick=""><i class="fa fa-pencil" data-toggle="modal" data-target=".bs-example-modal-lg"></i> Edit </a>
											<a href="#" class="btn btn-danger btn-xs" onclick=""><i class="fa fa-trash-o"></i> Delete </a>
										</td>
								    </tr>
								</tbody>
							</table>
							<a href="#" class="btn btn-success btn-xs" onclick=""><i class="fa fa-plus" data-toggle="modal" data-target=".bs-example-modal-lg"></i> Add more </a>
						</div>
					</div>

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
			</div>
		</div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function (){
        $('#title').text('Configuration');
        $('#breadcrumb').text('Pay rate');
    });
</script>