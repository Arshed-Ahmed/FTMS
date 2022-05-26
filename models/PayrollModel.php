<?php
require_once("Connection.php");
class PayrollModel
{

    private $db_handle;
    private $table = 'salary';

    function __construct()
    {
        $this->db_handle = new Connection();
    }
    // salid,tid,paymentdate,salcategory,salary,wage,bonus/penalty,ot,totalsalary
    // add Payroll info to tbl
    function addPayroll($tid, $salary, $bonus, $advance, $ot, $totsal, $paymentdate)
    {
        $query = "INSERT INTO $this->table (tid, paymentdate, salary, bonus , advance, ot, totalsalary) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "issssss";
        $paramValue = array(
            $tid, $paymentdate, $salary, $bonus, $advance, $ot, $totsal,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $tid;
    }

    function editPayroll($tid, $salary, $bonus, $advance, $ot, $totsal, $id)
    {
        $query = "UPDATE $this->table SET tid = ? , salary = ?, bonus = ?, advance = ?, ot = ?,  totalsalary = ? WHERE salid = ?";
        $paramType = "isssssi";
        $paramValue = array(
            $tid, $salary, $bonus, $advance, $ot, $totsal, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deletePayroll($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE salid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getPayrollById($id)
    {
        $query = "SELECT * FROM $this->table WHERE salid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllPayroll()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY salid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
