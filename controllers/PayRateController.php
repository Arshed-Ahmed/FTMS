<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/PayrateModel.php");

$db_handle = new Connection();
// private $model='';

class PayrateController
{

    function addPayrate()
    {
        $item = $_POST['item'];
        $rate = $_POST['rate'];
        $price = $_POST['price'];

        $model = new PayrateModel();
        $insertId = $model->addPayrate($item, $rate, $price);

        echo json_encode($insertId);
    }

    function getPayrate()
    {
        $id = $_POST['id'];
        $model = new PayrateModel();
        $result = $model->getPayrateById($id);
        echo json_encode($result);
    }

    function getAllPayrate()
    {
        $model = new PayrateModel();
        $result = $model->getAllPayrate();
        echo json_encode($result);
    }

    function editPayrate()
    {
        $id = $_POST['id'];
        $item = $_POST['item'];
        $rate = $_POST['rate'];
        $price = $_POST['price'];

        $model = new PayrateModel();
        $insertId = $model->editPayrate($item, $rate, $price, $id);
        echo json_encode($insertId);
    }

    function deletePayrate()
    {
        $id = $_POST["id"];
        $Model = new PayrateModel();
        $Model->deletePayrate($id);
    }
}
