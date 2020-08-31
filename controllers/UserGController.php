<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/UserGModel.php");

$db_handle = new Connection();
// private $model='';

class UserGController
{	

	function addUserG()
	{
        $name = $_POST['name'];
        $type = $_POST['type'];
        $description = $_POST['description'];
		
		$model = new UserGModel();
		$insertId = $model->addUserG($name,$type,$description);

		echo json_encode($insertId);
	}

	function getUserG(){
		$id = $_POST['id'];
		$model = new UserGModel();
		$result = $model->getUserGById($id);
		echo json_encode($result);
	}

	function getAllUserG(){
		$model = new UserGModel();
		$result = $model->getAllUserG();
		echo json_encode($result);
	}

	function editUserG(){
		$id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $description = $_POST['description'];

		$model = new UserGModel();
		$insertId = $model->editUserG($name,$type,$description,$id);
		echo json_encode($insertId);
	}

	function deleteUserG(){
		$id = $_POST["id"];
		$Model = new UserGModel();
		$Model->deleteUserG($id);
	}
}
?>