<?php
require_once("Connection.php");
class PayrateModel
{

    private $db_handle;
    private $table = 'payrate';

    function __construct()
    {
        $this->db_handle = new Connection();
    }

    // add Payrate info to tbl
    function addPayrate($item, $rate, $price)
    {
        $query = "INSERT INTO $this->table (payrItem, payRate, priceRate) VALUES ( ?, ?, ?)";
        $paramType = "sss";
        $paramValue = array(
            $item, $rate, $price
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $item;
    }

    function editPayrate($item, $rate, $price, $id)
    {
        $query = "UPDATE $this->table SET payrItem = ?, payRate = ?, priceRate = ? WHERE payrId = ?";
        $paramType = "sssi";
        $paramValue = array(
            $item, $rate, $price, $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deletePayrate($id)
    {
        $query = "UPDATE $this->table SET Display = '1' WHERE payrId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getPayrateById($id)
    {
        $query = "SELECT * FROM $this->table WHERE payrId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getAllPayrate()
    {
        $sql = "SELECT * FROM $this->table WHERE Display = '0' ORDER BY payrId";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
