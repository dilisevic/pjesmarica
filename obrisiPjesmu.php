<?php
include_once "konfiguracija.php";
include_once "funkcije.php";
provjera($appRoot);

$izraz = $veza->prepare("delete from pjesma where sifra= :sifra");
$izraz->bindParam(":sifra", $_GET["sifra"]);
$izraz->execute();
 header("Location: pjesme.php?brisanje=1&sifra=".$_GET["izvodac"]); 