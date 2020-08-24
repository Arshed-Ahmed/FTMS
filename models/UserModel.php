<?php
require_once("Connection.php");
class UserModel
{

	private $db_handle;
    private $table = 'user';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add User info to tbl
    function addUser($name,$password,$type,$status) {
        $query = "INSERT INTO $this->table (usr_id,usr_pass,usr_type,usr_status) VALUES ( ?, ?, ?, ? )";
        $paramType = "ssss";
        $paramValue = array(
            $name,
            $password,
            $type,
            $status
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }

    function editUser($name,$password,$type,$status,$id) {
        $query = "UPDATE $this->table SET usr_id = ?,usr_pass = ?,usr_type = ?,usr_status = ? WHERE id = ?";
        $paramType = "ssssi";
        $paramValue = array(
            $name,
            $password,
            $type,
            $status,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteUser($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getUserById($id) {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllUser() {
        $sql = "SELECT * FROM $this->table ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>