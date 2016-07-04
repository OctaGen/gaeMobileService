<?php
require('connect.php');

$response = array();
     $id = $_POST['ID'];
	$result = mysqli_query($con,"SELECT * FROM `examen`,`detail_examen` WHERE id_candidat=$id AND examen.id_examen=detail_examen.id_examen ORDER BY examen.id_examen DESC") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		 $response["success"] = 1;
		$response["examen"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["idexamen"] = $row[0];
			$Facts["datexam"] = $row[2];
			$Facts["typeexam"] = $row[3];
			$Facts["description"] = $row[4];
			
			$Facts["examenTheorique"] = $row[6];
			
			$Facts["examenPratique"] = $row[7];
			$Facts["note"] = $row[8];
			
			array_push($response["examen"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }


  echo json_encode($response);
  mysqli_close($con);
?>