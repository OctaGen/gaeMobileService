<?php
require('connect.php');

$response = array();

if(!empty($_POST['ID'])){
	
	$id = $_POST['ID'];

	$result = mysqli_query($con,"SELECT * from auto_ecole WHERE id_compte=$id") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["ecole"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["id_auto"] = $row[0];
			$Facts["nom"] = $row[1];
			$Facts["numero"] = $row[2];
			$Facts["logo"] = $row[3];
			$Facts["patente"] = $row[4];
			$Facts["if"] = $row[5];
			$Facts["cnss"] = $row[6];
			$Facts["cb"] = $row[7];
			$Facts["responsable"] = $row[8];
			$Facts["dateouverture"] = $row[9];
			$Facts["tel"] = $row[10];
			$Facts["fax"] = $row[11];
			$Facts["ville"] = $row[12];
			$Facts["email"] = $row[13];
			$Facts["adresse"] = $row[14];
			
			array_push($response["ecole"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }
	  
}else{
	$response["erreur"] = "aucun information trouvée!";
	$response["success"] = 0;
}

  echo json_encode($response);
  mysqli_close($con);
?>