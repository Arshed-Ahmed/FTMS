<?php
require_once("Connection.php");
class POModel
{

    private $db_handle;
    private $table = 'purchaseorder';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add PO info to tbl
    function addPO($poitem, $quan , $podate,$supplier)
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

    function editPO($poitem, $quan, $podate,$supplier, $id)
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

    function deletePO($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE poid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getPOById($id)
    {
        $query = "SELECT * FROM $this->table WHERE poid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllPO()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY poid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
