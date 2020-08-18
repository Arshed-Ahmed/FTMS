<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Customer Info</h2>
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
</script>