<?php
require_once("Connection.php");
class MeasurementModel
{

	private $db_handle;
    private $table = 'measurement';

    function __construct() {
      $this->db_handle = new Connection();
    }

  // add Measurement info to tbl
    function addMeasurement($cusid,$cusname,$item,$measurement,$moredetails){
        $query = "INSERT INTO $this->table (cusid,cusName,item,measurement,moreDetails) VALUES ( ?, ?, ?, ?, ?)";
        $paramType = "issss";
        $paramValue = array(
            $cusid,
            $cusname,
            $item,
            $measurement,
            $moredetails
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $cusname;
    }

    function editMeasurement($cusid,$cusname,$item,$measurement,$moredetails,$id) {
        $query = "UPDATE $this->table SET cusid = ?,cusName = ?,item = ?,measurement = ?,moreDetails = ? WHERE measId = ?";
        $paramType = "issssi";
        $paramValue = array(
            $cusid,
            $cusname,
            $item,
            $measurement,
            $moredetails,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteMeasurement($id) {
        $query = "UPDATE $this->table SET Display = '1' WHERE measId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getMeasurementById($id) {
        $query = "SELECT * FROM $this->table WHERE measId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getMeasurementBycusId($id) {
        $query = "SELECT * FROM $this->table WHERE cusid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllMeasurement() {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY measId";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAllMeasurementDESC() {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY measId DESC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}