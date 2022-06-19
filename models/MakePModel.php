<?php
require_once("Connection.php");
class MakePModel
{

    private $db_handle;
    private $table = 'makepayment';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add MakeP info to tbl
    function addMakeP($poid, $pdate, $amount, $type, $pamount, $balance, $invid, $remarks)
    {
        $query = "INSERT INTO $this->table (poid , paydate , payamount , paidamount , paybalance , paytype , invid , remarks) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "isssssss";
        $paramValue = array(
            $poid, $pdate, $amount, $pamount, $balance, $type, $invid, $remarks,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $poid;
    }


    function editMakeP($poid, $pdate, $amount, $type, $pamount, $balance, $invid, $remarks, $id)
    {
        $query = "UPDATE $this->table SET poid  = ?, paydate  = ?, payamount  = ?,paidamount  = ?,paybalance = ?, paytype  = ?, invid = ?, remarks = ? WHERE payid = ?";
        $paramType = "isssssssi";
        $paramValue = array(
            $poid, $pdate, $amount, $pamount, $balance, $type, $invid, $remarks, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteMakeP($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE payid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getMakePById($id)
    {
        $query = "SELECT * FROM $this->table WHERE payid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllMakeP()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY payid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
