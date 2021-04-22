<?php
require_once("Connection.php");
class CompanyModel
{

    private $db_handle;
    private $table = 'company';

    function __construct() {
      $this->db_handle = new Connection();
    }

    // add Company info to tbl
    // function addCompany($name,$add,$city,$regno,$logo,$tel,$email,$web) {
    //     $query = "INSERT INTO $this->table (comName,comAddress,comCity,comRegNo,comLogo,comTel,comEmail,comWeb) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )";
    //     $paramType = "sssssiss";
    //     $paramValue = array(
    //         $name,
    //         $add,
    //         $city,
    //         $regno,
    //         $logo,
    //         $tel,
    //         $email,
    //         $web
    //     );

    //     $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    //     return $name;
    // }

    function addLogo($location) {
        $query = "UPDATE $this->table SET ,comLogo = ? WHERE comId = '1'";
        $paramType = "s";
        $paramValue = array(
            $location
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $name;
    }

    function editCompany($name,$add,$city,$regno,$tel,$email,$web,$budget,$emp,$orders,$id) {
        $query = "UPDATE $this->table SET comName = ?,comAddress = ?,comCity = ?,comRegNo = ?,comTel = ?,comEmail = ?,comWeb = ?,budget = ?,employees = ?,orders = ?  WHERE comId = ?";
        $paramType = "ssssisssssi";
        $paramValue = array(
            $name,
            $add,
            $city,
            $regno,
            $tel,
            $email,
            $web,
            $budget,
            $emp,
            $orders,
            $id
        );

        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $name;
    }

    function deleteCompany($id) {
        $query = "DELETE FROM $this->table WHERE comId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getCompanyById($id) {
        $query = "SELECT * FROM $this->table WHERE comId = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllCompany() {
        $sql = "SELECT * FROM $this->table ORDER BY comId";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}

?>