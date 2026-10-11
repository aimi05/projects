<?php // diese Datei stellt eine Vebindung zu der Datenbank aiman her

/*$dbhost = "";
//$dbhost = "";
$dbuser = "";
$dbpass = "";
$dbname = "";
$dbport = "";
//$dbport = "";
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
