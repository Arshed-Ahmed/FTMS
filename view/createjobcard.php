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
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div class="x_content">
							  	<form id="jobform" class="form-horizontal form-label-left" novalidate="">
								    <p>Manage employee work details</p>
								    <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
								    <div class="item form-group">
								      	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txttname">Select Tailor <span class="required">*</span>
								      	</label>
								      	<div class="col-md-6 col-sm-6 col-xs-12">
								      	  	<select id="tname" class="select2_single form-control" tabindex="-1" required="required">
									      	    <option >Select an option</option>
									      	    <option value="1">John</option>
									      	    <option value="2">Arshed</option>
								      	  	</select>
								      	</div>
								    </div>
								    <div class="ln_solid"></div>
								    <div class="form-group">
								      	<div class="col-md-6 col-md-offset-3">
									        <button id="btnreset" type="reset" class="btn btn-primary" onclick="Reload();">Reset</button>
									        <button id="submit"  class="btn btn-success" onclick="addEmployee();">Save</button>
									        <button id="update" style="display: none;" class="btn btn-success" onclick="updateEmployee();">Update</button>
								      	</div>
								    </div>
								    <div class="ln_solid"></div>
								</form>
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-5">
							<div class="x_panel">
								<div id='calendar'></div>
							</div>

							<!-- calender modals -->
							<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">

							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							        <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
							      </div>
							      <div class="modal-body">
							        <div id="testmodal" style="padding: 5px 20px;">
							          <form id="antoform" class="form-horizontal calender" role="form">
							            <div class="form-group">
							              <label class="col-sm-3 control-label">Title</label>
							              <div class="col-sm-9">
							                <input type="text" class="form-control" id="title" name="title">
							              </div>
							            </div>
							            <div class="form-group">
							              <label class="col-sm-3 control-label">Description</label>
							              <div class="col-sm-9">
							                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
							              </div>
							            </div>
							          </form>
							        </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary antosubmit">Save changes</button>
							      </div>
							    </div>
							  </div>
							</div>
							<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">

							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							        <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
							      </div>
							      <div class="modal-body">

							        <div id="testmodal2" style="padding: 5px 20px;">
							          <form id="antoform2" class="form-horizontal calender" role="form">
							            <div class="form-group">
							              <label class="col-sm-3 control-label">Title</label>
							              <div class="col-sm-9">
							                <input type="text" class="form-control" id="title2" name="title2">
							              </div>
							            </div>
							            <div class="form-group">
							              <label class="col-sm-3 control-label">Description</label>
							              <div class="col-sm-9">
							                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
							              </div>
							            </div>

							          </form>
							        </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
							      </div>
							    </div>
							  </div>
							</div>

							<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
							<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
							<!-- /calendar modal -->
						</div>
					</div>
					<div>
						<p> Employee task table</p>
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
					<div class="ln_solid"></div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-6 col-sm-6 col-xs-6">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="item form-group">
							  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fulltime">Total Time Allocation </label>
							  	<div class="col-md-6 col-sm-6 col-xs-12">
							   		<input id="fulltime" class="form-control col-md-7 col-xs-12" name="fulltime" placeholder="Full Time" disabled="disabled">
							  	</div>
							  	<span class="required"> Do not Allocate more than 1 day</span>
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
        $('#title').text('Work Management');
        $('#breadcrumb').text('New Jobcard');
    });
</script>