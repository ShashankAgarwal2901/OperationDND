<?php	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
	        $email = $_POST['email'];
		$address = $_POST['address'];
		
		if($name == '' || $mobile == '' ||  $email == ''|| $address =='') 
                {
			echo 'please fill all values';
		}
		   else{
			require_once('dbConnect.php');
			$sql = "UPDATE registrations set name='$name', email ='$email', address ='$address' WHERE mobile ='$mobile';";
 
			
			if(mysqli_query($con,$sql)){
                                                      echo 'successfully updated!';
      						   }
			else{
 				echo 'Could not Update User profile! Try Again Later!';
 		            }

                         mysqli_close($con);
                        }
}
else{
				echo 'error';
}

