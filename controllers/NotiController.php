<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/NotiModel.php");

$db_handle = new Connection();
// private $model='';

class NotiController
{

    function addNoti()
    {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $date = date('d F Y, h:i:s A');
        $date_timestamp = strtotime($date);
        $asdate = date("Y-m-d", $date_timestamp);
        $category = $_POST['category'];
        $type = $_POST['type'];
        $reciever = $_POST['reciever'];
        $email = $_POST['email'];

        $model = new NotiModel();
        $insertId = $model->addNoti($title, $reciever, $email, $type, $message, $asdate, $category);

        echo json_encode($insertId);
    }

    function getNoti()
    {
        $id = $_POST['id'];
        $model = new NotiModel();
        $result = $model->getNotiById($id);
        echo json_encode($result);
    }

    function getAllNoti()
    {
        $model = new NotiModel();
        $result = $model->getAllNoti();
        echo json_encode($result);
    }

    function editNoti()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        $date = date('d F Y, h:i:s A');
        $date_timestamp = strtotime($date);
        $asdate = date("Y-m-d", $date_timestamp);
        $category = $_POST['category'];
        $type = $_POST['type'];
        $reciever = $_POST['reciever'];
        $email = $_POST['email'];


        $model = new NotiModel();
        $insertId = $model->editNoti($title, $reciever, $email, $type, $message, $asdate, $category, $id);
        echo json_encode($insertId);
    }

    function deleteNoti()
    {
        $id = $_POST["id"];
        $Model = new NotiModel();
        $Model->deleteNoti($id);
    }
}
