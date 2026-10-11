<?php

$dbhost = "localhost";
$dbuser = "aimanmedia";
$dbpass = "mimo5215aim";
$dbname = "aimanmedia";
$dbport = "8889";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport))
{

	die("failed to connect!");
}
