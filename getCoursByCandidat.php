<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `cours` WHERE id_candidat=$id ORDER BY id_cours DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["cours"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["idcours"] = $row[0];
			$Facts["type"] = $row[1];
			$Facts["nbrhour"] = $row[2];
			$Facts["hourcours"] = $row[3];
			$Facts["datecours"] = $row[4];
			
			array_push($response["cours"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>