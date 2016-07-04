<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM employe WHERE id_compte=$id ORDER BY id_employe DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["employe"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["ID"] = $row[0];
			$Facts["Name"] = $row[1];
			
			$Facts["CIN"] = $row[2];
			$Facts["Date_Naiss"] = $row[3];
			$Facts["CNSS"] = $row[4];
			$Facts["Tel"] = $row[5];
			$Facts["Email"] = $row[6];
			$Facts["Adresse"] = $row[7];
			$Facts["Date_Embauche"] = $row[8];
			
			array_push($response["employe"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>