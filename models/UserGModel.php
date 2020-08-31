<<<<<<< HEAD
<?php
require_once("Connection.php");
class UserGModel
{

	private $db_handle;
    private $table = 'usergroup';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add UserG info to tbl
    function addUserG($name,$type,$description) {
        $query = "INSERT INTO $this->table (ugName,ugType,ugDescription) VALUES ( ?, ?, ? )";
        $paramType = "sis";
        $paramValue = array(
            $name,
            $type,
            $description
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }

    function editUserG($name,$type,$description,$id) {
        $query = "UPDATE $this->table SET ugName = ?,ugType = ?,ugDescription = ? WHERE ugid = ?";
        $paramType = "sisi";
        $paramValue = array(
            $name,
            $type,
            $description,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteUserG($id) {
        $query = "DELETE FROM $this->table WHERE ugid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getUserGById($id) {
        $query = "SELECT * FROM $this->table WHERE ugid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllUserG() {
        $sql = "SELECT * FROM $this->table ORDER BY ugid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
=======
<?php
require_once("Connection.php");
class UserGModel
{

	private $db_handle;
    private $table = 'usergroup';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add UserG info to tbl
    function addUserG($name,$type,$description) {
        $query = "INSERT INTO $this->table (ugName,ugType,ugDescription) VALUES ( ?, ?, ? )";
        $paramType = "sis";
        $paramValue = array(
            $name,
            $type,
            $description
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }

    function editUserG($name,$type,$description,$id) {
        $query = "UPDATE $this->table SET ugName = ?,ugType = ?,ugDescription = ? WHERE ugid = ?";
        $paramType = "sisi";
        $paramValue = array(
            $name,
            $type,
            $description,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
    }

    function deleteUserG($id) {
        $query = "DELETE FROM $this->table WHERE ugid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getUserGById($id) {
        $query = "SELECT * FROM $this->table WHERE ugid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllUserG() {
        $sql = "SELECT * FROM $this->table ORDER BY ugid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
>>>>>>> 3acd79f15635e1a8876e84e76dccad96618bec6a
?>