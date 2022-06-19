<?php
require_once("Connection.php");
class OrderModel
{

	private $db_handle;
    private $table = 'ordertbl';

    function __construct() {
      $this->db_handle = new Connection();
    }

  // add Order info to tbl
    function addOrder($cusid,$cusname,$styleid,$orddate,$fitondate,$deliverydate,$price,$discount,$description,$measid){
        $query = "INSERT INTO $this->table (cusid,cusName,styleId,ordDate,fitonDate,deliveryDate,ordPrice,ordDiscount,ordDescription,measId) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "isissssssi";
        $paramValue = array(
            $cusid,
            $cusname,
            $styleid,
            $orddate,
            $fitondate,
            $deliverydate,
            $price,
            $discount,
            $description,
            $measid
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $cusname;
    }

    function editOrder($cusid,$cusname,$styleid,$fitondate,$deliverydate,$price,$discount,$description,$id) {
        $query = "UPDATE $this->table SET cusid = ?,cusName = ?,styleId = ?,fitonDate = ?,deliveryDate = ?,ordPrice = ?,ordDiscount = ?,ordDescription = ? WHERE ordid = ?";
        $paramType = "ssssssi";
        $paramValue = array(
            $cusid,
            $cusname,
            $styleid,
            $fitondate,
            $deliverydate,
            $price,
            $discount,
            $description,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function editProgress($progress,$updatedate,$id) {
        $query = "UPDATE $this->table SET updateDate = ?, ordProgress = ? WHERE ordid = ?";
        $paramType = "sii";
        $paramValue = array(
            $updatedate,
            $progress,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteOrder($id) {
        $query = "UPDATE $this->table SET Display = '1' WHERE ordid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getOrderById($id) {
        $query = "SELECT * FROM $this->table WHERE ordid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getStyleById($id) {
        $query = "SELECT * FROM `style` WHERE stlid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllOrder() {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY ordid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}