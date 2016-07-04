<?php
require('connect.php');

$response = array();

if(!empty($_POST['Code'])){
	
	$code = $_POST['Code'];

	$result = mysqli_query($con,"SELECT id_societe FROM c_activation WHERE code='$code' AND active='non'") or die(mysql_error());
	
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		 $ids=0;
		 while ($row = mysqli_fetch_array($result)) {
			$ids=$row[0];
		 }
		 
		
			$res = mysqli_query($con,"SELECT * FROM `c_société` WHERE ID=$ids") or die(mysql_error());
			$response["societe"] = array();
			while ($row = mysqli_fetch_array($res)) {
			
				$Facts = array();
				$Facts["idsociete"] = $row[0];
				$Facts["nomsociete"] = $row[1];
				$Facts["logo"] = $row[2];
				
				array_push($response["societe"], $Facts);
			
				}
				
			$ress = mysqli_query($con,"SELECT * FROM `c_locale` WHERE Société_ID=$ids") or die(mysql_error());
			$response["locale"] = array();
			while ($row = mysqli_fetch_array($ress)) {
			
				$Facts = array();
				$Facts["idlocal"] = $row[0];
				$Facts["adresse"] = $row[1];
				$Facts["ville"] = $row[2];
				$Facts["tel"] = $row[4];
				
				array_push($response["locale"], $Facts);
			
				}
				
			$req = mysqli_query($con,"SELECT * FROM `c_utilisateur` WHERE Société_ID=$ids") or die(mysql_error());
			$response["user"] = array();
			while ($row = mysqli_fetch_array($req)) {
			
				$Facts = array();
				$Facts["iduser"] = $row[0];
				$Facts["fullname"] = $row[1]." ".$row[2];
				$Facts["username"] = $row[6];
				$Facts["password"] = $row[7];
				
				array_push($response["user"], $Facts);
			
				}
	  }
	  else{
		$response["success"] = 0;
	  }
	  
}else{
	$response["erreur"] = "aucun produit trouvé!";
	$response["success"] = 0;
}

  echo json_encode($response);
  mysqli_close($con);
?>