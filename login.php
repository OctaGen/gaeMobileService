<?php
require('connect.php');

$response = array();
if(!empty($_POST['Username']) && !empty($_POST['Password']) ){
$username =$_POST['Username'];
$password =$_POST['Password']; 
//$pwd=md5($password);

	$result = mysqli_query($con,"SELECT * FROM comptes WHERE login='$username' AND mot_de_passe='$password'") or die(mysql_error());
	 if(mysqli_num_rows($result) > 0){
		$response["success"] = 1;
		$response["user"] = array();
		while ($row = mysqli_fetch_array($result)) {
		
			$Facts = array();
			$Facts["iduser"] = $row[0];
			$Facts["fullname"] = $row[1];
			$Facts["adresse"] = $row[2];
			$Facts["tel"] = $row[3];
			$Facts["email"] = $row[4];
			$Facts["login"] = $row[5];
			$Facts["password"] = $row[6];
			
			array_push($response["user"], $Facts);
		
			}
	  }
	  else{
		$response["success"] = 0;
	  }

}else{
	$response["erreur"] = "Login or password invalid !";
	$response["success"] = 0;
}
  echo json_encode($response);
  mysqli_close($con);
?>