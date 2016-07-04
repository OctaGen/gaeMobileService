<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `paiement_candidat` WHERE id_candidat=$id ORDER BY id_paiementc DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["paiement"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["idpaiement"] = $row[0];
			$Facts["datepaiement"] = $row[1];
			$Facts["montant"] = $row[2];
			$Facts["description"] = $row[3];
			
			array_push($response["paiement"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>