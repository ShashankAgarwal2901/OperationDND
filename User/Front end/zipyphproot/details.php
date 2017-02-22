<?php 
	

	$mobile = $_GET['mobile'];
	require_once('dbConnect.php');
	$sql = "SELECT * FROM registrations WHERE mobile='$mobile'";
	$r = mysqli_query($con,$sql);
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"id"=>$row['id'],
			"mobile"=>$row['mobile'],
			"name"=>$row['name'],
			"email"=>$row['email'],
			"address"=>$row['address']));
		

	//displaying in json format 
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);