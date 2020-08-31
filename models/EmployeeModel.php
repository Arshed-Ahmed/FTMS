<?php
require_once("Connection.php");
class EmployeeModel
{

	private $db_handle;
    private $table = 'employee';

    function __construct() {
      $this->db_handle = new Connection();
    }

  // add Employee info to tbl
    function addEmployee($fname,$lname,$nic,$Pno,$email,$address,$category,$startdate,$status) {
        $query = "INSERT INTO $this->table (tFname,tLname,tNIC,tPno,tEmail,tAddress,tcatId,tStartdate,tstatus) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "sssisssss";
        $paramValue = array(
            $fname,
            $lname,
            $nic,
            $Pno,
            $email,
            $address,
            $category,
            $startdate,
            $status
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $fname;
    }

    function editEmployee($fname,$lname,$nic,$Pno,$email,$address,$category,$startdate,$status,$id) {
        $query = "UPDATE $this->table SET tFname = ?,tLname = ?,tNIC = ?,tPno = ?,tEmail = ?,tAddress = ?,tcatId = ?,tStartdate = ?, tstatus = ? WHERE tid = ?";
        $paramType = "sssisssssi";
        $paramValue = array(
            $fname,
            $lname,
            $nic,
            $Pno,
            $email,
            $address,
            $category,
            $startdate,
            $status,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteEmployee($id) {
        $query = "DELETE FROM $this->table WHERE tid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getEmployeeById($id) {
        $query = "SELECT * FROM $this->table WHERE tid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllEmployee() {
        $sql = "SELECT * FROM $this->table ORDER BY tid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}