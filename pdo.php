<?php

$host = "localhost";
$dbname = "infinite_scroll";
$user = "admin";
$password = "admin";

$db = new PDO("mysql:dbname=$dbname;host=$host" , $user , $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($db){
	//echo "<script>console.log('pdo is up and running');</script>";



}
?>
