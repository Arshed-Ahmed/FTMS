<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/PriceModel.php");

$db_handle = new Connection();
// private $model='';

class PriceController
{	

	function addPrice()
	{
        $item = $_POST['item'];
        $pvalue= $_POST['pvalue'];
        $hvalue = $_POST['hvalue'];
        $desc = $_POST['desc'];
        $type = $_POST['type'];
		
		$model = new PriceModel();
		$insertId = $model->addPrice($item,$pvalue,$hvalue,$desc,$type);

		echo json_encode($insertId);
	}

	function getPrice(){
		$id = $_POST['id'];
		$model = new PriceModel();
		$result = $model->getPriceById($id);
		echo json_encode($result);
	}

	function getAllPrice(){
		$model = new PriceModel();
		$result = $model->getAllPrice();
		echo json_encode($result);
	}

	function getAllCitem(){
		$model = new PriceModel();
		$result = $model->getAllCitem();
		echo json_encode($result);
	}

	function getAllHitem(){
		$model = new PriceModel();
		$result = $model->getAllHitem();
		echo json_encode($result);
	}

	function editPrice(){
		$id =$_POST['id'];
        $item = $_POST['item'];
        $pvalue= $_POST['pvalue'];
        $hvalue = $_POST['hvalue'];
        $desc = $_POST['desc'];
        $type = $_POST['type'];

		$model = new PriceModel();
		$insertId = $model->editPrice($item,$pvalue,$hvalue,$desc,$type,$id);
		echo json_encode($insertId);
	}

	function deletePrice(){
		$id = $_POST["id"];
		$Model = new PriceModel();
		$Model->deletePrice($id);
	}
}

?>