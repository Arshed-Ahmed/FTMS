<<<<<<< HEAD
<?php 
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/CustomerModel.php");

$db_handle = new Connection();
// private $model='';

	//if upload button is pressed
	if (isset($_POST['upload'])) {
		//path to store file
		$target = "style/".basename($_FILE['image']['name']);

		//connect to database
		require_once("../models/Connection.php");

		//getting submitted data from the form
		$image = $_FILE['image']['name'];
		$iname = $_POST['iname'];
		$desc = $_POST['desc'];

		$sql = "INSERT INTO style (stlname , stlstyle, stldesc) VALUES ('$iname', '$image', '$desc')";

	}

	class StyleController
	{	

		function addStyle()
		{
	        $iname = $_POST['iname'];
	        $image = $_FILE['image']['name'];
			$desc = $_POST['desc'];
			
			$model = new StyleModel();
			$insertId = $model->addStyle($iname,$image,$desc);

			echo json_encode($insertId);
		}
	}

=======
<?php 
// header("Content-Type: text/json");
require_once("models/Connection.php");
require_once("models/CustomerModel.php");

$db_handle = new Connection();
// private $model='';

	//if upload button is pressed
	if (isset($_POST['upload'])) {
		//path to store file
		$target = "style/".basename($_FILE['image']['name']);

		//connect to database
		require_once("../models/Connection.php");

		//getting submitted data from the form
		$image = $_FILE['image']['name'];
		$iname = $_POST['iname'];
		$desc = $_POST['desc'];

		$sql = "INSERT INTO style (stlname , stlstyle, stldesc) VALUES ('$iname', '$image', '$desc')";

	}

	class StyleController
	{	

		function addStyle()
		{
	        $iname = $_POST['iname'];
	        $image = $_FILE['image']['name'];
			$desc = $_POST['desc'];
			
			$model = new StyleModel();
			$insertId = $model->addStyle($iname,$image,$desc);

			echo json_encode($insertId);
		}
	}

>>>>>>> 3acd79f15635e1a8876e84e76dccad96618bec6a
?>