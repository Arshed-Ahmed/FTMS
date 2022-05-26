<?php include_once("../incl/header.php"); ?>
<!-- page content -->
<?php
if (isset($_POST['submit'])) {
	include("db_conn.php");
	$filename = 'db_backup_' . date('G_a_m_d_y') . '.sql';
	$query = "mysqldump ftms --password='' --user=root --single-transaction > '.$filename'";
	$res = mysqli_query($conn, $sql);
}

?>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Backup Data</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form method="POST">
					<div class="item form-group" style="height: 50px"></div>
					<div class="item form-group" style="height: 100px">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="advance">Take a Backup copy </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<a role="button" class="btn btn-info btn-xs" name="submit" onclick="Backup();"><i class="fa fa-cloud-download"></i> Backup </a>
						</div>
					</div>
				</form>


				<p>Backup History</p>
				<table id="backuptable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>ID No</th>
							<th>Backed up Time and Date</th>
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
		$('#breadcrumb').text('Backup');
		loadBackupData();
	});

	function loadBackupData() {
		// alert("ok");
		$.ajax({
			url: '../server.php?c=BackupController&m=getAllBackup',
			type: "POST",
			dataType: "json",
			success: function(data) {
				// alert(JSON.stringify(data));
				var table = $('#backuptable').DataTable();
				$("#backuptable tbody").empty();
				table.destroy();
				for (i = 0; i < data.length; i++) {

					var id = data[i].id;
					var time = data[i].timeDate;

					row =
						' <tr>\
						<td> ' + id + '  </td>\
						<td> ' + time + '</td>';

					$("#backuptable tbody").append(row);
				}
				$('#backuptable').DataTable()
			}
		});
	}

	function Backup() {
		$.ajax({
			url: "../server.php?c=BackupController&m=Backup",
			type: "POST",
			dataType: "json",
			success: function(data) {
				// alert(data+ " Susscessfully added to the system");
				$.ajax({
					url: "../server.php?c=BackupController&m=addBackup",
					type: "POST",
					dataType: 'binary',
					xhrFields: {
						'responseType': 'blob'
					},
					success: function(data) {
						// alert(data+ " Susscessfully added to the system");
						var link = document.createElement('a'),
							filename = 'file.sql';
						// if(xhr.getResponseHeader('Content-Disposition')){//filename 
						//     filename = xhr.getResponseHeader('Content-Disposition');
						//     filename=filename.match(/filename="(.*?)"/)[1];
						//     filename=decodeURIComponent(escape(filename));
						// }
						link.href = URL.createObjectURL(data);
						link.download = filename;
						link.click();

						new PNotify({
							title: 'New Backup',
							text: "Backup is Susscessfully downloaded from the system",
							type: 'success',
							styling: 'bootstrap3'
						});

						loadBackupData();

					},
					error: function(errormessage) {
						alert(errormessage.responseText);
						alert("Unable to take Backup");
					}
				});
			},
			error: function(errormessage) {
				alert(errormessage.responseText);
				alert("Unable to take a Backup");
			}
		});

	}
</script>