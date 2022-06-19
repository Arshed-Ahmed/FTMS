<?php
require_once("Connection.php");
class CalModel
{

    private $db_handle;
    private $table = 'calender';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add Cal info to tbl
    function addCal($title, $desc, $caldate)
    {
        $query = "INSERT INTO $this->table (title, calDesc , calDate ) VALUES ( ?, ?, ?)";
        $paramType = "sss";
        $paramValue = array(
            $title, $desc, $caldate
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $title;
    }

    function editCal($title, $desc, $caldate, $id)
    {
        $query = "UPDATE $this->table SET title = ?, calDesc = ?, calDate = ? WHERE id = ?";
        $paramType = "sssi";
        $paramValue = array(
            $title, $desc, $caldate, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteCal($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getCalById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllCal()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
