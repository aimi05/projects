<?php // diese Datei stellt eine Vebindung zu der Datenbank aiman her

/*$dbhost = "10.20.0.115";
//$dbhost = "62.154.179.83";
$dbuser = "aiman";
$dbpass = "aiman";
$dbname = "aiman";
$dbport = "3306";
//$dbport = "13306";
*/
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "aiman";
$dbport = "3306";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);
if(!$con)
{

	die("failed to connect!");
}else {
}
?>
