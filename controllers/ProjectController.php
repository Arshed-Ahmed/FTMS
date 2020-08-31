<?php
// header("Content-Type: text/json");
require_once ("Models/DBController.php");
require_once ("Models/ProjectModel.php");

$db_handle = new DBController();
// private $model='';

class ProjectController
{	

	// function __construct() {
	// 	$this->$model = new ProjectModel();
	// }

	function addProject()
	{
		$name = $_POST['name'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$source = $_POST['source'];
		$gndivision = $_POST['gndivision'];
		$address = $_POST['address'];
		$budget = $_POST['budget'];
		$sdate='';
		$sdate_timestamp = strtotime($_POST["sdate"]);
		$sdate = date("Y-m-d", $sdate_timestamp);
		$model = new ProjectModel();
		$insertId = $model->addProject($name,$category,$description,$source,$gndivision,$address,$budget,$sdate);

		echo json_encode($insertId);
	}

	function getProject(){
		$project_id = $_POST['id'];
		$model = new ProjectModel();
		$result = $model->getProjectById($project_id);
		echo json_encode($result);	
		// require_once "Views/project_new3.php";
	}

	function editProject(){
		$project_id = $_POST['id'];
		$name = $_POST['name'];
		// $category = $_POST['category'];
		$description = $_POST['description'];
		$source = $_POST['source'];
		$gndivision = $_POST['gndivision'];
		$address = $_POST['address'];
		$budget = $_POST['budget'];

		$model = new ProjectModel();
		$insertId = $model->editProject($name,$description,$source,$gndivision,$address,$budget,$project_id);
		echo json_encode($insertId);
	}

	function deleteProject(){
		$project_id = $_POST["id"];
		$Model = new ProjectModel();
		$Model->deleteProject($project_id);
	}

	function getAllProject(){
		$model = new ProjectModel();
		$result = $model->getAllProject();
		echo json_encode($result);
	}

	function getAllProjectForEstimation(){
		$model = new ProjectModel();
		$result = $model->getAllProjectForEstimation();
		echo json_encode($result);
	}
}
?>