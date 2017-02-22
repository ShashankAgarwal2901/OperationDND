<?php	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		
		if($mobile == '' || $password == ''){
			echo "please fill all values";
		}
                else{
			require_once('dbConnect.php');
			$sql = "update registrations set password='$password' where mobile= '$mobile'";
			if(mysqli_query($con,$sql)){
					             echo 'successfully registered';
				                  }
                         else{
			       echo 'oops! Please try again!';
			     }
			mysqli_close($con);
		    }
			}
		
?>