<?php
include_once "../konfiguracija.php";
include_once "../funkcije.php";
provjera($appRoot); 


//validacija

$izraz = $veza->prepare("update korisnik set ime = :ime , prezime = :prezime, email = :email, korisnickoime = :korisnickoime, uloga = :uloga where sifra = :sifra");
$izraz->bindParam(":ime",  $_POST["ime"]);
$izraz->bindParam(":prezime",  $_POST["prezime"]);
$izraz->bindParam(":email",  $_POST["email"]);
$izraz->bindParam(":korisnickoime",  $_POST["korisnickoime"]);
$izraz->bindParam(":uloga",  $_POST["uloga"]);
$izraz->bindParam(":sifra",  $_POST["sifra"]);
$izraz->execute();


    header("Location: index.php"); 
