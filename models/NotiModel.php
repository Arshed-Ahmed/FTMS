<?php
require_once("Connection.php");
class NotiModel
{

    private $db_handle;
    private $table = 'notification';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add Noti info to tbl
    function addNoti($title, $reciever, $email, $type, $message, $asdate, $category)
    {
        $query = "INSERT INTO $this->table (notTitle, notReciever, notEmail, notType, notMessage, notDate, notCategory) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "sssisss";
        $paramValue = array(
            $title, $reciever, $email, $type, $message, $asdate, $category
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $title;
    }

    function editNoti($title, $reciever, $email, $type, $message, $asdate, $category, $id)
    {
        $query = "UPDATE $this->table SET notTitle = ?, notReciever = ?, notEmail = ?, notType = ?, notMessage = ?, notDate = ?, notCategory = ? WHERE notId = ?";
        $paramType = "sssisssi";
        $paramValue = array(
            $title, $reciever, $email, $type, $message, $asdate, $category, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $title;
    }

    function deleteNoti($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE notId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getNotiById($id)
    {
        $query = "SELECT * FROM $this->table WHERE notId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllNoti()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY notId";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
