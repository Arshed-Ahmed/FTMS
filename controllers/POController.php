<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/POModel.php");

$db_handle = new Connection();
// private $model='';

class POController
{

	function addPO()
	{
		$poitem = $_POST['poitem'];
		$quan = $_POST['quan'];
    	$supplier = $_POST['supplier'];
		$startdate_timestamp = strtotime($_POST["podate"]);
		$podate = date("Y-m-d", $startdate_timestamp);

		$model = new POModel();
		$insertId = $model->addPO($poitem, $quan, $podate,$supplier);

		echo json_encode($insertId);
	}

	function getPO()
	{
		$id = $_POST['id'];
		$model = new POModel();
		$result = $model->getPOById($id);
		echo json_encode($result);
	}

	function getAllPO()
	{
		$model = new POModel();
		$result = $model->getAllPO();
		echo json_encode($result);
	}

	function editPO()
	{
		$id = $_POST['id'];
		$poitem = $_POST['poitem'];
		$quan = $_POST['quan'];
    	$supplier = $_POST['supplier'];
		$startdate_timestamp = strtotime($_POST["podate"]);
		$podate = date("Y-m-d", $startdate_timestamp);
		

		$model = new POModel();
		$insertId = $model->editPO($poitem, $quan, $podate,$supplier, $id);
		echo json_encode($insertId);
	}

	function deletePO()
	{
		$id = $_POST["id"];
		$Model = new POModel();
		$Model->deletePO($id);
	}
}
