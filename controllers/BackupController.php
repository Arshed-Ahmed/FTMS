<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/BackupModel.php");

$db_handle = new Connection();
// private $model='';

class BackupController
{

    function Backup()
    {
        $model = new BackupModel();
        $result = $model->Backup();
        echo ($result);
    }


    function addBackup()
    {
        $timeDate = date("Y-m-d-H-m-s");

        $model = new BackupModel();
        $insertId = $model->addBackup($timeDate);

        echo json_encode($insertId);
    }


    function getBackup()
    {
        $id = $_POST['id'];
        $model = new BackupModel();
        $result = $model->getBackupById($id);
        echo json_encode($result);
    }

    function getAllBackup()
    {
        $model = new BackupModel();
        $result = $model->getAllBackup();
        echo json_encode($result);
    }
}
