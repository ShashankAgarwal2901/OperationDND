<?php
$result = array();
 array_push($result,array(
	'id' => 0, 
	'heading' => 'New update', 
	'version' => 1 ,
	'description' => 'Hey new update is available.'));
   echo json_encode(array('result'=>$result));
?>
//0 for normal operation
//1 for update
//2 for force update