<?php

$db = "mysql";
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "catalogonamaov2";
$port = 3306;


try {
	$conn2 = new PDO("mysql:host=localhost;port=3306;dbname=$dbname;",$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}catch(PDOException $error){

	echo "erro na conexão com o banco";

}

?>