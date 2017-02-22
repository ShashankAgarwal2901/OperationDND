<?php	
if($_SERVER['REQUEST_METHOD']=='POST')
{
		$mobile = $_POST['mobile'];
		
		            if($mobile == '')
                                  {
			               echo 'invalid Mobile Number!';
		                  }
                            else
                                 {
			        	require_once('dbConnect.php');
			       		$sql = "SELECT * FROM registrations WHERE mobile='$mobile'";
   				        $check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			                if(isset($check)){
			                                	echo 'proceed';
			                           	 } 
                                        else             {				
				        		        echo 'Mobile Number is not registered';
			                                 }
		                        mysqli_close($con);
		                }
}
else
{
             echo 'error';
}
?>