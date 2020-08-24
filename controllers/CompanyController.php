<?php
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/CompanyModel.php");

$db_handle = new Connection();
// private $model='';

class CompanyController
{	

	function addCompany()
	{

        /* Getting file name */
        $filename = $_FILES['file']['name'];

        /* Location */
        $location = "style/".$filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

        /* Valid Extensions */
        $valid_extensions = array("jpg","jpeg","png");
        /* Check file extension */
        if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
           $uploadOk = 0;
        }

        if($uploadOk == 0){
           echo 0;
        }else{
           /* Upload file */
           if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
              echo $location;
           }else{
              echo 0;
           }
        }


		$name = $_POST['name'];
        $add = $_POST['add'];
        $city = $_POST['city'];
        $regno= $_POST['regno'];
        $location= $_POST['location'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $web = $_POST['web'];
		$model = new CompanyModel();
		$insertId = $model->addCompany($name,$add,$city,$regno,$location,$tel,$email,$web);

		echo json_encode($insertId);
	}

}

?>