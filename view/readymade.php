<?php include_once("../incl/header.php");?>
<!-- page content -->

    <div class="clearfix"></div>
	<div class="raw">
	    <div class="" role="tabpanel" data-example-id="togglable-tabs">
	      	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	        	<li role="presentation" class=""><a href="tailormade.php" id="home-tab" role="tab" >Tailormade</a>
	        	</li>
	        	<li role="presentation" class=""><a href="hire.php" role="tab" id="profile-tab" >Hire</a>
	        	</li>
	        	<li role="presentation" class="active"><a href="readymade.php" role="tab" id="profile-tab2" >Readymade</a>
	        	</li>
	      	</ul>
	      	<div id="myTabContent" class="tab-content">
	        	<div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
	          		<span class="required">Not Implemented, No Ready Made Sales Available of yet!</span>
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
	        $('#breadcrumb').text('Create Readymade Order');
	    });
	</script>