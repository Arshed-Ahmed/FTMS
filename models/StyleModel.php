<?php
require_once("Connection.php");
class StyleModel
{

    private $db_handle;
    private $table = 'style';

    function __construct() {
      $this->db_handle = new Connection();
    }

    function deleteStyle($id) {
        $query = "UPDATE $this->table SET Display = '1' WHERE stlid = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

}
?>