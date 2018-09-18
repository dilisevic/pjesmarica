<?php
include_once "../konfiguracija.php";
include_once "../funkcije.php";
provjera($appRoot); 


//validacija

$izraz = $veza->prepare("update izvodac set naziv = :naziv where sifra = :sifra");
$izraz->bindParam(":naziv",  $_POST["naziv"]);
$izraz->bindParam(":sifra",  $_POST["sifra"]);
$izraz->execute();


    header("Location: index.php"); 
