<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/PayrollModel.php");

$db_handle = new Connection();
// private $model='';

class PayrollController
{


    function addPayroll()
    {
        $tid = $_POST['tid'];
        $salary = $_POST['salary'];
        $bonus = $_POST['bonus'];
        $advance = $_POST['advance'];
        $ot = $_POST['ot'];
        $totsal = $_POST['totsal'];
        $paymentdate = date("Y-m-d");

        $model = new PayrollModel();
        $insertId = $model->addPayroll($tid, $salary, $bonus, $advance, $ot, $totsal, $paymentdate);

        echo json_encode($insertId);
    }

    function getPayroll()
    {
        $id = $_POST['id'];
        $model = new PayrollModel();
        $result = $model->getPayrollById($id);
        echo json_encode($result);
    }

    function getAllPayroll()
    {
        $model = new PayrollModel();
        $result = $model->getAllPayroll();
        echo json_encode($result);
    }

    function editPayroll()
    {
        $id = $_POST['id'];
        $tid = $_POST['tid'];
        $salary = $_POST['salary'];
        $bonus = $_POST['bonus'];
        $advance = $_POST['advance'];
        $ot = $_POST['ot'];
        $totsal = $_POST['totsal'];

        $model = new PayrollModel();
        $insertId = $model->editPayroll($tid, $salary, $bonus, $advance, $ot, $totsal, $id);
        echo json_encode($insertId);
    }

    function deletePayroll()
    {
        $id = $_POST["id"];
        $Model = new PayrollModel();
        $Model->deletePayroll($id);
    }
}
