<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `candidats`,`vehicule`,`moniteurs` WHERE candidats.id_compte=$id AND candidats.id_vehicule=vehicule.id_vehicule AND candidats.id_moniteur=moniteurs.id_moniteur  ORDER BY id_candidat DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["candidat"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id"] = $row[0];
			$Facts["cin"] = $row[3];
			$Facts["name"] = $row[2];
			
			$Facts["dateNaissance"] = $row[4];
			$Facts["telephone"] = $row[5];
			$Facts["email"] = $row[6];
			$Facts["nationalite"] = $row[7];
			$Facts["adresse"] = $row[8];
			$Facts["langueChoisie"] = $row[9];
			$Facts["dateInscription"] = $row[10];
			$Facts["prixInscription"] = $row[11];
			$Facts["typePermis"] = $row[12];
			$Facts["nombreHeures"] = $row[14];
			$Facts["vehicule"] = $row[23]." ".$row[22];
			$Facts["moniteur"] = $row[29]." ".$row[30];
			
			array_push($response["candidat"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>