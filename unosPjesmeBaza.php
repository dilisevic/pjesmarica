<?php
include_once "konfiguracija.php";
include_once "funkcije.php";
provjera($appRoot);


//validacija

$izraz = $veza->prepare("insert into pjesma(naziv, izvodac, tonalitet, tekst) values(:naziv, :izvodac, :ton, :tekst)");
$izraz->bindParam(":naziv",  $_POST["naziv"]);
$izraz->bindParam(":izvodac", $_POST["izvodac"]);
$izraz->bindParam(":ton", $_POST["ton"]);
$izraz->bindParam(":tekst", $_POST["tekst"]);
$izraz->execute();
$id = $veza->lastInsertId();
if($id == 0){
header("Location: unosPjesme.php?error=1");    
}else{
    header("Location: pjesme.php?sifra=".$_POST["izvodac"]); 
}