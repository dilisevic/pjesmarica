<?php
var_dump($_POST);
include_once "konfiguracija.php";

$izraz = $veza->prepare("select * from korisnik where korisnickoime = :korisnickoime");
$izraz->bindParam(":korisnickoime", $_POST["korisnickoime"]);
$izraz->execute();
$postojik = $izraz->fetch(PDO::FETCH_OBJ);

if($postojik){
    header("Location: prijava.php?korisnik=1");
}
//ista provjer asamo za email

$izraz = $veza->prepare("insert into korisnik(ime,prezime,korisnickoime,email,lozinka) values(:ime, :prezime, :korisnickoime, :email, :lozinka)");
$izraz->bindParam(":ime", $_POST["ime"]);
$izraz->bindParam(":prezime", $_POST["prezime"]);
$izraz->bindParam(":korisnickoime", $_POST["korisnickoime"]);
$izraz->bindParam(":email", $_POST["email"]);
$izraz->bindParam(":lozinka", md5($_POST["lozinka"]));
$izraz->execute();
$id = $veza->lastInsertId();
if($id){
    header("Location: prijava.php?uspjeh=1");
}