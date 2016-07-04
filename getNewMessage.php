<?php
require('connect.php');

$response = array();

$id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `messages` WHERE isread=0 AND from_app='web' AND id_compte=$id ORDER BY time DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["messages"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id"] = $row['id'];
			$Facts["message"] = $row['message'];
			$Facts["from_app"] = $row['from_app'];
			$Facts["to_app"] = $row['to_app'];
			$Facts["isread"] = $row['isread'];
			$Facts["time"] = $row['time'];
			
			array_push($response["messages"], $Facts);
		
			}
			$result = mysqli_query($con,"UPDATE `messages` SET `isread`=1 WHERE from_app='web' AND id_compte=$id") or die(mysql_error());
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>