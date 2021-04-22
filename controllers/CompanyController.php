<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/CompanyModel.php");

$db_handle = new Connection();
// private $model='';

class CompanyController
{	

	// function addCompany(){
 //    $name = $_POST['name'];
 //    $add = $_POST['add'];
 //    $city = $_POST['city'];
 //    $regno= $_POST['regno'];
 //    $logo='';
 //    $tel= $_POST['tel'];
 //    $email = $_POST['email'];
 //    $web = $_POST['web'];

	// 	$model = new CompanyModel();
	// 	$insertId = $model->addCompany($name,$add,$city,$regno,$logo,$tel,$email,$web);

	// 	echo json_encode($insertId);
	// }

  function addLogo(){
    /* Getting file name */
    if(isset($_FILES['file']['name'])){

      $name = $_FILES['file']['name'];
      $target_dir = "logo/";
      $location = $target_dir.$name;
      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");

      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
     
         // Upload file
         move_uploaded_file($_FILES['file']['tmp_name'],$location);

         // return record
         echo $location;
         return $location;
      }
    }
    $model = new CompanyModel();
    $insertId = $model->addLogo($location);
    echo json_encode($insertId);
  }

  function getCompany(){
    $id = $_POST['id'];
    $model = new CompanyModel();
    $result = $model->getCompanyById($id);
    echo json_encode($result);
  }

  function getAllCompany(){
    $model = new CompanyModel();
    $result = $model->getAllCompany();
    echo json_encode($result);
  }

  function editCompany(){
    $id =$_POST['id'];
    $name = $_POST['name'];
    $add = $_POST['add'];
    $city = $_POST['city'];
    $regno= $_POST['regno'];
    $tel= $_POST['tel'];
    $email = $_POST['email'];
    $web = $_POST['web'];
    $budget = $_POST['budget'];
    $emp = $_POST['emp'];
    $orders = $_POST['orders'];

    $model = new CompanyModel();
    $insertId = $model->editCompany($name,$add,$city,$regno,$tel,$email,$web,$budget,$emp,$orders,$id);
    echo json_encode($insertId);
  }

  function deleteCompany(){
    $id = $_POST["id"];
    $Model = new CompanyModel();
    $Model->deleteCompany($id);
  }
}

?>