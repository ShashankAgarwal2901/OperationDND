<!DOCTYPE html>
<html>

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<!--CSS-->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<title>Bookings</title>
	</head>

	<body>
		<!--Link and Image-->
		<!--Heading-->
		<h1>Bookings</h1>
		<input type="button" value="Check Bookings" onClick="window.location.reload()">
		<!--Table-->
		<div class="table-responsive">
			<?php
			//Connects to your Database
			mysql_connect("localhost", "zipyrdft_tn05ac7", "zipy7942") or die(mysql_error());
			mysql_select_db("zipyrdft_R308zipy") or die(mysql_error());

			 //checks cookies to make sure they are logged in
			 if(isset($_COOKIE['ID_your_site'])){

			 	$username = $_COOKIE['ID_your_site'];
			 	$pass = $_COOKIE['Key_your_site'];
			 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

			 	while($info = mysql_fetch_array( $check )){

					//if the cookie has the wrong password, they are taken to the login page
			 		if ($pass != $info['password']){
						header("Location: login.php");
			 		}
					//otherwise they are shown the admin area
					else{
					echo "<a href=logout.php>Logout</a>";
				 }
			 }
		 }

			else{ //if the cookie does not exist, they are taken to the login screen
			 header("Location: login");
			}
			?>

			<?php
			//Connect to database
			$conn = new PDO('mysql:host=localhost;dbname=zipyrdft_R308zipy', 'zipyrdft_tn05ac7','zipy7942');
			//Enable SQL debugging
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Select data from SQL table using SELECT command
	//		$sql = "SELECT * FROM bookings";
	$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 30";

			//Execute query
			$cmd = $conn -> prepare($sql);
			$cmd -> execute();
			//Fetch data
			$result = $cmd -> fetchAll();

			//Start the html table
			echo '
			<table class="table table-striped table-hover table-bordered"><thead>
			<th>PickUp Time</th>
			<th>Date</th>
			<th>Duration</th>
			<th>Mobile</th>
			</thead><tbody>';

			//Loop through the single record in data at a time
			foreach ($result as $row) {
				//Output the values from the query sequentially
				echo '<tr>
				<td>' . $row['picktime'] . '</td>
				<td>' . $row['pickdate'] . '</td>
				<td>' . $row['duration'] . '</td>
				<td>' . $row['mobile'] . '</td>
				</tr>';
				}

			//Disconnect
			$conn = null;
			?>
		</div>
	</body>

</html>
