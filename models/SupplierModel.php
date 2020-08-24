<?php
require_once("Connection.php");
class SupplierModel
{

	private $db_handle;
    private $table = 'supplier';

    function __construct() {
        $this->db_handle = new Connection();
    }

  // add Supplier info to tbl
    function addSupplier($name,$mname,$regno,$Pno,$email,$address) {
        $query = "INSERT INTO $this->table (supName,supMname,supRegno,supPno,supEmail,supAddress) VALUES ( ?, ?, ?, ?, ?, ?)";
        $paramType = "sssiss";
        $paramValue = array(
            $name,
            $mname,
            $regno,
            $Pno,
            $email,
            $address
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }

    function editSupplier($name,$mname,$regno,$Pno,$email,$address,$id) {
        $query = "UPDATE $this->table SET supName = ?,supMname = ?,supRegno = ?,supPno = ?,supEmail = ?,supAddress = ? WHERE supid = ?";
        $paramType = "sssissi";
        $paramValue = array(
            $name,
            $mname,
            $regno,
            $Pno,
            $email,
            $address,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteSupplier($id) {
        $query = "DELETE FROM $this->table WHERE supid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getSupplierById($id) {
        $query = "SELECT * FROM $this->table WHERE supid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllSupplier() {
        $sql = "SELECT * FROM $this->table ORDER BY supid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>