<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Notification Info</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="notitable" class="table table-striped table-bordered">
						<thead>
						    <tr>
								<th>ID No</th>
								<th>Receiver Name</th>
								<th>Email</th>
								<th>Category</th>
								<th>Subject</th>
								<th>Message</th>
								<th>Option</th>
						    </tr>
						</thead>
						<tbody>
						    <tr>
						    	<td></td>
						    	<td></td>
						    	<td></td>
						    	<td>
						    		<div class="radio">
										<label>
											<input type="radio" value="ongoing" id="ongoing" name="status'+id+'" checked=""> Employee
										</label>
						    		</div>
						    		<div class="radio">
										<label>
											<input type="radio" value="finished" id="finished" name="status'+id+'"> Customer
										</label>
						    		</div>
						    	</td>
						    	<td></td>
						    	<td></td>
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
        $('#title').text('Notification');
        $('#breadcrumb').text('Notification List');
    });
</script>