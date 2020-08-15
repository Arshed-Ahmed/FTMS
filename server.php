<?php
	$class = $_GET['c'];
	$method = $_GET['m'];
	$filename = $class.'.php';
	if(file_exists('controllers/'.$filename))
	{
		require('controllers/'.$filename);
		call_user_func(array($class,$method));
	}
	else
	{
		die("Class not found");
	}


    // $keyword = strval($_GET['str']);
    // $search_param = "{$keyword}%";
    // $conn =new mysqli('localhost', 'root', '' , 'bit');

    // $sql = $conn->prepare("SELECT * FROM customer WHERE (cusNIC LIKE ? OR cusFname LIKE ?)");
    // $sql->bind_param("s",$search_param);
    // $sql->execute();
    // $result = $sql->get_result();
    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         $cus_list[] = $row["cus_name"]."-".$row["cus_id"];
    //     }
    //     echo json_encode($cus_list);
    // }

    // $typeahead = array();
    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) 
    //     {
    //         $name_string = $row['cusFname'];

    //         $typeahead[] = array('id'=>$row['cusid'],'name'=>$name_string);
    //     }
    // }
    // echo json_encode($typeahead);
  
    // $conn->close();
?>