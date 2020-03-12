<?php
	
$host="192.168.0.7";
$user="root";
$pass="";
$database="educatio_mshindi";

/*
mysql_connect($host,$user,$pass,TRUE) or die("could not connect");
mysql_select_db($database) or die("could not select database");*/

$conn = mysql_connect($host,$user,$pass,$database);
/*$conn = mysqli_connect($host,$user,$pass);
mysqli_select_db("educatio_mshindi", $conn);
mysqli_select_db("educatio_educat", $conn);*/


if (!$conn) {
		die("SERVER NOT CONNECTED!!" .mysql_error());
	}


?>