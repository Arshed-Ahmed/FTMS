<?php
require_once("Connection.php");
class ItemCatModel
{

	private $db_handle;
    private $table = 'itemcategory';

    function __construct() {
      $this->db_handle = new Connection();
    }

  // add ItemCat info to tbl
  function addItemCat($name,$desc) {
    $query = "INSERT INTO $this->table (catName,catDesc) VALUES ( ?, ?)";
    $paramType = "ss";
    $paramValue = array(
        $name,
        $desc
    );

    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $iname;
 }

function editItemCat($name,$desc,$id) {
    $query = "UPDATE $this->table SET catName = ?,catDesc = ?, WHERE catId = ?";
    $paramType = "ssi";
    $paramValue = array(
        $name,
        $desc,
        $id
    );

    $insertId = $this->db_handle->update($query, $paramType, $paramValue);
    return $insertId;
}

function deleteItemCat($id) {
    $query = "DELETE FROM $this->table WHERE catId = ?";
    $paramType = "i";
    $paramValue = array(
        $id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
}

function getItemCatById($id) {
    $query = "SELECT * FROM $this->table WHERE catId = ?";
    $paramType = "i";
    $paramValue = array(
        $id
    );

    $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    return $result;
}
function getAllItemCat() {
    $sql = "SELECT * FROM $this->table ORDER BY catId";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}
}
?>