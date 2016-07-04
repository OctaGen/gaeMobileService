<?php
require('connect.php');

$response = array();

$id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `notification` WHERE isread=0 AND id_compte=$id ORDER BY time DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["notification"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id"] = $row['id'];
			$Facts["notification"] = $row['notification'];
			$Facts["type"] = $row['type'];
			$Facts["idtype"] = $row['idtype'];
			$Facts["isread"] = $row['isread'];
			$Facts["time"] = $row['time'];
			
			array_push($response["notification"], $Facts);
		
			}
			$result = mysqli_query($con,"UPDATE `notification` SET `isread`=1 WHERE id_compte=$id") or die(mysql_error());
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>