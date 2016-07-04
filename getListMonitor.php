<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `moniteurs`,`vehicule` WHERE moniteurs.id_compte=$id AND moniteurs.id_vehicule=vehicule.id_vehicule ORDER BY id_moniteur DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["moniteurs"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id_moniteur"] = $row[0];
			$Facts["nom_prenom"] = $row[1];
			$Facts["cin"] = $row[2];
			
			$Facts["date_naissance"] = $row[3];
			$Facts["numero_cnss"] = $row[4];
			$Facts["carte_aptitude"] = $row[5];
			$Facts["telephone"] = $row[6];
			$Facts["email"] = $row[7];
			$Facts["adresse"] = $row[8];
			$Facts["date_embauche"] = $row[9];
			$Facts["vehicule"] = $row[14]." ".$row[13];
			
			array_push($response["moniteurs"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>