<?php include_once("../incl/header.php"); ?>
<!-- page content -->
<?php
if(isset($_GET['backup'])){ 
    $dbhost = $_SERVER['SERVER_NAME'];
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'ftms';
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $backupAlert = '';
    $tables = array();
    $result = mysqli_query($connection, "SHOW TABLES");
    if (!$result) {
        $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
    } else {
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        mysqli_free_result($result);

        $return = '';
        foreach ($tables as $table) {

            $result = mysqli_query($connection, "SELECT * FROM " . $table);
            if (!$result) {
                $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
            } else {
                $num_fields = mysqli_num_fields($result);
                if (!$num_fields) {
                    $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
                } else {
                    $return .= 'DROP TABLE ' . $table . ';';
                    $row2 = mysqli_fetch_row(mysqli_query($connection, 'SHOW CREATE TABLE ' . $table));
                    if (!$row2) {
                        $backupAlert = 'Error found.<br/>ERROR : ' . mysqli_error($connection) . 'ERROR NO :' . mysqli_errno($connection);
                    } else {
                        $return .= "\n\n" . $row2[1] . ";\n\n";
                        for ($i = 0; $i < $num_fields; $i++) {
                            while ($row = mysqli_fetch_row($result)) {
                                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                                for ($j = 0; $j < $num_fields; $j++) {
                                    $row[$j] = addslashes($row[$j]);
                                    if (isset($row[$j])) {
                                        $return .= '"' . $row[$j] . '"';
                                    } else {
                                        $return .= '""';
                                    }
                                    if ($j < $num_fields - 1) {
                                        $return .= ',';
                                    }
                                }
                                $return .= ");\n";
                            }
                        }
                        $return .= "\n\n\n";
                    }

                    $backup_file = $dbname . date("Y-m-d-H-i-s") . '.sql';
					$path = 'C:/Users/Arshe/Downloads/'; 
					$handle = fopen("{$path}/{$backup_file}", 'w+'); 
                    fwrite($handle, $return);
                    fclose($handle);
                    $backupAlert = 'Succesfully got the backup!';
                }
            }
        }
    }
    echo '<script> alert("Succesfully got the backup!"); </script>';
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
				<form method="post" id="export_form" action="backup.php?backup=true">
					<div class="item form-group" style="height: 50px">
          				<input id="table" name="table" value="true" type="text" class="invisible form-control col-md-7 col-xs-12">
					</div>
					<div class="item form-group" style="height: 100px">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="backup">Take a Backup copy </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<!-- <button class="btn btn-info btn-xs" name="submit" onclick="Backup();" ><i class="fa fa-cloud-download"></i> Backup </button> -->
							<button class="btn btn-info btn-xs" name="btnsubmit" id="btnsubmit" type="submit" ><i class="fa fa-cloud-download"></i> Backup </button>
							<!-- <input type="submit" class="btn btn-info" value="Export" /> -->
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