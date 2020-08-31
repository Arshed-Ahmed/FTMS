<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/EmployeeModel.php");

$db_handle = new Connection();
// private $model='';

class EmployeeController
{	

	function addEmployee()
	{
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic = $_POST['nic'];
        $Pno = $_POST['Pno'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $startdate = '';
		$startdate_timestamp = strtotime($_POST["startdate"]);
		$startdate = date("Y-m-d", $startdate_timestamp);
        $category = $_POST['category'];
        $status = $_POST['status'];
		
		$model = new EmployeeModel();
		$insertId = $model->addEmployee($fname,$lname,$nic,$Pno,$email,$address,$startdate,$category,$status);

		echo json_encode($insertId);
	}

	function getEmployee(){
		$id = $_POST['id'];
		$model = new EmployeeModel();
		$result = $model->getEmployeeById($id);
		echo json_encode($result);
	}

	function getAllEmployee(){
		$model = new EmployeeModel();
		$result = $model->getAllEmployee();
		echo json_encode($result);
	}

	function editEmployee(){
		$id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic = $_POST['nic'];
        $Pno = $_POST['Pno'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $startdate = '';
		$startdate_timestamp = strtotime($_POST["startdate"]);
		$startdate = date("Y-m-d", $startdate_timestamp);
        $category = $_POST['category'];
        $status = $_POST['status'];

		$model = new EmployeeModel();
		$insertId = $model->editEmployee($fname,$lname,$nic,$Pno,$email,$address,$startdate,$category,$status,$id);
		echo json_encode($insertId);
	}

	function deleteEmployee(){
		$id = $_POST["id"];
		$Model = new EmployeeModel();
		$Model->deleteEmployee($id);
	}
}
?>