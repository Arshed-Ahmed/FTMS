<?php

	session_start();
	require_once("../models/Connection.php");

	$uname=$_POST["name"];
	$pass=$_POST["pwd"];
		//echo($uname);
	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT * FROM user WHERE usr_id='$uname';";
	$result=$con->query($sql);
	if($con->errno)
	{
		echo("SQL Error".$con->error);
		exit;
	}
	$nor=$result->num_rows;
	//echo($nor);
	if($nor>0)
	{
		$rec=$result->fetch_assoc();
		$pass=md5($pass);
		if($pass==$rec["usr_pass"])
		{
			if($rec["usr_status"]=="Active")
			{
				$_SESSION["user"]["uname"]=$uname;
				$_SESSION["user"]["utype"]=$rec["usr_type"];
				echo("3");
			}
			else
			{
				echo("2");
			}
		}
		else
		{
			echo("1");
		}
	}
	else
	{
		echo("1");
	}
	$con->close();
?>