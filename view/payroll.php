<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Salary Info</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form id="userform" class="form-horizontal form-label-left" novalidate="">
						<p>Salary/ Wage</p>
						<input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">Employee/ Employee Id <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="txtname" class="form-control col-md-7 col-xs-12" name="txtname" placeholder="Name/ Id" required="required" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sal">Salary/ Wage <!-- <span class="required">*</span> -->
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="sal" class="form-control col-md-7 col-xs-12" name="sal" placeholder="00.00" type="text" disabled="disabled">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="bonus">Bonus/ Penalty <!-- <span class="required">*</span> -->
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="bonus" class="form-control col-md-7 col-xs-12" name="bonus" placeholder="00.00" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="advance">Cash Advance <!-- <span class="required">*</span> -->
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="advance" class="form-control col-md-7 col-xs-12" name="advance" placeholder="00.00" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ot">OT <!-- <span class="required">*</span> -->
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="ot" class="form-control col-md-7 col-xs-12" name="ot" placeholder="00.00" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="totsal">Total Salary <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="totsal" class="form-control col-md-7 col-xs-12" name="totsal" placeholder="00.00" required="required" type="text" disabled="disabled">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button type="reset" class="btn btn-primary" onclick="Reload();">Cancel</button>
								<button id="submit" type="" class="btn btn-success" onclick="addUser();">Save</button>
								<button id="compute" type="" class="btn btn-info" onclick="report();">Compute</button>
								<button id="update" style="display: none;" class="btn btn-success" onclick="updateUser();">Update</button>
							</div>
						</div>
					</form>

					<p>Salary History</p>
					<table id="customertable" class="table table-striped table-bordered">
						<thead>
						    <tr>
								<th>ID No</th>
								<th>Employee</th>
								<th>Payment Date</th>
								<th>Category</th>
								<th>Total Salary</th>
								<th>Status</th>
								<th>Option</th>
						    </tr>
						</thead>
						<tbody>
						    <tr>
						    	<td></td>
						    	<td></td>
						    	<td></td>
						    	<td></td>
						    	<td></td>
						    	<td>
			    		    		<div class="radio">
			    						<label>
			    							<input type="radio" value="received" id="received" name="status'+id+'" checked=""> Received
			    						</label>
			    		    		</div>
			    		    		<div class="radio">
			    						<label>
			    							<input type="radio" value="notreceived" id="notreceived" name="status'+id+'"> Not received
			    						</label>
			    		    		</div>
						    	</td>
						    	<td>
						    		<a href="#" class="btn btn-info btn-xs" onclick=""><i class="fa fa-pencil"></i> Edit </a>
						    		<a href="#" class="btn btn-danger btn-xs" onclick=""><i class="fa fa-trash-o"></i> Delete </a>
						    	</td>
						    </tr>
						</tbody>
					</table>
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
        $('#breadcrumb').text('Payroll');
    });

  function clearData() {
    $('input[type="text"]').val('');
    $('input[type="password"]').val('');
    $('Select').val('');
    $("#submit").css("display","");
    $("#update").css("display","none");
  }

  function Reload() {
    location.reload();
  }

</script>