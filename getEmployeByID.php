<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `employe` WHERE id_employe=$id") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["employe"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id_employe"] = $row[0];
			$Facts["nom_prenom"] = $row[1];
			$Facts["cin"] = $row[2];
			$Facts["date_naissance"] = $row[3];
			$Facts["numero_cnss"] = $row[4];
			$Facts["telephone"] = $row[5];
			$Facts["email"] = $row[6];
			$Facts["adresse"] = $row[7];
			$Facts["date_embauche"] = $row[8];
			
			array_push($response["employe"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>