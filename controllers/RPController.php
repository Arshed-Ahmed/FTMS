<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/RPModel.php");

$db_handle = new Connection();
// private $model='';

class RPController
{

	function addRP() 
	{
		$ordid = $_POST['ordid'];
		$startdate_timestamp = strtotime($_POST["paydate"]);
		$pdate = date("Y-m-d", $startdate_timestamp);
		$amount = $_POST['amount'];
		$type = $_POST['type'];
		$pamount = $_POST['pamount'];
		$balance = $_POST['balance'];
		$remarks = $_POST['remarks'];

		$model = new RPModel();
		$insertId = $model->addRP($ordid, $pdate, $amount, $type, $pamount, $balance, $remarks);
		echo json_encode($insertId);
	}

	function addInvoice() 
	{
		$payid = $_POST['payid'];
		$ordid = $_POST['ordid'];
		$invdate = date("Y-m-d");
		$model = new RPModel();
		$insertId = $model->addInvoice($ordid, $payid, $invdate);
		echo json_encode($insertId);
	}

	function updateInvoice()
	{
		$id = $_POST['payid'];
		$invid = $_POST['invid'];

		$model = new RPModel();
		$insertId = $model->updateInvoice($invid, $id);
		echo json_encode($insertId);
	}

	function getRP()
	{
		$id = $_POST['id'];
		$model = new RPModel();
		$result = $model->getRPById($id);
		echo json_encode($result);
	}

	function getAllRP()
	{
		$model = new RPModel();
		$result = $model->getAllRP();
		echo json_encode($result);
	}

	function editRP()
	{
		$id = $_POST['id'];
		$ordid = $_POST['ordid'];
		$startdate_timestamp = strtotime($_POST["paydate"]);
		$pdate = date("Y-m-d", $startdate_timestamp);
		$amount = $_POST['amount'];
		$type = $_POST['type'];
		$pamount = $_POST['pamount'];
		$balance = $_POST['balance'];
		$remarks = $_POST['remarks'];

		$model = new RPModel();
		$insertId = $model->editRP($ordid, $pdate, $amount, $type, $pamount, $balance, $remarks, $id);
		echo json_encode($insertId);
	}

	function deleteRP()
	{
		$id = $_POST["id"];
		$Model = new RPModel();
		$Model->deleteRP($id);
	}
}
