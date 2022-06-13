<?php
require_once("Connection.php");
class RPModel
{

    private $db_handle;
    private $table = 'payment';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add RP info to tbl
    function addRP($ordid, $pdate, $amount, $type, $pamount, $balance, $remarks)
    {
        $query = "INSERT INTO $this->table (ordid , paydate , payamount , paidamount , paybalance , paytype , remarks) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "issssss";
        $paramValue = array(
            $ordid, $pdate, $amount, $pamount, $balance, $type, $remarks,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $ordid;
    }

    // adding Invoice data
    function addInvoice($ordid, $payid, $invdate)
    {
        $query = "INSERT INTO `invoice` (ordid , payid ,invdate) VALUES ( ?, ?, ?)";
        $paramType = "iis";
        $paramValue = array(
            $ordid, $payid, $invdate,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        
        $sql = "SELECT * FROM `invoice` WHERE `invid` = (SELECT MAX(invid) FROM `invoice`)";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function updateInvoice($invid, $id)
    {
        $query = "UPDATE $this->table SET invid  = ? WHERE payid = ?";
        $paramType = "ii";
        $paramValue = array(
            $invid, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $invid;
    }

    function editRP($ordid, $pdate, $amount, $type, $pamount, $balance, $remarks, $id)
    {
        $query = "UPDATE $this->table SET ordid  = ?, paydate  = ?, payamount  = ?,paidamount  = ?,paybalance = ?, paytype  = ?, remarks = ? WHERE payid = ?";
        $paramType = "issssssi";
        $paramValue = array(
            $ordid, $pdate, $amount, $pamount, $balance, $type, $remarks, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteRP($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE payid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getRPById($id)
    {
        $query = "SELECT * FROM $this->table WHERE payid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllRP()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY payid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
