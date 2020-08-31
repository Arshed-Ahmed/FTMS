<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/CustomerModel.php");

$db_handle = new Connection();
// private $model='';

class CustomerController
{	

	function addCustomer()
	{
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic= $_POST['nic'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $add = $_POST['add'];
		
		$model = new CustomerModel();
		$insertId = $model->addCustomer($fname,$lname,$nic,$tel,$email,$add);

		echo json_encode($insertId);
	}

	function getCustomer(){
		$id = $_POST['id'];
		$model = new CustomerModel();
		$result = $model->getCustomerById($id);
		echo json_encode($result);
	}

	function getAllCustomer(){
		$model = new CustomerModel();
		$result = $model->getAllCustomer();
		echo json_encode($result);
	}

	function editCustomer(){
		$id =$_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic= $_POST['nic'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $add = $_POST['add'];

		$model = new CustomerModel();
		$insertId = $model->editCustomer($fname,$lname,$nic,$tel,$email,$add,$id);
		echo json_encode($insertId);
	}

	function deleteCustomer(){
		$id = $_POST["id"];
		$Model = new CustomerModel();
		$Model->deleteCustomer($id);
	}
}

?>