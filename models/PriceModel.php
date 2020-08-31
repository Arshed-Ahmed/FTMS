<?php
require_once("Connection.php");
class PriceModel
{

    private $db_handle;
    private $table = 'item';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add Price info to tbl
    function addPrice($item,$pvalue,$hvalue,$desc,$type) {
        $query = "INSERT INTO $this->table (itname,itvalue,hvalue,itdescription,ittype) VALUES ( ?, ?, ?, ?, ? )";
        $paramType = "sssss";
        $paramValue = array(
            $item,
            $pvalue,
            $hvalue,
            $desc,
            $type
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $item;
    }

    function editPrice($item,$pvalue,$hvalue,$desc,$type,$id) {
        $query = "UPDATE $this->table SET itname = ?,itvalue = ?,hvalue = ?,itdescription = ?,ittype = ? WHERE itid = ?";
        $paramType = "sssssi";
        $paramValue = array(
            $item,
            $pvalue,
            $hvalue,
            $desc,
            $type,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deletePrice($id) {
        $query = "DELETE FROM $this->table WHERE itid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getPriceById($id) {
        $query = "SELECT * FROM $this->table WHERE itid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllPrice() {
        $sql = "SELECT * FROM $this->table ORDER BY itid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAllCitem() {
        $sql = "SELECT * FROM $this->table WHERE ittype ='nothire' ORDER BY itid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAllHitem() {
        $sql = "SELECT * FROM $this->table WHERE ittype ='hire' ORDER BY itid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>