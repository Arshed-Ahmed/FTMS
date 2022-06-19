<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/OrderModel.php");

$db_handle = new Connection();
// private $model='';

class OrderController
{	

	function addOrder()
	{
        $cusid = $_POST['cusid'];
        $cusname = $_POST['cusname'];
        $styleid = $_POST['styleid'];
        $orddate = date('m/d/Y');
        $fitondate = $_POST['fitondate'];
        $deliverydate = $_POST['deliverydate'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $description = $_POST['description'];
        $measid= $_POST['measid'];
		
		$model = new OrderModel();
		$insertId = $model->addOrder($cusid,$cusname,$styleid,$orddate,$fitondate,$deliverydate,$price,$discount,$description,$measid);

		echo json_encode($insertId);
	}

	function getOrder(){
		$id = $_POST['id'];
		$model = new OrderModel();
		$result = $model->getOrderById($id);
		echo json_encode($result);
	}

	function getStyle(){
		$id = $_POST['id'];
		$model = new OrderModel();
		$result = $model->getStyleById($id);
		echo json_encode($result);
	}

	function getAllOrder(){
		$model = new OrderModel();
		$result = $model->getAllOrder();
		echo json_encode($result);
	}

	function editOrder(){
		$id = $_POST['id'];
		$cusid = $_POST['cusid'];
        $cusname = $_POST['cusname'];
		$styleid = $_POST['styleid'];
        $fitondate = $_POST['fitondate'];
        $deliverydate = $_POST['deliverydate'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $description = $_POST['description'];

		$model = new OrderModel();
		$insertId = $model->editOrder($cusid,$cusname,$styleid,$fitondate,$deliverydate,$price,$discount,$description,$id);
		echo json_encode($insertId);
	}

	function editProgress(){
		$id = $_POST['ordid'];
        $progress = $_POST['progress'];
        $updatedate = date('m/d/Y');

		$model = new OrderModel();
		$insertId = $model->editProgress($progress,$updatedate,$id);
		echo json_encode($insertId);
	}

	function deleteOrder(){
		$id = $_POST["id"];
		$Model = new OrderModel();
		$Model->deleteOrder($id);
	}
}
?>