<?php
require_once("Connection.php");
class JobModel
{

    private $db_handle;
    private $table = 'jobcard';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add Job info to tbl
    function addJob($tid, $ordid, $asdate, $jcdeadline,  $jdetail)
    {
        $query = "INSERT INTO $this->table (tid, ordid, asdate, jcdeadline, jdetail) VALUES ( ?, ?, ?, ?, ?)";
        $paramType = "iisss";
        $paramValue = array(
            $tid, $ordid, $asdate, $jcdeadline,  $jdetail
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $tid;
    }

    function editJob($tid, $ordid, $asdate, $jcdeadline,  $jdetail, $id)
    {
        $query = "UPDATE $this->table SET tid = ?,ordid = ?,asdate = ?,jcdeadline = ?,jdetail = ?  WHERE jcid = ?";
        $paramType = "iisssi";
        $paramValue = array(
            $tid, $ordid, $asdate, $jcdeadline,  $jdetail, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $tid;
    }

    function deleteJob($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE jcid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getJobById($id)
    {
        $query = "SELECT * FROM $this->table WHERE jcid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllJob()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY jcid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
