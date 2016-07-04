<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM candidats,examen,detail_examen WHERE candidats.id_compte=$id AND candidats.id_candidat=examen.id_candidat AND examen.id_examen=detail_examen.id_examen ORDER BY nom_prenom ASC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["examen"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["ID"] = $row['id_candidat'];
			$Facts["Name"] = $row['nom_prenom'];
			
			$Facts["Date"] = $row['date_examen'];
			$Facts["Type"] = $row['type_examen'];
			$Facts["Description"] = $row['description'];
			$Facts["examen_theorique"] = $row['examen_theorique'];
			$Facts["examen_pratique"] = $row['examen_pratique'];
			$Facts["note_examen"] = $row['note_examen'];
			
			array_push($response["examen"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>