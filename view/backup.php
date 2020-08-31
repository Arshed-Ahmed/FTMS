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
					<div class="item form-group" style="height: 50px"></div>
					<div class="item form-group" style="height: 100px">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="advance">Take a Backup copy </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<a href="#" class="btn btn-info btn-xs" onclick=""><i class="fa fa-cloud-download"></i> Backup </a>
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
        $('#breadcrumb').text('Backup');
    });
</script>