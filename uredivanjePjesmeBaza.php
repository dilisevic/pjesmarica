<?php
include_once "konfiguracija.php";
include_once "funkcije.php";
provjera($appRoot); 

//validacija

$izraz = $veza->prepare("update pjesma set naziv = :naziv, izvodac =:izvodac, tonalitet =:tonalitet, tekst =:tekst where sifra = :sifra");
$izraz->bindParam(":naziv",  $_POST["naziv"]);
$izraz->bindParam(":izvodac", $_POST["izvodac"]);
$izraz->bindParam(":tonalitet", $_POST["ton"]);
$izraz->bindParam(":tekst", $_POST["tekst"]);
$izraz->bindParam(":sifra",  $_POST["sifra"]);
$izraz->execute();


    header("Location: pjesme.php?sifra=". $_POST["izvodac"]); 


