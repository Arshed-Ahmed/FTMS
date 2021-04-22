<?php 
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/StyleModel.php");

$db_handle = new Connection();
// private $model='';

	class StyleController
	{	

		function deleteStyle(){
			$id = $_POST["id"];
			$Model = new StyleModel();
			$Model->deleteStyle($id);
		}


	}

	
?>