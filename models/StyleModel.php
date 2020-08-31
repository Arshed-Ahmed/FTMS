<?php
require_once("Connection.php");
class StyleModel
{

    private $db_handle;
    private $table = 'style';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add Customer info to tbl
    function addStyle($iname,$image,$desc) {
        $query = "INSERT INTO $this->table (stlname , stlstyle, stldesc) VALUES ( ?, ?, ? )";
        $paramType = "iss";
        $paramValue = array(
            $iname,
            $image,
            $desc
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $iname;
    }

}
?>