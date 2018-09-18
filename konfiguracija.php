<?php
//za lokalni rad
//$lokalno = true;
//prebacivanje na server
$lokalno = false;
if($lokalno == true){
    $host = "localhost";
    $dbname = "pjesmarica";
    $dbuser = "edunova";
    $dbpass = "edunova";

    $appRoot = 'http://localhost/Pjesmarica/';
}else{
    $appRoot = 'http://tmusic.byethost8.com/Pjesmarica/';

	$host="sql309.byethost.com";
	$dbname="b8_21048355_tmusic";
	$dbuser="b8_21048355";
	$dbpass="cv532s7k";
	$dev=false;
}
try{
	$veza = new PDO("mysql:host=" . $host . ";dbname=" . $dbname,$dbuser,$dbpass);
	$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$veza->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8';");
	$veza->exec("SET NAMES 'utf8';");
}catch(PDOException $e){
	switch($e->getCode()){
		case 1049:
			header("location: " . $appRoot . "fault/invalidbasename.html");
			exit;
			break;
		default:
			echo "neuspjelo spajanje na bazu.";
			exit;
			break;
	}
}
    