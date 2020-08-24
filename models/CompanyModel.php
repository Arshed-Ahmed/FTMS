<?php
require_once("Connection.php");
class CompanyModel
{

    private $db_handle;
    private $table = 'company';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add Customer info to tbl
    function addCompany($name,$add,$city,$regno,$location,$tel,$email,$web) {
        $query = "INSERT INTO $this->table (comName,comAddress,comCity,comRegNo,comLogolocation,comTel,comEmail,comWeb) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )";
        $paramType = "sssssiss";
        $paramValue = array(
            $name,
            $add,
            $city,
            $regno,
            $location,
            $tel,
            $email,
            $web
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }
}

?>