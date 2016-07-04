<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `vidange` WHERE id_vehicule=$id  ORDER BY id_vidange DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["vidange"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["montant"] = $row[1];
			$Facts["kilometrage"] = $row[2];
			$Facts["date_operation"] = $row[3];
			$Facts["date_prochaine"] = $row[4];
			
			array_push($response["vidange"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>