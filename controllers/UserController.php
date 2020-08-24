<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/UserModel.php");

$db_handle = new Connection();
// private $model='';

class UserController
{	

	function addUser()
	{
        $name = $_POST['name'];
        $pass= $_POST['password'];
        $password= md5($pass);
        $type = $_POST['type'];
        $status = $_POST['status'];
		
		$model = new UserModel();
		$insertId = $model->addUser($name,$password,$type,$status);

		echo json_encode($insertId);
	}

	function getUser(){
		$id = $_POST['id'];
		$model = new UserModel();
		$result = $model->getUserById($id);
		echo json_encode($result);
	}

	function getAllUser(){
		$model = new UserModel();
		$result = $model->getAllUser();
		echo json_encode($result);
	}

	function editUser(){
		$id =$_POST['id'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $password= md5($pass);
        $type = $_POST['type'];
        $status = $_POST['status'];

		$model = new UserModel();
		$insertId = $model->editUser($name,$password,$type,$status,$id);
		echo json_encode($insertId);
	}

	function deleteUser(){
		$id = $_POST["id"];
		$Model = new UserModel();
		$Model->deleteUser($id);
	}
}

?>