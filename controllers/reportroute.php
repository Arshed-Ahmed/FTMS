<<<<<<< HEAD
<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
	 	header("Location:../index.php");
	}
	$utype=$_SESSION["user"]["utype"];
	if($utype=="Admin")
	{
		header("Location:../view/adminreport.php");
		
	}
	else if($utype=="Tailor")
	{
		header("Location:../view/tailorreport.php");
		
	}
	// else if($utype=="3")
	// {
	// 	header("Location:#");
		
	// }

=======
<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
	 	header("Location:../index.php");
	}
	$utype=$_SESSION["user"]["utype"];
	if($utype=="Admin")
	{
		header("Location:../view/adminreport.php");
		
	}
	else if($utype=="Tailor")
	{
		header("Location:../view/tailorreport.php");
		
	}
	// else if($utype=="3")
	// {
	// 	header("Location:#");
		
	// }

>>>>>>> 3acd79f15635e1a8876e84e76dccad96618bec6a
?>