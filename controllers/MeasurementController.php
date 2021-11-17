<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/MeasurementModel.php");

$db_handle = new Connection();
// private $model='';

class MeasurementController
{	

	function addMeasurement()
	{
        $cusid = $_POST['cusid'];
        $cusname = $_POST['cusname'];
        $item = $_POST['item'];
        $measurement = $_POST['measurement'];
        $moredetails = $_POST['moredetails'];
		
		$model = new MeasurementModel();
		$insertId = $model->addMeasurement($cusid,$cusname,$item,$measurement,$moredetails);

		echo json_encode($insertId);
	}

	function getMeasurement(){
		$id = $_POST['id'];
		$model = new MeasurementModel();
		$result = $model->getMeasurementById($id);
		echo json_encode($result);
	}

	function getMeasurementBycusId(){
		$id = $_POST['id'];
		$model = new MeasurementModel();
		$result = $model->getMeasurementBycusId($id);
		echo json_encode($result);
	}

	function getAllMeasurement(){
		$model = new MeasurementModel();
		$result = $model->getAllMeasurement();
		echo json_encode($result);
	}

	function getAllMeasurementDESC(){
		$model = new MeasurementModel();
		$result = $model->getAllMeasurementDESC();
		echo json_encode($result);
	}

	function editMeasurement(){
		$id = $_POST['id'];
		$cusid = $_POST['cusid'];
        $cusname = $_POST['cusname'];
        $item = $_POST['item'];
        $measurement = $_POST['measurement'];
        $moredetails = $_POST['moredetails'];

		$model = new MeasurementModel();
		$insertId = $model->editMeasurement($cusid,$cusname,$item,$measurement,$moredetails,$id);
		echo json_encode($insertId);
	}

	function deleteMeasurement(){
		$id = $_POST["id"];
		$Model = new MeasurementModel();
		$Model->deleteMeasurement($id);
	}
}
?>