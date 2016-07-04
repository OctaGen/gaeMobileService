<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `assurance` WHERE id_vehicule=$id  ORDER BY id_assurance DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["assurance"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["date_assurance"] = $row[1];
			$Facts["date_prochaine"] = $row[2];
			$Facts["description_assurance"] = $row[3];
			
			array_push($response["assurance"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>