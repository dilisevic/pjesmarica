<?php
include_once "../konfiguracija.php";


//validacija

$izraz = $veza->prepare("insert into izvodac(naziv) values(:naziv)");
$izraz->bindParam(":naziv",  $_POST["naziv"]);
$izraz->execute();
$id = $veza->lastInsertId();

if($id == 0){
header("Location: unosNovog.php?error=1");    
}else{
    header("Location: index.php"); 
}