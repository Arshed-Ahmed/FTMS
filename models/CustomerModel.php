<?php
require_once("Connection.php");
class CustomerModel
{

    private $db_handle;
    private $table = 'customer';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add Customer info to tbl
    function addCustomer($fname,$lname,$nic,$tel,$email,$add) {
        $query = "INSERT INTO $this->table (cusFname,cusLname,cusNIC,cusPno,cusEmail,cusAddress) VALUES ( ?, ?, ?, ?, ?, ? )";
        $paramType = "sssiss";
        $paramValue = array(
            $fname,
            $lname,
            $nic,
            $tel,
            $email,
            $add,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $fname;
    }

    function editCustomer($fname,$lname,$nic,$tel,$email,$add,$id) {
        $query = "UPDATE $this->table SET cusFname = ?,cusLname = ?,cusNIC = ?,cusPno = ?,cusEmail = ?,cusAddress = ? WHERE cusid = ?";
        $paramType = "sssissi";
        $paramValue = array(
            $fname,
            $lname,
            $nic,
            $tel,
            $email,
            $add,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $fname;
    }

    function deleteCustomer($id) {
        $query = "UPDATE $this->table SET Display = '1' WHERE cusid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getCustomerById($id) {
        $query = "SELECT * FROM $this->table WHERE cusid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllCustomer() {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY cusid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>