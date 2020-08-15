<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
	 	header("Location:../index.php");
	}
	$utype=$_SESSION["user"]["utype"];
	if($utype=="Admin")
	{
		header("Location:../view/admindash.php");
		
	}
	else if($utype=="Tailor")
	{
		header("Location:../view/tailordash.php");
		
	}
	// else if($utype=="3")
	// {
	// 	header("Location:#");
		
	// }

?>