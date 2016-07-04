<?php
require('connect.php');

$response = array();
	$id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `candidats` WHERE id_candidat=$id ") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["candidat"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id"] = $row[0];
			$Facts["numdossier"] = $row[1];
			$Facts["name"] = $row[2];
			$Facts["cin"] = $row[3];
			$Facts["naissance"] = $row[4];
			$Facts["tel"] = $row[5];
			$Facts["email"] = $row[6];
			$Facts["nationalite"] = $row[7];
			$Facts["adresse"] = $row[8];
			$Facts["langue"] = $row[9];
			$Facts["dateinscription"] = $row[10];
			$Facts["prixinscription"] = $row[11];
			$Facts["typepermis"] = $row[12];
			$Facts["typedossier"] = $row[13];
			$Facts["nombresheures"] = $row[14];
			$Facts["responsable"] = $row[15];
			$Facts["savoirecole"] = $row[16];
			$Facts["idvehicule"] = $row[17];
			$Facts["idmoniteur"] = $row[18];
			$Facts["idcompte"] = $row[19];
			$Facts["archive"] = $row[20];
			
			array_push($response["candidat"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>