<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/SupplierModel.php");

$db_handle = new Connection();
// private $model='';

class SupplierController
{	

	function addSupplier()
	{
        $name = $_POST['name'];
        $mname = $_POST['mname'];
        $regno = $_POST['regno'];
        $Pno = $_POST['Pno'];
        $email = $_POST['email'];
        $address = $_POST['address'];
		
		$model = new SupplierModel();
		$insertId = $model->addSupplier($name,$mname,$regno,$Pno,$email,$address);

		echo json_encode($insertId);
	}

	function getSupplier(){
		$id = $_POST['id'];
		$model = new SupplierModel();
		$result = $model->getSupplierById($id);
		echo json_encode($result);
	}

	function getAllSupplier(){
		$model = new SupplierModel();
		$result = $model->getAllSupplier();
		echo json_encode($result);
	}

	function editSupplier(){
		$id = $_POST['id'];
        $name = $_POST['name'];
        $mname = $_POST['mname'];
        $regno = $_POST['regno'];
        $Pno = $_POST['Pno'];
        $email = $_POST['email'];
        $address = $_POST['address'];

		$model = new SupplierModel();
		$insertId = $model->editSupplier($id,$name,$mname,$regno,$Pno,$email,$address);
		echo json_encode($insertId);
	}

	function deleteSupplier(){
		$id = $_POST["id"];
		$Model = new SupplierModel();
		$Model->deleteSupplier($id);
	}
}

?>