<?php
$dsn = 'mysql:dbhost=ec2-35-173-94-156.compute-1.amazonaws.com;dbname=dmd16vhafqbm6';
$dbuser = 'ctxwlasfztqsmg';
$password = 'b7413c47149b7038ce56cc49e464c09f8044ab76afc5459a677ddaf201b3578e';
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
