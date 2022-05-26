<?php include_once("../incl/header.php"); ?>
<!-- page content -->

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Jobcard Info</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="jobcardtable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>ID No</th>
							<th>Tailor Name</th>
							<th>Order Id</th>
							<th>Assignment Date</th>
							<th>Deadline</th>
							<th>Status</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
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
							<span class="required"> Do not Allocate more than 3 day</span>
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

<!-- Start Edit Modal -->
<div id="editmodal" class="modal fade bs-example-modal-lg" tabindex="-1" role="editmodal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">User Info</h4>
			</div>
			<div class="modal-body">
				<form id="jobform" class="form-horizontal form-label-left" novalidate="">
					<p>Create / Assign employee tasks</p>
					<input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tid">Select Tailor <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="tid" name="tid" class="select2_single form-control" tabindex="-1" required="required">
								<option>Select an Tailor</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ordid">Order <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="ordid" class="select2_single form-control" tabindex="-1" required="required">
								<option>Select an order</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="deadline">Deadline <span class="required" style="color: red;">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="deadline" class="form-control col-md-7 col-xs-12" name="deadline" required="required" type="date">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="jdetail" name="jdetail" class="form-control col-md-7 col-xs-12"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="update" class="btn btn-success" onclick="updateJob();">Update</button>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Modal -->

<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#title').text('Work Management');
		$('#breadcrumb').text('Edit Jobcard');
		loadJobData();
	});

	function loadJobData() {
		// alert("ok");
		$.ajax({
			url: '../server.php?c=JobController&m=getAllJob',
			type: "POST",
			dataType: "json",
			success: function(data) {
				// alert(JSON.stringify(data));
				var table = $('#jobcardtable').DataTable();
				$("#jobcardtable tbody").empty();
				table.destroy();
				for (i = 0; i < data.length; i++) {
					var id = data[i].jcid;
					var tid = data[i].tid;
					var ordid = data[i].ordid;
					var asdate = data[i].asdate;
					var jcdeadline = data[i].jcdeadline;
					var jdetail = data[i].jdetail;
					var jstatus = data[i].jstatus;

					var endDate = new Date(jcdeadline);
					var startDate = new Date(asdate);
					var diff = endDate.getTime() - startDate.getTime();
					var diffDays = Math.ceil(diff / (1000 * 3600 * 24));
					$('#fulltime').val(diffDays);

					var tname = getEmployee(tid);

					var func_edit = 'getJob(' + id + ')';
					var func_delete = 'deleteJob(' + id + ')';
					// createEvent();
					row =
						' <tr>\
						<td> ' + id + ' </td>\
						<td> ' + tname + ' </td>\
						<td> ' + ordid + ' </td>\
						<td> ' + asdate + ' </td>\
						<td> ' + jcdeadline + ' </td>\
						<td> ' + jstatus + ' </td>\
						<td>\
							<a href="#" class="btn btn-primary btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
							<a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
						</td>';

					$("#jobcardtable tbody").append(row);
				}
				$('#jobcardtable').DataTable()
			}
		});
	}

	function getJob(id) {
		$("#editmodal").modal("show");
		$.ajax({
			type: "POST",
			url: '../server.php?c=JobController&m=getJob',
			data: {
				'id': id
			},
			success: function(data) {

				// alert(data);
				var d = data[0];
				var id = d.jcid;
				var tid = d.tid;
				var ordid = d.ordid;
				var asdate = d.asdate;
				var jcdeadline = d.jcdeadline;
				var jdetail = d.jdetail;

				$("#id").val(id);
				$("#tid").val(tid);
				$("#ordid").val(ordid);
				$("#deadline").val(jcdeadline);
				$("#jdetail").val(jdetail);
			},
			dataType: 'json'
		});
	}

	function getEmployee(id) {
		var tname = null
		$.ajax({
			async: false,
			type: "POST",
			url: '../server.php?c=EmployeeController&m=getEmployee',
			data: {
				'id': id
			},
			success: function(data) {
				for (i = 0; i < data.length; i++) {
					var d = data[0];
					var fname = d.tFname;
					var lname = d.tLname;
					tname = fname + " " + lname;
				}
			},
			dataType: 'json'
		});
		return tname;
	}

	function updateJob() {
		var check = $('form')[0].checkValidity();
		if (check == true) {
			var id = $("#id").val();
			var tid = $("#tid").find('option:selected').val();
			var ordid = $("#ordid").find('option:selected').val();
			var jcdeadline = $("#deadline").val();
			var jdetail = $("#jdetail").val();

			var empData = {
				id: id,
				tid: tid,
				ordid: ordid,
				jcdeadline: jcdeadline,
				jdetail: jdetail
			};

			$.ajax({
				url: "../server.php?c=JobController&m=editJob",
				data: empData,
				type: "POST",
				dataType: "json",
				success: function(data) {
					// alert("Newly Updated Id is : "+ data);
					// $("#home-tab").tab("show");
					// $("#profile-tab").html("New Job");
					new PNotify({
						title: 'Edit Job',
						text: data + " Susscessfully Updated to the system",
						type: 'success',
						styling: 'bootstrap3'
					});
					loadJobData();
					clearData();
					$("#submit").css("display", "");
					$("#update").css("display", "none");
				}
				// error: function (errormessage) {  
				//   alert(errormessage.responseText);
				//   alert("Unable to Update Job");
				// }
			});
		} else {
			$("#txtfname").focus();
		}

	}

	function deleteJob(id) {
		var ans = confirm("Are you sure you want to delete this Record?");

		if (ans) {
			$.ajax({
				url: "../server.php?c=JobController&m=deleteJob",
				data: {
					'id': id
				},
				type: "POST",
				// dataType: "json",  
				success: function(data) {
					// alert('Deleted');
					loadJobData();
					new PNotify({
						title: 'Deleted!',
						text: 'Job removed.',
						type: 'error',
						styling: 'bootstrap3'
					});
					setTimeout(function() {
						location.reload()
					}, 1500);

				},
				error: function(errormessage) {
					alert(errormessage.responseText);
				}
			});
		}
	}
</script>