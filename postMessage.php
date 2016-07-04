<?php
require('connect.php');

$response = array();
	$id = $_POST['ID'];
	$message = $_POST['Message'];
	$result = "INSERT INTO `messages`(`message`, `from_app`, `to_app`, `isread`, `time`, `id_compte`) VALUES ('$message','mobile','web',0,now(),$id)";
	 if( mysqli_query($con,$result)){
		$response["success"] = 1;
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>