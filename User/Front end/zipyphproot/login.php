<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		
		require_once('dbConnect.php');
		
		$sql = "select * from registrations where mobile='$mobile' and password='$password'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		if(isset($check)){
			echo "success";
		}else{
			echo "Invalid Mobile or Password";
		}
		
	}else{
		echo "error try again";
	}