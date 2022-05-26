<?php include_once("../incl/header.php"); ?>
<style>
	#txtname:invalid {
		color: #999999;
	}

	#txtname[disabled] {
		color: #999999;
	}

	#txtname option {
		color: black;
	}
</style>

<!-- page content -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Salary Info</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form id="payrollform" onchange="totalSal()" class="form-horizontal form-label-left" novalidate="">
					<p>Salary/ Wage</p>
					<input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname">Employee Name<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="txtname" class="form-control col-md-7 col-xs-12" name="txtname" required="required" type="text" onchange="getSalary();">
								<option value="" disabled selected hidden>Select a Employee</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sal">Salary/ Wage
							<!-- <span class="required">*</span> -->
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="sal" class="form-control col-md-7 col-xs-12" name="sal" placeholder="Rs. 00.00" type="number" disabled="disabled">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="bonus">Bonus
							<!-- <span class="required">*</span> -->
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="bonus" class="form-control col-md-7 col-xs-12" name="bonus" placeholder="Rs. 00.00" type="number">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="advance">Cash Advance
							<!-- <span class="required">*</span> -->
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="advance" class="form-control col-md-7 col-xs-12" name="advance" placeholder="Rs. 00.00" type="number">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ot">OT
							<!-- <span class="required">*</span> -->
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="ot" class="form-control col-md-7 col-xs-12" name="ot" placeholder="Rs. 00.00" type="number">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="totsal">Total Salary <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="totsal" class="form-control col-md-7 col-xs-12" name="totsal" placeholder="Rs. 00.00" required="required" type="number" disabled="disabled">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="reset" class="btn btn-primary" onclick="Reload();">Cancel</button>
							<button id="submit" type="" class="btn btn-success" onclick="addPayroll();">Save</button>
							<button id="update" style="display: none;" class="btn btn-success" onclick="updatePayroll();">Update</button>
						</div>
					</div>
				</form>

				<p>Salary History</p>
				<table id="payrolltable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>ID No</th>
							<th>Employee Name</th>
							<th>Payment Date</th>
							<th>Salary</th>
							<th>Advance</th>
							<th>Bonus and OT</th>
							<th>Total Salary</th>
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
	$(document).ready(function() {
		$('#title').text('Configuration');
		$('#breadcrumb').text('Payroll');
		loadEmployeeData();
		loadPayrollData();
	});

	function loadEmployeeData() {
		// alert("ok");
		$.ajax({
			url: '../server.php?c=EmployeeController&m=getAllEmployee',
			type: "POST",
			dataType: "json",
			success: function(data) {
				// alert(JSON.stringify(data));
				for (i = 0; i < data.length; i++) {

					var id = data[i].tid;
					var fname = data[i].tFname;
					var lname = data[i].tLname;

					// var func_getSal = 'getSalary(' + id + ')';


					option =
						'<option value="' + id + '" >\
							' + fname + ' ' + lname + ' \
						</option>';

					$("#txtname").append(option);
				}
			}
		});
	}

	function getSalary() {
		var id = $("#txtname").find('option:selected').val();
		$.ajax({
			type: "POST",
			url: '../server.php?c=EmployeeController&m=getEmployee',
			data: {
				'id': id
			},
			success: function(data) {

				for (i = 0; i < data.length; i++) {
					var d = data[0];
					var id = d.tid;
					var salary = d.tSalary;

					$("#id").val(id);
					$("#sal").val(salary);
					$("#totsal").val(salary);

				}
			},
			dataType: 'json'
		});
	}

	function loadPayrollData() {
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
		// alert("ok");
		$.ajax({
			url: '../server.php?c=PayrollController&m=getAllPayroll',
			type: "POST",
			dataType: "json",
			success: function(data) {
				// alert(JSON.stringify(data));
				var table = $('#payrolltable').DataTable();
				$("#payrolltable tbody").empty();
				table.destroy();
				for (i = 0; i < data.length; i++) {

					var id = data[i].salid;
					var tid = data[i].tid;
					var paymentdate = data[i].paymentdate;
					var salary = data[i].salary;
					var bonus = data[i].bonus;
					var advance = data[i].advance;
					var ot = data[i].ot;
					var totsal = data[i].totalsalary;

					var tname = empName[tid];

					var func_edit = 'getPayroll(' + id + ')';
					var func_delete = 'deletePayroll(' + id + ')';

					row =
						' <tr>\
						<td> ' + id + '  </td>\
						<td> ' + tname + '</td>\
						<td> ' + paymentdate + '  </td>\
						<td> ' + salary + '  </td>\
						<td> ' + advance + '  </td>\
						<td> ' + (parseInt(bonus) + parseInt(ot)) + '  </td>\
						<td> ' + totsal + '  </td>\
						<td>\
							<a href="#" class="btn btn-info btn-xs" onclick="' + func_edit + '"><i class="fa fa-pencil"></i> Edit </a>\
							<a href="#" class="btn btn-danger btn-xs" onclick="' + func_delete + '"><i class="fa fa-trash-o"></i> Delete </a>\
						</td>';

					$("#payrolltable tbody").append(row);
				}
				$('#payrolltable').DataTable()
			}
		});
	}

	function totalSal() {
		let salary;
		let bonus;
		let advance;
		let ot;
		if ($("#sal").val() === "") {
			salary = 0
		} else {
			salary = $("#sal").val();
		}
		if ($("#bonus").val() === "") {
			bonus = 0
		} else {
			bonus = $("#bonus").val();
		}
		if ($("#advance").val() === "") {
			advance = 0
		} else {
			advance = $("#advance").val();
		}
		if ($("#ot").val() === "") {
			ot = 0
		} else {
			ot = $("#ot").val();
		}
		var totsal = (parseInt(salary) + parseInt(bonus) + parseInt(ot) - parseInt(advance))
		$("#totsal").val(totsal);
	}

	function addPayroll() {
		var check = $('form')[0].checkValidity();
		if (check == true) {
			var tid = $("#txtname").find('option:selected').val();
			var salary = $("#sal").val();
			var bonus = $("#bonus").val();
			var advance = $("#advance").val();
			var ot = $("#ot").val();
			var totsal = $("#totsal").val();


			var empData = {
				tid: tid,
				salary: salary,
				bonus: bonus,
				advance: advance,
				ot: ot,
				totsal: totsal,
			};

			$.ajax({
				url: "../server.php?c=PayrollController&m=addPayroll",
				data: empData,
				type: "POST",
				dataType: "json",
				success: function(data) {
					// alert(data+ " Susscessfully added to the system");

					new PNotify({
						title: 'New Payroll',
						text: data + " Susscessfully added to the system",
						type: 'success',
						styling: 'bootstrap3'
					});

					loadPayrollData();
					clearData();

				},
				error: function(errormessage) {
					alert(errormessage.responseText);
					alert("Unable to add Payroll");
				}
			});
		} else {
			$("#txtname").focus();
		}

	}

	function getPayroll(id) {
		// $("#profile-tab").tab("show");
		// $("#profile-tab").html("Update Payroll");
		$.ajax({
			type: "POST",
			url: '../server.php?c=PayrollController&m=getPayroll',
			data: {
				'id': id
			},
			success: function(data) {
				$('#payrollform')[0].reset();
				$("#submit").css("display", "none");
				$("#update").css("display", "");

				// alert(data);
				var d = data[0];
				var id = d.salid;
				var tid = d.tid;
				var salary = d.salary;
				var bonus = d.bonus;
				var advance = d.advance;
				var ot = d.ot;
				var totsal = d.totalsalary;

				$("#id").val(id);
				$("#txtname").val(tid);
				$("#sal").val(salary);
				$("#bonus").val(bonus);
				$("#advance").val(advance);
				$("#ot").val(ot);
				$("#totsal").val(totsal);
			},
			dataType: 'json'
		});
	}

	//Add Payroll data Function   
	function updatePayroll() {
		var check = $('form')[0].checkValidity();
		if (check == true) {
			var id = $("#id").val();
			var tid = $("#txtname").find('option:selected').val();
			var salary = $("#sal").val();
			var bonus = $("#bonus").val();
			var advance = $("#advance").val();
			var ot = $("#ot").val();
			var totsal = $("#totsal").val();

			var empData = {
				id: id,
				tid: tid,
				salary: salary,
				bonus: bonus,
				advance: advance,
				ot: ot,
				totsal: totsal,
			};

			$.ajax({
				url: "../server.php?c=PayrollController&m=editPayroll",
				data: empData,
				type: "POST",
				dataType: "json",
				success: function(data) {
					// alert("Newly Updated Id is : "+ data);
					// $("#home-tab").tab("show");
					// $("#profile-tab").html("New Payroll");
					new PNotify({
						title: 'Edit Payroll',
						text: data + " Susscessfully Updated to the system",
						type: 'success',
						styling: 'bootstrap3'
					});
					loadPayrollData();
					clearData();
					$("#submit").css("display", "");
					$("#update").css("display", "none");
				}
				// error: function (errormessage) {  
				//   alert(errormessage.responseText);
				//   alert("Unable to Update Payroll");
				// }
			});
		} else {
			$("#txtname").focus();
		}

	}

	function deletePayroll(id) {
		var ans = confirm("Are you sure you want to delete this Record?");

		if (ans) {
			$.ajax({
				url: "../server.php?c=PayrollController&m=deletePayroll",
				data: {
					'id': id
				},
				type: "POST",
				// dataType: "json",  
				success: function(data) {
					// alert('Deleted');
					loadPayrollData();
					new PNotify({
						title: 'Deleted!',
						text: 'Payroll removed.',
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
		$('input[type="number"]').val('');
		$('Select').val('');
		$("#submit").css("display", "");
		$("#update").css("display", "none");
	}

	function Reload() {
		location.reload();
	}
</script>