<?php
session_start();
include_once "konfiguracija.php";
$lozinka = md5($_POST["lozinka"]);


$izraz = $veza->prepare("select * from korisnik where korisnickoime = :korisnickoime and lozinka= :lozinka");
$izraz->bindParam(":korisnickoime", $_POST["korisnickoime"]);
$izraz->bindParam(":lozinka", $lozinka);
$izraz-> execute();
$korisnik= $izraz -> fetch(PDO::FETCH_OBJ);
if($korisnik){
    $_SESSION['korisnik'] = $korisnik->ime;
    $_SESSION['admin'] = $korisnik->uloga;
    
    header("Location: index.php");
}else{
    echo "krivi podaci";
    header("Location: prijava.php?error=1");
}
