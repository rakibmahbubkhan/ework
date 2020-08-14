<?php
$dsn = 'mysql:dbhost=localhost;dbname=ework';
$dbuser = 'root';
$password = '';
$option = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try{
	$con = new PDO($dsn,$dbuser,$password,$option);
	$con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e){
		echo "Database Connecton Failed!!";
}
?>