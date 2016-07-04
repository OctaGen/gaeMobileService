<?php
require('connect.php');

$response = array();

$id= $_POST['ID'];
$today = date("Y-m-d");
$NewDate=Date('y:m:d', strtotime("+3 days"));   
	$result = mysqli_query($con,"SELECT * FROM `candidats`,`examen` WHERE candidats.id_compte=$id AND candidats.id_candidat=examen.id_candidat AND `date_examen` BETWEEN '$today' AND '$NewDate'") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["examen"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id_examen"] = $row['id_examen'];
			$Facts["nom_prenom"] = $row['nom_prenom'];
			$Facts["date_examen"] = $row['date_examen'];
			$Facts["type_examen"] = $row['type_examen'];
			$Facts["description"] = $row['description'];
			
			array_push($response["examen"], $Facts);
		
			}
			//$result = mysqli_query($con,"UPDATE `messages` SET `isread`=1 WHERE from_app='web' AND id_compte=$id") or die(mysql_error());
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>