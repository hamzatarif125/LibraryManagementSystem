<?php
$dbName 	= "fuaastlib"	 ;
$dbServer   = "localhost";
$dbUserName = "root"	 ;
$dbPassword = "12345678"		 ;

$db = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if ($db->connect_errno)
{
	exit("Data Base Connection Failed. Reason: " .$db->connect_error);
}

?>
