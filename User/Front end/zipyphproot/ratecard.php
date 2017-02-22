<?php
$result = array();
 array_push($result,array(
	'normal' => 50, 
	'late' => 70, 
	'halfday' => 500, 
	'fullday' => 800));
   echo json_encode(array('result'=>$result));
?>
