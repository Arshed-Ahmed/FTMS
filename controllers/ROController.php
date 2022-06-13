<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/ROModel.php");

$db_handle = new Connection();
// private $model='';

class ROController
{

	function addRO()
	{
		$ordid = $_POST['ordid'];
		$cusid = $_POST['cusid'];
		$startdate_timestamp = strtotime($_POST["rodate"]);
		$rodate = date("Y-m-d", $startdate_timestamp);
		$reason = $_POST['reason'];
		$remarks = $_POST['remarks'];

		$model = new ROModel();
		$insertId = $model->addRO($ordid ,$cusid ,$rodate ,$reason, $remarks);

		echo json_encode($insertId);
	}

	function getRO()
	{
		$id = $_POST['id'];
		$model = new ROModel();
		$result = $model->getROById($id);
		echo json_encode($result);
	}

	function getAllRO()
	{
		$model = new ROModel();
		$result = $model->getAllRO();
		echo json_encode($result);
	}

	function editRO()
	{
		$id = $_POST['id'];
		$ordid = $_POST['ordid'];
		$cusid = $_POST['cusid'];
		$startdate_timestamp = strtotime($_POST["rodate"]);
		$rodate = date("Y-m-d", $startdate_timestamp);
		$reason = $_POST['reason'];
		$remarks = $_POST['remarks'];

		$model = new ROModel();
		$insertId = $model->editRO($ordid ,$cusid ,$rodate ,$reason, $remarks, $id);
		echo json_encode($insertId);
	}

	function deleteRO()
	{
		$id = $_POST["id"];
		$Model = new ROModel();
		$Model->deleteRO($id);
	}
}
