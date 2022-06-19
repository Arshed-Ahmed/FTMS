<?php include_once("../incl/header.php"); ?>
<!-- page content -->
<?php
require_once("db_conn.php");

$connect = new PDO("mysql:host=localhost;dbname=ftms", "root", "");
$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['backup'])){
	$output = '';
	foreach($result as $table) {
		$show_table_query = "SHOW CREATE TABLE " . $table . "";
		$statement = $connect->prepare($show_table_query);
		$statement->execute();
		$show_table_result = $statement->fetchAll();

		foreach($show_table_result as $show_table_row){
			$output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
		}
		$select_query = "SELECT * FROM " . $table . "";
		$statement = $connect->prepare($select_query);
		$statement->execute();
		$total_row = $statement->rowCount();

		for($count=0; $count<$total_row; $count++) {
			$single_result = $statement->fetch(PDO::FETCH_ASSOC);
			$table_column_array = array_keys($single_result);
			$table_value_array = array_values($single_result);
			$output .= "\nINSERT INTO $table (";
			$output .= "" . implode(", ", $table_column_array) . ") VALUES (";
			$output .= "'" . implode("','", $table_value_array) . "');\n";
		}
	}
	$file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
	$file_handle = fopen($file_name, 'w+');
	fwrite($file_handle, $output);
	fclose($file_handle);
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=' . basename($file_name));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_name));
    ob_clean();
    flush();
    readfile($file_name);
    unlink($file_name);
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
				<form method="post" id="export_form">
					<div class="item form-group" style="height: 50px">
          				<input id="table" name="table" value="true" type="text" class="invisible form-control col-md-7 col-xs-12">
					</div>
					<div class="checkbox item form-group">
						<label><input type="checkbox" class="checkbox_table" name="table[]" value="true" /> All Table</label>
					</div>
					<div class="item form-group" style="height: 100px">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="backup">Take a Backup copy </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<!-- <button class="btn btn-info btn-xs" name="submit" onclick="Backup();" ><i class="fa fa-cloud-download"></i> Backup </button> -->
							<!-- <button class="btn btn-info btn-xs" name="btnsubmit" id="btnsubmit" type="submit" ><i class="fa fa-cloud-download"></i> Backup </button> -->
							<input type="submit" class="btn btn-info" value="Export" />
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