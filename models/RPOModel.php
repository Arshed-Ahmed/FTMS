<?php
require_once("Connection.php");
class RPOModel
{

    private $db_handle;
    private $table = 'purchaseorderreturn';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add RPO info to tbl
    function addRPO($poitem, $quan , $podate,$supplier)
    {
        $query = "INSERT INTO $this->table (itid, poQuantity , poDate, supid) VALUES ( ?, ?, ?, ?)";
        $paramType = "iisi";
        $paramValue = array(
            $poitem,
            $quan,
            $podate,
            $supplier
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $poitem;
    }

    function editRPO($poitem, $quan, $podate,$supplier, $id)
    {
        $query = "UPDATE $this->table SET itid = ?,  poQuantity = ?,  poDate = ?, supid = ? WHERE poid = ?";
        $paramType = "iisii";
        $paramValue = array(
            $poitem,
            $quan,
            $podate,
            $supplier,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteRPO($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE poid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getRPOById($id)
    {
        $query = "SELECT * FROM $this->table WHERE poid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllRPO()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY poid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
