<?php
require_once("Connection.php");
class ROModel
{

    private $db_handle;
    private $table = 'orderreturn';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add RO info to tbl
    function addRO($ordid ,$cusid ,$rodate ,$reason, $remarks)
    {
        $query = "INSERT INTO $this->table (ordid ,cusid , rodate ,reason, remarks) VALUES (  ?, ?, ?, ?, ?)";
        $paramType = "iisss";
        $paramValue = array(
            $ordid ,$cusid ,$rodate ,$reason, $remarks
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $cusid;
    }

    function editRO($ordid ,$cusid ,$rodate ,$reason, $remarks, $id)
    {
        $query = "UPDATE $this->table SET ordid = ?,cusid = ?,rodate = ?,reason = ?,remarks = ?  WHERE id = ?";
        $paramType = "iisssi";
        $paramValue = array(
            $ordid ,$cusid ,$rodate ,$reason, $remarks ,$id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteRO($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getROById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllRO()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
