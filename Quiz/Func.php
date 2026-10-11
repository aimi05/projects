<?php

function check_login($con){
	//überprüft die Session id
	if(isset($_SESSION['id'])){
		//verbindung zur Datenbank um die id zu überprüfen mit der Session id
		$id = $_SESSION['id'];
		$query = "select * from users where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data; //gibt den Datensatz zurück (wo id = '$id')
		}

}else {
	//umleitung zum login
	header("Location:login.php");
	die;
}
}

?>
