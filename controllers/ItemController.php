<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/ItemModel.php");

$db_handle = new Connection();
// private $model='';

class ItemController
{	

	function addItem()
	{
        $iname = $_POST['iname'];
        $icat = $_POST['icat'];
        $value = $_POST['value'];
		
		$model = new ItemModel();
		$insertId = $model->addItem($iname,$icat,$value);

		echo json_encode($insertId);
	}

	function getItem(){
		$id = $_POST['id'];
		$model = new ItemModel();
		$result = $model->getItemById($id);
		echo json_encode($result);
	}

	function getAllItem(){
		$model = new ItemModel();
		$result = $model->getAllItem();
		echo json_encode($result);
	}

	function editItem(){
		$id = $_POST['id'];
        $iname = $_POST['iname'];
        $icat = $_POST['icat'];
        $value = $_POST['value'];

		$model = new ItemModel();
		$insertId = $model->editItem($iname,$icat,$value,$id);
		echo json_encode($insertId);
	}

	function deleteItem(){
		$id = $_POST["id"];
		$Model = new ItemModel();
		$Model->deleteItem($id);
	}
}

?>