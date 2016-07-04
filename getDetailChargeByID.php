<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `charges`,employe WHERE charges.id_charge=$id AND charges.id_employe=employe.id_employe") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["charges"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["ID"] = $row[0];
			$Facts["designation"] = $row[2];
			$Facts["montant"] = $row[3];
			$Facts["date"] = $row[4];
			$Facts["description"] = $row[5];
			$Facts["employee"] = $row[8];
			
			array_push($response["charges"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>