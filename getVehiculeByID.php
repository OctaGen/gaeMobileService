<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `vehicule` WHERE id_vehicule=$id") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["vehicule"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id_vehicule"] = $row[0];
			$Facts["matricule"] = $row[1];
			$Facts["marque"] = $row[2];
			$Facts["carburant"] = $row[3];
			$Facts["cylindre"] = $row[4];
			$Facts["place"] = $row[5];
			
			array_push($response["vehicule"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>