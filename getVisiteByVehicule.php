<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `visite` WHERE id_vehicule=$id  ORDER BY id_visite DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["visite"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["montant"] = $row[1];
			$Facts["date_visite"] = $row[2];
			$Facts["date_prochaine"] = $row[3];
			$Facts["description_visite"] = $row[4];
			
			array_push($response["visite"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>