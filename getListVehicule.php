<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `vehicule` WHERE id_compte=$id ORDER BY id_vehicule DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["vehicule"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["ID"] = $row[0];
			$Facts["Matricule"] = $row[1];
			$Facts["Marque"] = $row[2];
			
			$Facts["Carburant"] = $row[3];
			$Facts["NbrCylindre"] = $row[4];
			$Facts["NbrPlace"] = $row[5];
			
			array_push($response["vehicule"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>