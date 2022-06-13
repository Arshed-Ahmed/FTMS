<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/MakePModel.php");

$db_handle = new Connection();
// private $model='';

class MakePController
{

	function addMakeP() 
	{
		$poid = $_POST['poid'];
		$startdate_timestamp = strtotime($_POST["paydate"]);
		$pdate = date("Y-m-d", $startdate_timestamp);
		$amount = $_POST['amount'];
		$type = $_POST['type'];
		$pamount = $_POST['pamount'];
		$invid = $_POST['invid'];
		$balance = $_POST['balance'];
		$remarks = $_POST['remarks'];

		$model = new MakePModel();
		$insertId = $model->addMakeP($poid, $pdate, $amount, $type, $pamount, $invid, $balance, $remarks);
		echo json_encode($insertId);
	}

	function getMakeP()
	{
		$id = $_POST['id'];
		$model = new MakePModel();
		$result = $model->getMakePById($id);
		echo json_encode($result);
	}

	function getAllMakeP()
	{
		$model = new MakePModel();
		$result = $model->getAllMakeP();
		echo json_encode($result);
	}

	function editMakeP()
	{
		$id = $_POST['id'];
		$poid = $_POST['poid'];
		$startdate_timestamp = strtotime($_POST["paydate"]);
		$pdate = date("Y-m-d", $startdate_timestamp);
		$amount = $_POST['amount'];
		$type = $_POST['type'];
		$pamount = $_POST['pamount'];
		$invid = $_POST['invid'];
		$balance = $_POST['balance'];
		$remarks = $_POST['remarks'];

		$model = new MakePModel();
		$insertId = $model->editMakeP($poid, $pdate, $amount, $type, $pamount, $invid, $balance, $remarks, $id);
		echo json_encode($insertId);
	}

	function deleteMakeP()
	{
		$id = $_POST["id"];
		$Model = new MakePModel();
		$Model->deleteMakeP($id);
	}
}
