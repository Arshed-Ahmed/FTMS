<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/JobModel.php");

$db_handle = new Connection();
// private $model='';

class JobController
{

    function addJob()
    {
        $tid = $_POST['tid'];
        $ordid = $_POST['ordid'];
        $date = date('d F Y, h:i:s A');
        $date_timestamp = strtotime($date);
        $asdate = date("Y-m-d", $date_timestamp);
        $deadline_timestamp = strtotime($_POST['jcdeadline']);
        $jcdeadline = date("Y-m-d", $deadline_timestamp);
        $jdetail = $_POST['jdetail'];

        $model = new JobModel();
        $insertId = $model->addJob($tid, $ordid, $asdate, $jcdeadline,  $jdetail);

        echo json_encode($insertId);
    }

    function getJob()
    {
        $id = $_POST['id'];
        $model = new JobModel();
        $result = $model->getJobById($id);
        echo json_encode($result);
    }

    function getAllJob()
    {
        $model = new JobModel();
        $result = $model->getAllJob();
        echo json_encode($result);
    }

    function editJob()
    {
        $id = $_POST['id'];
        $tid = $_POST['tid'];
        $ordid = $_POST['ordid'];
        $date = date('d F Y, h:i:s A');
        $date_timestamp = strtotime($date);
        $asdate = date("Y-m-d", $date_timestamp);
        $deadline_timestamp = strtotime($_POST['jcdeadline']);
        $jcdeadline = date("Y-m-d", $deadline_timestamp);
        $jdetail = $_POST['jdetail'];

        $model = new JobModel();
        $insertId = $model->editJob($tid, $ordid, $asdate, $jcdeadline,  $jdetail, $id);
        echo json_encode($insertId);
    }

    function deleteJob()
    {
        $id = $_POST["id"];
        $Model = new JobModel();
        $Model->deleteJob($id);
    }
}
