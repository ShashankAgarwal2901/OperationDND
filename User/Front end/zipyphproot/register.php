<?php	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		
		if($name == '' || $mobile == '' || $password == '' || $email == ''|| $address ==''){
			echo 'please fill all values';
		}else{
			require_once('dbConnect.php');
			$sql = "SELECT * FROM registrations WHERE mobile='$mobile'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset($check)){
				echo 'Mobile Number already exist';
			}else{				
				$sql = "INSERT INTO registrations (name,mobile,password,email,address) VALUES('$name','$mobile','$password','$email','$address')";
				if(mysqli_query($con,$sql)){
					echo 'successfully registered';
				}else{
					echo 'oops! Please try again!';
				}
			}
			mysqli_close($con);
		}
}else{
echo 'error';
}
?>