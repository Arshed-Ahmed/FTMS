<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/ItemCatModel.php");

$db_handle = new Connection();
// private $model='';

class ItemCatController
{	

	function addItemCat()
	{
        $name = $_POST['name'];
        $desc = $_POST['desc'];
		
		$model = new ItemCatModel();
		$insertId = $model->addItemCat($name,$desc);

		echo json_encode($insertId);
	}

	function getItemCat(){
		$id = $_POST['id'];
		$model = new ItemCatModel();
		$result = $model->getItemCatById($id);
		echo json_encode($result);
	}

	function getAllItemCat(){
		$model = new ItemCatModel();
		$result = $model->getAllItemCat();
		echo json_encode($result);
	}

	function editItemCat(){
		$id = $_POST['id'];
		$name = $_POST['name'];
        $desc = $_POST['desc'];

		$model = new ItemCatModel();
		$insertId = $model->editItemCat($name,$desc,$id);
		echo json_encode($insertId);
	}

	function deleteItemCat(){
		$id = $_POST["id"];
		$Model = new ItemCatModel();
		$Model->deleteItemCat($id);
	}
}

?>