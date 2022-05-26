<style>
	.p-0 {
		padding: 0 !important;
	}

	.m-0 {
		margin: 0 !important;
	}
</style>
<?php include_once("../incl/header.php"); ?>
<!-- page content -->

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Create new Jobcard</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="ordertable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="width: 9px">ID No</th>
							<th>Customer Name</th>
							<th>Delivery Date</th>
							<th>Total Price</th>
							<th>Order Description</th>
							<th>Order Status</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:40px">
					<div class="col-md-7 col-sm-7 col-xs-7">
						<div class="x_content">
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
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">
										<button id="btnreset" type="reset" class="btn btn-primary" onclick="Reset();">Reset</button>
										<button id="submit" class="btn btn-success" onclick="addJob();">Create</button>
										<button id="update" style="display: none;" class="btn btn-success" onclick="updateJob();">Update</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 col-xs-5 m-0 p-0">
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
<?php include_once("../incl/footer.php"); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#title').text('Work Management');
		$('#breadcrumb').text('New Jobcard');
		loadOrderData();
		loadJobData();
		getAllEmployeeData();
	});

	function loadOrderData() {
		// alert("ok");
		$.ajax({
			url: '../server.php?c=OrderController&m=getAllOrder',
			type: "POST",
			dataType: "json",
			success: function(data) {
				// alert(JSON.stringify(data));
				var table = $('#ordertable').DataTable();
				$("#ordertable tbody").empty();
				table.destroy();
				for (i = 0; i < data.length; i++) {
					var id = data[i].ordid;
					var cusname = data[i].cusName;
					var styleid = data[i].styleId;
					var fitondate = data[i].fitonDate;
					var deliverydate = data[i].deliveryDate;
					var price = data[i].ordPrice;
					var discount = data[i].ordDiscount;
					var totalprice = price - discount;
					var description = data[i].ordDescription;
					var measid = data[i].measId;
					var progress = data[i].ordProgress;

					if (progress == 0) {
						var status = "Pending";
					} else {
						var status = "Finished";
						continue;
					}

					var func_select = 'selectOrder(' + id + ')';

					row =
						' <tr>\
						<td> ' + id + '  </td>\
						<td> ' + cusname + '</td>\
						<td> ' + deliverydate + '  </td>\
						<td> Rs. ' + totalprice + '  </td>\
						<td> ' + description + '  </td>\
						<td> ' + status + '  </td>\
						<td>\
							<a href="#" class="btn btn-info btn-xs" onclick="' + func_select + '"><i class="fa fa-pencil"></i> Select </a>\
						</td>';
					var orderSelect = '<option value="' + id + '">Order ID' + id + ' - ' + cusname + '</option>';
					$("#ordertable tbody").append(row);
					$("#ordid").append(orderSelect);
				}
				$('#ordertable').DataTable()
			}
		});
	}

	function selectOrder(id) {
		$("#ordid").val(id);
		new PNotify({
			title: 'Order-' + id + ' selected',
			text: "Order susscessfully selected in the form",
			type: 'info',
			styling: 'bootstrap3'
		});
	}

	function loadJobData() {
		// alert("ok");
		var empName = [];
		$.ajax({
			async: false,
			url: '../server.php?c=EmployeeController&m=getAllEmployee',
			type: "POST",
			dataType: "json",
			success: function(data) {
				for (i = 0; i < data.length; i++) {
					var id = data[i].tid;
					var fname = data[i].tFname;
					var lname = data[i].tLname;
					var empname = fname + " " + lname;
					empName[id] = empname;
				}
			}
		})
		var tdays = 0;
		$.ajax({
			async: false,
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

					if (jstatus == 0) {
						var status = "Pending";
					} else {
						var status = "Finished";
						// continue;
					}


					var endDate = new Date(jcdeadline);
					var startDate = new Date(asdate);
					var diff = endDate.getTime() - startDate.getTime();
					var diffDays = Math.ceil(diff / (1000 * 3600 * 24));
					tdays += diffDays;

					// var tname = getEmployee(tid);
					var tname = empName[tid];

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
						<td> ' + status + ' </td>\
						<td>\
							<a href="#" class="btn btn-primary btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
							<a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
						</td>';
					$("#jobcardtable tbody").append(row);

				}
				$('#jobcardtable').DataTable()
			}
		});
		$('#fulltime').val(tdays);
	}

	// function createEvent() {
	// 	row =
	// 		'<td class="fc-event-container">\
	// 			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">\
	// 				<div class="fc-content">\
	// 					<span class="fc-time">10:30a</span>\
	// 					<span class="fc-title">Meeting</span>\
	// 				</div>\
	// 			</a>\
	// 		</td>';

	// 	$(".fc-content-skeleton table tbody tr").append(row);
	// }


	function getJob(id) {
		// $("#profile-tab").tab("show");
		// $("#profile-tab").html("Update Employee");
		$.ajax({
			type: "POST",
			url: '../server.php?c=JobController&m=getJob',
			data: {
				'id': id
			},
			success: function(data) {
				$("#submit").css("display", "none");
				$("#update").css("display", "");

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
		$('#ordid').focus();
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

	function getAllEmployeeData() {
		$.ajax({
			async: false,
			url: '../server.php?c=EmployeeController&m=getAllEmployee',
			type: "POST",
			dataType: "json",
			success: function(data) {
				for (i = 0; i < data.length; i++) {
					var id = data[i].tid;
					var fname = data[i].tFname;
					var lname = data[i].tLname;
					var empname = fname + " " + lname;
					var empnames = '<option value="' + id + '">' + empname + '</option>';

					$("#tid").append(empnames);
				}
			},
			dataType: 'json'
		});
	}

	function addJob() {
		var check = $('form')[0].checkValidity();
		if (check == true) {
			var tid = $("#tid").find('option:selected').val();
			var ordid = $("#ordid").find('option:selected').val();
			var jcdeadline = $("#deadline").val();
			var jdetail = $("#jdetail").val();


			var empData = {
				tid: tid,
				ordid: ordid,
				jcdeadline: jcdeadline,
				jdetail: jdetail
			};

			$.ajax({
				url: "../server.php?c=JobController&m=addJob",
				data: empData,
				type: "POST",
				dataType: "json",
				success: function(data) {
					// alert(data+ " Susscessfully added to the system");

					new PNotify({
						title: 'Work Assigned',
						text: "Work is susscessfully assigned to Tailer" + data,
						type: 'success',
						styling: 'bootstrap3'
					});

					loadJobData();
					clearData();
					createNotification(data, ordid);
				},
				error: function(errormessage) {
					alert(errormessage.responseText);
					alert("Unable to add Work");
				}
			});
		} else {
			$("#deadline").focus();
		}

	}

	// Notification Creating
	function createNotification(tid, ordid) {
		let title = "Work Assigned";
		let category = "jobcard";
		let name = getEmployee(tid);
		let email = "";
		let message = name + " is assigned to oversee the order Id - " + ordid;

		var empData = {
			title: title,
			message: message,
			category: category,
			type: 1,
			reciever: name,
			email: email,
		};

		$.ajax({
			async: false,
			type: "POST",
			url: '../server.php?c=NotiController&m=addNoti',
			data: empData,
			dataType: 'json',
			success: function(data) {
				new PNotify({
					title: 'Notification',
					text: "Notification is susscessfully created",
					type: 'success',
					styling: 'bootstrap3'
				});
			},
			error: function(errormessage) {
				alert(errormessage.responseText);
				alert("Unable to create Notification");
			}
		});
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
					createNotification(data, ordid);
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

	function clearData() {
		$('input[type="text"]').val('');
		$('Select').val('');
		$("#submit").css("display", "");
		$("#update").css("display", "none");
	}
</script>