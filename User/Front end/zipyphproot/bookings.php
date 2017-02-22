<?php	
if($_SERVER['REQUEST_METHOD']=='POST'){
		$Rid = $_POST['rid'];
		$bike = $_POST['bike'];
		$scooter = $_POST['scooter'];
		$duration = $_POST['duration'];
		$pickdate = $_POST['pickdate'];
		$picktime = $_POST['picktime'];
		$pickaddress = $_POST['pickaddress'];
		$mobile = $_POST['mobile'];
                $name= $_POST['name'];
		
		if($Rid == '' || $bike == '' || $scooter == '' || $duration == ''|| $pickdate ==''|| $picktime ==''|| $pickaddress ==''|| $mobile ==''){
			echo 'please fill all values';
		}else{
			require_once('dbConnect.php');			
			$sql = "INSERT INTO bookings (Rid,bike,scooter,duration,pickdate,picktime,pickaddress,mobile) VALUES($Rid,$bike,$scooter,'$duration','$pickdate','$picktime','$pickaddress',$mobile)";
				if(mysqli_query($con,$sql)){
                                         echo 'successfully booked';
 //paste
                                         require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zipybookings@gmail.com';                 // SMTP username
$mail->Password = 'way2gozipy';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->SetFrom('Zipy Rides');
$mail->addAddress('zipybookings@gmail.com');     // Add a recipient
$mail->addAddress('zipyrides@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'BOOKING-FROM-'.$name;
$mail->Body    = 'Booking Details : <br/>
Name : <b>'.$name.'</b><br/>
Mobile : <b>'.$mobile.'</b><br/>
No. of Bikes : '.$bike.'<br/>
No. of Scooter : '.$scooter.'<br/>
Pickup date :'.$pickdate.' <br/>
Pickup time :'.$picktime.' <br/>
Pickup Address : '.$pickaddress.'<br/>
Duration :'.$duration;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}
//paste
				}else{
					echo 'oops!';
				}
			mysqli_close($con);
		}
}else{
echo 'error';
}
?>