<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Jobcard Info</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="customertable" class="table table-striped table-bordered">
						<thead>
						    <tr>
								<th>ID No</th>
								<th>Tailor Name</th>
								<th>Order Id</th>
								<th>Time Allocated</th>
								<th>Item</th>
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
											<input type="radio" value="ongoing" id="ongoing" name="status'+id+'" checked=""> On going
										</label>
						    		</div>
						    		<div class="radio">
										<label>
											<input type="radio" value="finished" id="finished" name="status'+id+'"> Finished
										</label>
						    		</div>
						    	</td>
						    	<td>
									<a href="#" class="btn btn-info btn-xs" onclick=""><i class="fa fa-pencil"></i> Edit </a>
                					<a href="#" class="btn btn-danger btn-xs" onclick=""><i class="fa fa-trash-o"></i> Delete </a>
                					<a href="#" class="btn btn-success btn-xs" onclick=""><i class="fa fa-check"></i> Finished </a>
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
        $('#title').text('Work Management');
        $('#breadcrumb').text('Edit Jobcard');
    });
</script>