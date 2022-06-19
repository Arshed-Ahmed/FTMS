<?php
require_once("models/Connection.php");
require_once("models/CalModel.php");

$db_handle = new Connection();
// private $model='';

class CalController
{

	function addCal()
	{
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$caldate = date("Y-m-d");

		$model = new CalModel();
		$insertId = $model->addCal($title, $desc, $caldate);

		echo json_encode($insertId);
	}

	function getCal()
	{
		$id = $_POST['id'];
		$model = new CalModel();
		$result = $model->getCalById($id);
		echo json_encode($result);
	}

	function getAllCal()
	{
		$model = new CalModel();
		$result = $model->getAllCal();
		echo json_encode($result);
	}

	function editCal()
	{
		$id = $_POST['id'];
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$caldate = date("Y-m-d");

		$model = new CalModel();
		$insertId = $model->editCal($title, $desc, $caldate, $id);
		echo json_encode($insertId);
	}

	function deleteCal()
	{
		$id = $_POST["id"];
		$Model = new CalModel();
		$Model->deleteCal($id);
	}
}
