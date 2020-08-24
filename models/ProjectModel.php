<?php
require_once("DBController.php");
class ProjectModel
{

	private $db_handle;
    private $table = 'dsms_project';

    function __construct() {
      $this->db_handle = new DBController();
  }

	// add Project info to tbl
  function addProject($name, $category, $description,$source,$gndivision,$address,$budget,$sdate) {
    $query = "INSERT INTO $this->table (name,category,description,source,gn_division,address,budget,date_start) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $paramType = "ssssssss";
    $paramValue = array(
        $name,
        $category,
        $description,
        $source,
        $gndivision,
        $address,
        $budget,
        $sdate
    );

    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $name;
}

function editProject($name, $description,$source,$gndivision,$address,$budget,$project_id) {
    $query = "UPDATE $this->table SET name = ?,description = ?,source = ?,gn_division = ?,address = ?,budget = ? WHERE project_id = ?";
    $paramType = "ssssssi";
    $paramValue = array(
        $name,
        $description,
        $source,
        $gndivision,
        $address,
        $budget,
        $project_id
    );

    $insertId = $this->db_handle->update($query, $paramType, $paramValue);
    return $insertId;
}

function deleteProject($project_id) {
    $query = "DELETE FROM $this->table WHERE project_id = ?";
    $paramType = "i";
    $paramValue = array(
        $project_id
    );
    $this->db_handle->update($query, $paramType, $paramValue);
}

function getProjectById($project_id) {
    $query = "SELECT * FROM $this->table WHERE project_id = ?";
    $paramType = "i";
    $paramValue = array(
        $project_id
    );

    $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    return $result;
}

function getAllProject() {
    $sql = "SELECT * FROM $this->table ORDER BY project_id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}

function getAllProjectForEstimation() {
    $sql = "SELECT * FROM dsms_project JOIN dsms_estimation ON dsms_project.project_id = dsms_estimation.project_id ORDER BY dsms_project.project_id";

    // $sql = "SELECT * FROM dsms_estimation JOIN dsms_project ON dsms_estimation.project_id = dsms_project.project_id ORDER By dsms_estimation.estimation_id";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}
}
?>