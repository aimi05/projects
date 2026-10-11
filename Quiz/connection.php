<?php // diese Datei stellt eine Vebindung zu der Datenbank aiman her

/*$dbhost = "";
//$dbhost = "";
$dbuser = "";
$dbpass = "";
$dbname = "";
$dbport = "";
//$dbport = "";
*/
$dbhost = "";
$dbuser = "";
$dbpass = "";
$dbname = "";
$dbport = "";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);
if(!$con)
{

	die("failed to connect!");
}else {
}
?>
