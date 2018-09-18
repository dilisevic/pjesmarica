<?php
include_once "../konfiguracija.php";
include_once '../funkcije.php';

provjera($appRoot);
$izraz = $veza->prepare("delete from korisnik where sifra =:sifra");
$izraz->bindParam(":sifra", $_GET["sifra"]);
$izraz->execute();
header("Location: index.php");