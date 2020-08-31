<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/MaterialModel.php");

$db_handle = new Connection();
// private $model='';

class MaterialController
{	

	function addMaterial()
	{
        $name = $_POST['name'];
        $type= $_POST['type'];
        $col = $_POST['col'];
        $quan = $_POST['quan'];
        $desc = $_POST['desc'];
		
		$model = new MaterialModel();
		$insertId = $model->addMaterial($name,$type,$col,$quan,$desc);

		echo json_encode($insertId);
	}

	function getMaterial(){
		$id = $_POST['id'];
		$model = new MaterialModel();
		$result = $model->getMaterialById($id);
		echo json_encode($result);
	}

	function getAllMaterial(){
		$model = new MaterialModel();
		$result = $model->getAllMaterial();
		echo json_encode($result);
	}

	function editMaterial(){
		$id =$_POST['id'];
        $name = $_POST['name'];
        $type= $_POST['type'];
        $col = $_POST['col'];
        $quan = $_POST['quan'];
        $desc = $_POST['desc'];

		$model = new MaterialModel();
		$insertId = $model->editMaterial($name,$type,$col,$quan,$desc,$id);
		echo json_encode($insertId);
	}

	function deleteMaterial(){
		$id = $_POST["id"];
		$Model = new MaterialModel();
		$Model->deleteMaterial($id);
	}
}
?>