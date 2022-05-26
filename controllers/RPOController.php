<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/RPOModel.php");

$db_handle = new Connection();
// private $model='';

class RPOController
{

	function addRPO()
	{
		$poitem = $_POST['poitem'];
		$quan = $_POST['quan'];
    	$supplier = $_POST['supplier'];
		$startdate_timestamp = strtotime($_POST["podate"]);
		$podate = date("Y-m-d", $startdate_timestamp);

		$model = new RPOModel();
		$insertId = $model->addRPO($poitem, $quan, $podate,$supplier);

		echo json_encode($insertId);
	}

	function getRPO()
	{
		$id = $_POST['id'];
		$model = new RPOModel();
		$result = $model->getRPOById($id);
		echo json_encode($result);
	}

	function getAllRPO()
	{
		$model = new RPOModel();
		$result = $model->getAllRPO();
		echo json_encode($result);
	}

	function editRPO()
	{
		$id = $_POST['id'];
		$poitem = $_POST['poitem'];
		$quan = $_POST['quan'];
    	$supplier = $_POST['supplier'];
		$startdate_timestamp = strtotime($_POST["podate"]);
		$podate = date("Y-m-d", $startdate_timestamp);
		

		$model = new RPOModel();
		$insertId = $model->editRPO($poitem, $quan, $podate,$supplier, $id);
		echo json_encode($insertId);
	}

	function deleteRPO()
	{
		$id = $_POST["id"];
		$Model = new RPOModel();
		$Model->deleteRPO($id);
	}
}
