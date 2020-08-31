<<<<<<< HEAD
<?php
require_once("Connection.php");
class ItemModel
{

	private $db_handle;
    private $table = 'item';

    function __construct() {
      $this->db_handle = new Connection();
    }

  // add Item info to tbl
  function addItem($iname,$icat,$value) {
    $query = "INSERT INTO $this->table (itname,catId,itvalue) VALUES ( ?, ?, ?)";
    $paramType = "sii";
    $paramValue = array(
        $iname,
        $icat,
        $value
    );

    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $iname;
 }

function editItem($iname,$icat,$value,$id) {
    $query = "UPDATE $this->table SET itname = ?,catId = ?,itvalue = ? WHERE itid = ?";
    $paramType = "siii";
    $paramValue = array(
        $iname,
        $icat,
        $value,
        $id
    );

    $insertId = $this->db_handle->update($query, $paramType, $paramValue);
    return $insertId;
}

function deleteItem($id) {
    $query = "DELETE FROM $this->table WHERE itid = ?";
    $paramType = "i";
    $paramValue = array(
        $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
}

function getItemById($id) {
    $query = "SELECT * FROM $this->table WHERE itid = ?";
    $paramType = "i";
    $paramValue = array(
        $id
    );

    $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    return $result;
}
function getAllItem() {
    $sql = "SELECT * FROM $this->table ORDER BY itid";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}
}
=======
<?php
require_once("Connection.php");
class ItemModel
{

	private $db_handle;
    private $table = 'item';

    function __construct() {
      $this->db_handle = new Connection();
    }

  // add Item info to tbl
  function addItem($iname,$icat,$value) {
    $query = "INSERT INTO $this->table (itname,catId,itvalue) VALUES ( ?, ?, ?)";
    $paramType = "sii";
    $paramValue = array(
        $iname,
        $icat,
        $value
    );

    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $iname;
 }

function editItem($iname,$icat,$value,$id) {
    $query = "UPDATE $this->table SET itname = ?,catId = ?,itvalue = ? WHERE itid = ?";
    $paramType = "siii";
    $paramValue = array(
        $iname,
        $icat,
        $value,
        $id
    );

    $insertId = $this->db_handle->update($query, $paramType, $paramValue);
    return $insertId;
}

function deleteItem($id) {
    $query = "DELETE FROM $this->table WHERE itid = ?";
    $paramType = "i";
    $paramValue = array(
        $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
}

function getItemById($id) {
    $query = "SELECT * FROM $this->table WHERE itid = ?";
    $paramType = "i";
    $paramValue = array(
        $id
    );

    $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    return $result;
}
function getAllItem() {
    $sql = "SELECT * FROM $this->table ORDER BY itid";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}
}
>>>>>>> 3acd79f15635e1a8876e84e76dccad96618bec6a
?>