<?php
require_once("Connection.php");
class MaterialModel
{

    private $db_handle;
    private $table = 'rawitems';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add Material info to tbl
    function addMaterial($name,$type,$col,$quan,$desc) {
        $query = "INSERT INTO $this->table (Name,Type,Color,Quantity,Description) VALUES ( ?, ?, ?, ? ,?)";
        $paramType = "sssss";
        $paramValue = array(
            $name,
            $type,
            $col,
            $quan,
            $desc
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }

    function editMaterial($name,$type,$col,$quan,$desc,$id) {
        $query = "UPDATE $this->table SET Name = ?,Type = ?,Color = ?,Quantity = ?,Description = ? WHERE rid = ?";
        $paramType = "sssssi";
        $paramValue = array(
            $name,
            $type,
            $col,
            $quan,
            $desc,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteMaterial($id) {
        $query = "DELETE FROM $this->table WHERE rid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getMaterialById($id) {
        $query = "SELECT * FROM $this->table WHERE rid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllMaterial() {
        $sql = "SELECT * FROM $this->table ORDER BY rid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>